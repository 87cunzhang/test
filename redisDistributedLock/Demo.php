<?php
/**
 * Created by 村长
 * Date: 2023/4/14
 * Time: 12:00
 */

namespace RedisDistributedLock;

include_once 'redisSingleTon/RedisSingleTon.php';
use RedisSingleTon\RedisSingleTon;

class Demo
{
    private $redis;

    public function __construct()
    {
        $host        = '47.92.232.152';
        $port        = 6379;
        $password    = '3.14@.com';
        $this->redis = RedisSingleton::getInstance($host, $port, $password)->getRedis();
    }


    public function sale()
    {
        $lock_key = 'inventory_lock';
        $lock     = new RedisDistributedLock($this->redis, $lock_key);
        $lock->lock();
        $this->decrInventory();
        $lock->unlock();
    }


    /**
     * 减库存
     * @return void
     */
    public function decrInventory()
    {
        $inventory_key = 'inventory:001';
        $inventory     = $this->redis->get($inventory_key);
        if ($inventory > 0) {
            $this->redis->set($inventory_key, --$inventory);
            echo json_encode(['code' => 201, 'msg' => 'success:' . $inventory]);
        } else {
            echo json_encode(['code' => 401, 'msg' => '商品卖完了']);
        }
    }
}

