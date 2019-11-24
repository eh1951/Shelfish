<?php
include_once("api.php");
//include("databaseApp.php");
//include_once("index.php");
function patronFunctions($card_no){
	//make visible to file
	echo $card_no;
	print(isAdmin($card_no));
	print("<h1>Patron Functions</h1>");
	//book checkout form
	print("<form method=post\" action=\"patronFunctions.php\"\">");
	print("<h3> Book Id&nbsp&nbsp Branch Id</h3>");
	print("<input type=text\" name=\"bookIdCheckout\" value=\"\" label=\"Book Id\"\">");
	print("<input type=text\" name=\"branchIdCheckout\" value=\"\" label=\"Branch Id\"\">");
	print("<input type=\"submit\"name=\"submitCheckout\" value=\"Checkout Book\"\">");
	print("</form>");
	//book return form;
	print("<h3>Book Id</h3>");	
	print("<form method=post\" action=\"patronFunctions.php\"\">");
	print("<input type=text\" name=\"bookIdReturn\" value=\"\" label=\"Book Id\"\">");
	print("<input type=\"submit\" name=\"submitReturn\" value=\"Return Book\"\">");
	print("</form>");
	print("<br>");
	//pay fine form
	print("<h2>3. pay fine</h2>");
	print("<form method=post\" action=\"patronFunctions.php\"\">"); 
	print("<input type=\"text\" name=\"paymentAmount\" value=\"\" /><br>");
	print("<input type=\"submit\" name=\"submitPayment\" value=\"Pay Fines\"\">");
	echo "insert current fine amount for card_no here";
	print("</form>");

	print("<h2>4. print loaned book list</h2>");
	//get loans
	print(currentLoans($card_no));
	print ("<input type=\"submit\" name=\"print list\" value=\"ok\">");
	print("<h2>5. quit</h2>");
	print ("<input type=\"submit\" name=\"quit\" value=\"ok\">");
	//print("patron id is " . $choice);

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


	if (isset($_GET["submitCheckout"])){
		if (!empty($branchIdCheckout)AND !empty($bookIdCheckout)) {
			if(bookExists($bookIdCheckout) AND branchExists($branchIdCheckout)){
				if(isBookAvailable($bookIdCheckout,$branchIdCheckout)){
					echo checkoutBook($card_no, $bookIdCheckout,$branchIdCheckout);
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
				echo "insert book return function";
			}
			else{
				echo "you don't have an unpaid balance";
			}
		}
		else{
			echo "please input a dollar amount";
		}
	}
}
?>