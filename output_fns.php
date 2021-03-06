<?php

	function do_html_header($title) {

?> // Close php for some easier HTML outputting

	<html>
	<head>
		<title><?php echo $title;?></title>
		<style>
			body {
				font-family: "Tw Cen MT"; 
				font-size: 14px;
				color: #011A8E
			}
			li, td {
				font-family: "Tw Cen MT"; 
				font-size: 14px;
				color: #011A8E			
			}
			hr {
				color #3333cc; 
				width=300px; 
				text-align:left
			}
			a {
				color: #000000		
			}
		</style>
	</head>	
	<body>
	
	<h1>BugTracker</h1>
	<hr />
	<?php
		if ($title) {
			do_html_heading($title);		
		}
	}
		
	function do_html_footer() {
	  // print an HTML footer
	?>
	  </body>
	  </html>
	<?php
	}
	
	function do_html_heading($heading) {
	  // print heading
	?>
	  <h2><?php echo $heading;?></h2>
	<?php
	}

	function display_site_info() {	  
	?>
	  <ul>
	  <li>Keep your projects organized with BugTracker
	  </li>
	  </ul>
	<?php
	}
	
	function display_login_form() {
	?>
	
	<p>
	<a href="register_form.php">Not a member?</a>
	</p>
	<form method="post" action="member.php">
	<table bgcolor="#cccccc">
	<tr>
		<td colspan="2">Members log in here:</td>
	<tr>
		<td>Email Address:<td>
		<td><input type="text" name="email_adr"/>
		</td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="text" name="password"/>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
		<input type="submit" value="Log in"/>
		</td>
	</tr>
	<tr>
		<td colspan="2"><a href="forgot_form.php">Forgot your password?</a>
		</td>
	</tr>
	</table>
	</form>	
	<?php
}


	function display_registration_form() {
	?>
	 <form method="post" action="register_new.php">
	 <table bgcolor="#cccccc">
		<tr>
	     <td>Name:</td>
	     <td><input type="text" name="real_name" size="30" maxlength="100"/></td></tr>   
	    <tr>
		<tr>
	     <td>Email address:</td>
	     <td><input type="text" name="email" size="30" maxlength="100"/></td></tr>   
	   <tr>
	     <td>Password:</td>
	     <td valign="top"><input type="password" name="password"
	         size="16" maxlength="16"/></td></tr>
	   <tr>
	     <td>Confirm password:</td>
	     <td><input type="password" name="password2" size="16" maxlength="16"/></td></tr>
	   <tr>
	     <td colspan=2 align="center">
	     <input type="submit" value="Register"></td></tr>
	 </table></form>
	<?php

	}


	function display_user_bugs($bug_array) {
		
		// "set global variable, so we can test later if this is on the page"
		global $bug_table;
		$bug_table = true;
	?>
	
		<br />
		<form name="bug_table" action="delete_bugs.php" method="post">
		<table width="300" cellpadding="2" cellspacing="0">
	<?php
		$color = "#cccccc";
		echo "<tr bgcolor=\"".$color.
		"\"><td><strong>Bug</strong></td>";
		echo "<td><strong>Delete?</strong></td></tr>";
		
		if ((is_array($bug_array)) && (count($bug_array) > 0)) {
			foreach ($bug_array as $bug) {
				if ($color == "#cccccc") {
					$color = "#ffffff";
				}
				else {
					$color = "#cccccc";
				}
				
				echo "<tr bgcolor=\"".$color."\"><td>
					 $bug['title']/></td>
					 <td><input type=\"checkbox\" name=\"del_me[]\"
					 value=\"".$bug['title']."\"/></td>
					</tr>";
			}
		}
		else {
			echo "<tr><td>No Bugs yet, get programming.</td></tr>";
		}
	
	?>
		</table>
		</form>
	<?php	
	}
	
	function display_user_menu() {	
	?>
		<hr />
		<a href="member.php">Home</a> &nbsp;|&nbsp;
		<a href="add_bug_form.php">Add a Bug</a> &nbsp;|&nbsp;
	<?php
		//Only give delete option when bug table is displayed
		global $bug_table;
		if ($bug_table == true) {
			echo "<a href=\"#\" onClick=\"bug_table.submit();\">
			Delete Bug</a> &nbsp;|&nbsp;";		
		}
		else {
			echo "<span style=\"color: #cccccc\">Delete Bug
			</span> &nbsp;|&nbsp;";
		}
	?>
		<a href="change_password_form.php">Change password</a>
		<br />
		<hr />
		<a href="logout.php">Logout</a>
		<hr />
	<?php	
	
	}
	
	function display_add_bug_form() {
	?>
		
		<br />
		<form action="change_password.php" method="post">
		<table width="250" cellpadding="2" cellspacing="0" 
		bgcolor="#cccccc">
		<tr><td>Bug Title:</td>
		<td><input type="text" name="title" value="Title here.."
				size="40" maxlength="40"/></td></tr>
		<tr><td>Description:</td>
		<td><input type="text" name="description" value="What's wrong.."
				size="80" maxlength="400"/></td></tr>
		<tr><td>Project</td>
		<td><input type="text" name="project" 
				size="30" maxlength="30"/></td></tr>
		<tr><td>Project Version:</td>
		<td><input type="text" name="project_version" 
				size="8" maxlength="8"/></td></tr>
		<tr><td colspan="2" align="center">
			<input type="submit" value="Add Bug"/></td></tr>
		</table>
		</form>
	<?php			
	}
		
		
	function display_password_form() {
	  // display html change password form
	?>
	   <br />
	   <form action="change_password.php" method="post">
	   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
	   <tr><td>Old password:</td>
	       <td><input type="password" name="old_password"
	            size="16" maxlength="16"/></td>
	   </tr>
	   <tr><td>New password:</td>
	       <td><input type="password" name="new_password"
	            size="16" maxlength="16"/></td>
	   </tr>
	   <tr><td>Repeat new password:</td>
	       <td><input type="password" name="new_password2"
	            size="16" maxlength="16"/></td>
	   </tr>
	   <tr><td colspan="2" align="center">
	       <input type="submit" value="Change password"/>
	   </td></tr>
	   </table>
	   <br />
	<?php
	}


	function display_forgot_form() {
	  // display HTML form to reset and email password
	?>
	   <br />
	   <form action="forgot_password.php" method="post">
	   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
	   <tr><td>Enter your email address:</td>
	       <td><input type="text" name="email_adr" size="16" maxlength="16"/></td>
	   </tr>
	   <tr><td colspan=2 align="center">
	       <input type="submit" value="Change password"/>
	   </td></tr>
	   </table>
	   <br />

	}


