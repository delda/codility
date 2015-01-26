<?php

/**
 * CountDiv
 *
 *  Compute number of integers divisible by k in range [a..b].
 */

include '../../Tests.class.php';

function solution($A, $B, $K) {
    $min = (int)($A/$K);
    $max = (int)($B/$K);
    $bonus = ($A % $K == 0) ? 1 : 0;
    return $max - $min + $bonus;
}

$test = new Tests('CountDiv');

// example
// A = 6, B = 11, K = 2
$A = 6; $B = 11; $K = 2;
$result = 3;
$test->run(array($A, $B, $K), $result);

// simple
// A = 11, B = 345, K = 17
$A = 11; $B = 345; $K = 17;
$result =  20;
$test->run(array($A, $B, $K), $result);

// minimal
// A, B in {0,1}, K = 11
$A = rand(0,1); $B = rand(0,1); $K = 11;
$result = 1;
$test->run(array($A, $B, $K), $result);

// extreme_ifempty
// A = 10, B = 10, K in {5,7,20}
$A = 10; $B = 10; $K = 5;
$result = 1;
$test->run(array($A, $B, $K), $result);
$A = 10; $B = 10; $K = 7;
$result = 0;
$test->run(array($A, $B, $K), $result);
$A = 10; $B = 10; $K = 20;
$result = 0;
$test->run(array($A, $B, $K), $result);


//big_values
//A = 100, B=123M+, K=2
$A = 100; $B = 123000000; $K = 2;
$result =  61499951;
$test->run(array($A, $B, $K), $result);

//big_values2
//A = 101, B = 123M+, K = 10K
$A = 101; $B = 123000000; $K = 10000;
$result =  12300;
$test->run(array($A, $B, $K), $result);
