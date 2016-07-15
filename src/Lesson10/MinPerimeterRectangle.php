<?php

/**
 * MinPerimeterRectangle
 *
 *  Find the minimal perimeter of any rectangle whose area equals N.
 */


include '../../Tests.class.php';

function solution($N){
    $perimeter = PHP_INT_MAX;
    $i = 1;
    while($i * $i <= $N){
        if($N % $i === 0){
            $a = $i;
            $b = $N / $a;
            if($perimeter > (2 * $a + 2 * $b)){
                $perimeter = (2 * $a + 2 * $b);
            }
        }
        $i++;
    }
    return $perimeter;
}

$test = new Tests('MinPerimeterRectangle');

// example test
$name = 'example';
$A = 30;
$result = 22;
$test->run(array($A), $result, $name);

// extreme_min
$name = 'extreme_min';
$A = 1;
$result = 4;
$test->run(array($A), $result, $name);

// simple1
$name = 'simple1';
$A = 36;
$result = 24;
$test->run(array($A), $result, $name);
 
// square
$name = 'square';
$A = 100000000;
$result = 40000;
$test->run(array($A), $result, $name);
