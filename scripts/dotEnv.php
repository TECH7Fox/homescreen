<?php

$_ENV = parse_ini_file('.env', true);

function updateDotEnv($data) { 
    $content = ""; 
    
    foreach($data as $section=>$values){
        $content .= "\n[".$section."]\n"; 
        foreach($values as $key=>$value){
            $content .= $key." = ".$value."\n"; 
        }
    }
    
    if (!$handle = fopen('.env', 'w')) { 
        return false; 
    }
    $success = fwrite($handle, $content);
    fclose($handle); 

    return $success; 
}

?>