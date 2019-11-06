<?php
session_start();
#include_once("adminFunctions.php");
#include_once("patronFunctions.php");

$choice = $_REQUEST]'choice'];

$dbLink = connectDatabase('localhost', $_SESSION['user'], $_SESSION['password']);

if (!$dbLink) {
	print("No link to database! Exiting..<br>");
	exit();
	}
$Query = "SELECT role FROM borrowers WHERE card_no =" . $choice;

if(!($dbResult = mysqli_query($dbLink, $Query))) {
	print("\gCouldn't execute query!<br>\n");
	print("MySQL reports: " . mysql_error() . "<br>\n");
	print("Query was: $Query<br>\n");
	exit();		

}

$dbRow = mysqli_fetch_assoc($dbResult));

