<?php
namespace wsw;
include 'bar.php';
class Foo
{
    public static function foo()
    {
        echo __FILE__;
    }
}
echo Foo::foo(), '<br/>';
Bar::bar();
test();














































