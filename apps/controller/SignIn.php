<?php
/**
 * Create by PhpStorm
 * @since 2020-12-19 08:54:28
 * @package SignIn.php
 * @author wangshaowu
 */

namespace apps\controller;


use Redis;

class SignIn
{
    protected $redis;

    public function __construct()
    {
        $this->redis = new Redis();
        $this->redis->connect('127.0.0.1');
        $this->redis->auth('jumei2713');
    }

    public function signIn($date, $uid)
    {
        return $this->redis->setBit($date, $uid, 1);
    }

    public function getSignRecord($key, $uid)
    {
        return $this->redis->getBit($key, $uid);
    }

    public function analyze()
    {
        return $this->redis;
    }
}