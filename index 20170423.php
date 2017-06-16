<?php session_start();

	$body_filename = "home";
	if ($_GET['body'])
	{
		$body_filename = $_GET['body'];
	}	
	//echo '<br> body_filename : ' . $body_filename;
	
	if ($body_file == 'home')
	{
		//20170409
		//generate a new sessionID if you reach the home page
		session_regenerate_id(true);
	
		//if the user has already selected a previous entry
		//we need to bring him back there
		$_SESSION['nearest_branch'] = '';
		$_SESSION['select_branch'] = '';
		$_SESSION['check_in'] = '';
		$_SESSION['check_out'] = '';
		$_SESSION['check_in_time'] = '';	
		$_SESSION['nearest_branch'] = '';	
		$_SESSION['hours_of_stay'] = '';	
	
		$_SESSION['view_rooms'] = '';	
		$_SESSION['adults_count'] = '';	
		$_SESSION['kids_count'] = '';	
	
		$_SESSION['chosen_room'] = '';	
		$_SESSION['fname'] = '';	
		$_SESSION['lname'] = '';	
		$_SESSION['email'] = '';	
		$_SESSION['re_email'] = '';	
		$_SESSION['contact'] = '';	
		$_SESSION['promo_code'] = '';	
		
		$_SESSION['food_serving_time'] = '';
		$_SESSION['food_serving_checkin_time'] = '';
	
		$_SESSION['addon1_qty'] = 0;	
		$_SESSION['addon2_qty'] = 0;	
		$_SESSION['addon3_qty'] = 0;	
		$_SESSION['addon4_qty'] = 0;	
		$_SESSION['addon5_qty'] = 0;	
		$_SESSION['addon6_qty'] = 0;	
		$_SESSION['addon7_qty'] = 0;	
		$_SESSION['addon8_qty'] = 0;	
		$_SESSION['addon9_qty'] = 0;	
		$_SESSION['addon10_qty'] = 0;	
		
	
		$_SESSION['addon11_qty'] = 0;	
		$_SESSION['addon12_qty'] = 0;	
		$_SESSION['addon13_qty'] = 0;	
		$_SESSION['addon14_qty'] = 0;	
		$_SESSION['addon15_qty'] = 0;	
		$_SESSION['addon16_qty'] = 0;	
		$_SESSION['addon17_qty'] = 0;	
		$_SESSION['addon18_qty'] = 0;	
		$_SESSION['addon19_qty'] = 0;	
		$_SESSION['addon20_qty'] = 0;	
		
		$_SESSION['addon21_qty'] = 0;	
		$_SESSION['addon22_qty'] = 0;	
		$_SESSION['addon23_qty'] = 0;	
		$_SESSION['addon24_qty'] = 0;	
		$_SESSION['addon25_qty'] = 0;	
		$_SESSION['addon26_qty'] = 0;	
		$_SESSION['addon27_qty'] = 0;	
		$_SESSION['addon28_qty'] = 0;	
		$_SESSION['addon29_qty'] = 0;	
		$_SESSION['addon30_qty'] = 0;	
		
	
		$_SESSION['food1_qty'] = 0;	
		$_SESSION['food2_qty'] = 0;	
		$_SESSION['food3_qty'] = 0;	
		$_SESSION['food4_qty'] = 0;	
		$_SESSION['food5_qty'] = 0;	
		$_SESSION['food6_qty'] = 0;	
		$_SESSION['food7_qty'] = 0;	
		$_SESSION['food8_qty'] = 0;	
		$_SESSION['food9_qty'] = 0;	
		$_SESSION['food10_qty'] = 0;	
		
	
		$_SESSION['food11_qty'] = 0;	
		$_SESSION['food12_qty'] = 0;	
		$_SESSION['food13_qty'] = 0;	
		$_SESSION['food14_qty'] = 0;	
		$_SESSION['food15_qty'] = 0;	
		$_SESSION['food16_qty'] = 0;	
		$_SESSION['food17_qty'] = 0;	
		$_SESSION['food18_qty'] = 0;	
		$_SESSION['food19_qty'] = 0;	
		$_SESSION['food20_qty'] = 0;	
		
		$_SESSION['food21_qty'] = 0;	
		$_SESSION['food22_qty'] = 0;	
		$_SESSION['food23_qty'] = 0;	
		$_SESSION['food24_qty'] = 0;	
		$_SESSION['food25_qty'] = 0;	
		$_SESSION['food26_qty'] = 0;	
		$_SESSION['food27_qty'] = 0;	
		$_SESSION['food28_qty'] = 0;	
		$_SESSION['food29_qty'] = 0;	
		$_SESSION['food30_qty'] = 0;		
	
	
	
	
		$tlid= '';		
		$tldocno= '';		
		$tlsession= '';		
		
		$nearest_branch= '';
		$select_branch= '';
		$check_in= '';
		$check_out= '';
		$check_in_time= '';	
		$nearest_branch= '';	
		$hours_of_stay= '';	
	
		$view_rooms= '';	
		$adults_count= '';	
		$kids_count= '';	
	
		$chosen_room= '';	
		$fname= '';	
		$lname= '';	
		$email= '';	
		$re_email= '';	
		$contact= '';	
		$promo_code= '';	
		
		$food_serving_time= '';
		$food_serving_checkin_time= '';
	
		$addon1_qty= 0;	
		$addon2_qty= 0;	
		$addon3_qty= 0;	
		$addon4_qty= 0;	
		$addon5_qty= 0;	
		$addon6_qty= 0;	
		$addon7_qty= 0;	
		$addon8_qty= 0;	
		$addon9_qty= 0;	
		$addon10_qty= 0;	
		
	
		$addon11_qty= 0;	
		$addon12_qty= 0;	
		$addon13_qty= 0;	
		$addon14_qty= 0;	
		$addon15_qty= 0;	
		$addon16_qty= 0;	
		$addon17_qty= 0;	
		$addon18_qty= 0;	
		$addon19_qty= 0;	
		$addon20_qty= 0;	
		
		$addon21_qty= 0;	
		$addon22_qty= 0;	
		$addon23_qty= 0;	
		$addon24_qty= 0;	
		$addon25_qty= 0;	
		$addon26_qty= 0;	
		$addon27_qty= 0;	
		$addon28_qty= 0;	
		$addon29_qty= 0;	
		$addon30_qty= 0;	
		
	
		$food1_qty= 0;	
		$food2_qty= 0;	
		$food3_qty= 0;	
		$food4_qty= 0;	
		$food5_qty= 0;	
		$food6_qty= 0;	
		$food7_qty= 0;	
		$food8_qty= 0;	
		$food9_qty= 0;	
		$food10_qty= 0;	
		
	
		$food11_qty= 0;	
		$food12_qty= 0;	
		$food13_qty= 0;	
		$food14_qty= 0;	
		$food15_qty= 0;	
		$food16_qty= 0;	
		$food17_qty= 0;	
		$food18_qty= 0;	
		$food19_qty= 0;	
		$food20_qty= 0;	
		
		$food21_qty= 0;	
		$food22_qty= 0;	
		$food23_qty= 0;	
		$food24_qty= 0;	
		$food25_qty= 0;	
		$food26_qty= 0;	
		$food27_qty= 0;	
		$food28_qty= 0;	
		$food29_qty= 0;	
		$food30_qty= 0;		
	
	
		$tlid= '';		
		$tldocno= '';		
		$tlsession= '';		
	}			

	include "config8298928293189.php"; 
	
	$link = mysql_connect("$dbhost", "$dbuser", "$dbpassword")or die("cannot connect to server ");
	@mysql_select_db("$dbdatabase")or die("Unable to select database.");


	$comarketing = 'Y';
	$query_coid = " 
		SELECT *
		FROM company_list ";
	$result_coid = mysql_query($query_coid);
	echo mysql_error();				
	while ($row_coid =  mysql_fetch_array ($result_coid)) 
	{
		$coid = $row_coid[coid];
		$coname = $row_coid[coname];
		$coaddr = $row_coid[coaddr];
		$cophone = $row_coid[cophone];
		$cofax = $row_coid[cofax];
		$coemail = $row_coid[coemail];
		$comobile = $row_coid[comobile];
		$cowebsite = $row_coid[cowebsite];
		
		$cofacebook = $row_coid[cofacebook];
		$cotwitter = $row_coid[cotwitter];
		$coinstagram = $row_coid[coinstagram];
		$coyoutube = $row_coid[coyoutube];
		
		$comarketing = $row_coid[comarketing];
		
		$coactive = $row_coid[coactive];
		$couser = $row_coid[couser];
		$costamp = $row_coid[costamp];
	}				 
	mysql_query($query_coid) or die('Error, insert query failed');  
	//echo "<br> comarketing *** " . $comarketing . " ***";
	if ($comarketing == '')
	{
		$comarketing = 'Y';
	}
	
	$body_filename = "home";
	if ($_GET['body'])
	{
		$body_filename = $_GET['body'];
	}	
	//echo '<br> body_filename : ' . $body_filename;
	
    $body_file = "body_" . $body_filename . ".php";

	//echo '<br> body_file : ' . $body_file;

	//echo 'basename ' . basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
	//$myfile = basename($_SERVER['PHP_SELF']);

	if ($body_filename == 'home') { $body_title = 'Home Page'; }
	if ($body_filename == 'about') { $body_title = 'About Us'; }
	if ($body_filename == 'contact') { $body_title = 'Contact'; }
	if ($body_filename == 'careers') { $body_title = 'Careers'; }
	if ($body_filename == 'gallery') { $body_title = 'Gallery'; }
	if ($body_filename == 'menu') { $body_title = 'Menu'; }
	if ($body_filename == 'menu-catalog') { $body_title = 'Menu-Catalog'; }

	if ($body_filename == 'payment') { $body_title = 'Payment'; }
	if ($body_filename == 'promotions') { $body_title = 'Promotions'; }
	if ($body_filename == 'room-booking') { $body_title = 'Room Booking'; }
	if ($body_filename == 'room-selection') { $body_title = 'Room Selection'; }
	if ($body_filename == 'room-confirmation') { $body_title = 'Room Confirmation'; }

	if ($body_filename == 'paypal_cancel') { $body_title = 'Payment Cancellation'; }
	if ($body_filename == 'paypal_return') { $body_title = 'Payment Confirmation'; }
	if ($body_filename == 'paypal_notify') { $body_title = 'Payment Notification'; }


	$plid = '';	
	if(isset($_GET['plid']))
	{
		if ($_GET['plid'])
		{
			$plid = $_GET['plid'];
		}
	}
	//echo '<br> plid : ' . $plid;
	
	$plname = '';	
	if(isset($_GET['plname']))
	{
		if ($_GET['plname'])
		{
			$plname = $_GET['plname'];
		}
	}
	//echo '<br> plname : ' . $plname;
	
	if (($plid != '') && ($plname != ''))
	{
		$body_title = $plname; 
	}


	if (file_exists($body_file)) 
	{
		//echo "<br> FOUND body_file " . $body_file;
	} 
	else 
	{
		//echo "<br> NOT FOUND - body_file " . $body_file;
		$body_title = 'Page Not Found'; 
	}		

	include "header.php"; 
	
	if (file_exists($body_file)) 
	{
		include($body_file);
	} 
	else 
	{
		include("body_under_construction.php");
	}		

	include "footer.php"; 

	mysql_close($link);		
?>