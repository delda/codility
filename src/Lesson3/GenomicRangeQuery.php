<?php

/**
 * GenomicRangeQuery
 *
 *  Find the minimal nucleotide from a range of sequence DNA.
 */

include '../../Tests.class.php';

function solution($S, $P, $Q) {
    $sizeOfS = strlen($S);
    $sizeOfP = sizeof($P);
    $impact_factor = array('A' => 1, 'C' => 2, 'G' => 3, 'T' => 4);
    for($i=0; $i<$sizeOfS; $i++){
        foreach($impact_factor as $key => $value){
            if($i == 0){
                $prefix_sum[$key][$i] = ($S[$i] == $key) ? 1 : 0;
            }else{
                if($S[$i] == $key)
                    $prefix_sum[$key][$i] = $prefix_sum[$key][$i-1] + 1;
                else
                    $prefix_sum[$key][$i] = $prefix_sum[$key][$i-1];
            }
        }
    }
    for($i=0; $i<$sizeOfP; $i++){
        foreach($impact_factor as $key => $value){
            // Se eseguo la ricerca del minimo fattore su un solo nucleotide,
            // assegno automaticamente il fattore di impatto di quel nucleotide
            if($Q[$i]==$P[$i]){
                $result[$i] = $impact_factor[$S[$Q[$i]]];
                break;
            // Se la differenza della somme dei prefissi è positiva,
            // un nuovo nucleotide è apparso nella sequenza analizzata
            }elseif($P[$i]-1 >= 0 && $prefix_sum[$key][$Q[$i]]-$prefix_sum[$key][$P[$i]-1]>0){
                $result[$i] = $impact_factor[$key];
                break;
            // Se la sequenza parte dal primo nucleotide,
            // non posso controllare se il valore della somma dei prefissi è aumentata (rispetto al valore precedente)
            // quindi controllo se la somma dei prefissi è maggiore di 0
            }elseif($P[$i]-1 < 0 && $prefix_sum[$key][$Q[$i]] > 0){
                $result[$i] = $impact_factor[$key];
                break;
            }
        }
    }
    return $result;
}

$test = new Tests('GenomicRangeQuery');

$S = 'CAGCCTA';
$P = array(2,5,0);
$Q = array(4,5,6);
$result = array(2, 4, 1);
$test->run(array($S, $P, $Q), $result);

$S = 'AC';
$P = array(0,0,1);
$Q = array(0,1,1);
$result = array(1, 1, 2);
$test->run(array($S, $P, $Q), $result);

$S = 'AAGT';
$P = array(0,2,2,3);
$Q = array(0,2,3,3);
$result = array(1, 3, 3, 4);
$test->run(array($S, $P, $Q), $result);