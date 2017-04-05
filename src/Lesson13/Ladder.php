<?php

/**
 * Ladder
 *
 *  Count the number of different ways of climbing to the top of a ladder.
 */


include '../../Tests.class.php';

function solution($A, $B)
{
    $sizeOfA = sizeof($A);
    $maxA = max($A);
    $maxMod = (1 << max($B)) - 1;

    $fib[0] = 0;
    $fib[1] = 1;
    for ($i = 2; $i < $maxA + 2; $i++) {
        $fib[$i] = ($fib[$i - 1] + $fib[$i - 2]) & $maxMod;
    }

    for ($i = 0; $i < $sizeOfA; $i++) {
        $res[$i] = $fib[$A[$i] + 1] & ((1 << $B[$i]) - 1);
    }

    return $res;
}

$test = new Tests('Ladder'
$name = 'example';
$A = [4, 4, 5, 5, 1];
$B = [3, 2, 4, 3, 1];
$result = [5, 1, 8, 0, 1];
$test->run([$A, $B], $result, $name);