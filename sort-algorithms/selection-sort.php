<?php

/*   SELECTION SORT  ascending order */
// for descending change the comparison $arr[$j] < $arr[$min] to $arr[$j] > $arr[$min] and replace $min with $max.
function selectionSort(array $arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$j] < $arr[$min]) {
                $min = $j;
            }
        }
        if ($min != $i) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $tmp;
        }
    }
    return $arr;
}