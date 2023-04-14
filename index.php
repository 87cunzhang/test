<?php
require_once './vendor/autoload.php';
require_once './Demo.php';
class redisLock
{
    private $redis;

    public function __construct()
    {
        try {
            $this->redis = new Redis();
            $this->redis->connect('47.92.232.152');
            $this->redis->auth('3.14@.com');
        }catch (Exception $e) {
            echo $e->getMessage();
        }finally{
            $this->redis->close();
        }

    }

    public function demoAdd()
    {
        $demo = new Demo\Demo();
        $demo->exists('ji1n');
    }



    public function lock()
    {
        $lock_key = 'lock';
        $uuid     = uniqid('jwl:');
        while ($this->redis->set($lock_key, $uuid, 'NX', 'EX', 10) == false) {
            //自旋等待20ms
            usleep(20000);
        }
        $inventory = $this->redis->get('inventory');
        if ($inventory > 0) {
            $this->redis->set('inventory', --$inventory);
            echo json_encode(['code' => 200, 'msg' => 'success:' . $inventory]);
        } else {
            echo json_encode(['code' => 400, 'msg' => 'fail']);
        }

        $lua_script = '
            if redis.call("get",KEYS[1]) == ARGV[1] then
                return redis.call("del",KEYS[1])
            else
                return 0
            end';
        $this->redis->eval($lua_script, 1, $lock_key, $uuid);
    }


}

$instance = new redisLock();
$instance->demo_add();

