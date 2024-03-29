<?php
include "../includes/header.php";
echo "<script src='https://code.jquery.com/jquery-3.6.1.min.js' integrity='sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=' crossorigin='anonymous'></script>
      <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
      <script src='/js/script.js' defer></script>";
ini_set( 'display_errors', 1);
ini_set('error_reporting', 1);
ini_set('log_errors', 1);
error_reporting(-1);
set_error_handler("var_dump");


require_once "class/accountDL.php";
require_once "class/performanceDL.php";
require_once "class/visitorDL.php";
require_once "class/reservationDL.php";
$account = new accountDL();
$performance = new performanceDL();
$visitor = new visitorDL();
$reservation = new reservationDL();



/*$msg = "HELLO";

// send email
echo "<pre>";
var_dump(mail("abuse@yourdomain.example", "My subject", $msg, ));
echo "</pre>";*/

//var_dump(mb_detect_encoding($desc, "ISO-8859-1"));


/*
//NEXT DAY CHECK
$date = new DateTimeImmutable();
$newDate = $date->add(new DateInterval('P1D'));

var_dump($performance->readAllPerformanceOn($newDate));
*/


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

/*
//CREATE RESERVATION
$reservationobj = new reservation();

$reservationobj->showID = 1;
$reservationobj->visitorID = 29;
$reservationobj->countPeople = 1;
$reservationobj->sector = "ICT";
$reservationobj->referral = "MOND OP MOND";

var_dump($reservation->createReservation($reservationobj));
*/
