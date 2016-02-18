<?php

/**
 * MissingInteger
 *
 *  Find the minimal positive integer not occurring in a given sequence
 */

include '../../Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);
    for($i=0; $i<$sizeOfA; $i++)
        if(!isset($B[$A[$i]-1]))
            $B[$A[$i]-1] = true;
    ksort($B);
    for($i=0; $i<$sizeOfA; $i++)
        if(!isset($B[$i]))
            return $i + 1;
    return $sizeOfA + 1;
}

$test = new Tests('MissingInteger');

$A = array(1, 3, 6, 4, 1, 2);
$result = 5;
$test->run(array($A), $result);
