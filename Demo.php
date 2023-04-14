<?php
/**
 * Created by 村长
 * Date: 2023/4/14
 * Time: 12:00
 */

namespace Demo;
include_once 'bloomFilter/BloomFilter.php';
include_once 'redisSingleTon/RedisSingleTon.php';

use BloomFilter\BloomFilter;
use RedisSingleTon\RedisSingleTon;

class Demo
{
    private $redis;

    public function __construct()
    {
        $host        = '47.92.232.152';
        $port        = 6372;
        $password    = '3.14@.com';
        $this->redis = RedisSingleton::getInstance($host, $port, $password)->getRedis();
    }

    public function add($element)
    {
        $bloomFilter = new BloomFilter($this->redis);
        $bloomFilter->add($element);
    }

    public function exists($element)
    {
        $bloomFilter = new BloomFilter($this->redis);
        if ($bloomFilter->exists($element)) {
            echo "$element 存在\n";
        } else {
            echo "$element 不存在\n";
        }
    }

}

$demo = new Demo();
$demo->exists('hello');
