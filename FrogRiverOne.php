<?php

$X = 5;
$A = array(1,3,1,4,2,3,5,4,6);

// arithmetic sequences
$Y = 9;
$B = array(1,2,3,4,5,6,7,8,9,10);

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

echo solution($X, $A);
echo "\n";
echo "\n";
echo solution($Y, $B);
echo "\n";