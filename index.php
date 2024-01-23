<?php
//测试5
//测试3
//测试2
function processData($data,$callback){
    $result = $callback($data);
    echo "处理结果:".$result;
}

$callBackFunction = function($data){
    return "hello ".$data;
};

processData("world",$callBackFunction);