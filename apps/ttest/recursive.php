<?php
/**
 * Create by PhpStorm
 * @since 2021-03-06 15:14:52
 * @package recursive.php
 * @author wangshaowu
 */

namespace recursive;

/**
 * 递归创建目录
 * @access public
 * @param $path
 * @return bool
 * @since 2021-03-06 15:18:24
 */
function createDir($path)
{
    return is_dir($path) or createDir(dirname($path)) and mkdir($path);
}

/**
 * 使用opendir递归删除目录
 * @access public
 * @param $path
 * @since 2021-03-06 16:30:53
 */
function deleteDir($path)
{
    $open = @opendir($path);

    if ($open) {
        while (false !== $item = readdir($open)) {
            if ('.' != $item && '..' != $item) {
                $entry = $path . DIRECTORY_SEPARATOR . $item;
                if (is_dir($entry)) {
                    deleteDir($entry);
                } else {
                    // 删除文件
                    unlink($entry);
                }
            }
        }
        closedir($open);

        // 删除目录
        rmdir($path);
    }
}

/**
 * 使用scandir递归删除目录
 * @access public
 * @param $path
 * @since 2021-03-06 16:31:20
 */
function deleteDir2($path)
{
    $array = scandir($path);
    if ($array) {
        foreach ($array as $item) {
            if ('.' != $item && '..' != $item) {
                $entry = $path . DIRECTORY_SEPARATOR . $item;
                if (is_dir($entry)) {
                    deleteDir2($entry);
                } else {
                    unlink($entry);
                }
            }
        }

        // 移除目录
        rmdir($path);
    }
}

$deleteDir = null;

$deleteDir = function ($path) use (&$deleteDir) {
    $open = opendir($path);
    while (false !== $item = readdir($open)) {
        if ('.' != $item && '..' != $item) {
            $entry = $path . DIRECTORY_SEPARATOR . $item;
            if (is_dir($entry)) {
                $deleteDir($entry);
            } else {
                unlink($entry);
            }
        }
    }

    closedir($open);
    rmdir($path);
};