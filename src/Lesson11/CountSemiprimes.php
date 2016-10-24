<?php

/**
 * CountSemiprimes
 *
 *  Find the maximum number of flags that can be set on mountain peaks.
 */


include '../../Tests.class.php';

function solution($N, $P, $Q) {
    $sizeOfP = sizeof($P);
    $prime = array_fill(0, $N+1, true);
    $prime[0] = $prime[1] = false;

    $i = 2;
    while ($i * $i <= $N) {
        if($prime[$i]) {
            $k = $i * $i;
            while ($k <= $N) {
                $prime[$k] = false;
                $k += $i;
            }
        }
        $i++;
    }

    $semiPrime = array_fill(0, $N+1, false);
    for ($i=2; $i<=$N; $i++) {
        if ($prime[$i] === true) {
            for ($j=$i; $j<=$N; $j++) {
                if ($prime[$j] === true) {
                    $index = $i * $j;
                    if ($index <= $N) {
                        $semiPrime[$index] = true;
                    }
                }
            }
        }
    }

    $count = 0;
    $semiPrimeCount = array(0, 0, 0);
    for ($i=3; $i<=$N; $i++) {
        if ($semiPrime[$i] === true) {
            $count++;
        }
        $semiPrimeCount[$i] = $count;
    }

    $result = array();
    for ($i=0; $i<$sizeOfP; $i++) {
        $result[$i] = $semiPrimeCount[$Q[$i]] - $semiPrimeCount[$P[$i]-1];
    }

    return $result;
}

$test = new Tests('CountSemiprimes');

$name = 'example';
$N = 26;
$P = array(1, 4, 16);
$Q = array(26, 10, 20);
$result = array(10, 4, 0);
$test->run(array($N, $P, $Q), $result, $name);
