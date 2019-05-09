<?php
/* 
Albert Warner &  Olufemi Olusina
Web 2 project
Function to clean data from place holders before then go into the database (security)
 */
function clean_input($data)
{
    $data = trim($data,'/');
    $data = strip_tags($data);
    $data = stripcslashes($data);
    $data = htmlentities($data);

    return $data;
}
?>