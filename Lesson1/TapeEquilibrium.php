<?php

/**
 * TapeEquilibrium
 *
 *  Minimize the value |(A[0] + ... + A[P-1]) - (A[P] + ... + A[N-1])|.
 */

include '../Tests.class.php';

function solution($A) {
    $n = sizeof($A);
    $sx = 0;
    $dx = array_sum($A);
    $min = 2001;

    for($i=0; $i<$n-1; $i++){
        $sx += $A[$i];
        $dx -= $A[$i];
        if(abs($sx-$dx) < $min)
            $min = abs($sx-$dx);
    }

    return $min;
}

$test = new Tests('TapeEquilibrium');

$A = array(3,1,2,4,3);
$result = 1;
$test->run(array($A), $result);