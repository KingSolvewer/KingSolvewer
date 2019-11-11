<?php
phpinfo();
exit;
//namespace wsw;

class Foo
{
    public $foo;
    public $bar;
    public $baz;
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
            var_dump($bar);
        });
    }
}

new Base();

$a = 34;

bar(foo(), $a);

function bar($f, $a)
{
    var_dump($f * $a);
}

function foo()
{
    return 5;
}





































































































