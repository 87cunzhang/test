<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");
require_once './vendor/autoload.php';
$redis = new Predis\Client(
    [
        'scheme'   => 'tcp',
        'host'     => '47.92.232.152',
        'password' => '3.14@.com',
    ]
);
$lock_key = 'lock';
$uuid = uniqid();
while($redis->set($lock_key, $uuid, 'NX', 'EX', 30) == false) {
    //等待20ms
    usleep(20000);
}
$res   = $redis->incr('aaa');
$redis->del($lock_key);
echo $res;
