<?php

/**
 * PermCheck
 *
 *  Check whether array A is a permutation.
 */

include '../../Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);
    for($i=0; $i<$sizeOfA; $i++){
        if( isset($solution[$A[$i]]) || $A[$i] > $sizeOfA || $A[$i] < 1 ){
            return 0;
        }else{
            $solution[$A[$i]] = true;
        }
    }
    return 1;
}


$test = new Tests('PermCheck');

$A = array(4, 1, 3, 2);
$result = 1;
$test->run(array($A), $result);

$B = array(4, 1, 3);
$result = 0;
$test->run(array($B), $result);

// double
// two elements
$C = array(1, 2);
$result = 1;
$test->run(array($C), $result);

// antiSum1
// total sum is corret (equals 1 + 2 + ... N), but it is not a permutation, N = 3
$D = array(1, 3, 3, 3, 5);
$result = 0;
$test->run(array($D), $result);
