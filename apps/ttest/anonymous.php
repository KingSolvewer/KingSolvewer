<?php
namespace wsw;

class Foo
{
    public $foo;
    protected $bar;
    private $baz;
}

class Bar{
    public $a = 1;
    protected $b = 2;
    private $c = 3;
}

class Baz
{
    public function add($middleware)
    {
        var_dump($middleware);
        $middleware instanceof \Closure;
    }
}

class Base
{
    public $app;
    protected $validate;
    private $rule;

    public function __construct($data = null)
    {
        $baz = new Baz();
        $bar = new Bar();

        $baz->add(function (Foo $foo) use ($bar, $data) {

        });

        var_dump($this->getClosure($bar));
    }

    protected function getClosure(Bar $bar)
    {
        return function (Foo $foo) use ($bar) {

        };
    }

    public function setScope($property_visible)
    {
        $anonymous = Closure::bind(function () use ($property_visible){
            $property_visible->a = '123456';
            $property_visible->b = 'jsaodf';
            $property_visible->c = 'sadjfo';
            $property_visible->d = 'woewiorwj';
        }, new static());

        var_dump($anonymous);
    }
}

$base = new Base();

$a = 34;
$b = 25;

bar(function ($c) use ($base, $b) {
    return 4 * $b;
}, $a);

function bar(callable $f, $a)
{
    var_dump($f);
}



















































































































