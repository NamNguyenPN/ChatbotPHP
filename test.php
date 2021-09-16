<?php
foreach(file("100N3.txt",FILE_IGNORE_NEW_LINES) as $line){
    if(trim($line) != ""){
        $line = str_replace("　"," ",$line);
        print_r(explode(" ",$line));
    }
    
};