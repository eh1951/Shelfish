<html>
<div class="jumbotron">
<?php
include('style.css');
include_once("api.php");
	//add book  
	print("<form method=post\" action=\"adminFunctions.php\"\">");
	print("<br><h1>Admin functions</h1>");
	print("<h2>Add a book</h2>");
	print("Book Title: "."<input type=\"text\" name=\"addBookTitle\" value=\"\" /><br>");
	print("Book Author: "."<input type=\"text\" name=\"addBookAuthor\" value=\"\" /><br>");
	print("Book Publisher: "."<input type=\"text\" name=\"addBookPublisher\" value=\"\" /><br>");
	print("<input type=\"submit\"name=\"submitAddBook\" value=\"Add Book\"\">");
	print("</form>");

	//find book
	print("<form method=post\" action=\"adminFunctions.php\"\">");
	print("<h2>Search book</h2>");
	print("Book Title: "."<input type=\"text\" name=\"findBook\" value=\"\" /><br>");
	print("<input type=\"submit\"name=\"submitFindBook\" value=\"Find Book\"\">");
	print("</form>");

	//make new patron
	print("<form method=post\" action=\"adminFunctions.php\"\">");
	print("<h2>New patron</h2>");
	print("Patron Name: "."<input type=\"text\" name=\"patronName\" value=\"\" /><br>");
	print("Patron Address:"."<input type=\"text\" name=\"patronAddress\" value=\"\" /><br>");
	print("Patron Phone: "."<input type=\"text\" name=\"patronPhone\" value=\"\" /><br>");
	print("<input type=\"submit\"name=\"submitMakeNewPatron\" value=\"Add Patron\"\">");
	print("</form>");

	//get branch info
	print("<form method=post\" action=\"adminFunctions.php\"\">");
	print("<h2>Print branch info</h2>");
	print("Branch Id: "."<input type=\"text\" name=\"branchId\" value=\"\" /><br>");
	print ("<input type=\"submit\" name=\"submitGetBranchInfo\" value=\"Get Branch Info\">");
	print("</form>");


	//top ten
	print("<h2>Print top 10 frequently checked-out books</h2>");
	printTopTen();

	print("<h2>Print top 10 borrowers</h2>");
	printTopTenBorrowers();

	print("<form method=post\" action=\"index.php\"\">"); 
	print("<h2>quit</h2>");
	print ("<input type=\"submit\" name=\"quit\" value=\"ok\">");
	print("</form>");


	//if add book submit clicked
	$addBookTitle = (isset($_GET["addBookTitle"]) ? $_GET['addBookTitle'] : null);
	$addBookAuthor = (isset($_GET["addBookAuthor"]) ? $_GET['addBookAuthor'] : null);
	$addBookPublisher = (isset($_GET["addBookPublisher"]) ? $_GET['addBookPublisher'] : null);
	$submitAddBook = (isset($_GET["submitAddBook"]) ? $_GET['submitAddBook'] : null);
	if(isset($submitAddBook)){
		if(!empty($addBookTitle) AND !empty($addBookAuthor) AND !empty($addBookAuthor)){
			addBook($addBookTitle, $addBookPublisher);
		}
		else{
			echo "Please fill out all Add Book requirements";
		}
	}

	//find book
	$findBook = (isset($_GET["findBook"]) ? $_GET['findBook'] : null);
	$submitFindBook = (isset($_GET["submitFindBook"]) ? $_GET['submitFindBook'] : null);
		if(isset($submitFindBook)){
		if(!empty($findBook)){
			findBook($findBook);
		}
		else{
			echo "Please fill out all Find Book requirements";
		}
	}

	//make new patron
	$patronName = (isset($_GET["patronName"]) ? $_GET['patronName'] : null);
	$patronAddress = (isset($_GET["patronAddress"]) ? $_GET['patronAddress'] : null);
	$patronPhone = (isset($_GET["patronPhone"]) ? $_GET['patronPhone'] : null);
	$submitMakeNewPatron = (isset($_GET["submitMakeNewPatron"]) ? $_GET['submitMakeNewPatron'] : null);
	
	if(isset($submitMakeNewPatron)){
		if(!empty($patronName) AND !empty($patronAddress) AND !empty($patronPhone)){
			newPatron($patronName,$patronAddress,$patronPhone);
		}
		else{
			echo "Please fill out all Add Patron requirements";
		}
	}

	//print branch info
	$branchId = (isset($_GET["branchId"]) ? $_GET['branchId'] : null);
	$submitGetBranchInfo = (isset($_GET["submitGetBranchInfo"]) ? $_GET['submitGetBranchInfo'] : null);
	if(isset($submitGetBranchInfo)){
		if(!empty($submitGetBranchInfo)){
			branchInfo($branchId);
		}
		else{
			echo "Please fill out all Add Patron requirements";
		}
	}

	//return form values
	$bookIdReturn = (isset($_GET["bookIdReturn"]) ? $_GET['bookIdReturn'] : null);
	$submitReturn = (isset($_GET["submitReturn"]) ? $_GET['submitReturn'] : null);
	//pay fine form values
	$paymentAmount = (isset($_GET["paymentAmount"]) ? $_GET['paymentAmount'] : null);
	$submitPayment = (isset($_GET["submitPayment"]) ? $_GET['submitPayment'] : null);
function adminFunctions($card_no){
}




?>
</div>
</html>