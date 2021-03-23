<?php
/**
 * Create by PhpStorm
 * @since 2021-03-15 18:59:02
 * @package sort1.php
 * @author wangshaowu
 */

namespace sort1;

function bubbleSort($array)
{
    $len = count($array);
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len - 1; $j++) {
            if ($array[$i] > $array[$j]) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}


function bubbleSortOnHalf($array)
{
    $len = count($array);
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len -$i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }

    return $array;
}

function selectionSort($array)
{
    $len = count($array);
    for ($i = 0; $i < $len -1; $i++) {
        $index = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($array[$j] < $array[$index]) {
                $index = $j;
            }
        }

        $temp = $array[$i];
        $array[$i] = $array[$index];
        $array[$index] = $temp;
    }

    return $array;
}

function insertSort($array)
{
    $len = count($array);

    for ($i = 0; $i < $len; $i++) {
        $preIndex = $i - 1;
        $current = $array[$i];
        while ($preIndex >= 0 && $array[$preIndex] > $current) {
            $array[$preIndex + 1] = $array[$preIndex];
            $preIndex--;
        }
        $array[$preIndex + 1] = $current;
    }

    return $array;
}