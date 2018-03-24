<?php

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function fillArray(): array
{
    $array = array();
    $arrayLen = 100000;
    $randomStart = 0;
    $randomTill = 1000;
    for ($i = 0; $i < $arrayLen; $i++) {
        $array[] = rand($randomStart, $randomTill);
    }
    return $array;
}

function radixSort(array $array): array
{
    //Determine the maximum number of digits in the given array.
    $maxDigits = 0;
    $arrayLen = count($array);
    for ($c = 0; $c < $arrayLen; $c++) {
        $numDigits = strlen((string)$array[$c]);
        $maxDigits = $numDigits > $maxDigits ? $numDigits : $maxDigits;
    }

    //Create a bucket of arrays
    $bucket = array();
    $sameEndNumbersCollected = true;
    for ($k = 0; $k < $maxDigits; $k++) {

        $eachIterationPow = 10;
        if (!$sameEndNumbersCollected) {
            $eachIterationPow = pow(10, $k);
        }

        for ($i = 0; $i < $arrayLen; $i++) {
            $each = $array[$i];
            $keyToInsert = ($sameEndNumbersCollected)
                ? ($leftover = $array[$i] % 10)
                : (floor(($array[$i] / $eachIterationPow)) % 10);

            $bucket[$keyToInsert][] = $each;
        }

        //Reset array and load back values from bucket.
        $array = array();
        $bucketLen = count($bucket);
        for ($j = 0; $j < $bucketLen; $j++) {
            $NthBucketLen = count($bucket[$j]);
            for ($t = 0; $t < $NthBucketLen; $t++) {
                $array[] = $bucket[$j][$t];
            }
        }

        //Reset bucket
        $bucket = array();
        $sameEndNumbersCollected = false;

    }
    return $array;
}

$arrayToRedix = fillArray();
$time_start = microtime_float();
$array = radixSort($arrayToRedix);
$time_end = microtime_float();
$duration = $time_end - $time_start;
echo $duration;
//var_dump($array);