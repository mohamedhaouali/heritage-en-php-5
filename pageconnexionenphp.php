<?php


    $host = 'localhost';
    $db ='personne' ;
    $login ='root';
    $mdp='';
    try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $login, $mdp);}
catch(PDOException $e){
echo 'erreur'.$e->getMessage();
}

