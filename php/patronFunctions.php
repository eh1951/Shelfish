<html>
<h1>Patron Functions</h1>
<head>
	<title>Patron Functions</title>
</head>
<body>
	<form method="post" action="bookCheckout.php">
		<input type="text" name="bookId" value="" label="Book Id">
		<input type="text" name="branchId" value="" label="Branch Id">
		<input type="submit" value="Checkout Book">
</form>
</body>
</html>




<?php
#include_once("connectDatabase.php");

function patronFunctions(){
	
	//book checkout function
	//print(bookCheckout());
	print("<h2>2. book return</h2>");
	print("<input type=\"text\" name=\"returnBook\" value=\"\" /><br>");
	print("<h2>3. pay fine</h2>");
	print("<input type=\"text\" name=\"fine\" value=\"\" /><br>");
	print("<h2>4. print loaned book list</h2>");
	print ("<input type=\"submit\" name=\"print list\" value=\"ok\">");
	print("<h2>5. quit</h2>");
	print ("<input type=\"submit\" name=\"quit\" value=\"ok\">");
	//print("patron id is " . $choice);
}
?>