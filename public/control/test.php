<?php
include "../includes/header.php";
ini_set('display_errors', 1);
ini_set('error_reporting', 1);
ini_set('log_errors', 1);


require_once "class/accountDL.php";
require_once "class/performanceDL.php";
require_once "class/visitorDL.php";
require_once "class/reservationDL.php";
$account = new accountDL();
$performance = new performanceDL();
$visitor = new visitorDL();
$reservation = new reservationDL();





/*
//CREATE ACCOUNT

$accountobj = new account();

$accountobj->userName = "admin";
$accountobj->userPassword = "password";
$accountobj->userLevel = 1;

echo $account->createAccount($accountobj);
*/


/*
//READ ACCOUNT

var_dump($account->readAccount("admin"));
*/

$con = new mysqli("localhost", "root", "", "theaterreservering");


echo(mysqli_get_server_version($con));


/*
//CREATE PERFORMANCE

$performanceobj = new performance();

$performanceobj->name = "Sneeuwwitje";
$performanceobj->description = "Mooie voorstelling";
$performanceobj->starttime = "00:10:00";
$performanceobj->date = "2022-11-16";
$performanceobj->location = "Nijmegen";
$performanceobj->max = 1200;

var_dump($performance->createPerformance($performanceobj));
*/


/*
//READ PERFORMANCE

var_dump($performance->readPerformance("1"));
*/


/*
//READ ALL PERFORMANCE

var_dump($performance->readAllPerformance());
*/










/*
//READ VISITOR

var_dump($visitor->readVisitor("admin@kw1c.com"));
*/


/*
//CREATE VISITOR
$visitorobj = new visitor();

$visitorobj->visitorName = "Ian";
$visitorobj->visitorEmail = "ianli123123@outlook.com";

var_dump($visitor->createVisitor($visitorobj));
*/


/*
//READ RESERVATIONS PER PERFORMANCE
echo "<PRE>";

print_r($reservation->readReserved(5));

echo "</PRE>";
*/
