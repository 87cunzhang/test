<?php
/**
 * 分布式锁
 * Created by 村长
 * Date: 2023/4/14
 * Time: 17:16
 */

namespace RedisDistributedLock;

use Redis;

class RedisDistributedLock
{
    private $redis;
    private $lockKey;
    private $timeout;
    private $retryInterval;
    private $lockValue;

    /**
     * RedisLock constructor.
     * @param Redis $redis Redis实例
     * @param string $lockKey 锁的名称
     * @param int $timeout 锁的超时时间（秒）,超时时间不能设置过短,要确保代码逻辑在锁释放之前能够执行完成,否则会导致并发
     * @param int $retryInterval 获取锁失败后重试的时间间隔（毫秒）
     */
    public function __construct(Redis $redis, string $lockKey, int $timeout = 10, int $retryInterval = 100)
    {
        $this->redis         = $redis;
        $this->lockKey       = $lockKey;
        $this->timeout       = $timeout;
        $this->retryInterval = $retryInterval;
    }

    public function lock(): bool
    {
        $startTime = microtime(true);
        while (microtime(true) - $startTime < $this->timeout) {
            $lockValue = uniqid();
            if ($this->redis->set($this->lockKey, $lockValue, ['NX', 'EX' => $this->timeout])) {
                $this->lockValue = $lockValue;
                return true;
            }
            usleep($this->retryInterval * 1000);
        }
        return false;
    }



    /**
     * 释放锁
     * @return bool
     * @throws \RedisException
     */
    public function unlock(): bool
    {
        $script = "if redis.call('get', KEYS[1]) == ARGV[1] then return redis.call('del', KEYS[1]) else return 0 end";
        //如果 Lua 脚本成功删除了锁，表示锁被成功释放，此时脚本会返回 1
        //如果锁的值不匹配或锁已经不存在，Lua 脚本会返回 0，表示没有执行删除操作。因此，$result 为 0。
        $result = $this->redis->eval($script, [$this->lockKey, $this->lockValue], 1);
        //true：表示脚本执行了且不返回 false（无论是成功删除锁还是因为锁不存在而没有执行删除操作，都认为是“操作成功”），在这个上下文中意味着“释放锁的操作被成功执行了”。
        //false：表示脚本执行失败或出现错误。(如果执行出现错误,如脚本语法错误、执行超时等，eval 方法可能返回 false。)
        return $result !== false;
    }

}