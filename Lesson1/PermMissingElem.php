<?php

/**
 * PermMissingElem
 *
 * Find the missing element in a given permutation.
 */

include '../Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);
    $rightSum = (($sizeOfA + 1) * ($sizeOfA + 2)) / 2;
    $sumOfValues = $rightSum;
    for($i=0; $i<$sizeOfA; $i++)
        $sumOfValues -= $A[$i];

    return intval($sumOfValues);
}

$test = new Tests('PermMissingElem');

$A = array(2,3,1,5);
$result = 4;
$test->run(array($A), $result);