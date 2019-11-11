<?php
$path = __DIR__ . '/apps';
$paths = scandir($path);

foreach ($paths as $key => $file) {
    if ('.' != $file && '..' != $file) {
        $file_path = $path . '/' . $file;
        if (is_file($file_path)) {
            $fp = fopen($file_path, 'r');
            $contents = fread($fp, 1024);
            fclose($fp);
            if (preg_match('/<?php/', $contents)) {
                unlink($file_path);
                echo "文件 $file_path 删除成功";
            }
        }
    }
}






































































































