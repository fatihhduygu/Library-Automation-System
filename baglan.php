<?php
try{
    $db=new PDO('mysql:host=localhost;dbname=kutuphane','root','');
    $db->query("SET NAMES 'UTF8'");
}catch (PDOException $e)
{
    echo $e->getMessage();
}

