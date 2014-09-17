<?php

error_reporting(E_NOTICE);

class Tests {

    public function __construct($programName = null){
        // Controllo del nome della fuzione da richiamare
        if($programName){
            $path = getcwd();
            $files = glob("$path/*.php");
            $sizeOfFiles = sizeof($files);
            $i = 0;
            $findFile = false;
            do{
                if(strpos($files[$i], "$programName.php"))
                    $findFile = true;
                $i++;
            }while(!$findFile && $i < $sizeOfFiles);
            if(!$findFile){
                throw new Exception("File '$programName.php' not found!");
            }
            include_once "$programName.php";
        }else{
            throw new Exception("Undefined parameter 1!");
        }
    }

    public function run($params, $resultExpected){
        echo "\n";
        echo "***** DeldaTestUnit".PHP_EOL;

        if(!isset($params)){
            echo "Undefined input parameters!".PHP_EOL;
        }
        if(!isset($resultExpected)){
            echo "Undefined result expected!".PHP_EOL;
        }

        $startTime = microtime(true);
        $resultDetected = solution($params);
        $endTime = microtime(true);
        $time = sprintf("%.06f", $endTime - $startTime);
        $memory = $this->getMemoryUsage();

        echo "Time: $time; Memory: $memory".PHP_EOL;

        $typeOfDetected = gettype($resultDetected);
        $typeOfExpected = gettype($resultExpected);
        if( $typeOfDetected != $typeOfExpected){
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

        if($failure){
            echo "FAILURE!".PHP_EOL;
            echo $error_message.PHP_EOL;
        }else{
            echo "OK!".PHP_EOL;
        }
        echo "Expected: '$resultExpected' ($typeOfExpected); returned: '$resultDetected' ($typeOfDetected)'";
        echo PHP_EOL.PHP_EOL.PHP_EOL;
    }

    public function getMemoryUsage(){
        $unit = array('b','Kb','Mb','Gb','Tb','Pb');
        $size = memory_get_usage();
        return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
    }
}
