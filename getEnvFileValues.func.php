<?php

// User Strings as array if you need to get specific variables from .env file, like this $strings = Array("DB_HOST", "DB_DATABASE", "DB_USERNAME", "DB_USERNAME", "DB_PASSWORD");
function getEnvFileValues($env_file, $strings = false){
    if(!@file_exists($env_file)){
        return false;
    }
    $abrir = fopen($env_file, 'r');
    while(!feof ($abrir)){
        $linha = fgets($abrir, 1024);
        if(substr($linha, 0, 1) != "#"){
            $ex = explode("=", $linha);
            if(@$ex[1]){
                if(is_array(@$strings) && in_array(trim($ex[0]), @$strings)){
                    $saida[trim($ex[0])] = trim($ex[1]);
                }
                elseif(@!is_array($strings)){
                    $saida[trim($ex[0])] = trim($ex[1]);
                }
            }
        }
    }
}