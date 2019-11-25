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
	if (!$result) {
    	return false;
	}
	elseif($result->num_rows==1){
		return True;
	}
	else{
		return False;
	}
}

function isAdmin($card_no){
	global $conn;
	//what role does user have
	//echo "SELECT role from borrowers where card_no = $card_no;";
	$result = mysqli_query($conn,"SELECT role from borrowers where card_no = '$card_no';");
	$row = mysqli_fetch_array($result); 
    if(($row['role'])=='admin'){
    	return true;
    }
    else{
    	return false;
    }
}
//admin functions as seen on adminFunctions.php
function addBook($title,$publisher){
	global $conn;
	//what role does user have
	$result = mysqli_query($conn,"INSERT INTO books (title, publisher_name) VALUES ('$title','$publisher');");
	echo "Book added successfully";
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
	print_r($row['title']);
}	
}
function payFine($card_no, $money){
	global $conn;
	//mysqli_autocommit($conn, FALSE);
	if(isUser($card_no)){
		$query1 =("UPDATE borrowers SET unpaid_dues = unpaid_dues-'$money' where card_no = '$card_no';");
		$result = mysqli_query($conn, $query1);
		echo "Payment successful";
		} 
mysqli_close($conn);
}
function branchInfo($branch_id){
	global $conn;
	$result = mysqli_query($conn, "SELECT * from branches where branch_id = '$branch_id';");
	while ($row = mysqli_fetch_array($result)) {
		print("Branch Name: ");
		print_r($row['branch_name']);
		print("<br>");
		print(" Branch Address: ");
		print_r($row['branch_address']);
	}	
}
function newPatron($name,$address,$phone){
global $conn;
//mysqli_autocommit($conn,FALSE);
$query1 = "INSERT into borrowers (name, address, phone, role) VALUES ('$name','$address','$phone', 'user');";
$result = mysqli_query($conn, $query1);
echo "customer added";
}
function checkoutBook($card_no,$book_id, $branch_id){
	global $conn;
	//decrement number of copies
	//mysqli_update($conn,"UPDATE copy_no from copies where book_id = $book_id AND branch_id = $branch_id SET copy_no=copy_no-1;");
	//mysqli_insert($conn,"INSERT INTO loans SET card_no=$card_no book_id = $book_id AND branch_id = $branch_id AND date_out=getdate() AND date_due=adddate(now(),+7) ;");
	$sql = "UPDATE copies SET copy_no= copy_no - 1 where book_id = '$book_id' AND branch_id = '$branch_id';";
	$result = mysqli_query($conn, $sql);
	//card no seems to be null
	$sql = "INSERT INTO loans (card_no, book_id, branch_id) VALUES ('$card_no', '$book_id', '$branch_id')";
	$result = mysqli_query($conn, $sql);
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
    if($result['unpaid_dues']>0){
    	echo true;
    	}
    else{
    	echo false;
    	}
	}
function currentLoans($card_no){
	global $conn;
	$result = mysqli_query($conn, "SELECT book_id,date_return from loans where card_no = '$card_no';") or die( mysqli_error($conn));
	//incorrectly returning 1 
	while ($row = mysqli_fetch_array($result)) {
		if(empty($row['date_return']=='NULL')){
			print($row['book_id']); 
		}
	}
}
function findBook($book_title){
	global $conn;
	$sql = "select book_id, branch_id from copies where book_id=(select book_id from copies where book_id=(select book_id from books where title='$book_title'));";
	$result = mysqli_query($conn,$sql);
	if ($row = mysqli_fetch_array($result)) {
	print("This book's Id is: ");
	print_r($row['book_id']);
	print("<br>");
	print("You can find this book at Branch: ");
	print_r($row['branch_id']);
	}	
	else {
    	echo "Could not find book";
	}
}
function printTopTenBorrowers(){
	global $conn;
	$result = mysqli_query($conn, "select name from borrowers b, loans l where b.card_no = l.card_no group by l.card_no order by count(*) desc limit 10;");
	while ($row = mysqli_fetch_array($result)) {
	print_r($row['name']);
	}	
}
function printBalance($card_no){
	global $conn;
	$result = mysqli_query($conn, "select unpaid_dues from borrowers where card_no='$card_no';");
	while ($row = mysqli_fetch_array($result)) {
	if($row['unpaid_dues']>0){
		print("Please pay balance: ");
		print_r($row['unpaid_dues']);
		}
		else{
			print("You have no fines.");
		}
	}	
}
function getViewA(){
	global $conn;
	$result = mysqli_query($conn, "select * from top_ten_most_wanted;");
	while ($row = mysqli_fetch_array($result)) {
	print("Name: ");
	print_r($row['name']);
	print("   Fines: ");
	print_r($row['unpaid_dues']);
	print("<br>");
	}	
}	
//select * from prolific_writers;
function getViewB(){
	global $conn;
	$result = mysqli_query($conn, "select * from prolific_writers;");
	while ($row = mysqli_fetch_array($result)) {
	print("Author Name: ");
	print_r($row['name']);
	print("   Books in Library: ");
	print_r($row['number_of_books_in_library']);
	print("<br>");
	}	
}	
function getStoredProcedureA(){
	global $conn;
	$result = mysqli_query($conn, "CALL get_all_books;");
	while ($row = mysqli_fetch_array($result)) {
	print_r($row[1]);
	print("<br>");
	}
}
function getStoredProcedureB(){
	global $conn;
	$result = mysqli_query($conn, "CALL getNames();");
	while ($row = mysqli_fetch_array($result)) {
	print("Name: ");
	print_r($row[0]);
	print("<br>");
	}
}
function getTotal(){
	global $conn;
	$result = mysqli_query($conn, "select sum(unpaid_dues) from borrowers;");
	while ($row = mysqli_fetch_array($result)) {
	print("Total Fines: ");
	print_r($row[0]);
}
}
?>