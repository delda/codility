<?php

$A = array(1,3,6,4,1,2);

function solution($A) {
    $sizeOfA = sizeof($A);
    for($i=0; $i<$sizeOfA; $i++)
        if(!isset($B[$A[$i]-1]))
            $B[$A[$i]-1] = true;
    ksort($B);
    for($i=0; $i<$sizeOfA; $i++)
        if(!isset($B[$i]))
            return $i + 1;
    return $sizeOfA + 1;
}

echo solution($A);
echo "\n";