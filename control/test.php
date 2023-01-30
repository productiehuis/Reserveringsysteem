<?php
include "../includes/header.php";
echo "<script src='https://code.jquery.com/jquery-3.6.1.min.js' integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=' crossorigin='anonymous'></script>
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script src='/js/script.js' defer></script>";
ini_set( 'display_errors', 1);
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


echo "<td><button class='btn btn-warning edit' id='5'><i class='bi bi-pencil'></i></button></td>";




//CREATE ACCOUNT

$accountobj = new account();

$accountobj->userName = "kaine";
$accountobj->userPassword = "password";
$accountobj->userLevel = 1;

echo $account->createAccount($accountobj);




//READ ACCOUNT

var_dump($account->readAccount("admin"));



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
//UPDATE PERFORMANCE

$performanceobj = new performance();

$performanceobj->showID = 19;
$performanceobj->name = "Sneeuwwitje";
$performanceobj->description = "Mooie voorstelling";
$performanceobj->starttime = "00:10:00";
$performanceobj->date = new DateTimeImmutable('2022-11-16');
$performanceobj->location = "Nijmegen";
$performanceobj->max = 1200;

var_dump($performance->updatePerformance($performanceobj));
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
