<?php

/**
 * Distinct
 *
 *  Compute number of distinct values in an array.
 */

include '../../Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);
    $distinct = 1;

    if($sizeOfA == 0)
        return 0;

    sort($A);
    for($i=1; $i<$sizeOfA; $i++){
        if($A[$i] != $A[$i-1])
            $distinct++;
    }
    return $distinct;
}

$test = new Tests('Distinct');

// example1
// example test, positive answer
$A = array(2, 1, 1, 2, 3, 1);
$result = 3;
$test->run(array($A), $result);

// extreme_empty
// empty sequence
$A = array();
$result = 0;
$test->run(array($A), $result);

?>
