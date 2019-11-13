<!-- Executing welcome.php<br>
-->
<html>
<h1>Welcome to Shelfish</h1>
</html>

<?php

include_once("login.php");

print("<u>Enter username and password below<br></u>");
//invoke the login function defined in login.php
login("databaseApp.php");


?>
