<?php
function binarySearch(array $numbers, int $needle, int $low, int $high): int
{
    if ($high < $low) {
        return -1;
    }
    $mid = (int)(($low + $high) / 2);
    if ($numbers[$mid] > $needle) {
        return binarySearch($numbers, $needle, $low, $mid - 1);
    } else if ($numbers[$mid] < $needle) {
        return binarySearch($numbers, $needle, $mid + 1, $high);
    } else {
        return $mid;
    }
}

function exponentialSearch(array $arr, int $key): int
{
    $size = count($arr);
    if ($size == 0) return -1;
    $bound = 1;
    while ($bound < $size && $arr[$bound] < $key) {
        $bound *= 2;
    }

    return binarySearch($arr, $key, intval($bound / 2), min($bound, $size-1));
}

$numbers = [1, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 5, 5];
$number = 1;
$pos = exponentialSearch($numbers, $number);
if ($pos >= 0) {
    echo "$number Found at position $pos \n";
} else {
    echo "$number Not found \n";
}