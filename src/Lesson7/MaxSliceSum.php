<?php

/**
 * MaxSliceSum
 *
 *  Find a maximum sum of a compact subsequence of array elements.
 */

include '../../Tests.class.php';

function solution($A) {

    $sizeOfA = sizeof($A);

    $tmpValue = $A[0];
    $maxValue = $A[0];

    for($i=1; $i<$sizeOfA; $i++){
        $tmpValue = max($tmpValue + $A[$i], $A[$i]);
        $maxValue = max($maxValue, $tmpValue);
    }

    return $maxValue;
}

$test = new Tests('MaxSliceSum');

$A = array(3, 2, -6, 4, 0);
$result = 5;
$test->run(array($A), $result);

// one_element
$A = array(-10);
$result = -10;
$test->run(array($A), $result, 'one_element');

// two_elements
$A = array(-2, 1);
$result = 1;
$test->run(array($A), $result, 'two_elements');

// three_elements
$A = array(3, -2, 3);
$result = 4;
$test->run(array($A), $result, 'three_elements');

// simple
$A = array(1, 3, -5, 3, 7, 14, 29);
$result = 53;
$test->run(array($A), $result, 'simple');

// extreme_minimum
$A = array(-1000000);
$result = -1000000;
$test->run(array($A), $result, 'extreme_minimum');

// neg_const
$A = array_fill(0, 50, -11);
$result = -11;
$test->run(array($A), $result, 'neg_const');

// pos_const
$A = array_fill(0, 50, 11);
$result = 550;
$test->run(array($A), $result, 'pos_const');

// high_low_1Kgarbage
$A = array_fill(0, 1001, 1);
$A[0] = 1000;
$A[1] = -1001;
$result = 1000;
$test->run(array($A), $result, 'high_low_1Kgarbage');

// 1Kgarbage_high_low
$A = array_fill(0, 1001, 1);
$A[1000] = -1001;
$A[1001] = 1000;
$result = 1000;
$test->run(array($A), $result, '1Kgarbage_high_low');

// growing_negative
$A = range(-200000, 0);
$result = 0;
$test->run(array($A), $result, 'growing_negative');