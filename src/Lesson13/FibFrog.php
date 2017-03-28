<?php

/**
 * FibFrog
 *
 *  Count the minimum number of jumps required for a frog to get to the other side of a river.
 */


include '../../Tests.class.php';

function solution($A)
{
    $jumps = array_reverse(array_unique(fibonacciSeries(sizeof($A))));
    return minimumNumberJumps(-1, $jumps, $A);
}

function minimumNumberJumps($pos, $jumps, $A)
{
    $minJump = -1;

    array_push($A, 1);
    $sizeOfA = sizeof($A);

    $stepsCounter[$pos] = 0;

    while (!empty($stepsCounter) && $minJump == -1) {
        $step = current($stepsCounter);
        $pos = key($stepsCounter);

        if ($pos == $sizeOfA - 1) {
            $minJump = $step;
        }

        foreach ($jumps as $jump) {
            if (isset($A[$pos + $jump]) && $A[$pos + $jump] && !isset($stepsCounter[$pos + $jump])) {
                $stepsCounter[$pos + $jump] = $step + 1;
            }
        }

        unset($stepsCounter[$pos]);
    }

    return $minJump;
}

function fibonacciSeries($maxValue)
{
    $fib = [];
    $fib[0] = 0;
    $fib[1] = 1;
    $i = 1;
    while ($fib[$i] <= $maxValue) {
        $i++;
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }
    array_shift($fib);

    return $fib;
}


$test = new Tests('FibFrog');

$name = 'example';
$A = [0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0];
$result = 3;
$test->run([$A], $result, $name);

$name = 'extreme_small_ones - 1';
$A = [0];
$result = 1;
$test->run([$A], $result, $name);

$name = 'extreme_small_ones - 2';
$A = [1, 1];
$result = 1;
$test->run([$A], $result, $name);

$name = 'extreme_small_ones - 3';
$A = [1, 1, 1];
$result = 2;
$test->run([$A], $result, $name);

$name = 'simple_functional - 1';
$A = [0, 0, 1, 0, 0, 0, 1, 1, 1, 1];
$result = 2;
$test->run([$A], $result, $name);
exit;
$name = 'simple_functional - 2';
$A = [0, 0, 1, 0, 0, 0, 1, 1, 1, 0, 1];
$result = 3;
$test->run([$A], $result, $name);

$name = 'small_cyclic - 1';
$A = [];
for ($i = 0; $i < 113; $i += 2) {
    $A[$i] = 0;
    $A[$i + 1] = 1;
}
$result = 4;
$test->run([$A], $result, $name);

$name = 'small_cyclic - 2';
$A = [];
for ($i = 0; $i < 113; $i += 3) {
    $A[$i] = 0;
    $A[$i + 1] = 0;
    $A[$i + 2] = 1;
}
array_pop($A);
$result = 3;
$test->run([$A], $result, $name);

$name = 'small_cyclic - 3';
$A = [];
for ($i = 0; $i < 113; $i += 4) {
    $A[$i] = 0;
    $A[$i + 1] = 0;
    $A[$i + 2] = 0;
    $A[$i + 3] = 1;
}
$result = 12;
$test->run([$A], $result, $name);

$name = 'small_cyclic - 4';
$A = [];
for ($i = 0; $i < 113; $i += 5) {
    $A[$i] = 0;
    $A[$i + 1] = 0;
    $A[$i + 2] = 1;
    $A[$i + 3] = 0;
    $A[$i + 4] = 1;
}
$result = 5;
$test->run([$A], $result, $name);
