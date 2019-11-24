<?php


function login($scriptToActivate) {
   static $sessionId = 0; //initialize once - the first time the function is invoked 
	print ("<form action=\"$scriptToActivate\" method=\"post\">");
	print("Library Card Number:");
	print("<input type=\"text\" name=\"card_no\" value=\"\"><br>");
	print ("<input type=\"submit\" name=\"login\" value=\"Submit\">");
	

	/*print("Password:");
	print("<input type=\"password\" name=\"password\" value=\"\" /><br>");

	print ("<input type=\"submit\" name=\"login\" value=\"Submit\">");


}*/
}
?>
