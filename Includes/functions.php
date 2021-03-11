<?php
//Escapes HTML special characters
function escape($string){
    return htmlspecialchars($string, ENT_COMPAT, 'UTF-8');
}
?>