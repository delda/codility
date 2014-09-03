<?php

// example
$A = array(3,1,2,4,3);
// expected: 1

function solution($A) {
    $n = sizeof($A);
    $sx = 0;
    $dx = array_sum($A);
    $min = 2001;

    for($i=0; $i<$n-1; $i++){
        $sx += $A[$i];
        $dx -= $A[$i];
        if(abs($sx-$dx) < $min)
            $min = abs($sx-$dx);
    }

    return $min;
}

echo solution($A);
echo "\n";
