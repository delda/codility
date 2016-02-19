<?php

/**
 * MaxProductOfThree
 *
 *  Maximize A[P] * A[Q] * A[R] for any triplet (P, Q, R).
 */

include '../../Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);
    sort($A);
    $max = max($A[0]*$A[1]*$A[$sizeOfA-1], $A[$sizeOfA-3]*$A[$sizeOfA-2]*$A[$sizeOfA-1]);
    return $max;
}

$test = new Tests('MaxProductOfThree');

// example
$A = array(-3, 1, 2, -2, 5, 6);
$result = 60;
$test->run(array($A), $result);

// one_triple
// three elements
$A = array(-10, -2, -4);
$result = -80;
$test->run(array($A), $result);

// simple1
// simple tests
$A = array(4,7,3,2,1,-3,-5);
$result = 105;
$test->run(array($A), $result);

// simple2
// simple tests
$A = array(-5, 5, -5, 4);
$result = 125;
$test->run(array($A), $result);

// medium_range
// -1000, -999, ... 1000, length = ~1,000
for($i=-1000; $i<1001; $i++){
    $A[] = $i;
}
$result = 999000000;
$test->run(array($A), $result);
