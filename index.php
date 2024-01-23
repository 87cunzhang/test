<?php
//测试11
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