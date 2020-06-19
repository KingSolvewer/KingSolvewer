<?php
/**
 * Create by PhpStorm
 * @since 2020-05-30 14-54-57
 * @package Base.php
 * @author wangshaowu
 */

namespace apps\controller;


use Wap;

class Base
{
    public function __construct()
    {
        $this->wap = new Wap();
    }
}