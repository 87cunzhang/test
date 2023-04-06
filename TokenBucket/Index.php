<?php
/**
 * Created by 村长
 * Date: 2023/4/4
 * Time: 06:30
 */
namespace TokenBucket;
use Spatie\Async\Pool;
require_once  '../vendor/autoload.php';
class TokenBucket {
    private $capacity; // 令牌桶容量
    private $tokens; // 当前令牌数
    private $rate; // 令牌生成速率
    private $lastRefillTime; // 上次令牌生成时间

    public function __construct($capacity, $rate) {
        $this->capacity = $capacity;
        $this->tokens = $capacity;
        $this->rate = $rate;
        $this->lastRefillTime = microtime(true);
    }

    public function consume($tokens) {
        // 计算时间间隔
        $now = microtime(true);
        $timePassed = $now - $this->lastRefillTime;
        $this->lastRefillTime = $now;

        // 重新生成令牌
        $refillAmount = $timePassed * $this->rate;
        $this->tokens = min($this->capacity, $this->tokens + $refillAmount);

        // 检查令牌数是否足够
        if ($this->tokens < $tokens) {
            return false;
        }

        // 消耗令牌
        $this->tokens -= $tokens;
        return true;
    }
}
// 获取当前时间戳
$now = microtime(true);
var_dump($now);die;

$bucket = new TokenBucket(10, 1); // 容量为 10，速率为 1 个/秒
$pool = Pool::create();
for ($i = 0; $i < 20; $i++) {
    $pool->add(function () use ($i, $bucket) {
        if ($bucket->consume(1)) {
            echo "Request $i: Access granted\n";
        } else {
            echo "Request $i: Access denied\n";
        }
    });
}
$pool->wait();


