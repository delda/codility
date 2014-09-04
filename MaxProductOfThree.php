<?php

error_reporting(E_NOTICE);

// example
$A = array(-3,1,2,-2,5,6);
// expected: 60

// one_triple
// three elements
//$A = array(-10,-2,-4);
// expected: -80

// simple1
// simple tests
//$A = array(4,7,3,2,1,-3,-5);
// expected: 105

// simple2
// simple tests
//$A = array(-5,5,-5,4);
// expected: 125

// medium_range
// -1000, -999, ... 1000, length = ~1,000
//for($i=-1000; $i<1001; $i++){
//    $A[] = $i;
//}
// expected: 999.000.000

function solution($A) {
    $sizeOfA = sizeof($A);
    sort($A);
    $max = max($A[0]*$A[1]*$A[$sizeOfA-1], $A[$sizeOfA-3]*$A[$sizeOfA-2]*$A[$sizeOfA-1]);
    return $max;
}

echo solution($A);
echo "\n";