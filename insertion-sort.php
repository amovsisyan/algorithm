<?php

/*  INSERTION SORT  */
//If the number of items is smaller, insertion sort works better than bubble sort and selection sort.
//If the data set is large, then it becomes inefficient, like bubble sort.
function insertionSort(array &$arr)
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
    }
}