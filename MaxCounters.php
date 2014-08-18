<?php

/**
 * Test:
 *  66% https://codility.com/demo/results/demoFSRHP7-BXU/
 *  88% https://codility.com/demo/results/demo35S8ZP-8YX/
 *
 * 100% https://codility.com/demo/results/demoDC2GBQ-4HN/
 */

$N = 5;
$A = array(3, 4, 4, 6, 1, 4, 4);

function solution($N, $A) {
    $max_counter = 0;
    $max_value = 0;
    $sizeOfA = sizeof($A);
    for($i=0; $i<$N; $i++){
        $B[$i] = 0;
    }
//    var_dump($B);
    for($i=0; $i<$sizeOfA; $i++){
//        var_dump($A[$i]);
        // se devo calcolare il max_counter
        if($A[$i] > $N){
            $max_counter = $max_value;
        // se devo incrementare una variabile
        }else{
            if(isset($B[$A[$i]-1])){
                if($B[$A[$i]-1] > $max_counter)
                    $B[$A[$i]-1]++;
                else
                    $B[$A[$i]-1] = $max_counter + 1;
                if($B[$A[$i]-1] > $max_value)
                    $max_value = $B[$A[$i]-1];
            }
        }
//        var_dump($max_counter);
//        var_dump($max_value);
//        var_dump($B);
    }
//    var_dump($B);
    for($i=0; $i<$N; $i++){
        if($B[$i] < $max_counter)
            $B[$i] = $max_counter;
    }
//    var_dump($B);
    return $B;
}

var_dump(solution($N, $A));
echo "\n";
