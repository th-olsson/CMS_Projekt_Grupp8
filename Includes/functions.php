<?php
//Escapes HTML special characters
function escape($string)
{
    return htmlspecialchars($string, ENT_COMPAT, 'UTF-8');
}

//function to remove spaces or unwanted character from input data
function validateData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
