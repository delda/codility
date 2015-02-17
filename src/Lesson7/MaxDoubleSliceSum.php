<?php

/**
 * MaxDoubleSliceSum
 *
 *  Find the maximal sum of any double slice.
 */


include '../../Tests.class.php';

function solution($A){

    $sizeOfA = sizeof($A);
    if($sizeOfA < 3)
        return 0;

    $partialSum1[1] = 0;
    $partialSum2[$sizeOfA-2] = 0;

    for($i=2; $i<($sizeOfA-1); $i++){
        $partialSum1[$i] = max(0, $partialSum1[$i-1] + $A[$i-1]);
        $partialSum2[$sizeOfA-$i-1] = max(0, $partialSum2[$sizeOfA-$i] + $A[$sizeOfA-$i]);
    }

    $maxSum = $partialSum1[1] + $partialSum2[1];
    for($i=1; $i<($sizeOfA-1); $i++){
        $maxSum = max($maxSum, $partialSum1[$i] + $partialSum2[$i]);
    }

    return $maxSum;
}

$test = new Tests('MaxDoubleSliceSum');

// example test
$name = 'example';
$A = array(3, 2, 6, -1, 4, 5, -1, 2);
$result = 17;
$test->run(array($A), $result, $name);

// first simple test
$name = 'simple1';
$A = array(0, 10, -5, -2, 0);
$result = 10;
$test->run(array($A), $result, $name);

// second simple test
$name = 'simple2';
$A = array(-8, 10, 20, -5, -7, -4);
$result = 30;
$test->run(array($A), $result, $name);

// all positive numbers
$name = 'positive';
$A = array(6, 1, 5, 6, 4, 2, 9, 4);
$result = 26;
$test->run(array($A), $result, $name);

// three elements
$name = 'extreme_triplet';
$A = array(1, 2, 3);
$result = 0;
$test->run(array($A), $result, $name);

// -1000, ..., 1000
$name = 'medium_range';
$A = range(-1000, 1000);
$result = 499500;
$test->run(array($A), $result, $name);
