<?php
/**
 * @package test
 * @link $url = 'http://localhost:44944/image/image1.jpg';
 */
namespace wsw;
use apps\ttest\Error;
use Predis\Client;


//include __DIR__ . '/ttest/anonymous.php';
//include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/ttest/PropertyVisible.php';
//include __DIR__ . '/ttest/sort.php';
include __DIR__ . '/ttest/sort1.php';
include __DIR__ . '/ttest/improve_sort.php';
//include __DIR__ . '/ttest/search.php';
include __DIR__ . '/ttest/search1.php';
include __DIR__ . '/ttest/recursive.php';
include __DIR__ . '/../Json.php';
include __DIR__ . '/User.php';
include __DIR__ . '/ttest/AccessObjectAsArray.php';
include __DIR__ . '/ttest/observer/MyObserver1.php';
include __DIR__ . '/ttest/observer/MyObserver2.php';
include __DIR__ . '/ttest/subject/MySubject.php';
include __DIR__ . '/ttest/Error.php';
include __DIR__ . '/ttest/SeasLogger.php';
include __DIR__ . '/ttest/closure/Bound.php';
include __DIR__ . '/../service/predis/autoload.php';
include __DIR__ . '/../apps/controller/SignIn.php';
//include __DIR__ . '/../set.ini';
//include __DIR__ . '/ttest/wateropacity.php';
//include __DIR__ . '/ttest/watermark.php';
//include __DIR__ . '/ttest/process_image.php';
//include __DIR__ . '/controller/A.php';
//include __DIR__ . '/controller/B.php';

Error::register();

$path = __DIR__ . '/runtime/log/';


//$b = 0;
//$c = 5;
//
////$c / $b;
//try {
////    var_dump($a);
//    if (0 == $b) {
//        throw new \Exception('除数不能为0');
//    }
//
//} catch (\Exception $exception) {
//    var_dump(error_get_last());
//}

echo 12412;

function bar(&$a = 0)
{
    $a = $a * $a;
    return 1;
}


exit;







function &foo($a = 1)
{
    $foo = 5 + $a;
//    echo $foo;
    return $foo;
}


exit;
class Foo
{
    public $value = 42;

    public function getValue()
    {
        return $this->value;
    }
}

exit;

class A
{
    public static function foo()
    {
        static::who();
    }

    public static function who()
    {
        echo __CLASS__, "\r\n";
    }
}

class B extends A
{
    public static function test()
    {
        A::foo();
        parent::foo();
        self::foo();
        static::foo();
    }

    public static function who()
    {
        echo __CLASS__, "\r\n";
    }
}


class C extends B{
    public static function who()
    {
        echo __CLASS__, "\r\n";
    }
}

//B::test();

C::test();






exit;
$gen = function () {
    echo "I`m printer!",
    HP_EOL;
    while (true) {
        $string = (yield 1);
        print_r($string);
        echo PHP_EOL;
    }

};

$printer = $gen();
$printer->send('Hello, everyone');
$printer->send([1, 2, 3]);

class MyIterator implements Iterator
{
    private $position = 0;
    private $array = [
        "firstelement",
        "secondelement",
        "lastelement",
    ];

    public function __construct($position)
    {
        $this->position = $position;
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        // TODO: Implement current() method.
        var_dump(__METHOD__);
        return $this->array[$this->position];
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        // TODO: Implement next() method.
        var_dump(__METHOD__);
        ++$this->position;
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        // TODO: Implement key() method.
        var_dump(__METHOD__);
        return $this->position;
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        // TODO: Implement valid() method.
        var_dump(__METHOD__);
        return isset($this->array[$this->position]);
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
        var_dump(__METHOD__);
        $this->position = 0;
    }
}

//$iterator = new MyIterator(0);

//foreach ($iterator as $key => $val) {
//    var_dump($key, $val);
//
//}






exit;
//$num = 5;
//
//$x = 1;
//
//// 倒数第二个人分鱼时，平均每人的鱼数量
//($x * $num) + 1;


function complement($finish, $num = 5) {
    // 最后一次分鱼时,每人一条鱼是最少的情况,总尾数
    while ($num > 0) {
        $fish = (($finish + 1) / 5) * 4;
        $num--;
    }

}

new php_user_filter();






















exit;








$req = $_GET + $_POST;

//var_dump($req);

$signIn = new \apps\controller\SignIn();


exit;
// Comparison function
function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

// Array to be sorted
$array = array('a' => 4, 'b' => 8, 'c' => -1, 'd' => -9, 'e' => 2, 'f' => 5, 'g' => 3, 'h' => -4);
print_r($array);

// Sort and print the resulting array
uasort($array, 'cmp');
print_r($array);

preg_match('/\w*\b/', '3434abc', $m);
var_dump($m);

















































































































































































































































































































