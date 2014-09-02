<?php

error_reporting(E_NOTICE);

// example
$A = array(10,2,5,1,8,20);
// solution: 1

// example1
//$A = array(10,50,5,1);
// solution: 0

// example_grouped
//$A = array(10,50,5,1);
// solution: 0

// extreme_single
// 1-element sequence + [5,3,3]
//$A = array(5,3,3);
// solution: 1

// extreme_arith_overflow1
// overflow test, 3 MAXINTs + [5,3,3]
//$A = array(2147483647, 2147483647, 2147483647);
// solution: 1

function solution($A) {
    $sizeOfA = sizeof($A);

    if($sizeOfA < 3)
        return 0;

    sort($A, SORT_NUMERIC);
//    var_dump($A);

    $i = 0;
    $p = null;
    $q = $A[$i++];
    $r = $A[$i++];
    do{
        $p = $q;
        $q = $r;
        $r = $A[$i++];
//        var_dump($p, $q, $r);
        if($p + $q > $r)
            return 1;
    }while($i < $sizeOfA);
    return 0;
}

echo solution($A);
echo "\n";