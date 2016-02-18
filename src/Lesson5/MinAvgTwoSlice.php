<?php

/**
 * MinAvgTwoSlice
 *  Find the minimal average of any slice containing at least two elements.
 */

include '../../Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);
    $sum_prefix[0] = $A[0];
    $sum_prefix[1] = $sum_prefix[0] + $A[1];
    $minAvg = $sum_prefix[1]/2;
    $minAvgPrefix = 0;
    for($i=2; $i<$sizeOfA; $i++){
        $sum_prefix[$i] = $sum_prefix[$i-1] + $A[$i];
        if(($sum_prefix[$i] - $sum_prefix[$i-2]) / 2 < $minAvg){
            $minAvg = ($sum_prefix[$i] - $sum_prefix[$i-2]) / 2;
            $minAvgPrefix = $i - 1;
        }
        if($i-3>=0 && ($sum_prefix[$i] - $sum_prefix[$i-3]) / 3 < $minAvg){
            $minAvg = ($sum_prefix[$i] - $sum_prefix[$i-3]) / 3;
            $minAvgPrefix = $i - 2;
        }
    }
    return $minAvgPrefix;
}

$test = new Tests('MinAvgTwoSlice');

// example
// example test
$A = array(4,2,2,5,1,5,8);
$result = 1;
$test->run(array($A), $result);

// simple1
// simple test, the best slice has length 3
$A = array(10,10,-1,2,4,-1,2,-1);
$result =  5;
$test->run(array($A), $result);

// simple2
// simple test, the best slice has length 3
$A = array(-3,-5,-8,-4,-10);
$result = 2;
$test->run(array($A), $result);

// medium_range
// increasing, decreasing (legth = ~100) and small functional
for($i=0; $i<100; $i++) $A[$i] = $i +1 ;
$result = 0;
$test->run(array($A), $result);