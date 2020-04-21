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
include __DIR__ . '/ttest/AccessObjectAsArray.php';
include __DIR__ . '/ttest/Error.php';
//include __DIR__ . '/ttest/wateropacity.php';
//include __DIR__ . '/ttest/watermark.php';
//include __DIR__ . '/ttest/process_image.php';
$arr = include __DIR__ . '/arr.php';
//throw new Exception('sdfjskd');
//imageline();
fsockopen();
var_dump(urldecode(false));
exit;
var_dump(strpos('./uploads/make/20200330/15855506541561.jpg', '/'));
foreach ([] as $value) {
    echo $value, "\r\n";
}

$a = 1;
$b = 4;

$c = $a + $b;

$d = $c * ($a - $b);

echo $d;















exit;
$a = 1;
$b = [2, 3];
$array = [&$a, &$b[0], &$b[1]];
$array[0] ++;
$array[1] ++;
$array[2] ++;

var_dump($a, $b);
exit;


\apps\ttest\Error::register();

//var_dump(new PDO('mysql://27.0.0.1', 'roots', 'admin123'));

$message = "this is " . __FILE__;
$message = wordwrap($message, 70);
$res = mail("1185642841@qq.com", 'my Subject', $message);
if (!$res) {
    $errorMessage = error_get_last()['message'];
}
var_dump($errorMessage);

exit;
$divisor = 0;
if ($divisor == 0) {
    trigger_error("Cannot divide by zero", E_USER_ERROR);
}
@bb();
var_dump(error_get_last());


set_exception_handler('exception_handler');

throw new Exception('Uncaught Exception2');
echo "Not Executed\n";

function exception_handler(\Exception $e)
{
    echo "Uncaught exception: {$e->getMessage()}", "\r\n";
}







exit;

try {
    if (!function_exists($func = 'bb')) {
        throw new Exception("函数{$func}不存在");
    }
    bb();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
//    aa();
    call_user_func('aa');
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    new PDO('mysql://27.0.0.1', 'roots', 'admin123');
    checkNum(2);
    echo 'If you see this, the number is 1 or below', "\r\n";
} catch (Exception $exception) {
    echo $exception->getMessage(), "\r\n";
}


function aa($a)
{
    if (is_null($a)) {
        throw new Exception('没有传递参数');
    }
    return $a;
}





exit;


function checkNum($num)
{
    if ($num > 1) {
        throw new Exception('Value must be 1 or below');
    }
}


$errfile = 'error.log';
// Create a stream
$url = 'http://www.example.com';
interface Base
{

}

class A implements Base
{
    public static function who()
    {
        echo __CLASS__, "\r\n";
        print_r(new self());
    }

    public static function test()
    {
        self::who();
    }

    public static function test1()
    {
        static::who();
    }
}

class B extends A
{
    public static function who()
    {
        echo '这里使用到了本类，即后期静态绑定', "\r\n";
        echo __CLASS__, "\r\n";
        print_r(new self);
    }
}


A::test();
B::test();
echo "\r\n";
echo "\r\n";
echo "\r\n";
echo "\r\n";

A::test1();
B::test1();



































































































































































































































































































































