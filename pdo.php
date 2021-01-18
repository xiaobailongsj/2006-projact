<?php


function getPdo()
{
    $host = "127.0.0.1";
    $user = "root";
    $pass = "rootroot";
    $db = "2006";
    return new mysqli($host,$user,$pass,$db);
}