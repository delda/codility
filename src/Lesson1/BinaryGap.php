<?php

/**
 * BinaryGap
 *
 *  Find longest sequence of zeros in binary representation of an integer.
 */

include '../../Tests.class.php';

function solution($A) {

    $maxGap = 0;
    $gap = 0;
    while($A > 0){
        if((int)($A/2) == (int)(($A+1)/2)){
            $A = (int)($A/2);
        }else{
            break;
        }
    }
    while($A > 0){
        $gap = ((int)($A/2) == (int)(($A+1)/2)) ? $gap+1 : 0;
        $maxGap = ($maxGap < $gap) ? $gap : $maxGap;
        $A = (int)($A / 2);
    }

    return $maxGap;
}

$test = new Tests('BinaryGap');

$A = 9;
$result = 2;
$test->run(array($A), $result);

$A = 529;
$result = 4;
$test->run(array($A), $result);

$A = 20;
$result = 1;
$test->run(array($A), $result);

$A = 15;
$result = 0;
$test->run(array($A), $result);

$name = 'example1';
$A = 1041;
$result = 5;
$test->run(array($A), $result, $name);

$name = 'example2';
$A = 15;
$result = 0;
$test->run(array($A), $result, $name);
