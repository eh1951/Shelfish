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
$flag = true;
$query1 = ("INSERT into borrowers (name, address, phone, role) VALUES ('$name','$address','$phone', 'user');");
echo $query1;
$result = mysqli_query($conn, $query1);
if (!$result){
$flag = false;
echo "Error details: ". mysqli_error($conn);
	} 
else{
	//mysqli_rollback($conn);
	echo "Patron successfully added";
	}
mysqli_close($conn);
}
function checkoutBook($card_no,$book_id, $branch_id){
	global $conn;
	//decrement number of copies
	//mysqli_update($conn,"UPDATE copy_no from copies where book_id = $book_id AND branch_id = $branch_id SET copy_no=copy_no-1;");
	//mysqli_insert($conn,"INSERT INTO loans SET card_no=$card_no book_id = $book_id AND branch_id = $branch_id AND date_out=getdate() AND date_due=adddate(now(),+7) ;");
	$sql = "UPDATE copies SET copy_no= copy_no - 1 where book_id = '$book_id' AND branch_id = '$branch_id';";
	if ($conn->query($sql) === TRUE) {
		//card no seems to be null
		$sql = "INSERT INTO loans (card_no, book_id, branch_id) 
		VALUES ('$card_no', '$book_id', '$branch_id')";
    	if ($conn->query($sql) === TRUE) {

    		echo "Book Checked out";
		}
		else 
		{
    	echo "Error updating record: " . $conn->error;
		}
	} else 
	{
    echo "Error updating record: " . $conn->error;
	}
	$conn->close();

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
	$result = mysqli_query($conn, "SELECT book_id,date_return from loans where card_no = $card_no") or die( mysqli_error($conn));
	//incorrectly returning 1 
	while ($row = mysqli_fetch_array($result)) {
		if(empty($row['date_return']=='NULL')){
			return $row['book_id']; 
		}
	}
}
function findBook($book_title){
	global $conn;
	//get book id 
	$result = mysqli_query($conn,"SELECT book_id from books where book_title='$book_title';");
	while ($row = mysqli_fetch_array($result)) {
		$book_id = $result['book_id'];
		}
	$sql = "SELECT book_id, branch_id from copies where book_id='$book_id';";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo $result['book_id'];
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
?>