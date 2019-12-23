<?php
/**
 * @package test
 * @link $url = 'http://localhost:44944/image/image1.jpg';
 */
//namespace wsw;
//include __DIR__ . '/ttest/anonymous.php';
//include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/ttest/PropertyVisible.php';
include __DIR__ . '/../Json.php';
include __DIR__ . '/User.php';
$arr = include __DIR__ . '/arr.php';


$array = [
    'a' => 1,
    'b' => 'cdfsd',
    'c' => 'afkasl
    alkdflsa
    !@#$%^&*():"\|><?/*-+_-.; ,./'
];

















exit;

$errfile = 'error.log';
// Create a stream
$url = 'http://www.example.com';
interface Base
{
    public function test();
}

class A implements Base
{
    public $a = 1;
    protected $b = 1;
    private $c = 1;

    public function getA()
    {
        print_r($this);
        echo "\r\n";;
    }

    public function getA1()
    {
        print_r($this);
        echo "\r\n";
    }

    public function test()
    {

    }
}

class B extends A
{
    public function getA()
    {
        parent::getA();
    }
}

(new B())->getA();


































































































































































































































































































































