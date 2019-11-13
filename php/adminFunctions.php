<?php

function adminFunctions($choice){

	print("<br><h1>Admin functions</h1>");
	print("<h2>1. Add a book</h2>");
	print("<input type=\"text\" name=\"fine\" value=\"\" /><br>");
	print("<h2>2. Update book holdings</h2>");
	print("<input type=\"text\" name=\"fine\" value=\"\" /><br>");
	print("<h2>3. Search book</h2>");
	print("<input type=\"text\" name=\"fine\" value=\"\" /><br>");
	print("<h2>4. New patron</h2>");
	print("<input type=\"text\" name=\"patronName\" value=\"\" /><br>");
	print("<input type=\"text\" name=\"patronAddress\" value=\"\" /><br>");
	print("<input type=\"text\" name=\"patronPhone\" value=\"\" /><br>");
	print("<h2>5. Print branch info</h2>");
	print ("<input type=\"submit\" name=\"print\" value=\"ok\">");
	print("<h2>6. Print to 10 frequently checked-out books</h2>");
	print ("<input type=\"submit\" name=\"print\" value=\"ok\">");
	print("<h2>7. Quit</h2>");
	print ("<input type=\"submit\" name=\"quit\" value=\"ok\">");
	print("<br>Admin card number is " . $choice);

}




?>