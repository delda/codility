<?php

/**
 * CommonPrimeDivisors
 *
 *  Check whether two numbers have the same prime divisors.
 */


include '../../Tests.class.php';

function solution($A, $B) {
    $sizeOfA = sizeof($A);
    $counter = 0;

    for ($i = 0; $i < $sizeOfA; $i++) {
        $a = $A[$i];
        $b = $B[$i];
        $gdc = gdc($a, $b);

        $a = removeCommonPrimeDivisors($a, $gdc);
        if ($a !== 1) {
            continue;
        }

        $b = removeCommonPrimeDivisors($b, $gdc);
        if ($b === 1) {
            $counter++;
        }
    }

    return $counter;
}

function removeCommonPrimeDivisors($a, $b)
{
    while ($a !== 1) {
        $gdc = gdc($a, $b);
        if ($gdc === 1) {
            break;
        }
        $a /= $gdc;
    }

    return $a;
}

function gdc($a, $b)
{
    if ($a % $b == 0) {
        return $b;
    } else {
        return gdc($b, $a % $b);
    }
}

$test = new Tests('CommonPrimeDivisors');

$name = 'example';
$A = [15, 10, 3];
$B = [75, 30, 5];
$result = 1;
$test->run([$A, $B], $result, $name);
