<?php

require __DIR__ . '/ClassLoader.php';
$loader = new ClassLoader();
$loader->register(true);

$arr = range(0,100);
shuffle($arr);
//如调用归并排序
var_dump(implode(',', Struct\Sort\MergeSort::instance()->sort($arr)));