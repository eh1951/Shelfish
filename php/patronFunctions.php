<html>
<div class="jumbotron">
<?php
include('style.css');
include_once("api.php");
//include("databaseApp.php");
//include_once("index.php");
	//make visible to file
$card_no = (isset($_POST["card_no"]) ? $_POST['card_no'] : null);
print("<h1>Patron Functions</h1>");
	//book checkout form
	print("<form method=post\" action=\"patronFunctions.php\"\">");
	print("<h2>1. Checkout Book</h2>");
	print("Book Id: "."<input type=text\" name=\"bookIdCheckout\" value=\"\" label=\"Book Id\"\">");
	print("Branch Id: "."<input type=text\" name=\"branchIdCheckout\" value=\"\" label=\"Branch Id\"\">");
	print("<input type=\"submit\"name=\"submitCheckout\" value=\"Checkout Book\"\">");
	print("</form>");
	//book return form;
	print("<h2>2. Return Book</h2>");
	print("<form method=post\" action=\"patronFunctions.php\"\">");
	print("Book Id: "."<input type=text\" name=\"bookIdReturn\" value=\"\" label=\"Book Id\"\">");
	print("<input type=\"submit\" name=\"submitReturn\" value=\"Return Book\"\">");
	print("</form>");
	print("<br>");
	//pay fine form
	print("<h2>3. pay fine</h2>");
	print("<form method=post\" action=\"patronFunctions.php\"\">"); 
	print("Payment Amount: "."<input type=\"text\" name=\"paymentAmount\" value=\"\" /><br>");
	print("<input type=\"submit\" name=\"submitPayment\" value=\"Pay Fines\"\">");
	//print loaned books 
	if(!isset($_GET["submitPayment"])){
		printBalance($card_no);
	}
	print("</form>");
	print("<h2>4. print loaned book list</h2>");
	//get loans
	print("<form method=post\" action=\"patronFunctions.php\"\">"); 
	print ("<input type=\"submit\" name=\"getLoans\" value=\"Get list\">");
	print("</form>");
	$getLoans = (isset($_GET["getLoans"]) ? $_GET['getLoans'] : null);
	if(isset($getLoans)){
		currentLoans($card_no);
	}
	//get big list of book inventory
	print("<br>");
	print("<h2>5. Get Book Inventory</h2>");
	print("<form method=post\" action=\"patronFunctions.php\"\">"); 
	print ("<input type=\"submit\" name=\"submitBookInventory\" value=\"Get Book Inventory\">");
	print("</form>");

	print("<br>");
	print("<h2>6. Get patron descriptions</h2>");
	print("<form method=post\" action=\"patronFunctions.php\"\">"); 
	print ("<input type=\"submit\" name=\"getPatronDescriptions\" value=\"getPatronDescriptions\">");
	print("</form>");
	$getPatronDescriptions = (isset($_GET["getPatronDescriptions"]) ? $_GET['getPatronDescriptions'] : null);
	if (isset($_GET["getPatronDescriptions"])){
		print(patronLevel());
	}

	print("<h2>7. quit</h2>");
	print ("<input type=\"submit\" name=\"quit\" value=\"Logout\">");
	print("</form>");
	//print("patron id is " . $choice);
	//$card_no = (isset($_GET["card_no"]) ? $_GET['card_no'] : null);
	//if checkout submit clicked
	$bookIdCheckout = (isset($_GET["bookIdCheckout"]) ? $_GET['bookIdCheckout'] : null);
	$branchIdCheckout = (isset($_GET["branchIdCheckout"]) ? $_GET['branchIdCheckout'] : null);
	$submitCheckout = (isset($_GET["submitCheckout"]) ? $_GET['submitCheckout'] : null);
	//return form values
	$bookIdReturn = (isset($_GET["bookIdReturn"]) ? $_GET['bookIdReturn'] : null);
	$submitReturn = (isset($_GET["submitReturn"]) ? $_GET['submitReturn'] : null);
	//pay fine form values
	$paymentAmount = (isset($_GET["paymentAmount"]) ? $_GET['paymentAmount'] : null);
	$submitPayment = (isset($_GET["submitPayment"]) ? $_GET['submitPayment'] : null);
	$submitBookInventory = (isset($_GET["submitBookInventory"]) ? $_GET['submitBookInventory'] : null);
	if (isset($_GET["submitBookInventory"])){
		print(getStoredProcedureA());
	}
	if (isset($_GET["submitCheckout"])){
		if (!empty($branchIdCheckout)AND !empty($bookIdCheckout)) {
			if(bookExists($bookIdCheckout) AND branchExists($branchIdCheckout)){
				if(isBookAvailable($bookIdCheckout,$branchIdCheckout)){
					checkoutBook($card_no,$bookIdCheckout,$branchIdCheckout);
					}
				else{
					echo "book not available";
					}
				}
			}
			else{
				echo "book id or branch id does not exist";
			}
		}
	if (isset($_GET["submitReturn"])){
		//return book
		if (!empty($bookIdReturn)){
			//if book exists 
			if(bookExists($bookIdReturn)){
				echo "insert book return function";
			}
			else{
				echo "book does not exist";
			}
		}
		else{
			echo "please retype this book id";
		}
	}
	if (isset($_GET["submitPayment"])){
		//return book
		if (!empty($paymentAmount)){
			//if book exists 
			if(hasFines($card_no)){
				payFine($card_no, $paymentAmount);
			}
		}
		else{
			echo "please input a dollar amount";
		}
	}
function patronFunctions($card_no){
	echo $card_no;	
}
?>
</div>
</html>