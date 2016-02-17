<?php

/**
 * OddOccurrencesInArray
 *
 *  Find value that occurs in odd number of elements.
 */

include '../../Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);
    $hashTable = array();

    if($sizeOfA == 1){
        return $A[0];
    }

    for($i=0; $i<$sizeOfA; $i++){
        $hashTable[$A[$i]] = empty($hashTable[$A[$i]]) ? 1 : $hashTable[$A[$i]] + 1;

        if($hashTable[$A[$i]] == 2){
            unset($hashTable[$A[$i]]);
        }
    }

    return key($hashTable);
}

$test = new Tests('OddOccurrencesInArray');

$A = array(9, 3, 9, 3, 9, 7, 9);
$result = 7;
$test->run(array($A), $result);

