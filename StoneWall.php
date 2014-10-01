<?php

include 'Tests.class.php';

function solution($H) {
    $size_of_H = sizeof($H);
    $edge_height = array();
    $edge_height_index = 0;
    $stone_blocks = 0;

    for($i=0; $i<$size_of_H; $i++){
        while($edge_height_index > 0 && $edge_height[$edge_height_index - 1] > $H[$i]) {
            $edge_height_index--;
        }
        if($edge_height_index > 0 && $edge_height[$edge_height_index - 1] == $H[$i]){
            continue;
        }else{
            $stone_blocks++;
            $edge_height[$edge_height_index] = $H[$i];
            $edge_height_index++;
        }
    }

    return $stone_blocks;
}

$test = new Tests('StoneWall');

$H = array(8,8,5,7,9,8,7,4,8);
$result = 7;
$test->run($H, $result);
