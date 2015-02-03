<?php

error_reporting(E_NOTICE);

class Tests {

    public function __construct($programName = null){
        // Controllo del nome della fuzione da richiamare
        if($programName){
            $t = debug_backtrace();
            if(!file_exists($t[0]['file'])){
                echo "File '$programName.php' not found!".PHP_EOL.PHP_EOL;
                exit;
            }
            $path = dirname($t[0]['file']);
            $file = str_replace($path.'/', '', $t[0]['file']);
            $arg = $t[0]['args'];
            if(!isset($arg[0])){
                echo "Mandatory option no included!".PHP_EOL.PHP_EOL;
                exit;
            }elseif($arg[0].'.php' != $file){
                echo "WARNING: Call ($arg[0]) and caller ($file) do not match!".PHP_EOL.PHP_EOL;
            }
            include_once "$programName.php";
        }else{
            echo "Undefined parameter 1!".PHP_EOL.PHP_EOL;
            exit;
        }
    }

    public function run($params, $resultExpected, $title = null){
        echo PHP_EOL;
        if(!$title) {
            $title = "********** DeldaTestUnit" . PHP_EOL;
        }else {
            $title = "********** $title" . PHP_EOL;
        }
        echo $title;

        if(!isset($params)){
            echo "Undefined input parameters!" . PHP_EOL;
        }
        if(!isset($resultExpected)){
            echo "Undefined result expected!" . PHP_EOL;
        }

        $startTime = microtime(true);
        $startMem = memory_get_usage();
        if(gettype($params) == 'array' && array_keys($params) > 1){
            $resultDetected = call_user_func_array('solution', $params);
        }else{
            $resultDetected = solution($params);
        }
        $endTime = microtime(true);
        $endMem = memory_get_usage();

        $time = sprintf("%.06f sec.", $endTime - $startTime);
        $memory = $this->getMemoryUsage($endMem - $startMem);

        echo "Time: $time;" . PHP_EOL;
        echo "Memory: $memory" . PHP_EOL;

        $typeOfDetected = isset($resultDetected) ? gettype($resultDetected) : 'null';
        $typeOfExpected = isset($resultExpected) ? gettype($resultExpected) : 'null';
        if($typeOfDetected != $typeOfExpected){
            $failure = true;
            $error_message = "The type expected is different from detected!";
        }else{
            if($resultDetected !== $resultExpected){
                $failure = true;
                $error_message = 'Wrong result value!';
            }else{
                $failure = false;
            }
        }
        if(gettype($resultExpected) == 'array'){
            $resultExpected = print_r($resultExpected, true);
            $resultExpected = str_replace("\n", '', $resultExpected);
        }
        if(gettype($resultDetected) == 'array'){
            $resultDetected = print_r($resultDetected, true);
            $resultDetected = str_replace("\n", '', $resultDetected);
        }

        if($failure){
            echo "FAILURE!" . PHP_EOL;
            echo $error_message . PHP_EOL;
            echo "Expected: '$resultExpected' ($typeOfExpected); returned: '$resultDetected' ($typeOfDetected)'";
        }else{
            echo "OK!";
        }
        echo PHP_EOL.PHP_EOL;
    }

    public function getMemoryUsage($size){
        $unit = array('B','KB','MB','GB','TB','PB');
        if(!isset($size))
            $size = memory_get_usage();
        return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
    }
}
