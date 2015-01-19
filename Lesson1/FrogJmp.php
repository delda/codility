<?php

include '../Tests.class.php';

function solution($X, $Y, $D) {
    $mod  = ($Y - $X) % $D;
    $diff = (int)(($Y - $X) / $D);
    if($mod > 0)
        $diff++;

    return $diff;
}

$test = new Tests('FrogJmp');

$X = 10;
$Y = 85;
$D = 30;
$result = 3;
$test->run(array($X, $Y, $D), $result);