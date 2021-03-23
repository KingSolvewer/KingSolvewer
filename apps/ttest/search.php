<?php
/**
 * Create by PhpStorm
 * @since 2021-03-04 19:26:03
 * @package search.php
 * @author wangshaowu
 */

namespace search;

//define('A', 'b');

function sortedSearch($array, $number)
{
    for ($i = 0; $i < count($array); $i++) {
        echo $i, "\r\n";
        if ($number == $array[$i]) {
            return $i;
        }
    }
}


function bisectionSearch($array, $number)
{
    $len = count($array);
    $lower = 0;
    $higher = $len - 1;

    while ($lower <= $higher) {
        $middle = intval(($lower + $higher) / 2);
        if ($array[$middle] < $number) {
            // 舍弃左边
            $lower = $middle + 1;
        } else if ($array[$middle] > $number) {
            // 舍弃右边
            $higher = $middle -1;
        } else {
            return $middle;
        }
    }
}


function recursiveBisectionSearch($array, $number, $lower, $higher)
{
    if ($lower <= $higher) {
        $middle = intval(($lower + $higher) / 2);
        if ($array[$middle] < $number) {
            // 舍弃左边
            $lower = $middle + 1;
            recursiveBisectionSearch($array, $number, $lower, $higher);
        } else if ($array[$middle] > $number) {
            // 舍弃右边
            $higher = $middle - 1;
            recursiveBisectionSearch($array, $number, $lower, $higher);
        } else {
            return $middle;
        }
    }
}