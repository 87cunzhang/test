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
     * @param int $timeout 锁的超时时间（秒）
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
        $result = $this->redis->eval($script, [$this->lockKey, $this->lockValue], 1);
        return $result !== false;
    }

}