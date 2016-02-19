<?php

/**
 * Fish
 *
 *  N voracious fish are moving along a river. Calculate how many fish are alive.
 */

include '../../Tests.class.php';

function solution($A, $B) {
    $sizeOfA = sizeof($A);
    $deadFish = 0;
    $downstreamFishArray = array();
    for($i=0; $i<$sizeOfA; $i++){
        if($B[$i] == 1){
            array_push($downstreamFishArray, $A[$i]);
        }elseif(isset($downstreamFishArray[0])){
            $exitGate = false;
            while(isset($downstreamFishArray[0]) && !$exitGate){
                $deadFish++;
                if($A[$i] > end($downstreamFishArray)){
                    array_pop($downstreamFishArray);
                }else{
                    $exitGate = true;
                }
            }
        }
    }
    return $sizeOfA - $deadFish;
}

$test = new Tests('Fish');

// example
// example test
$A = array(4,3,2,1,5);
$B = array(0,1,0,0,0);
$result = 2;
$test->run(array($A, $B), $result, 'example');

// extreme_small
// 1 or 2 fishes
$A = array(999999999,1000000000);
$B = array(1,0);
$result = 1;
$test->run(array($A, $B), $result, 'extreme_small');

// simple1
// simple test
$A = array(8,6,5,3,2,4,7);
$B = array(1,1,1,0,0,1,1);
$result = 5;
$test->run(array($A, $B), $result, 'simple1');

// simple2
// simple test
$A = array(8,6,5,3,2,4,7);
$B = array(1,1,1,1,1,0,0);
$result = 1;
$test->run(array($A, $B), $result, 'simple2');