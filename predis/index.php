<?php

/**
 * Created by 村长
 * Date: 2023/3/20
 * Time: 22:34
 */
require_once('../vendor/autoload.php');
class Index
{

    private $redis;

    public function __construct()
    {
        $this->redis = new Predis\Client(
            [
                'scheme' => 'tcp',
                'host'   => '47.92.232.152',
                'password'   => '3.14@.com',
            ]
        );
    }

    public function test()
    {
        $res = $this->redis->set('kk1','vv2', 'NX', 'EX', 100);
        var_dump($res);
    }
}

$instance = new Index();
$instance->test();