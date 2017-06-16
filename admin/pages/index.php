<?php session_start();
	include "config8298928293189.php"; 
	
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
	if(isset($_SESSION['myadmin']))	
	{
		$myclear = 'N';
	}
	else 
	{
		$myclear = 'Y';
	}

	if ($myclear == 'Y')
	{
		$_SESSION["ulid"] ='';
		$_SESSION["ulcode"] = '';
		$_SESSION["ulpass"] = '';
		$_SESSION["ulname"] = '';
		$_SESSION["ulpicture"] = '';
		
		$_SESSION["uladmin"] = '';
		
		$_SESSION["blid"] = '';
		$_SESSION["blname"] = '';
		$_SESSION["dltype"] = '';
		
		$_SESSION["plid"] = '';
		$_SESSION["plname"] = '';
		
		$_SESSION["ulactive"] = '';
		$_SESSION["uluser"] = '';
		$_SESSION["ulstamp"] = '';	
		
		$_SESSION['focus_blid'] = '';
		$_SESSION['focus_blname'] = '';		

		//ADMIN, ACCOUNTING, COMPUTER, MANAGER, MARKETING , SERVICE, 
		
		$_SESSION["myadmin"] = 'N';
		$_SESSION["myaccounting"] = 'N';
		$_SESSION["mycomputer"] = 'N';
		$_SESSION["mymanager"] = 'N';
		$_SESSION["mymarketing"] = 'N';
		$_SESSION["myservice"] = 'N';
				
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
			$_SESSION["coemail"] = $row_company[coemail];
		}			
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
	
	//need to be 10 characters only
	$my_hash_key_secret = 'vc';

	if ($upass != '')
	{
		$upass = $my_hash_key_secret . $upass;
		$upass = base64_encode ($upass);
	}

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
		//echo "<br> if empty go to admin page";
		if (($ucode == 'admin') && ($upass == 'admin'))
		{
			//echo "<br> Show admin page";
			$_SESSION["myadmin"] = 'Y';

			$_SESSION["ulid"] = 0;
			$_SESSION["ulcode"] = 'a';
			$_SESSION["ulpass"] = 'a';
			$_SESSION["ulname"] = 'ADMIN ACCOUNT';
		}
		else
		{
			//echo "<br> Message user admin account not found!";
		}	
	}
	else
	if (($ucode != '') && ($upass != ''))
	{
		//ADMIN, ACCOUNTING, COMPUTER, MANAGER, MARKETING , SERVICE, 
		
		$_SESSION["myadmin"] = 'N';
		$_SESSION["myaccounting"] = 'N';
		$_SESSION["mycomputer"] = 'N';
		$_SESSION["mymanager"] = 'N';
		$_SESSION["mymarketing"] = 'N';
		$_SESSION["myservice"] = 'N';
	
		$ucode = mysql_real_escape_string($ucode);
		$upass = mysql_real_escape_string($upass);

		$invalid_access = 'N';
	
		$query_user = " 
			SELECT 
				*
			FROM 
				branch_list a, user_list b,
				pos_list c
			WHERE 
				a.blid = b.blid and 
				b.plid = c.plid and 
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
			
			$_SESSION["uladmin"] = $row_user[uladmin];
			
			$_SESSION["blid"] = $row_user[blid];
			$_SESSION["blcode"] = $row_user[blcode];
			$_SESSION["blname"] = $row_user[blname];
			$_SESSION["blkey"] = $row_user[blkey];
			
			$_SESSION["plid"] = $row_user[plid];
			$_SESSION["plname"] = $row_user[plname];
			$_SESSION["pltype"] = $row_user[pltype];			
			
			$_SESSION["ulactive"] = $row_user[ulactive];
			$_SESSION["uluser"] = $row_user[uluser];
			$_SESSION["ulstamp"] = $globaldatetime;
			
			//ADMIN, ACCOUNTING, COMPUTER, MANAGER, MARKETING , SERVICE, 

$_SESSION["myadmin"] = 'Y';


			//$_SESSION['myblid'];
			//20170426
			//added again here
			//20170527
			$_SESSION['myblid'] = '';
			if ($row_user[uladmin] == 'Y')
			{
				$_SESSION['myblid'] = '';
			}
			else
			{
				$_SESSION['myblid'] = $row_user[blid];
			} 			

			if ($row_user[pltype] == 'ADMIN')
			{
				$_SESSION["myadmin"] = 'Y';
			}
			if ($row_user[pltype] == 'ACCOUNTING')
			{
				$_SESSION["myaccounting"] = 'Y';
			}
			if ($row_user[pltype] == 'COMPUTER')
			{
				$_SESSION["mycomputer"] = 'Y';
			}
			if ($row_user[pltype] == 'MANAGER')
			{
				$_SESSION["mymanager"] = 'Y';				
			}
			if ($row_user[pltype] == 'MARKETING')
			{
				$_SESSION["mymarketing"] = 'Y';
			}
			if ($row_user[pltype] == 'SERVICE')
			{
				$_SESSION["myservice"] = 'Y';
			}
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
			$_SESSION["coemail"] = $row_company[coemail];
		}			
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
		$_SESSION["coid"] = 0;
		$_SESSION["coname"] = 'Victoria Court Website Backend';
		$_SESSION["coaddr"] = '';
		$_SESSION["coemail"] = '';

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
?>			