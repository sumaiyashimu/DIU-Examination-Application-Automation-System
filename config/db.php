<?php

$db = new mysqli("localhost", "root", "", "new");
 //$db = new mysqli("localhost", "id14059604_root", "0Q}e(-aS2S~Dsy*8", "id14059604_over");

if ($db->connect_errno) {
    exit();
}

function executeQuery($query,$type)
{
    global $db;
    if ($result = $db->query($query)) {
        if($type==2) return ($result->fetch_assoc()); //$type=2 means select query 2 
        else if($type==1) return $result;
        
    } else {
        return false;
    }

}
