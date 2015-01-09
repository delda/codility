<?php

include 'Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);

    $candidate = array();
    $candidatePosition = array();
    $candidateIndex = 0;

    $candidate[$candidateIndex] = $A[0];
    $candidatePosition[$candidateIndex] = 0;
    for($i=1; $i<$sizeOfA; $i++){
//        echo "candidate:" . PHP_EOL;
//        var_dump($candidate);
        if($candidateIndex > -1 && $A[$i] != $candidate[$candidateIndex]){
//            echo $candidate[$candidateIndex] . " - " . $A[$i] . PHP_EOL;
            array_pop($candidate);
            array_pop($candidatePosition);
            $candidateIndex--;
        }else{
//            echo "add $A[$i]" . PHP_EOL;
            array_push($candidate, $A[$i]);
            array_push($candidatePosition, $i);
            $candidateIndex++;
        }
    }

    $countCandidate = 0;
    if (isset($candidate[0])) {
        for($i=0; $i<$sizeOfA; $i++) {
            if ($A[$i] == $candidate[0]) {
                $countCandidate++;
            }
        }
    }
    if($countCandidate > intval($sizeOfA/2))
        return array_pop($candidatePosition);
    return -1;
}

$test = new Tests('Dominator');

// example
// example test
$A = array(3,4,3,2,3,-1,3,3);
$result = 7;
$test->run(array($A), $result);

// small_nondominator
// all different and all the same elements
$B = array_pad(array(), 51, 50);
$result = 50;
$test->run(array($B), $result);

// small_half_positions
// half elements the same, and half + 1 elements the same
$C[0] = 1;
for($i=1; $i<10; $i++)
    $C[$i] = $C[$i-1] + 2;
for($i=10; $i<20; $i++)
    $C[$i] = 2;
$result = -1;
$test->run(array($C), $result);

// extreme_empty_and_single_item
// empty and single element arrays
$D = array(2147483647);
$result = 0;
$test->run(array($D), $result);

// small
// small test
$E = array(-2147483648, 2147483647, 999999, 1, 999999, 2, 999999, 3, 999999, 999999, 999999, 999999, 999999, 999999, 999999, -2147483648);
$result = 13;
$test->run(array($E), $result);

// extreme_half1
// array with exactly N/2 values 1, N even + [0,0,1,1,1]
$F = array(0, 0, 0, 1, 1);
$result = 0;
$test->run(array($F), $result);

// extreme_half2
// array with exactly floor(N/2) values 1, N odd + [0,0,1,1,1]
$G = array(0, 0, 1, 1, 1);
$result = 4;
$test->run(array($G), $result);

// extreme_half3
// array with exactly ceil(N/2) values 1 + [0,0,1,1,1]
$H = array(2, 1, 1, 1, 3);
$result = 2;
$test->run(array($H), $result);
