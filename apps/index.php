<?php
/**
 * @package test
 * @link $url = 'http://localhost:44944/image/image1.jpg';
 */

header('Content-type:text/html;charset=utf-8');
error_reporting(E_ALL);
//phpinfo();
//echo 3124124321;
//exit;
//declare(strict_types = 1);
//namespace wsw;
//date_default_timezone_set('Asia/Shanghai');

//include __DIR__ . '/ttest/anonymous.php';
//include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/ttest/PropertyVisible.php';
include __DIR__ . '/../Json.php';
include __DIR__ . '/User.php';
include __DIR__ . '/ttest/AccessObjectAsArray.php';
include __DIR__ . '/ttest/observer/MyObserver1.php';
include __DIR__ . '/ttest/observer/MyObserver2.php';
include __DIR__ . '/ttest/subject/MySubject.php';
include __DIR__ . '/ttest/Error.php';
include __DIR__ . '/ttest/SeasLogger.php';
include __DIR__ . '/ttest/closure/Bound.php';
//include __DIR__ . '/ttest/wateropacity.php';
//include __DIR__ . '/ttest/watermark.php';
//include __DIR__ . '/ttest/process_image.php';
//include __DIR__ . '/controller/A.php';
include __DIR__ . '/controller/B.php';
$arr = include __DIR__ . '/arr.php';
$user = ['name' => '小明'];
$number = 1000;

$url = "http://localhost:44944/apps/ios.php"; #url 地址必须 http://xxxxx
$port = 44944;
$t = 30;
$data = array(
    'foo'=>'bar',
    'baz'=>'boom',
    'site'=>'www.manongjc.com',
    'name'=>'nowa magic'
);

/**fsockopen 抓取页面
 * @parem $url 网页地址 host 主机地址  * @parem $port 网址端口 默认80 * @parem $t 脚本请求时间 默认30s
 * @parem $method 请求方式 get/post
 * @parem $data 如果单独传数据为 post 方式
 * @return 返回请求回的数据
 * */
function sock_data($url,$port=80,$t=30,$method='get',$data=null)
{
    $info=parse_url($url);
    $fp = fsockopen($info["host"],$port, $errno, $errstr,$t);

    // 判断是否有数据
    if(isset($data) && !empty($data))
    {
        $query = http_build_query($data); // 数组转url 字符串形式
    }else
    {
        $query=null;
    }

    // 如果用户的$url "http://www.manongjc.com/";  缺少 最后的反斜杠
    if(!isset($info['path']) || empty($info['path']))
    {
//        $info['path']="/index.html";
    }
    // 判断 请求方式
    if($method=='post')
    {
        $head = "POST ".$info['path']." HTTP/1.0".PHP_EOL;
    }else
    {
        $head = "GET ".$info['path']."?".$query." HTTP/1.0".PHP_EOL;
    }

    $head .= "Host: ".$info['host'].PHP_EOL; // 请求主机地址
    $head .= "Referer: http://".$info['host'].$info['path'].PHP_EOL;
    if(isset($data) && !empty($data) && ($method=='post'))
    {
        $head .= "Content-type: application/x-www-form-urlencoded".PHP_EOL;
        $head .= "Content-Length: ".strlen(trim($query)).PHP_EOL;
        $head .= PHP_EOL;
        $head .= trim($query);
    }else
    {
        $head .= PHP_EOL;
    }
    $write = fputs($fp, $head); //写入文件(可安全用于二进制文件)。 fputs() 函数是 fwrite() 函数的别名
//    while (!feof($fp))
//    {
//        $line = fread($fp,4096);
//        echo $line;
//    }
//
//    stream_context_set_default(
//        array(
//            'http' => array(
//                'method' => 'POST'
//            )
//        )
//    );
//    echo '<pre>';
//
//    print_r(get_headers($url));
//
//    echo "\r\n";
//    exit;

    return true;
}
// 函数调用
if (sock_data($url,$port,$t,'post',$data)) {
    echo "请求成功";
}


//http_parse_headers()

exit;

$pdo = new PDO("mysql:dbname=vstou_offline;host=127.0.0.1;", 'root');
$pdoStatement = $pdo->query('select `*` from `my_order` where `status` = 0 order by `id` desc limit 1000');
//$result = $pdoStatement->execute();
$result = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);


