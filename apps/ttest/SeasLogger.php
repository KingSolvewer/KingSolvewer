<?php
/**
 * Create by PhpStorm
 * @since 2020-05-08 14-52-17
 * @package Seaslogger.php
 * @author wangshaowu
 */

namespace apps\ttest;


use SeasLog;
use SeasLog\Logger;
use SplObserver;
use SplSubject;

class SeasLogger implements SplObserver
{

    /**
     * All level
     */
    const ALL = -2147483647;

    /**
     * Detailed debug information
     */
    const DEBUG = 100;

    /**
     * Interesting events
     *
     * Examples: User logs in, SQL logs.
     */
    const INFO = 200;

    /**
     * Uncommon events
     */
    const NOTICE = 250;

    /**
     * Exceptional occurrences that are not errors
     *
     * Examples: Use of deprecated APIs, poor use of an API,
     * undesirable things that are not necessarily wrong.
     */
    const WARNING = 300;

    /**
     * Runtime errors
     */
    const ERROR = 400;

    /**
     * Critical conditions
     *
     * Example: Application component unavailable, unexpected exception.
     */
    const CRITICAL = 500;

    /**
     * Action must be taken immediately
     *
     * Example: Entire website down, database unavailable, etc.
     * This should trigger the SMS alerts and wake you up.
     */
    const ALERT = 550;

    /**
     * Urgent alert.
     */
    const EMERGENCY = 600;

    /**
     * request Level limit
     */
    static $RequestLevel = self::ALL;

    /**
     * Monolog API version
     *
     * This is only bumped when API breaks are done and should
     * follow the major version of the library
     *
     * @var int
     */
    const API = 2;

    /**
     * Logging levels from syslog protocol defined in RFC 5424
     *
     * This is a static variable and not a constant to serve as an extension point for custom levels
     *
     * @var string[] $levels Logging levels with the levels as key
     */
    protected static $levels = [
        self::DEBUG => 'DEBUG',
        self::INFO => 'INFO',
        self::NOTICE => 'NOTICE',
        self::WARNING => 'WARNING',
        self::ERROR => 'ERROR',
        self::CRITICAL => 'CRITICAL',
        self::ALERT => 'ALERT',
        self::EMERGENCY => 'EMERGENCY',
    ];

    /**
     * set request level for seaslog
     * @param int $level
     */
    public function setRequestLevel($level = self::ALL)
    {
        self::$RequestLevel = $level;
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function emergency($message, array $context = array())
    {
        SeasLog::emergency($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function alert($message, array $context = array())
    {
        SeasLog::alert($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function critical($message, array $context = array())
    {
        SeasLog::critical($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function error($message, array $context = array())
    {
        SeasLog::error($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function warning($message, array $context = array())
    {
        SeasLog::warning($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function notice($message, array $context = array())
    {
        SeasLog::notice($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function info($message, array $context = array())
    {
        SeasLog::info($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function debug($message, array $context = array())
    {
        SeasLog::debug($message, $context);
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public function log($level, $message, array $context = array())
    {
        if (( int )$level < self::$RequestLevel) return;

        switch ($level) {
            case self::EMERGENCY:
                SeasLog::emergency($message, $context);
                break;
            case self::ALERT:
                SeasLog::alert($message, $context);
                break;
            case self::CRITICAL:
                SeasLog::critical($message, $context);
                break;
            case self::ERROR:
                SeasLog::error($message, $context);
                break;
            case self::WARNING:
                SeasLog::warning($message, $context);
                break;
            case self::NOTICE:
                SeasLog::notice($message, $context);
                break;
            case self::INFO:
                SeasLog::info($message, $context);
                break;
            case self::DEBUG:
                SeasLog::debug($message, $context);
                break;
            default:
                break;
        }
    }

    /**
     * @param string $basePath
     * @return bool
     */
    public function setBasePath($basePath)
    {
        return SeasLog::setBasePath($basePath);
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return SeasLog::getBasePath();
    }

    /**
     * 设置本次请求标识
     * @param string
     * @return bool
     */
    static public function setRequestID($request_id)
    {
        return SeasLog::setRequestID($request_id);
    }

    /**
     * 获取本次请求标识
     * @return string
     */
    static public function getRequestID()
    {
        return SeasLog::getRequestID();
    }

    /**
     * 设置模块目录
     * @param $module
     *
     * @return bool
     */
    static public function setLogger($module)
    {
        return SeasLog::setLogger($module);
    }

    /**
     * 获取最后一次设置的模块目录
     * @return string
     */
    static public function getLastLogger()
    {
        return SeasLog::getLastLogger();
    }

    /**
     * 设置DatetimeFormat配置
     * @param $format
     *
     * @return bool
     */
    static public function setDatetimeFormat($format)
    {
        return SeasLog::setDatetimeFormat($format);
    }

    /**
     * 返回当前DatetimeFormat配置格式
     * @return string
     */
    static public function getDatetimeFormat()
    {
        return SeasLog::getDatetimeFormat();
    }

    /**
     * 统计所有类型（或单个类型）行数
     * @param string $level
     * @param string $log_path
     * @param null $key_word
     *
     * @return array
     */
    static public function analyzerCount($level = 'all', $log_path = '*', $key_word = null)
    {
        return SeasLog::analyzerCount($level, $log_path, $key_word);
    }

    /**
     * 以数组形式，快速取出某类型log的各行详情
     *
     * @param        $level
     * @param string $log_path
     * @param null $key_word
     * @param int $start
     * @param int $limit
     * @param        $order 默认为正序 SEASLOG_DETAIL_ORDER_ASC，可选倒序 SEASLOG_DETAIL_ORDER_DESC
     *
     * @return array
     */
    static public function analyzerDetail(
        $level = SEASLOG_INFO,
        $log_path = '*',
        $key_word = null,
        $start = 1,
        $limit = 20,
        $order = SEASLOG_DETAIL_ORDER_ASC
    )
    {
        return SeasLog::analyzerDetail(
            $level,
            $log_path,
            $key_word,
            $start,
            $limit,
            $order
        );
    }

    /**
     * 获得当前日志buffer中的内容
     *
     * @return array
     */
    static public function getBuffer()
    {
        return SeasLog::getBuffer();
    }

    /**
     * 将buffer中的日志立刻刷到硬盘
     *
     * @return bool
     */
    static public function flushBuffer()
    {
        return SeasLog::flushBuffer();
    }

    /**
     * Create a custom SeasLog instance.
     *
     * @param array $config
     * @return Logger
     */
    public function __invoke(array $config)
    {
        $logger = new static();
        if (!empty($config['path'])) {
            $logger->setBasePath($config['path']);
        }

        return $logger;
    }

    public function update(SplSubject $subject)
    {
        try {
            echo '<pre>';

            print_r($subject);

            echo "\r\n";
//            exit;
            // TODO: Implement update() method.
//            $this->setBasePath(dirname(__DIR__) . '/log/');
            $this->info('mac:{mac}  ip:{ip}  serial number:{serial_number}', ['mac' => 'fadksf', 'ip' => '127.0.0.1', 'serial_number' => 'fhdsafdhkfkaif43h32']);
        } catch (\Exception $exception) {

        }
    }
}

