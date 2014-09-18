<?php

include 'Tests.class.php';

function solution($S) {
    $sizeOfA = strlen($S);
    $i = 0;
    $sumOfBrackets = 0;
    while($i < $sizeOfA){
//        var_dump("# $S[$i]");
        if($S[$i] == '('){
            $sumOfBrackets++;
        }else{
            $sumOfBrackets--;
        }
//        var_dump($sumOfBrackets);
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
$test->run($A, $result);

// example2
// example test 2
$A = '())';
$result = 0;
$test->run($A, $result);
