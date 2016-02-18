<?php

/**
 * FrogRiverOne
 *
 *  Find the earliest time when a frog can jump to the other side of a river.
 */

include '../../Tests.class.php';

function solution($X, $A) {
    $arraySize = sizeof($A);
    $i = 0;
    $fallsSum = 0;
    while($i < $arraySize){
        if(!isset($falls[$A[$i]])){
            $falls[$A[$i]] = 1;
            $fallsSum++;
        }
        if($fallsSum == $X)
            return $i;
        $i++;
    }
    return -1;
}

$test = new Tests('FrogRiverOne');

$X = 5;
$A = array(1,3,1,4,2,3,5,4,6);
$result = 6;
$test->run(array($X, $A), $result);

$Y = 9;
$B = array(1,2,3,4,5,6,7,8,9,10);
$result = 8;
$test->run(array($Y, $B), $result);
