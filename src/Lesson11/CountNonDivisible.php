<?php

/**
 * CountNonDivisible
 *
 *  Calculate the number of elements of an array that are not divisors of each element.
 */


include '../../Tests.class.php';

function solution($A)
{
    $sizeOfA = sizeof($A);
    $maxValue = max($A);

    $occurrence = array_fill(0, $maxValue+1, 0);
    foreach ($A as $value) {
        $occurrence[$value]++;
    }

    for ($i = 0; $i < $sizeOfA; $i++) {
        $count = 0;
        $j = 1;
        while ($j * $j <= $A[$i]) {
            if ($A[$i] % $j == 0) {
                $count += $occurrence[$j];
                if ($A[$i] / $j != $j) {
                    $count += $occurrence[$A[$i] / $j];
                }
            }
            $j++;
        }
        $nonDivisibles[$i] = $sizeOfA - $count;
    }

    return $nonDivisibles;
}

$test = new Tests('CountNonDivisible');

$name = 'example';
$A = array(3, 1, 2, 3, 6);
$result = array(2, 4, 3, 2, 0);
$test->run(array($A), $result, $name);
