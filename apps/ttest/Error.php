<?php
/**
 * Create by PhpStorm
 * @since 2020-01-14 11-07-55
 * @package Error.php
 * W-wsw
 */

namespace apps\ttest;


use ErrorException;

class Error
{
    public static function register()
    {
        error_reporting(E_ALL);
        set_error_handler([static::class, 'appError']);
        set_exception_handler([static::class, 'appException']);
        register_shutdown_function([static::class, 'appShutDown']);
    }

    /**
     * 错误处理
     * @access public
     * @param  integer $errno      错误编号
     * @param  integer $errstr     详细错误信息
     * @param  string  $errfile    出错的文件
     * @param  integer $errline    出错行号
     * @return void
     * @throws ErrorException
     */
    public static function appError($errno, $errstr, $errfile = '', $errline = 0)
    {
//        var_dump(error_get_last());
        $exception = new ErrorException($errstr, 0, $errno, $errfile, $errline);

        // 符合异常处理的则将错误信息托管至 think\exception\ErrorException
        if (error_reporting() & $errno) {
            throw $exception;
        }

        self::report($exception);
    }

    /**
     * 异常处理
     * @access public
     * @param  \Exception|\Throwable $e 异常
     * @return void
     */
    public static function appException($e)
    {
        self::report($e);
    }

    /**
     * 异常中止处理
     * @access public
     * @return void
     */
    public static function appShutdown()
    {
        var_dump(error_get_last());
        // 将错误信息托管至 think\ErrorException
        if (!is_null($error = error_get_last()) && self::isFatal($error['type'])) {
            self::appException(new ErrorException(
                $error['message'], 0, $error['type'], $error['file'], $error['line']
            ));
        }

    }

    /**
     * 确定错误类型是否致命
     * @access protected
     * @param  int $type 错误类型
     * @return bool
     */
    protected static function isFatal($type)
    {
        return in_array($type, [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_PARSE]);
    }

    public static function report(\Exception $e)
    {
        if ($e instanceof ErrorException) {
            $severity = $e->getSeverity();
        }
        echo \Json::encode([
            'code' => $e->getCode(),
            'msg' => $e->getMessage(),
            'data' => [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'severity' => isset($severity) ? $severity: 0,
            ],
        ]);
    }
}