<?php

/**
 * MaxProfit
 *
 *  Given a log of stock prices compute the maximum possible earning.
 */

include '../../Tests.class.php';

function solution($A) {

  $sizeOfA = sizeof($A);
  if($sizeOfA < 2)
    return 0;

  $maxProfit = 0;
  $partialProfit = $A[0];

  for($i=0; $i<$sizeOfA; $i++){
    $partialProfit = min($partialProfit, $A[$i]);
    $maxProfit = max($maxProfit, $A[$i] - $partialProfit);
  }

  return $maxProfit;
}

$test = new Tests('MaxProfit');

$A = array(3, 10, -1, 1);
$result = 7;
$test->run(array($A), $result);

$A = array(5, -7, 3, 5, -2, 4, -1);
$result = 12;
$test->run(array($A), $result);

$A = array(23171, 21011, 21123, 21366, 21013, 21367);
$result = 356;
$test->run(array($A), $result);