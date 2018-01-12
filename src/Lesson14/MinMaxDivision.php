<?php

/**
 * MinMaxDivision
 *
 *  Divide array A into K blocks and minimize the largest sum of any block.
 */


include '../../Tests.class.php';

function solution($K, $M, $A)
{
    $min = max($A);
    $max = array_sum($A);
    $result = 0;
    $blocks = 0;

    while ($min <= $max) {
        $mid = (int)(($min + $max) / 2);
        $bloks = bloksNumber($A, $mid);
        if ($bloks <= $K) {
            $max = $mid - 1;
            $result = $mid;
        } else {
            $min = $mid + 1;
        }
    }

    return $result;
}

function bloksNumber($A, $max)
{
    $blocks = 1;
    $sum = $A[0];

    for ($i = 1; $i < sizeof($A); $i++) {
        if ($sum + $A[$i] > $max) {
            $sum = $A[$i];
            $blocks++;
        } else {
            $sum += $A[$i];
        }
    }

    return $blocks;
}

$test = new Tests('MinMaxDivision');
$name = 'example';
$K = 3;
$M = 5;
$A = [2, 1, 5, 1, 2, 2, 2];
$result = 6;
$test->run([$K, $M, $A], $result, $name);

