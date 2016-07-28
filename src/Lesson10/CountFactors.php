<?php

/**
 * Count factors
 *
 *  Count factors of given number n.
 */


include '../../Tests.class.php';

function solution($N){
	$i = 1;
	$count = 0;
	while ($i * $i < $N){
		if ($N % $i == 0){
			$count += 2;
		}
		$i++;
	}
	if ($i * $i == $N){
		$count += 1;
	}
	return $count;
}

$test = new Tests('CountFactors');

$name = 'example';
$A = 24;
$result = 8;
$test->run(array($A), $result, $name);

$name = 'squares';
$A = 16;
$result = 5;
$test->run(array($A), $result, $name);

$name = 'squares';
$A = 36;
$result = 9;
$test->run(array($A), $result, $name);

$name = 'simple2';
$A = 64;
$result = 7;
$test->run(array($A), $result, $name);

$name = 'extrime_one';
$A = 1;
$result = 1;
$test->run(array($A), $result, $name);
