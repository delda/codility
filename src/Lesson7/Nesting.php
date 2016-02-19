<?php

/**
 * Nesting
 *
 *  Determine whether given string of parentheses is properly nested.
 */

include '../../Tests.class.php';

function solution($S) {
    $sizeOfA = strlen($S);
    $i = 0;
    $sumOfBrackets = 0;
    while($i < $sizeOfA){
        if($S[$i] == '('){
            $sumOfBrackets++;
        }else{
            $sumOfBrackets--;
        }
        if($sumOfBrackets < 0){
            return 0;
        }
        $i++;
    }
    if($sumOfBrackets == 0)
        return 1;
    return 0;
}

$test = new Tests('Nesting');

// example1
// example test 1
$A = '(()(())())';
$result = 1;
$test->run($A, $result, 'example1');

// example2
// example test 2
$A = '())';
$result = 0;
$test->run($A, $result, 'example2');
