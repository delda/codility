<?php

/**
 * ChocolatesByNumbers
 *
 *  There are N chocolates in a circle. Count the number of chocolates you will eat.
 */


include '../../Tests.class.php';

function solution($N, $M)
{
    $lcm = ($N * $M) / gdc($N, $M);
    return $lcm / $M;
}

function gdc($N, $M)
{
    if ($N % $M == 0) {
        return $M;
    } else {
        return gdc($M, $N % $M);
    }
}

$test = new Tests('ChocolatesByNumbers');

$name = 'example';
$N = 10;
$M = 4;
$result = 5;
$test->run(array($N, $M), $result, $name);
