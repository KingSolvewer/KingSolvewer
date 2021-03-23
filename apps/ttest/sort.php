<?php
/**
 * Create by PhpStorm
 * @since 2021-03-04 14:26:43
 * @package sort.php
 * @author wangshaowu
 */

namespace sort;

const A = 'a';

function bubbleSort($array)
{
    $len = count($array);
    for ($i = 0; $i < $len; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            if ($array[$i] > $array[$j]) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
        if ($i == 5) {
            break;
        }
    }

    return $array;
}

function bubbleSortByHalf($array)
{
    static $statistic = 0;
    $len = count($array);
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len - $i - 1; $j ++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
            $statistic++;
        }

        if ($i == 4) {
            break;
        }

    }

//    echo $statistic, PHP_EOL;
    return $array;
}

function selectionSort($array)
{
    $len = count($array);

    for ($i = 0; $i < $len - 1; $i++) {
        $index = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($array[$j] < $array[$index]) {
                $index = $j;
            }
        }

        $temp = $array[$i];
        $array[$i] = $array[$index];
        $array[$index] = $temp;
//        if ($i == 4) {
//            break;
//        }
    }

    return $array;
}

function insertionSort($array)
{
    $len = count($array);

    for ($i = 0; $i < $len; $i++) {
        $preIndex = $i - 1;
        $current = $array[$i];
        while ($preIndex >= 0 && $array[$preIndex] > $current) {
            $array[$preIndex + 1] = $array[$preIndex];
            $preIndex--;
        }
//        break;
        $array[$preIndex + 1] = $current;
//        break;
    }

    return $array;
}