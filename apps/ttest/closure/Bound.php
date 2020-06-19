<?php
/**
 * Create by PhpStorm
 * @since 2020-06-02 11-13-12
 * @package Bound.php
 * @author wangshaowu
 */

namespace apps\ttest\closure;


class Bound
{
    private static $instance;

    protected $a;
    protected $b;
    private $c;
    private $d;

    public function staticAnonymous()
    {
        return static function () {
            static::$instance;
        };
    }

    public function anonymous()
    {
        return function () {
            $this->a;
        };
    }
}