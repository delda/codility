<?php

/**
 * Triangle
 *
 *  Determine whether a triangle can be built from a given set of edges.
 */

include '../../Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);

    if($sizeOfA < 3)
        return 0;

    sort($A, SORT_NUMERIC);

    $i = 0;
    $p = null;
    $q = $A[$i++];
    $r = $A[$i++];
    do{
        $p = $q;
        $q = $r;
        $r = $A[$i++];
        if($p + $q > $r)
            return 1;
    }while($i < $sizeOfA);
    return 0;
}

$test = new Tests('Triangle');

// example
$A = array(10, 2, 5, 1, 8, 20);
$result = 1;
$test->run(array($A), $result);

// example1
$A = array(10, 50, 5, 1);
$result = 0;
$test->run(array($A), $result);

// example_grouped
$A = array(10, 50, 5, 1);
$result = 0;
$test->run(array($A), $result);

// extreme_single
// 1-element sequence + [5,3,3]
$A = array(5, 3, 3);
$result = 1;
$test->run(array($A), $result);

// extreme_arith_overflow1
// overflow test, 3 MAXINTs + [5,3,3]
$A = array(2147483647, 2147483647, 2147483647);
$result = 1;
$test->run(array($A), $result);

?>