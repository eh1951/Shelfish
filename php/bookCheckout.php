<?php
include("api.php");

if (isset($_POST["bookId"]) && ($_POST["branchId"])){
	$bookId = $_POST["bookId"];
	$branchId = $_POST["branchId"];
	bookCheckout($bookId, $branchId);
}
//bookCheckout($bookId, $branchId)

function bookCheckout($bookId, $branchId) {

	if (isBookAvailable($bookId,$branchId)>0) {
	// database connection successful
	  print("Book available");
	}
	else{
		print("Book not available");
	}
}
?>