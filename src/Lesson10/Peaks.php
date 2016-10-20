<?php

/**
 * Flags
 *
 *  Find the maximum number of flags that can be set on mountain peaks.
 */


include '../../Tests.class.php';

function solution($A) {
    $sizeOfA = sizeof($A);

    if ($sizeOfA < 3) {
        return 0;
    }

    $peaks = array();
    $countPeaks = 0;
    $peaks[0] = 0;
    $lastPeak = -1;
    $maxPeakGap = 0;
    for ($i = 1; $i < $sizeOfA-1; $i++) {
        if ($A[$i - 1] < $A[$i] && $A[$i] > $A[$i + 1]) {
            $countPeaks++;
            $peaks[$i] = $countPeaks;
            $maxPeakGap = max($maxPeakGap, $i - $lastPeak);
            $lastPeak = $i;
        } else {
            $countPeaks;
        }
        $peaks[$i] = ($A[$i - 1] < $A[$i] && $A[$i] > $A[$i + 1]) ? ++$countPeaks : $countPeaks;
    }
    $peaks[$sizeOfA-1] = $peaks[$sizeOfA-2];

    if ($countPeaks === 0) {
        return 0;
    }

    for ($i = ($maxPeakGap >> 1) + 1; $i < $maxPeakGap; $i++) {
        if ($sizeOfA % $i == 0) {
            $last = 0;
            for ($j = $i; $j <= $sizeOfA; $j += $i) {
                if ($peaks[$j - 1] <= $last) {
                    break;
                }
                $last = $peaks[$j - 1];
            }
            if ($j > $sizeOfA) {
                return $sizeOfA / $i;
            }
        }
    }

    do {
        $last = $maxPeakGap;
        $last++;
    } while($sizeOfA % $last);

    return floor($sizeOfA / $last);
}

$test = new Tests('Peaks');

$name = 'example';
$A = array(1, 2, 3, 4, 3, 4, 1, 2, 3, 4, 6, 2);
$result = 3;
$test->run(array($A), $result, $name);

$name = 'extreme_min';
$A = array(0, 1000000000);
$result = 0;
$test->run(array($A), $result, $name);

$name = 'extreme_without_peaks';
$A = array(1, 2, 3, 4, 5, 6);
$result = 0;
$test->run(array($A), $result, $name);

$name = 'prime_length';
$A = array(0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0);
$result = 1;
$test->run(array($A), $result, $name);

$name = 'simple1';
$A = array(1, 2, 3, 4, 5, 6, 5, 5, 5, 6, 5, 6);
$result = 2;
$test->run(array($A), $result, $name);

$name = 'medium_anti_slow';
for($i=0; $i<2310; $i=$i+2) {
    $A[$i] = 0;
    $A[$i+1] = 1;
}
$A[2310] = 0;
$result = 1;
$test->run(array($A), $result, $name);

$name = 'large_anti_slow';
for($i=0; $i<30030; $i=$i+2) {
    $A[$i] = 0;
    $A[$i+1] = 1;
}
$result = 30030;
$test->run(array($A), $result, $name);

