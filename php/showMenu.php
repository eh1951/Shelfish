<?php


function showMenu() {

     print ("<h3>Type in your user id</h3><br>");
     
     //target="_blank" causes search results to be displayed in new window 
     print ("<form action=\"mainMenu.php\" target=\"_blank\" method=\"post\">");

     print("<input type=\"text\" name=\"choice\" value=\"\" /><br>");
     print ("<input type=\"submit\" name=\"submit\" value=\"submit\">"); 
     
}
?>
