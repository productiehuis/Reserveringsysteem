<?php
require_once "insertQuery.php";
$insert = new insertQuery;
require_once "selectQuery.php";
$select = new selectQuery;


//ADDING USERS

$username = "admin";
$password = "password";
$userlevel = 1;

$array = [$username, $password, $userlevel];

echo $insert->insertAccount($array);




/*
//ADDING VOORSTELLINGEN
$voorstellingnaam = "Sneeuwwitje";
$tijd = "00:10:00";
$datum = "2022-11-16";
$locatie = "Nijmegen";
$max = 1200;

$asdasd = [$voorstellingnaam, $tijd, $datum, $locatie, $max];

$insert->insertVoorstelling($asdasd);
*/

/*
//SELECT BEZOEKER

var_dump($select->selectBezoeker("admin@kw1c.com"));
*/

/*
//INSERT BEZOEKER
$asdasd = ["ian", "ianli@outlook.com"];
$asdasa = ["ian", "admin@kw1c.com"];

echo $insert->insertBezoeker($asdasd);
echo $insert->insertBezoeker($asdasa);
*/
