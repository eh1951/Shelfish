<?php
#include_once("connectDatabase.php");

function patronFunctions($choice){
	
	Print('<br><h1>Patron Functions<br>');
	print("<br><br><br><h2>1. book checkout</h2>");
	print("<input type=\"text\" name=\"checkoutBook\" value=\"\" /><br>");
	print("<h2>2. book return</h2>");
	print("<input type=\"text\" name=\"returnBook\" value=\"\" /><br>");
	print("<h2>3. pay fine</h2>");
	print("<input type=\"text\" name=\"fine\" value=\"\" /><br>");
	print("<h2>4. print loaned book list</h2>");
	print ("<input type=\"submit\" name=\"print list\" value=\"ok\">");
	print("<h2>5. quit</h2>");
	print ("<input type=\"submit\" name=\"quit\" value=\"ok\">");
	print("patron id is " . $choice);
}
?>