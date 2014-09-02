<?php

// example
$X = 10;
$Y = 85;
$D = 30;
// solution: 3

function solution($X, $Y, $D) {
    $mod  = ($Y - $X) % $D;
    $diff = (int)(($Y - $X) / $D);
    if($mod > 0)
        $diff++;

    return $diff;
}

echo solution($X, $Y, $D);
echo "\n";
