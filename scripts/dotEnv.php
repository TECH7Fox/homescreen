<?php

$_ENV = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/.env', true);

function updateDotEnv($data) { 
    $content = ""; 
    
    foreach($data as $section=>$values){
        $content .= "\n[".$section."]\n"; 
        foreach($values as $key=>$value){
            $content .= $key." = ".$value."\n"; 
        }
    }
    
    if (!$handle = fopen($_SERVER['DOCUMENT_ROOT'] . '/config/.env', 'w')) { 
        return false; 
    }
    $success = fwrite($handle, $content);
    fclose($handle); 

    return $success; 
}

if (empty($_ENV)) {
    $_ENV = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/default.env', true);
    updateDotEnv($_ENV);
}

?>