interface Abc
{
    public function a();
}

class Basees implements Abc, IteratorAggregate
{
    public static $instance = [];
    public function __construct()
    {

    }

    public static function make()
    {
        $class = static::class;
        if (!isset(static::$instance[$class])) {
            return static::$instance[$class] = new static();
        }
        return static::$instance[$class];
    }

    public function a()
    {
        // TODO: Implement a() method.
    }

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new ArrayIterator([1]);
    }
}

class Zsd extends Basees implements Abc
{

}

class Drt extends Basees
{

}


echo '<pre>';

print_r(Zsd::make());

echo "\r\n";
echo '<pre>';

print_r(Drt::make());

echo "\r\n";
exit;
exit;
$reflect = new ReflectionClass(new Zsd());

echo '<pre>';

print_r($reflect->hasMethod('__construct'));

echo "\r\n";
exit;

echo '<pre>';

print_r((new Zsd()) instanceof Abc);

echo "\r\n";
//exit;
echo '<pre>';

print_r((new Basees()) instanceof Abc);

echo "\r\n";
exit;


exit;
$func = function ($data) use (&$func) {
    if (is_array($data)) {
        foreach ($data as $key => $val) {
            $data[$key] = $func($val);
        }
    } else if (is_object($data)) {

    } else {
        $data = urlencode($data);
        echo '<pre>';

        print_r($data);

        echo "\r\n";
//        exit;
    }
    return $data;
};

echo json_encode($arr, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), "\r\n";
echo urldecode(json_encode($func($arr))), "\r\n";
echo Json::encode($arr);
exit;
$a = [
    1,
    2,
    3,
];

[$c, $d] = $a;
var_dump($c, $d);
exit;

$bound = new \apps\ttest\closure\Bound();

$func = Closure::bind(function ($a = 9) use ($bound) {
    $bound->a = 1;
    $bound->b = 2;
    $bound->c = 3;
    $bound->d = 4;
    $bound::$instance = 3;
}, null, $bound);
echo '<pre>';

print_r($func);

echo "\r\n";
//exit;

call_user_func($func);

var_dump($bound);

exit;

function cmpu($a, $b)
{
    var_dump($a, $b);
    return 1;
//    return $a > $b;
//    return $a < $b;
//    return ($a > $b) ? -1 : 1;
//    return ($a > $b) ? 1 : -1;
//    if ($a == $b) {
//        return 0;
//    }
//    return ($a < $b) ? -1 : 1;
//    return ($a - $b) < 0 ? 1 : -1;
}

//$a = array(3, 2, 5, 6, 1);
$a = array(2, 2, 3, 5, 6, 1, -3);
//sort($a);
uasort($a, "cmpu");
var_dump($a);
exit;

//function cmp($a, $b)
//{
////    var_dump($a, $b);
//    $a = preg_replace('@^(a|an|the) @', '', $a);
//    $b = preg_replace('@^(a|an|the) @', '', $b);
//    return strcasecmp($a, $b);
//}
//
//$a = array("John" => 1, "the Earth" => 2, "an apple" => 3, "a banana" => 4, 'John_' => 2);
//
//uksort($a, "cmp");
//var_dump($a);
//usort();
exit;

//$deleteDir = function ($path) use (&$deleteDir) {
//    $path_set = scandir($path);
//    foreach ($path_set as $file) {
//        if ('.' !== $file && '..' !== $file) {
//            if (is_dir($file)) {
//                $deleteDir("$path/$file");
//            } else {
//                unlink("$path/$file");
//            }
//        }
//    }
//    rmdir($path);
//};
//
//
//$create_dir = function ($path) use (&$create_dir) {
//    return is_dir($path) or $create_dir(dirname($path)) and mkdir($path);
//};



////$deleteDirectory = null;
//$deleteDirectory = function($path) use (&$deleteDirectory) {
//    $resource = opendir($path);
//    while (($item = readdir($resource)) !== false) {
//        if ($item !== "." && $item !== "..") {
//            if (is_dir($path . "/" . $item)) {
//                $deleteDirectory($path . "/" . $item);
//            } else {
//                unlink($path . "/" . $item);
//            }
//        }
//    }
//    closedir($resource);
//    rmdir($path);
//};
//$deleteDirectory("path/to/directory");

