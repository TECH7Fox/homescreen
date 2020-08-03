<?php

$_ENV = parse_ini_file('.env', true);

function updateDotEnv($data, $path) { 
    $content = ""; 
    
    foreach($data as $section=>$values){
        $content .= "\n[".$section."]\n"; 
        foreach($values as $key=>$value){
            $content .= $key." = ".$value."\n"; 
        }
    }
    
    if (!$handle = fopen($path, 'w')) { 
        return false; 
    }
    $success = fwrite($handle, $content);
    fclose($handle); 

    return $success; 
}

?>