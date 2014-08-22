<?php

error_reporting(E_NOTICE);

$S = 'CAGCCTA';
$P = array(2,5,0);
$Q = array(4,5,6);
// [2, 4, 1]

$S = 'AC';
$P = array(0,0,1);
$Q = array(0,1,1);
// [1, 1, 2]

$S = 'AAGT';
$P = array(0,2,2,3);
$Q = array(0,2,3,3);
// [1, 3, 3, 4]

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
//    var_dump($prefix_sum);
    for($i=0; $i<$sizeOfP; $i++){
        foreach($impact_factor as $key => $value){
//            var_dump("***");
//            var_dump($i.'-'.$key);
//            var_dump('['.$P[$i].','.$Q[$i].']');
//            var_dump($prefix_sum[$key][$Q[$i]].'-'.$prefix_sum[$key][$P[$i]]);
            // Se eseguo la ricerca del minimo fattore su un solo nucleotide,
            // assegno automaticamente il fattore di impatto di quel nucleotide
            if($Q[$i]==$P[$i]){
//                var_dump('###');
                $result[$i] = $impact_factor[$S[$Q[$i]]];
                break;
            // Se la differenza della somme dei prefissi è positiva,
            // un nuovo nucleotide è apparso nella sequenza analizzata
            }elseif($P[$i]-1 >= 0 && $prefix_sum[$key][$Q[$i]]-$prefix_sum[$key][$P[$i]-1]>0){
//                var_dump("###");
                $result[$i] = $impact_factor[$key];
                break;
            // Se la sequenza parte dal primo nucleotide,
            // non posso controllare se il valore della somma dei prefissi è aumentata (rispetto al valore precedente)
            // quindi controllo se la somma dei prefissi è maggiore di 0
            }elseif($P[$i]-1 < 0 && $prefix_sum[$key][$Q[$i]] > 0){
//                var_dump("###");
                $result[$i] = $impact_factor[$key];
                break;
            }
        }
    }
//    var_dump();
//    var_dump($result);
    return $result;
}

var_dump(solution($S, $P, $Q));
echo "\n";