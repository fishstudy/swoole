<?php
/**
 * Created by PhpStorm.
 * User: yuxuefeng
 * Date: 2018/6/13
 * Time: 下午10:50
 */
$client = new swoole_client(SWOOLE_SOCK_UDP);
if (!$client->connect('127.0.0.1', 9502, -1))
{
    exit("connect failed. Error: {$client->errCode}\n");
}
$client->send("hello world\n");
echo $client->recv();
$client->close();