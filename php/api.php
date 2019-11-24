<?php
//connection
$servername = "127.0.0.1";
$username = "root";
$password = "password";
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
    if($row['copy_no']>0){
    	return true;
    }
    else{
    	return false;
    	}
	}
}

function printTopTen(){
	global $conn;
	$result = mysqli_query($conn, "select * from books b, loans l where b.book_id = l.book_id group by l.book_id order by count(*) desc limit 10;");
	while ($row = mysqli_fetch_array($result)) {
	print_r($row);
}	
}
function payFine($card_no, $money){
	global $conn;
	mysqli_autocommit($conn, FALSE);
	$flag = true;
	$query1 =("update borrowers set unpaid_dues -= $money, where card_no = $card_no;");
	$result = mysqli_query($conn, $query1);
	if (!$result){
		$flag = false;
		echo "Error details: ". mysqli_error($conn);
	}
	if($flag){
mysqli_commit($conn);
echo "Fine paid successfully";
} else {
mysqli_rollback($conn);
echo "Fine NOT paid successfully";
}
mysqli_close($conn);
}
function branchInfo($branch_id){
	global $conn;
	$result = mysqli_query($conn, "SELECT * from branches where branch_id = $branch_id;");
	while ($row = mysqli_fetch_array($result)){
	print_r($row);
}
}
function newPatron($name,$address,$phone){
global $conn;
mysqli_autocommit($conn,FALSE);
$flag = true;
$query1 = ("insert into borrowers values($name,$address,$phone");
$result = mysqli_query($conn, $query1);
if (!$result){
$flag = false;
echo "Error details: ". mysqli_error($conn);
	} 
else{
	mysqli_rollback($conn);
	echo "Patron unsuccessfully added";
	}
mysqli_close($conn);
}
function updateCopies($card_no, $book_id, $branch_id){
	global $conn;
	//decrement number of copies
	mysqli_query($conn,"UPDATE copy_no from copies where book_id = $book_id AND branch_id = $branch_id SET copy_no=copy_no-1;");
	mysqli_query($conn,"INSERT INTO loans SET card_no=$card_no book_id = $book_id AND branch_id = $branch_id AND date_out=getdate() AND date_due=adddate(now(),+7) ;");
	return "Book Checked Out!";

	}
function bookExists($book_id){
	global $conn;
	//is this book available
	$result = mysqli_query($conn,"SELECT book_id from copies where book_id = $book_id;");
	while ($row = mysqli_fetch_array($result)) {
    if($row['book_id']>0){
    	return true;
    }
    else{
    	return false;
    	}
	}
}
function branchExists($branch_id){
	global $conn;
	//is this book available
	$result = mysqli_query($conn,"SELECT branch_id from copies where branch_id = $branch_id;");
	while ($row = mysqli_fetch_array($result)) {
    if($row['branch_id']>0){
    	return true;
    }
    else{
    	return false;
    	}
	}
}
function hasFines($card_no){
	global $conn;
	//is this book available
	$result = mysqli_query($conn,"SELECT unpaid_dues from borrowers where card_no = $card_no;");
	while ($row = mysqli_fetch_array($result)) {
    if($row['unpaid_dues']>0){
    	return true;
    }
    else{
    	return false;
    	}
	}
}
function currentLoans($card_no){
	global $conn;
	$result = mysqli_query($conn, "SELECT book_id from loans where card_no = $card_no AND date_due>getdate();");
	while ($row = mysqli_fetch_array($result)) {
	print_r($row);
	}
}
?>