<?php
/**
 * Created by PhpStorm.
 * User: yuxuefeng
 * Date: 2018/6/13
 * Time: 下午10:23
 */
$ser = new swoole_server("127.0.0.1", 9501);
$ser->set(
    ['worker_num'=>8,]
);
$ser->on('connect', function ($ser,$fd){
    echo 'client '.$fd.':connect'."\n";
});

$ser->on('receive', function ($ser,$fd, $from_id,$data){
    $ser->send($fd, 'server:'.$data);
});


$ser->on('close', function ($ser,$fd){
    echo "Client: close \n";
});
$ser->start();