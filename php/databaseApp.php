<?php
	session_start();
	include("api.php");
	include_once("showMenu.php");
	include_once("connectDatabase.php");
        //print ("Checking username/password <br>");
	
	$card_no = $_POST['card_no'];
	if (isUser($card_no)==True) {
	// database connection successful
	  print($card_no);
	  print("\tFor testing purposes");
	  //is user admin
	  if(isAdmin($card_no)==True){
	  	print("admin");
	  	}
	  else{
	  	include_once("patronFunctions.php");
	  	print(patronFunctions());
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
