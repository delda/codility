<?php

$A = array(0,1,0,1,1);

function solution($A) {
    $sizeOfA = sizeof($A);
    $cars = 0;
    $cars_pairs = 0;
    for($i=0; $i<$sizeOfA; $i++){
        if($A[$i] == 0)
            $cars++;
        else{
            if($cars_pairs > 1000000000)
                return -1;
            $cars_pairs += $cars;
        }
    }
    return $cars_pairs;
}

echo solution($A);
echo "\n";