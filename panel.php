<?php
require 'core.inc.php';
require "conn.inc.php";
echo 'welcome>>>';

    $wel='You\'re are Logged in as';
    echo $wel.$_SESSION['user_id'];
	echo '&nbsp'.'&nbsp';
	echo '<input type="button" style="width:150px;height:30px"  value="Click here to Logout" onclick="window.location =\'logout.php\'" />';
	

?>
<html>
<title> Student </title>
<header>
<style>
html
{ height: 100%;}

*
{ margin: 0;
  padding: 0;}

body
{ 
  color: #000;
  text-shadow: 2px 2px #FFF;
  background: transparent url(background.jpg) repeat;}
</style>
</header>
<body bgcolor="pink">
<br><br><br><br><br><br><br><br>
<center>
<table border="20" height="100" width="100" cellspacing="10" cellpadding="10" bordercolor='#21DBD9' bgcolor='#E5F4F4'>
<TR>
<TD>
<center><input type="button" style="height:50px;width:200px" value="Pay Registration Fee" onclick="window.location ='   '">
</TD>
<TD>
<center><input type="button" style="height:50px;width:200px" value="Register" onclick="window.location ='register.php'">
</TD>

<tr>
</table>
</body>
</html>
