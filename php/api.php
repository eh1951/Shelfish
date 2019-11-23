<?php

$servername = "127.0.0.1";
$username = "root";
$password = "ilikepie114";
$database = "Shelfish_development";
$conn = new mysqli($servername, $username, $password, $database);

function isUser($card_no) {
	global $conn;
	//does user exist
	$sql = "SELECT card_no from borrowers where card_no = $card_no;";
	try {
		$result = $conn->query($sql);
	}
	catch (exception $e) {
    //code to handle the exception
	}
	if($result->num_rows==1){
		return True;
	}
	else{
		return False;
	}
}
function isAdmin($card_no){
	global $conn;
	//what role does user have
	$result = mysqli_query($conn,"SELECT role from borrowers where card_no = $card_no;");
	while ($row = mysqli_fetch_array($result)) {
    return $row['role'];
    }
}
//admin functions as seen on adminFunctions.php
function addBook($title,$publisher){
	global $conn;
	//what role does user have
	$result = mysqli_query($conn,"INSERT from books ;");
	while ($row = mysqli_fetch_array($result)) {
    return $row['role'];
    }
}
function isBookAvailable($book_id, $branch_id){
	global $conn;
	//is this book available
	$result = mysqli_query($conn,"SELECT copy_no from copies where book_id = $book_id AND branch_id = $branch_id;");
	while ($row = mysqli_fetch_array($result)) {
    return $row['copy_no'];
	}
}
?>

