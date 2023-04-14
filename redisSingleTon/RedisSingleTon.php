<?php

namespace RedisSingleTon;

use Redis;

class RedisSingleTon
{
    //保存类的唯一实例
    private static $instance;
    //Redis实例
    private $redis;

    //构造方法私有化，防止外部实例化对象
    private function __construct($host, $port, $password)
    {
        try {
            $this->redis = new Redis();
            $this->redis->connect($host, $port, $timeout = 1);
            $this->redis->auth($password);
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * 使用公共静态方法getInstance()来获取类的唯一实例
     * @param $host
     * @param $port
     * @param $password
     * @return RedisSingleTon
     */
    public static function getInstance($host, $port, $password): RedisSingleTon
    {
        if (!self::$instance) {
            self::$instance = new RedisSingleton($host, $port, $password);
        }

        return self::$instance;
    }

    /**
     * 获取Redis实例
     * @return Redis
     */
    public function getRedis(): Redis
    {
        return $this->redis;
    }


    /**
     * 当对象被复制时自动调用__clone()。在单例模式中，我们需要禁止对象被复制
     * @return void
     */
    private function __clone()
    {
    }
}



