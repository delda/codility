<?php


$A[0] = 4;
$A[1] = 1;
$A[2] = 3;
$A[3] = 2;

$B[0] = 4;
$B[1] = 1;
$B[2] = 3;

// double
// two elements
$C[0] = 1;
$C[1] = 2;

// antiSum1
// total sum is corret (equals 1 + 2 + ... N), but it is not a permutation, N = 3
$D[0] = 1;
$D[1] = 3;
$D[2] = 3;
$D[3] = 3;
$D[4] = 5;

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

echo solution($A);
echo "\n";

echo solution($B);
echo "\n";

echo solution($C);
echo "\n";

echo solution($D);
echo "\n";
