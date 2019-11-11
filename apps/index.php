<?php
/**
 * @package test
 * @link $url = 'http://localhost:44944/image/image1.jpg';
 */
//namespace wsw;
//include __DIR__ . '/ttest/anonymous.php';
include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/ttest/PropertyVisible.php';
include __DIR__ . '/../Json.php';
include __DIR__ . '/User.php';

$errfile = 'error.log';
// Create a stream
$url = 'http://www.example.com';




exit;
class Base
{
    private $a;
    private $b;
    private $c;

    public function __isset($name)
    {
        echo 'when use isset(): trigger ', __METHOD__, '<br/>';
//        return isset($this->$name);
    }

    public function __get($name)
    {
        echo 'when reading data: trigger ', __METHOD__, '<br/>';
        return $this->$name;
    }

    public function __set($name, $value)
    {
        echo 'when writing data: trigger ', __METHOD__, '<br/>';
//        $this->$name = $value;
    }
}

//$base = new Base();
//isset($base->a);
//$base->a = 6;
//$base->a;

class Foo extends Base
{
//    private $d;

    public function getData($name)
    {
        if (isset($this->$name)) {
            return $this->name;
        } else {
            $this->data = $name;
            return $this->data;
        }
    }
}

$foo = new Foo();
$foo->getData('d');
































































































































































//function test()
//{
//    echo @$a;
//    var_dump(error_get_last());
//}






























































































// error handler function
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!error_reporting() & $errno) {
        //This error code is not included in error_reporting, so let it fall
        //through to the standard php error handler
        return false;
    }

    switch ($errno) {
        case E_USER_ERROR:
            echo "<b>My ERROR<b/> [$errno] $errstr<br/>\n";
            echo " fatal error on line $errline in file $errfile", '<br/>';
            echo "PHP " . PHP_VERSION , "<br/>\n";
            echo "(" . PHP_OS . ")<br/>\n";
            echo "Aborting ...<br/>\n";
            exit(1);
            break;

        case E_USER_WARNING:
            echo "<b>My WARNING</b> [$errno] $errstr<br/>\n";
            break;

        case E_USER_NOTICE:
            echo "<b>My NOTICE</b> [$errno] $errstr<br/>\n";
            break;

        default:
            echo "Unknown error type: [$errno] $errstr<br/>\n";
    }

    /* Don`t execute PHP internal error handler */
    return true;
}

// function to test the error handling
function scale_by_log($vect, $scale)
{
    if (!is_numeric($scale) || $scale <= 0) {
        trigger_error("log(x) for x <= 0 is undefined, you used: scale = $scale", E_USER_ERROR);
    }

    if (!is_array($vect)) {
        trigger_error("Incorrect input vector, array of values expected", E_USER_WARNING);
    }

    $temp = [];
    foreach ($vect as $pos => $value) {
        if (!is_numeric($value)) {
            trigger_error("Value at position $pos is not a number, using 0 (zero)", E_USER_NOTICE);
            $value = 0;
        }
        $temp[$pos] = log($scale) * $value;
    }

    return $temp;
}





























































