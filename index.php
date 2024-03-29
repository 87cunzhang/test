<?php

function quickSort($arr)
{
    $count = count($arr);
    if ($count <= 1) {
        return $arr;
    }

    $left = $right = [];
    for ($i = 1; $i < $count; $i++) {
        if ($arr[$i] < $arr[0]) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    $left  = quickSort($left);
    $right = quickSort($right);
    return array_merge($left, [$arr[0]], $right);

}