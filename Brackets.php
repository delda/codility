<?php

include 'Tests.class.php';

function solution($A) {
    $sizeOfString = strlen($A);
    $i = 0;
    $j = 0;
    $B = array();
    while($i < $sizeOfString){
        if(!isset($B[$j])){
            $B[$j] = $A[$i];
            $i++;
        }else{
//            var_dump("***");
//            var_dump("$i: $A[$i] - " .complement($A[$i]));
            if(complement($A[$i]) == $B[$j]){
                array_pop($B);
                if($j > 0)
                    $j--;
            }else{
                array_push($B,$A[$i]);
                $j++;
            }
            $i++;
        }
    }
    if(sizeOf($B) > 0 || $sizeOfString == 0)
        return 0;
    else
        return 1;
}

function complement($char){
    $complement = null;
    switch($char){
        case ')':
            $complement = '(';
            break;
        case ']':
            $complement = '[';
            break;
        case '}':
            $complement = '{';
            break;
    }
    return $complement;
}

$test = new Tests('Brackets');

// example1
// example test 1
$A = '{[()()]}';
$result = 1;
$test->run($A, $result);

// example2
// example test 2
$A = '([)()]';
$result = 0;
$test->run($A, $result);

// negative_match
// invalid structures
$A = '{{{{';
$result = 0;
$test->run($A, $result);

// empty
// empty string
$A = '';
$result = 0;
$test->run($A, $result);

// simple_grouped
// simple grouped positive and negative test, length=22
$A = '()(()())((()())(()()))';
$result = 1;
$test->run($A, $result);
