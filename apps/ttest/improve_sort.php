<?php
/**
 * Create by PhpStorm
 * @since 2021-03-05 14:53:25
 * @package improve_sort.php
 * @author wangshaowu
 */
namespace improve\sort;

function insertionSort($array)
{
    $len = count($array);
    for ($i = 1; $i < $len; $i++) {
        $temp = $array[$i];
        for ($j = $i - 1; $j >= 0 && $array[$j] > $temp; $j--) {
            $array[$j + 1] = $array[$j];
        }
        $array[$j + 1] = $temp;
    }

    return $array;
}