<?php

$A = array(2,3,1,5);

function solution($A) {
    $sizeOfA = sizeof($A);
    $rightSum = (($sizeOfA + 1) * ($sizeOfA + 2)) / 2;
    $sumOfValues = $rightSum;
    // volevo utilizzare l'array_sum ma avevo problemi di max_size
    for($i=0; $i<$sizeOfA; $i++)
        $sumOfValues -= $A[$i];

    return intval($sumOfValues);
}


echo solution($A);
echo "\n";
