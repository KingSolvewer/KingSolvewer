<?php
/**
 * Create by PhpStorm
 * @since 2020-05-30 14-54-03
 * @package A.php
 * @author wangshaowu
 */

namespace apps\controller;

require_once dirname(__DIR__) . '/ttest/service1/Wap.php';
require_once __DIR__ . '/Base.php';

class A extends Base
{
    public function index()
    {
        $this->wap->index();
    }
}