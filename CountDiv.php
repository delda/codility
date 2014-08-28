<?php

// example
// A = 6, B = 11, K = 2
$A = 6; $B = 11; $K = 2;
// result: 3

// simple
// A = 11, B = 345, K = 17
$A = 11; $B = 345; $K = 17;
// result: 20

// minimal
// A, B in {0,1}, K = 11
$A = rand(0,1); $B = rand(0,1); $K = 11;
// result: 0

// extreme_ifempty
// A = 10, B = 10, K in {5,7,20}
$A = 10; $B = 10; $K = 5;
$A = 10; $B = 10; $K = 7;
$A = 10; $B = 10; $K = 20;
// result: [1, 0, 0]

//big_values
//A = 100, B=123M+, K=2
$A = 100; $B = 123000000; $K = 2;
// result: 61499951

//big_values2
//A = 101, B = 123M+, K = 10K
$A = 101; $B = 123000000; $K = 10000;
// result: 12300


function solution($A, $B, $K) {
    $min = (int)($A/$K);
    $max = (int)($B/$K);
    $bonus = ($A % $K == 0) ? 1 : 0;
//    var_dump($min);
//    var_dump($max);
//    var_dump($bonus);
    return $max - $min + $bonus;
}

echo solution($A, $B, $K);
echo "\n";