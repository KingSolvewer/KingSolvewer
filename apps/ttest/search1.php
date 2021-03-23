<?php
/**
 * Create by PhpStorm
 * @since 2021-03-15 19:39:08
 * @package search1.php
 * @author wangshaowu
 */

namespace search1;

function sortSearch($item, $array)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($item == $array[$i]) {
            return $i;
        }
    }
}

function bisectionSearch($item, $array)
{
    $len = count($array);
    $lower = 0;
    $higher = $len - 1;
    while ($lower <= $higher) {
        $middle = intval(($lower + $higher) / 2);
        if ($item < $array[$middle]) {
            $higher = $middle - 1;
        } else if ($item > $array[$middle]) {
            $lower = $middle + 1;
        } else {
            return $middle;
        }
    }
}

function recursiveSearch($item, $array, $lower, $higher)
{
    if ($lower <= $higher) {
        $middle = intval(($lower + $higher) / 2);
        if ($item < $array[$middle]) {
            $higher = $middle - 1;
            return recursiveSearch($item, $array, $lower, $higher);
        } else if ($item > $array[$middle]) {
            $lower = $middle + 1;
            return recursiveSearch($item, $array, $lower, $higher);
        } else {
            return $middle;
        }
    }
}