$a = 2;
$c = array_reduce($arr, function ($carry, $item) use ($a) {
    var_dump($carry);
//    return $carry = $item['cate_id'];
    return $carry($item['cate_id'], $a);
}, function($val, $a) {
//    return true;
    return $val * $a;
});
//
//constant();
//array_walk();

//var_dump($c);
//(new \apps\controller\A())->index();
(new \apps\controller\B())->index();

exit;



$a = new Abc();
$a->a;

class Abc
{
    public function __get($name)
    {
        if ($this->__isset($name)) {
            return $this->name;
        }
        throw new Exception("没有该属性:{$name}");
    }

    public function __isset($name)
    {
        return isset($this->name);
    }

    public function __set($name, $value)
    {
        $this->name = $value;
    }
}
echo 1234124;
exit;
var_dump(array_diff_key([1,3,9], [1, 9]));



exit;
//ini_set('error_reporting', E_ALL | E_NOTICE);
function a(string $a) {
    $x = 1235;
    $singed = 1;
    if ($x < 0) {
        $x = abs($x);
        $singed = -1;
    }
    $y = (string) $x;
    $len = strlen($y);
    $j = $len;
    for ($i = 0, $j--; $i < $j - $i; $i++) {

        $tmp = $y[$i];
        $y[$i] = $y[$len - $i -1];
        $y[$len - $i -1] = $tmp;

    }
    return $singed * $y;
}
9646324351;
2147483647;
var_dump(a('sfas'));
var_dump(strncmp('-', -123, 1));
exit;
function code62($x) {
    $show = '';
    while($x > 0) {
        $s = $x % 62;
        if ($s > 35) {
            $s = chr($s+61);
        } elseif ($s > 9 && $s <=35) {
            $s = chr($s + 55);
        }
        $show .= $s;
        $x = floor($x/62);
    }
    return $show;
}

function shorturl($url) {
    // crc32() 函数计算字符串的 32 位 CRC（循环冗余校验） http://www.w3school.com.cn/php/func_string_crc32.asp
    $url = crc32($url);
    $result = sprintf("%u", $url);
    return code62($result);
}

echo shorturl("http://www.baidu.com");
var_dump(crc32('http://www.baidu.com'));
$logger = new \apps\ttest\SeasLogger();
var_dump($logger->getBasePath());
//error_log();
$observer1 = new \apps\ttest\observer\MyObserver1();
$observer2 = new \apps\ttest\observer\MyObserver2();

$subject = new \apps\ttest\subject\MySubject("test");

$subject->attach($observer1);
$subject->attach($observer2);
$subject->attach($observer2);
$subject->notify();


exit;
$obj = new \apps\ttest\AccessObjectAsArray($arr);

foreach ($obj as $item => $value) {
    echo '<pre>';

    print_r($value);

    echo "\r\n";
//    exit;
}





exit;
echo '<pre>';

print_r(realpath('controller/Email.php'));

echo "\r\n";
exit;
//phpinfo();
try {
    // The message
    $message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
    $message = wordwrap($message, 70, "\r\n");

// Send
    mail('1185642841@qq.com', 'My Subject', $message);
} catch (Exception $exception) {
    echo $exception->getMessage();
}
exit;
//throw new Exception('sdfjskd');
//imageline();

$fp = fopen('index3.php', 'r');
preg_match('#/\*(.+?)\*/#', fgets($fp), $matches);
echo '<pre>';

print_r(unserialize($matches[1]));

echo "\r\n";
exit;
$func = function ($arr) use (&$func) {
    echo '<pre>';

    print_r($func);

    echo "\r\n";
//    exit;
    if (is_array($arr)) {
        foreach ($arr as $key => $val) {
            $func($val);
        }
    } else {
        echo $arr, "\r\n";
    }
};
$func($arr);

echo '<pre>';

print_r($func);

echo "\r\n";
exit;

exit;
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
abstract class BB
{
    public function gt()
    {

    }

    abstract public function gy();
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



































































































































































































































































































































