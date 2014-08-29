<?php

error_reporting(E_NOTICE);

// example1
// example test, positive answer
$A = array(2,1,1,2,3,1);
// result: 2

// extreme_empty
// empty sequence
$A = array();
// result: 0

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

echo solution($A);
echo "\n";	

?>
