<?php
session_start();
include_once("connectDatabase.php");
include_once("adminFunctions.php");
include_once("patronFunctions.php");

mainMenu();

function mainMenu() {
	#print("Processing menu option... <br>");
	
	$dbLink = connectDatabase('localhost', $_SESSION['user'], $_SESSION['password']);

	if (!$dbLink) {
	print("No link to database! Exiting..<br>");
	exit();
	}
	
	$choice = $_REQUEST['choice'];
	
	$Query = "SELECT role FROM borrowers WHERE card_no =" . $choice;
	print($Query . "<br>");
	#$dbRow = (mysqli_fetch_assoc($dbResult));
	#print($dbRow);
	 if(!($dbResult = mysqli_query($dbLink, $Query)))
	{
		print("\gCouldn't execute query!<br>\n");
		print("MySQL reports: " . mysql_error() . "<br>\n");
		print("Query was: $Query<br>\n");
		exit();
	}
	$dbRow = (mysqli_fetch_assoc($dbResult));
	$role = $dbRow['role'];
	print($role);
	if ($role == 'student'){
	patronFunctions($choice);
}
	elseif ($role == 'admin'){
	adminFunctions($choice);
	}


}
?>