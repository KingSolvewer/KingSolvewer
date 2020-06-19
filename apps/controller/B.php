<?php
/**
 * Create by PhpStorm
 * @since 2020-05-30 14-54-32
 * @package B.php
 * @author wangshaowu
 */

namespace apps\controller;

require_once dirname(__DIR__) . '/ttest/service2/Wap.php';
require_once __DIR__ . '/Base.php';

class B extends Base
{
    public function index()
    {
        $this->wap->index();
    }
}