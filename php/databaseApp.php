<?php
	session_start();
	include("api.php");
	include_once("showMenu.php");
	include_once("connectDatabase.php");
	include_once("login.php");
	    //print ("Checking username/password <br>");
	

	$card_no = (isset($_POST["card_no"]) ? $_POST['card_no'] : null);
	//$card_no = $_GET['card_no'];

	if (isUser($card_no)) {
	  if(isAdmin($card_no)){
	  	include("adminFunctions.php");
	  	print(adminFunctions($card_no));
	  	}
	  else{
	  	include("patronFunctions.php");
	  	print(patronFunctions($card_no));
	  	}

   	//save username and password in session variables if database access was successful
	  //$_SESSION['user'] = $_REQUEST['username'];
	  //$_SESSION['password'] = $_REQUEST['password'];

          // show user the menu options	
          //showMenu();
   }
   else {
       print ("This library card number could not be found. Please try again.<br>");
       print ("Click here <a href=\"index.php\"> here</a> to try again<br>");
	}
	
?>
