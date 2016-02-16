<?php

/**
 * CyclicRotation
 *
 *  Rotate an array to the right by a given number of steps.
 */

include '../../Tests.class.php';

function solution($A, $K) {
    $sizeOfA = sizeof($A);

    if($sizeOfA == 0){
        return array();
    }

    $B = array_fill(0, $sizeOfA-1, null);

    for($i=0; $i<$sizeOfA; $i++){
        $B[($i+$K)%$sizeOfA] = $A[$i];
    }

    return $B;
}

$test = new Tests('CyclicRotation');

$A = array(3, 8, 9, 7, 6);
$K = 3;
$result = array(9, 7, 6, 3, 8);
$test->run(array($A, $K), $result);

$name = 'extreme_empty';
$A = array();
$K = 1;
$result = array();
$test->run(array($A, $K), $result, $name);
