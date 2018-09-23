<?php
require 'conn.inc.php';
require 'core.inc.php';

if (
isset($_POST['1code']) && isset($_POST['1name']) && isset($_POST['1c']) && 
isset($_POST['2code']) && isset($_POST['2name']) && isset($_POST['2c']) && 
isset($_POST['3code']) && isset($_POST['3name']) && isset($_POST['3c']) && 
isset($_POST['4code']) && isset($_POST['4name']) && isset($_POST['4c']) &&
isset($_POST['name']) && isset($_POST['email']) && isset($_POST['roll']) && isset($_POST['branch']) && isset($_POST['sem']) && isset($_POST['year']) && isset($_POST['roleid']) && isset($_POST['sgpa']) && isset($_POST['backlog']) && isset($_POST['refid']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$roll = $_POST['roll'];
		$branch = $_POST['branch'];
		$sem = $_POST['sem'];
		$year = $_POST['year'];
		$roleid = $_POST['roleid'];
		$sgpa = $_POST['sgpa'];
		$backlog = $_POST['backlog'];
		$refid = $_POST['refid'];
		
		$code1 = $_POST['1code'];
		$code2 = $_POST['2code'];
		$code3 = $_POST['3code'];
		$code4 = $_POST['4code'];
		$name1 = $_POST['1name'];
		$name2 = $_POST['2name'];
		$name3 = $_POST['3name'];
		$name4 = $_POST['4name'];
		$c1 = $_POST['1c'];
		$c2 = $_POST['2c'];
		$c3 = $_POST['3c'];
		$c4 = $_POST['4c'];
		$i='1';
		
		if(!empty($name) && !empty($email) && !empty($roll) && !empty($branch) && !empty($sem) && !empty($year) && !empty($roleid) && !empty($sgpa) && !empty($backlog) && !empty($refid))
		{
				$query = "SELECT `roll` FROM `register` WHERE `roll`= '$roll'";		//Checking Unique Username
				$query_run=mysql_query($query);
				if (mysql_num_rows($query_run)==1)												//If Any Rows Found... Can Be Greater Than 1 Also If Looking In Other Rows Also 
				{
					?>
					<label id="lb" > ** This Roll Number <?php echo $rollno ?> Already Exist </label>
					<?php
				}
				else																			//If No Rows Match i.e., Username Already Not Exists
				{
					$query= "INSERT INTO `register` VALUES ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($roll)."','".mysql_real_escape_string($branch)."','".mysql_real_escape_string($sem)."','".mysql_real_escape_string($year)."','".mysql_real_escape_string($roleid)."','".mysql_real_escape_string($sgpa)."','".mysql_real_escape_string($backlog)."','".mysql_real_escape_string($refid)."')";   //Inserting The Values In Database Using mysql real escape string function for security purpose
					if ($query_run= mysql_query($query))
					{
						if(!empty($name1) && !empty($name2) && !empty($name3) && !empty($code1) && !empty($code2) && !empty($code3) && !empty($c1) && !empty($c2) && !empty($c3))
						{
							//for($i=1;$i<5;$i++)
							
								$query= "INSERT INTO `sub` VALUES ('".mysql_real_escape_string($roll)."','".mysql_real_escape_string($name1)."','".mysql_real_escape_string($code1)."','".mysql_real_escape_string($c1)."')";   //Inserting The Values In Database Using mysql real escape string function for security purpose
								$query1= "INSERT INTO `sub` VALUES ('".mysql_real_escape_string($roll)."','".mysql_real_escape_string($name2)."','".mysql_real_escape_string($code2)."','".mysql_real_escape_string($c2)."')";   //Inserting The Values In Database Using mysql real escape string function for security purpose
								$query2= "INSERT INTO `sub` VALUES ('".mysql_real_escape_string($roll)."','".mysql_real_escape_string($name3)."','".mysql_real_escape_string($code3)."','".mysql_real_escape_string($c3)."')";   //Inserting The Values In Database Using mysql real escape string function for security purpose
								$query3= "INSERT INTO `sub` VALUES ('".mysql_real_escape_string($roll)."','".mysql_real_escape_string($name4)."','".mysql_real_escape_string($code4)."','".mysql_real_escape_string($c4)."')";   //Inserting The Values In Database Using mysql real escape string function for security purpose
							
							if ($query_run= mysql_query($query) && $query_run1= mysql_query($query1) && $query_run2= mysql_query($query2) && $query_run3= mysql_query($query3))
							{
								?>
								<label id="lb"> Thank You For Registration. <a href="status.php?roll=$roll1"><<Registration_status.</a></label>
								<?php		//Registered
							}
							else
							{
								?>
								<label id="lb" > ** Sorry! Couldn't Register At This Time. Try Again Later. </label>
								<?php	//Can't Register
							}
						}
						else
							{
								?>																				<!-- Rule To Remember -->
							<label id="lb" > ** Fill All The Fields </label> 									<!-- Follow css File Which Is Reffered Below -->
							<?php
							}
					}
				}
		}
	}
	
	echo '<input type="button" style="width:150px;height:30px"  value="Logout" onclick="window.location =\'logout.php\'" /><a href="status.php">Registration Status</a>';
	
?>	




<html>
<head>
<style>


body
{ 
 
  background: transparent url(background.jpg) repeat;}
</style>
</head>
<title>Register</title>
<body bgcolor="pink">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
   <td width="10%"  > 
   
      &nbsp;</td>
   <td width="90%"  > 
   
      <div align="left">
   
      <table border="0" cellpadding="0" cellspacing="0" width="100%" bordercolor="#E5E5E5" style="border-collapse: collapse">
        <form method="POST" name="frm" action="" onsubmit="return chk()">       

  <tr> 
              
            <td width="90%" class="normal"  height="22" colspan="2" align="center">
            <h1>Registration Form<h1></td>
          </tr>
              <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10"  > </td>
          </tr>
		 <tr> 
          <tr> 
              
            <td width="50%"  class="text-normalw"  height="22" align="left">&nbsp;&nbsp;&nbsp; 
            Name* </td>
            <td width="50%"   class="text-normalw"  height="22">&nbsp;<input type="text" name="name" size="34"  class="text-normalw"></td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="10"   ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10" ></td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="22" align="left" >&nbsp;&nbsp;&nbsp; 
            Email*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22" >&nbsp;<input type="text" name="email" size="34"  class="text-normalw"></td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="10"></td>
            <td width="55%" valign="top"  class="text-normalw"  height="10"></td>
          </tr>
            <tr> 
            <td width="27%"  class="text-normalw" height="22" align="left">&nbsp;&nbsp;&nbsp; 
            Roll Number*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22" >&nbsp;<input type="text" name="roll" size="34"  class="text-normalw"></td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="10"></td>
            <td width="55%" valign="top"  class="text-normalw"  height="10"></td>
          </tr>
         <tr> 
            <td width="27%"  class="text-normalw" height="22" align="left"  >&nbsp;&nbsp;&nbsp; 
            Branch*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22" >&nbsp;<select name="branch" size="1">
                 <option value="-1">Select</option>
                 <option value="cse">CSE</option>
                 <option value="eee">EEE</option>
				 <option value="ece">ECE</option>
                 <option value="me">ME</option>
               </select> </td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="10"></td>
            <td width="55%" valign="top"  class="text-normalw"  height="10"></td>
          </tr>
 
          <tr> 
            <td width="27%"  class="text-normalw" height="22" align="left"  >&nbsp;&nbsp;&nbsp; 
            Semester*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22" >&nbsp;<input type="text" name="sem" size="34"  class="text-normalw"></td>
          </tr>
          
         
          
          <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10"  > </td>
          </tr>
           <tr> 
            <td width="27%"  class="text-normalw" height="22" align="left" >&nbsp;&nbsp;&nbsp; Year*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22"  > &nbsp;<input type="text" name="year" size="34"  class="text-normalw"></td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="dropdown" height="10"  > </td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="22"  >&nbsp;&nbsp;&nbsp; User_Role_Id*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22"  > &nbsp;<input type="text" name="roleid" size="34"  class="text-normalw"></td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10"  > </td>
          </tr>

          <tr> 
            <td width="27%"  class="text-normalw" height="22"  >&nbsp;&nbsp;&nbsp; sgpa*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22"  > &nbsp;<input type="text" name="sgpa" size="34"  class="text-normalw"></td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10"  > </td>
          </tr>
           
          <tr> 
            <td width="27%"  class="text-normalw" height="22"  >&nbsp;&nbsp;&nbsp; 
            backlog*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22"  > &nbsp;<select size="1" name="backlog">
             <option>Select</option>
             <option value="yes">Yes</option>
             <option value="no">No</option>
           
            </select></td>
			<!--<td width="55%" valign="top"  class="text-normalw" height="22"  > &nbsp;<input type="text" name="backlog_details" size="34" value="{backlog_details}" class="text-normalw"></td>-->
          </tr>
		  <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10"  > </td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="22"  >&nbsp;&nbsp;&nbsp; pay_ref_id*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22"  > &nbsp;<input type="text" name="refid" size="34"  class="text-normalw"></td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10"  > </td>
          </tr>
		  <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10"  > </td>
          </tr>
		  <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10"  > </td>
          </tr>
		   <!--<tr> 
            <td width="27%"  class="text-normalw" height="22"  >&nbsp;&nbsp;&nbsp; Date*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22"  > &nbsp;<input type="text" name="date" size="34"  class="text-normalw"></td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10"  > </td>
          </tr>
		 <tr> 
            <td width="27%"  class="text-normalw" height="22"  >&nbsp;&nbsp;&nbsp; 
            Designation*</td>
            <td width="55%" valign="top"  class="text-normalw" height="22"  > &nbsp;<input type="text" name="user_designation" size="34"  class="text-normalw"></td>
          </tr>
          <tr> 
            <td width="27%"  class="text-normalw" height="10"  ></td>
            <td width="55%" valign="top"  class="text-normalw" height="10"  > </td>
          </tr>
		 <tr> -->
		<tr> 
          
          <table border="2">
          <tr>
          <th>Sl No</th>
          <th>Subject Code</th>
          <th>Subject Name</th>
          <th>Credits</th>
          </tr>

          <tr>
          <td>1.</td>
          <td><input type="text" name="1code" size="10" /></td>
          <td><input type="text" name="1name" size="20" /></td>
          <td><input type="text" name="1c" size="3" /></td>
          </tr>

          <tr>
          <td>2.</td>
          <td><input type="text" name="2code" size="10" /></td>
          <td><input type="text" name="2name" size="20" /></td>
          <td><input type="text" name="2c" size="3" /></td>
          </tr>

          <tr>
          <td>3.</td>
          <td><input type="text" name="3code" size="10" /></td>
          <td><input type="text" name="3name" size="20" /></td>
          <td><input type="text" name="3c" size="3" /></td>
          </tr>

          <tr>
          <td>4.</td>
          <td><input type="text" name="4code" size="10" /></td>
          <td><input type="text" name="4name" size="20" /></td>
          <td><input type="text" name="4c" size="3" /></td>
          </tr>

          <!--<tr>
          <td>Total Credits.</td>
          <td><input type="text" name="total_credits" size="10" /></td>
          </tr>-->
          </table>
          
 

         
          <tr align="center"> 
            <td colspan="2" height="26" > 
              <input type="submit" value="Submit" class="normal"></td>
          </tr>
        
          </form>
      </table>
  </table>