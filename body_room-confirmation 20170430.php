<?php 
	$nearest_branch = '';	
	if(isset($_POST['nearest_branch']))
	{
		if ($_POST['nearest_branch'])
		{
			$nearest_branch = $_POST['nearest_branch'];
		 	$_SESSION['nearest_branch'] = $nearest_branch;
		}
	}

	$select_branch = '';	
	if(isset($_POST['select_branch']))
	{
		if ($_POST['select_branch'])
		{
			$select_branch = $_POST['select_branch'];
		 	$_SESSION['select_branch'] = $select_branch;
		}
	}

	$check_in = '';	
	if(isset($_POST['check_in']))
	{
		if ($_POST['check_in'])
		{
			$check_in = $_POST['check_in'];
		 	$_SESSION['check_in'] = $check_in;
		}
	}

	$check_out = '';	
	if(isset($_POST['check_out']))
	{
		if ($_POST['check_out'])
		{
			$check_out = $_POST['check_out'];
		 	$_SESSION['check_out'] = $check_out;
		}
	}			

	$check_in_time = '';	
	if(isset($_POST['check_in_time']))
	{
		if ($_POST['check_in_time'])
		{
			$check_in_time = $_POST['check_in_time'];
		 	$_SESSION['check_in_time'] = $check_in_time;
		}
	}		
	
	$hours_of_stay = '';	
	if(isset($_POST['hours_of_stay']))
	{
		if ($_POST['hours_of_stay'])
		{
			$hours_of_stay = $_POST['hours_of_stay'];
		 	$_SESSION['hours_of_stay'] = $hours_of_stay;
		}
	}	

	$view_rooms = '';	
	if(isset($_POST['view_rooms']))
	{
		if ($_POST['view_rooms'])
		{
			$view_rooms = $_POST['view_rooms'];
		 	$_SESSION['view_rooms'] = $view_rooms;
		}
	}	
	
	$adults_count = 'Adults';	
	if(isset($_POST['adults_count']))
	{
		if ($_POST['adults_count'])
		{
			$adults_count = $_POST['adults_count'];
		 	$_SESSION['adults_count'] = $adults_count;
		}
	}	
	$kids_count = 'Kids';	
	if(isset($_POST['kids_count']))
	{
		if ($_POST['kids_count'])
		{
			$kids_count = $_POST['kids_count'];
		 	$_SESSION['kids_count'] = $kids_count;
		}
	}	

	$fname = '';	
	if(isset($_POST['fname']))
	{
		if ($_POST['fname'])
		{
			$fname = $_POST['fname'];
		 	$_SESSION['fname'] = $fname;
		}
	}						

	$lname = '';	
	if(isset($_POST['lname']))
	{
		if ($_POST['lname'])
		{
			$lname = $_POST['lname'];
		 	$_SESSION['lname'] = $lname;
		}
	}	
	
	$email = '';	
	if(isset($_POST['email']))
	{
		if ($_POST['email'])
		{
			$email = $_POST['email'];
		 	$_SESSION['email'] = $email;
		}
	}						

	$re_email = '';	
	if(isset($_POST['re_email']))
	{
		if ($_POST['re_email'])
		{
			$re_email = $_POST['re_email'];
		 	$_SESSION['re_email'] = $re_email;
		}
	}		
	
	$contact = '';	
	if(isset($_POST['contact']))
	{
		if ($_POST['contact'])
		{
			$contact = $_POST['contact'];
		 	$_SESSION['contact'] = $contact;
		}
	}						

	$promo_code = '';	
	if(isset($_POST['promo_code']))
	{
		if ($_POST['promo_code'])
		{
			$promo_code = $_POST['promo_code'];
		 	$_SESSION['promo_code'] = $promo_code;
		}
	}	
	

										
    ///////////////////////////////// food1 corner /////////////////////////////////
	$food_serving_checkin_time = '';	
	if(isset($_POST['food_serving_checkin_time']))
	{
		if ($_POST['food_serving_checkin_time'])
		{
			$food_serving_checkin_time = $_POST['food_serving_checkin_time'];
		 	$_SESSION['food_serving_checkin_time'] = $food_serving_checkin_time;
		}
	}
	
	$food_serving_time = '';	
	if(isset($_POST['food_serving_time']))
	{
		if ($_POST['food_serving_time'])
		{
			$food_serving_time = $_POST['food_serving_time'];
		 	$_SESSION['food_serving_time'] = $food_serving_time;
		}
	}	
 ?>
    <nav class="navbar custom-navbar2">
        <div class="container">
            <div class="navbar-header">
                <div class="nav-holder">
                    <div class="back-link">
                        <h3><a href="index.php?body=room-booking" ><span class="fa fa-angle-left"></span> <span class="text">Back</span></a></h3>
                    </div>
                    <div class="head-title">
<?php
	//echo '<br> myparam : ' . $myparam;
							
		
	/*
	echo '<br> nearest_branch : ' . $nearest_branch;
	echo '<br> select_branch : ' . $select_branch;
	echo '<br> check_in : ' . $check_in;
	echo '<br> check_out : ' . $check_out;
	echo '<br> check_in_time : ' . $check_in_time;
	echo '<br> view_rooms : ' . $view_rooms;
 	
	//save the settings after post
 	$_SESSION['nearest_branch'] = $nearest_branch;
 	$_SESSION['select_branch'] = $select_branch;
 	$_SESSION['check_in'] = $check_in;
 	$_SESSION['check_out'] = $check_out;
 	$_SESSION['check_in_time'] = $check_in_time;
 	$_SESSION['view_rooms'] = $view_rooms;
	
 	*/

 	if ($_SESSION['nearest_branch'] != '')
 	$nearest_branch = $_SESSION['nearest_branch'];
 	if ($_SESSION['select_branch'] != '')
 	$select_branch = $_SESSION['select_branch'];
 	if ($_SESSION['check_in'] != '')
 	$check_in = $_SESSION['check_in'];
 	if ($_SESSION['check_out'] != '')
 	$check_out = $_SESSION['check_out'];
 	if ($_SESSION['check_in_time'] != '')
 	$check_in_time = $_SESSION['check_in_time'];
 	if ($_SESSION['hours_of_stay'] != '')
 	$hours_of_stay = $_SESSION['hours_of_stay'];
 	if ($_SESSION['view_rooms'] != '')
 	$view_rooms = $_SESSION['view_rooms'];
 
 	if ($_SESSION['adults_count'] != '')
 	$adults_count = $_SESSION['adults_count'];
 	if ($_SESSION['kids_count'] != '')
 	$kids_count = $_SESSION['kids_count'];
	
	if ($_SESSION['chosen_room'] != '')
 	$chosen_room = $_SESSION['chosen_room'];
	
	if ($_SESSION['proceed_to_confirmation'] != '')
 	$proceed_to_confirmation = $_SESSION['proceed_to_confirmation'];
 
 
	if ($_SESSION['fname'] != '')
 	$fname = $_SESSION['fname'];
	
	if ($_SESSION['lname'] != '')
 	$lname = $_SESSION['lname'];
	
	if ($_SESSION['email'] != '')
 	$email = $_SESSION['email'];
	
	if ($_SESSION['re_email'] != '')
 	$re_email = $_SESSION['re_email'];
	
	if ($_SESSION['contact'] != '')
 	$contact = $_SESSION['contact'];
	
	if ($_SESSION['promo_code'] != '')
 	$promo_code = $_SESSION['promo_code'];

	$plid = 0;
	$plcode = '';
	$plname = '';
	$promo_valid = '';
	$_SESSION['promo_valid'] = '';

	$_SESSION['promo_all'] = 0;
	$_SESSION['promo_food'] = 0;
	$_SESSION['promo_room'] = 0;
	$_SESSION['promo_addon'] = 0;
	if ($promo_code != '')
	{
		//verify promo code
		$query_promolist = " 
			SELECT 
				*
			FROM 
				promotion_list b
			WHERE 
				b.plcode = '$promo_code' and
				b.plfrom <= '$globaldate' and
				b.plto >= '$globaldate' ";
		$result_promolist = mysql_query($query_promolist);
		//echo "<br> query_promolist " . $query_promolist;				
		//echo "<br> globaldate " . $globaldate;				
		//echo "<br> promo_code " . $promo_code;				
		echo mysql_error();				
		while ($row_promolist =  mysql_fetch_array ($result_promolist)) 
		{
			$promo_valid = 'VALID';
			$plid = $row_promolist['plid'];
			$plcode = $row_promolist['plcode'];
			$plname= $row_promolist['plname'];
			
			$_SESSION['promo_valid'] = 'VALID';

			if ($row_promolist['pltype'] == 'ROOM') 
			{
				$_SESSION['promo_room'] = $row_promolist['plidscount'];
			}
			if ($row_promolist['pltype'] == 'FOOD') 
			{
				$_SESSION['promo_food'] = $row_promolist['plidscount'];
			}
			if ($row_promolist['pltype'] == 'ADDON') 
			{
				$_SESSION['promo_addon'] = $row_promolist['plidscount'];
			}
			if ($row_promolist['pltype'] == 'ALL') 
			{
				$_SESSION['promo_all'] = $row_promolist['plidscount'];
			}
		}			
	
		if ($promo_valid == '')
		{
			$_SESSION['promo_valid'] = 'INVALID';
		}
	}
		

 	if ($_SESSION['food_serving_checkin_time'] != '')
	 	$food_serving_checkin_time = $_SESSION['food_serving_checkin_time'];
 
 	if ($_SESSION['food_serving_time'] != '')
 		$food_serving_time = $_SESSION['food_serving_time']; 
                                                      
 
/*
echo "<br> tlid " . $tlid;
echo "<br> tldocno " . $tldocno;
echo "<br> tlfood " . $tlfood;
echo "<br> tladdon " . $tladdon;
echo "<br> tlsession " . $tlsession;
	
echo '<br> check_in : ' . $check_in;
echo '<br> check_in : ' . $check_in;

echo '<br> check_out : ' . $check_out;
echo '<br> check_out : ' . $check_out;

echo '<br> nearest_branch : ' . $nearest_branch;
echo '<br> select_branch : ' . $select_branch;
echo '<br> check_in_time : ' . $check_in_time;
echo '<br> view_rooms : ' . $view_rooms;

echo '<br> adults_count : ' . $adults_count;
echo '<br> kids_count : ' . $kids_count;

echo '<br> party_rooms : ' . $party_rooms;
echo '<br> suite : ' . $suite;
echo '<br> mini_suite : ' . $mini_suite;
echo '<br> super_deluxe : ' . $super_deluxe;
echo '<br> deluxe : ' . $deluxe;
echo '<br> single : ' . $single;

echo '<br> chosen_room : ' . $chosen_room;

	echo '<br> food_serving_checkin_time : ' . $food_serving_checkin_time;
	echo '<br> food_serving_time : ' . $food_serving_time;
*/	

	$check_in2 = strtotime($check_in);
	$check_out2 = strtotime($check_out);
	$datediff = $check_out2 - $check_in2;
	$no_of_days = floor($datediff / (60 * 60 * 24));
	
	//echo '<br> datediff : ' . $datediff;
	//echo '<br> no_of_days : ' . $no_of_days;
	$no_of_days = $no_of_days + 1;
	
	$rlid = 0;
	$rlname = '';
	$rlrate = 0;
	$rlpicture = '';
	$rldesc = '';
	$rlroom_testimonial = '';
	
	$query_roomlist = " 
		SELECT 
			*
		FROM 
			branch_list b, room_list c
		WHERE 
			b.blid = c.blid and 
			c.rlid = '$chosen_room' 
		ORDER BY 
			b.blcode, c.rlgoldroom, c.rlname ";
	$result_roomlist = mysql_query($query_roomlist);
	echo mysql_error();				
	while ($row_roomlist =  mysql_fetch_array ($result_roomlist)) 
	{
		$rlid = $row_roomlist['rlid'];
		$rlname = $row_roomlist['rlname'];
		
		$rlrate = $row_roomlist['rlrate'];
		$rlrate3hr = $row_roomlist['rlrate3hr'];
		$rlrate4hr = $row_roomlist['rlrate4hr'];
		$rlrate5hr = $row_roomlist['rlrate5hr'];
		$rlrate6hr = $row_roomlist['rlrate6hr'];
		$rlrate8hr = $row_roomlist['rlrate8hr'];
		$rlrate12hr = $row_roomlist['rlrate12hr'];
		
		$rlpicture = $row_roomlist['rlpicture'];
		$rldesc = $row_roomlist['rldesc'];
		$rlroom_testimonial = $row_roomlist['rlroom_testimonial'];
		

		$room_rate = 0;		
		if ($hours_of_stay == '3 Hours')
			$room_rate = $rlrate3hr; 
		else
		if ($hours_of_stay == '4 Hours')
			$room_rate = $rlrate4hr; 
		else
		if ($hours_of_stay == '5 Hours')
			$room_rate = $rlrate5hr; 
		else
		if ($hours_of_stay == '6 Hours')
			$room_rate = $rlrate6hr; 
		else
		if ($hours_of_stay == '8 Hours')
			$room_rate = $rlrate8hr; 
		else
		if ($hours_of_stay == '12 Hours')
			$room_rate = $rlrate12hr; 
		else
		if ($hours_of_stay == '24 Hours')
			$room_rate = $rlrate; 		
		
		$rlrate	= $room_rate;
		$_SESSION['room_rate'] = $room_rate;
		
		
		
		//check vc table if available
		$allow = 'true';
		
		$id = '';
		$locale = '';
		$roomno = '';
		$rscode = '';
		$arrival = '';
		$query = " SELECT *
				   FROM rooms a
				   WHERE a.locale = '$row_roomlist[blkey]' and a.roomno = '$row_roomlist[rlkey]' ";
		$result = mysql_query($query);
		echo mysql_error();				
		while ($row =  mysql_fetch_array ($result)) 
		{
			$id = $row[id];
			$locale = $row[locale];
			$roomno = $row[roomno];
			$rscode = $row[rscode];
			$arrival = $row[arrival];
		}			
	
		if (($id != '') && ($rscode == '1'))
			$allow = 'true';
		else	
		if (($id != '') && ($rscode != '1'))
			$allow = 'false';			
	}	
	
	//echo "NO. OF DAYS " . $no_of_days;
	$room_total = $no_of_days * $rlrate;
	






	//create room adons here
	//starting from the first variable onwards
	$addon1_id = ''; $addon2_id = ''; $addon3_id = ''; $addon4_id = ''; $addon5_id = '';
	$addon6_id = ''; $addon7_id = ''; $addon8_id = ''; $addon9_id = ''; $addon10_id = '';
	
	$addon1_name = ''; $addon2_name = ''; $addon3_name = ''; $addon4_name = ''; $addon5_name = '';
	$addon6_name = ''; $addon7_name = ''; $addon8_name = ''; $addon9_name = ''; $addon10_name = '';
	
	$addon1_qty = 0; $addon2_qty = 0; $addon3_qty = 0; $addon4_qty = 0; $addon5_qty = 0;
	$addon6_qty = 0; $addon7_qty = 0; $addon8_qty = 0; $addon9_qty = 0; $addon10_qty = 0;
		
	$addon1_rate = 0; $addon2_rate = 0; $addon3_rate = 0; $addon4_rate = 0; $addon5_rate = 0;
	$addon6_rate = 0; $addon7_rate = 0; $addon8_rate = 0; $addon9_rate = 0; $addon10_rate = 0;

	$addon11_id = ''; $addon12_id = ''; $addon13_id = ''; $addon14_id = ''; $addon15_id = '';
	$addon16_id = ''; $addon17_id = ''; $addon18_id = ''; $addon19_id = ''; $addon20_id = '';
	
	$addon11_name = ''; $addon12_name = ''; $addon13_name = ''; $addon14_name = ''; $addon15_name = '';
	$addon16_name = ''; $addon17_name = ''; $addon18_name = ''; $addon19_name = ''; $addon20_name = '';
	
	$addon11_qty = 0; $addon12_qty = 0; $addon13_qty = 0; $addon14_qty = 0; $addon15_qty = 0;
	$addon16_qty = 0; $addon17_qty = 0; $addon18_qty = 0; $addon19_qty = 0; $addon20_qty = 0;

	$addon11_rate = 0; $addon12_rate = 0; $addon13_rate = 0; $addon14_rate = 0; $addon15_rate = 0;
	$addon16_rate = 0; $addon17_rate = 0; $addon18_rate = 0; $addon19_rate = 0; $addon20_rate = 0;

	$addon21_id = ''; $addon22_id = ''; $addon23_id = ''; $addon24_id = ''; $addon25_id = '';
	$addon26_id = ''; $addon27_id = ''; $addon28_id = ''; $addon29_id = ''; $addon30_id = '';
	
	$addon21_name = ''; $addon22_name = ''; $addon23_name = ''; $addon24_name = ''; $addon25_name = '';
	$addon26_name = ''; $addon27_name = ''; $addon28_name = ''; $addon29_name = ''; $addon30_name = '';
	
	$addon21_qty = 0; $addon22_qty = 0; $addon23_qty = 0; $addon24_qty = 0; $addon25_qty = 0;
	$addon26_qty = 0; $addon27_qty = 0; $addon28_qty = 0; $addon29_qty = 0; $addon30_qty = 0;

	$addon21_rate = 0; $addon22_rate = 0; $addon23_rate = 0; $addon24_rate = 0; $addon25_rate = 0;
	$addon26_rate = 0; $addon27_rate = 0; $addon28_rate = 0; $addon29_rate = 0; $addon30_rate = 0;
	
	
	//b.blcode LIKE '%$select_branch%' and 
	
	$roomaddon_count = 1;
	$query_roomaddon = " 
		SELECT 
			*
		FROM 
			branch_list b, room_addons c
		WHERE 
			b.blid = c.blid and 
			b.blactive = 'Y' and
			b.blcode <> '' and
			c.raactive = 'Y' and
			c.raname <> '' and
			c.rarate > 0
		ORDER BY 
			b.blcode, c.raname ";
	$result_roomaddon = mysql_query($query_roomaddon);
	echo mysql_error();				
	while ($row_roomaddon =  mysql_fetch_array ($result_roomaddon)) 
	{
		if ($addon1_id == '') { $addon1_id = $row_roomaddon['raid']; $addon1_name = $row_roomaddon['raname']; $addon1_rate = $row_roomaddon['rarate']; } else 
		if ($addon2_id == '') { $addon2_id = $row_roomaddon['raid']; $addon2_name = $row_roomaddon['raname']; $addon2_rate = $row_roomaddon['rarate']; }	else 
		if ($addon3_id == '') { $addon3_id = $row_roomaddon['raid']; $addon3_name = $row_roomaddon['raname']; $addon3_rate = $row_roomaddon['rarate']; }	else 
		if ($addon4_id == '') { $addon4_id = $row_roomaddon['raid']; $addon4_name = $row_roomaddon['raname']; $addon4_rate = $row_roomaddon['rarate']; }	else 
		if ($addon5_id == '') { $addon5_id = $row_roomaddon['raid']; $addon5_name = $row_roomaddon['raname']; $addon5_rate = $row_roomaddon['rarate']; } else 

		if ($addon6_id == '') { $addon6_id = $row_roomaddon['raid']; $addon6_name = $row_roomaddon['raname']; $addon6_rate = $row_roomaddon['rarate']; } else 
		if ($addon7_id == '') { $addon7_id = $row_roomaddon['raid']; $addon7_name = $row_roomaddon['raname']; $addon7_rate = $row_roomaddon['rarate']; }	else 
		if ($addon8_id == '') { $addon8_id = $row_roomaddon['raid']; $addon8_name = $row_roomaddon['raname']; $addon8_rate = $row_roomaddon['rarate']; }	else 
		if ($addon9_id == '') { $addon9_id = $row_roomaddon['raid']; $addon9_name = $row_roomaddon['raname']; $addon9_rate = $row_roomaddon['rarate']; }	else 
		if ($addon10_id == '') { $addon10_id = $row_roomaddon['raid']; $addon10_name = $row_roomaddon['raname']; $addon10_rate = $row_roomaddon['rarate']; } else 
			
		if ($addon11_id == '') { $addon11_id = $row_roomaddon['raid']; $addon11_name = $row_roomaddon['raname']; $addon11_rate = $row_roomaddon['rarate']; } else 
		if ($addon12_id == '') { $addon12_id = $row_roomaddon['raid']; $addon12_name = $row_roomaddon['raname']; $addon12_rate = $row_roomaddon['rarate']; }	else 
		if ($addon13_id == '') { $addon13_id = $row_roomaddon['raid']; $addon13_name = $row_roomaddon['raname']; $addon13_rate = $row_roomaddon['rarate']; }	else 
		if ($addon14_id == '') { $addon14_id = $row_roomaddon['raid']; $addon14_name = $row_roomaddon['raname']; $addon14_rate = $row_roomaddon['rarate']; }	else 
		if ($addon15_id == '') { $addon15_id = $row_roomaddon['raid']; $addon15_name = $row_roomaddon['raname']; $addon15_rate = $row_roomaddon['rarate']; } else 

		if ($addon16_id == '') { $addon16_id = $row_roomaddon['raid']; $addon16_name = $row_roomaddon['raname']; $addon16_rate = $row_roomaddon['rarate']; } else 
		if ($addon17_id == '') { $addon17_id = $row_roomaddon['raid']; $addon17_name = $row_roomaddon['raname']; $addon17_rate = $row_roomaddon['rarate']; }	else 
		if ($addon18_id == '') { $addon18_id = $row_roomaddon['raid']; $addon18_name = $row_roomaddon['raname']; $addon18_rate = $row_roomaddon['rarate']; }	else 
		if ($addon19_id == '') { $addon19_id = $row_roomaddon['raid']; $addon19_name = $row_roomaddon['raname']; $addon19_rate = $row_roomaddon['rarate']; }	else 
		if ($addon20_id == '') { $addon20_id = $row_roomaddon['raid']; $addon20_name = $row_roomaddon['raname']; $addon20_rate = $row_roomaddon['rarate']; } else 

		if ($addon21_id == '') { $addon21_id = $row_roomaddon['raid']; $addon21_name = $row_roomaddon['raname']; $addon21_rate = $row_roomaddon['rarate']; } else 
		if ($addon22_id == '') { $addon22_id = $row_roomaddon['raid']; $addon22_name = $row_roomaddon['raname']; $addon22_rate = $row_roomaddon['rarate']; }	else 
		if ($addon23_id == '') { $addon23_id = $row_roomaddon['raid']; $addon23_name = $row_roomaddon['raname']; $addon23_rate = $row_roomaddon['rarate']; }	else 
		if ($addon24_id == '') { $addon24_id = $row_roomaddon['raid']; $addon24_name = $row_roomaddon['raname']; $addon24_rate = $row_roomaddon['rarate']; }	else 
		if ($addon25_id == '') { $addon25_id = $row_roomaddon['raid']; $addon25_name = $row_roomaddon['raname']; $addon25_rate = $row_roomaddon['rarate']; } else 

		if ($addon26_id == '') { $addon26_id = $row_roomaddon['raid']; $addon26_name = $row_roomaddon['raname']; $addon26_rate = $row_roomaddon['rarate']; } else 
		if ($addon27_id == '') { $addon27_id = $row_roomaddon['raid']; $addon27_name = $row_roomaddon['raname']; $addon27_rate = $row_roomaddon['rarate']; }	else 
		if ($addon28_id == '') { $addon28_id = $row_roomaddon['raid']; $addon28_name = $row_roomaddon['raname']; $addon28_rate = $row_roomaddon['rarate']; }	else 
		if ($addon29_id == '') { $addon29_id = $row_roomaddon['raid']; $addon29_name = $row_roomaddon['raname']; $addon29_rate = $row_roomaddon['rarate']; }	else 
		if ($addon30_id == '') { $addon30_id = $row_roomaddon['raid']; $addon30_name = $row_roomaddon['raname']; $addon30_rate = $row_roomaddon['rarate']; } 
			
		$roomaddon_count = 	$roomaddon_count + 1;
	}	
		

	$addon1_qty = 0;	
	if(isset($_POST['addon1_qty']))
	{
		$addon1_qty = $_POST['addon1_qty'];
		$_SESSION['addon1_qty'] = $addon1_qty;
	}		
	$addon2_qty = 0;	
	if(isset($_POST['addon2_qty']))
	{
		$addon2_qty = $_POST['addon2_qty'];
		$_SESSION['addon2_qty'] = $addon2_qty;
	}		
	$addon3_qty = 0;	
	if(isset($_POST['addon3_qty']))
	{
		$addon3_qty = $_POST['addon3_qty'];
		$_SESSION['addon3_qty'] = $addon3_qty;
	}		
	$addon4_qty = 0;	
	if(isset($_POST['addon4_qty']))
	{
		$addon4_qty = $_POST['addon4_qty'];
		$_SESSION['addon4_qty'] = $addon4_qty;
	}		
	$addon5_qty = 0;	
	if(isset($_POST['addon5_qty']))
	{
		$addon5_qty = $_POST['addon5_qty'];
		$_SESSION['addon5_qty'] = $addon5_qty;
	}		
		

	$addon6_qty = 0;	
	if(isset($_POST['addon6_qty']))
	{
		$addon6_qty = $_POST['addon6_qty'];
		$_SESSION['addon6_qty'] = $addon6_qty;
	}		
	$addon7_qty = 0;	
	if(isset($_POST['addon7_qty']))
	{
		$addon7_qty = $_POST['addon7_qty'];
		$_SESSION['addon7_qty'] = $addon7_qty;
	}		
	$addon8_qty = 0;	
	if(isset($_POST['addon8_qty']))
	{
		$addon8_qty = $_POST['addon8_qty'];
		$_SESSION['addon8_qty'] = $addon8_qty;
	}		
	$addon9_qty = 0;	
	if(isset($_POST['addon9_qty']))
	{
		$addon9_qty = $_POST['addon9_qty'];
		$_SESSION['addon9_qty'] = $addon9_qty;
	}		
	$addon10_qty = 0;	
	if(isset($_POST['addon10_qty']))
	{
		$addon10_qty = $_POST['addon10_qty'];
		$_SESSION['addon10_qty'] = $addon10_qty;
	}		
				
	
	$addon11_qty = 0;	
	if(isset($_POST['addon11_qty']))
	{
		$addon11_qty = $_POST['addon11_qty'];
		$_SESSION['addon11_qty'] = $addon11_qty;
	}		
	$addon12_qty = 0;	
	if(isset($_POST['addon12_qty']))
	{
		$addon12_qty = $_POST['addon12_qty'];
		$_SESSION['addon12_qty'] = $addon12_qty;
	}		
	$addon13_qty = 0;	
	if(isset($_POST['addon13_qty']))
	{
		$addon13_qty = $_POST['addon13_qty'];
		$_SESSION['addon13_qty'] = $addon13_qty;
	}		
	$addon14_qty = 0;	
	if(isset($_POST['addon14_qty']))
	{
		$addon14_qty = $_POST['addon14_qty'];
		$_SESSION['addon14_qty'] = $addon14_qty;
	}		
	$addon15_qty = 0;	
	if(isset($_POST['addon15_qty']))
	{
		$addon15_qty = $_POST['addon15_qty'];
		$_SESSION['addon15_qty'] = $addon15_qty;
	}		
		

	$addon16_qty = 0;	
	if(isset($_POST['addon16_qty']))
	{
		$addon16_qty = $_POST['addon16_qty'];
		$_SESSION['addon16_qty'] = $addon16_qty;
	}		
	$addon17_qty = 0;	
	if(isset($_POST['addon17_qty']))
	{
		$addon17_qty = $_POST['addon17_qty'];
		$_SESSION['addon17_qty'] = $addon17_qty;
	}		
	$addon18_qty = 0;	
	if(isset($_POST['addon18_qty']))
	{
		$addon18_qty = $_POST['addon18_qty'];
		$_SESSION['addon18_qty'] = $addon18_qty;
	}		
	$addon19_qty = 0;	
	if(isset($_POST['addon19_qty']))
	{
		$addon19_qty = $_POST['addon19_qty'];
		$_SESSION['addon19_qty'] = $addon19_qty;
	}		
	$addon20_qty = 0;	
	if(isset($_POST['addon20_qty']))
	{
		$addon20_qty = $_POST['addon20_qty'];
		$_SESSION['addon20_qty'] = $addon10_qty;
	}		
				

	$addon21_qty = 0;	
	if(isset($_POST['addon21_qty']))
	{
		$addon21_qty = $_POST['addon21_qty'];
		$_SESSION['addon21_qty'] = $addon21_qty;
	}		
	$addon22_qty = 0;	
	if(isset($_POST['addon22_qty']))
	{
		$addon22_qty = $_POST['addon22_qty'];
		$_SESSION['addon22_qty'] = $addon22_qty;
	}		
	$addon23_qty = 0;	
	if(isset($_POST['addon23_qty']))
	{
		$addon23_qty = $_POST['addon23_qty'];
		$_SESSION['addon23_qty'] = $addon23_qty;
	}		
	$addon24_qty = 0;	
	if(isset($_POST['addon24_qty']))
	{
		$addon24_qty = $_POST['addon24_qty'];
		$_SESSION['addon24_qty'] = $addon24_qty;
	}		
	$addon25_qty = 0;	
	if(isset($_POST['addon25_qty']))
	{
		$addon25_qty = $_POST['addon25_qty'];
		$_SESSION['addon25_qty'] = $addon25_qty;
	}		
		

	$addon26_qty = 0;	
	if(isset($_POST['addon26_qty']))
	{
		$addon26_qty = $_POST['addon26_qty'];
		$_SESSION['addon26_qty'] = $addon26_qty;
	}		
	$addon27_qty = 0;	
	if(isset($_POST['addon27_qty']))
	{
		$addon27_qty = $_POST['addon27_qty'];
		$_SESSION['addon27_qty'] = $addon27_qty;
	}		
	$addon28_qty = 0;	
	if(isset($_POST['addon28_qty']))
	{
		$addon28_qty = $_POST['addon28_qty'];
		$_SESSION['addon28_qty'] = $addon28_qty;
	}		
	$addon29_qty = 0;	
	if(isset($_POST['addon29_qty']))
	{
		$addon29_qty = $_POST['addon29_qty'];
		$_SESSION['addon29_qty'] = $addon29_qty;
	}		
	$addon30_qty = 0;	
	if(isset($_POST['addon30_qty']))
	{
		$addon30_qty = $_POST['addon30_qty'];
		$_SESSION['addon30_qty'] = $addon30_qty;
	}		
				
	$addon1_total = 0; $addon2_total = 0; $addon3_total = 0; $addon4_total = 0; $addon5_total = 0; 
	$addon6_total = 0; $addon7_total = 0; $addon8_total = 0; $addon9_total = 0; $addon10_total = 0;

	$addon11_total = 0; $addon12_total = 0; $addon13_total = 0; $addon14_total = 0; $addon15_total = 0; 
	$addon16_total = 0; $addon17_total = 0; $addon18_total = 0; $addon19_total = 0; $addon20_total = 0;

	$addon21_total = 0; $addon22_total = 0; $addon23_total = 0; $addon24_total = 0; $addon25_total = 0; 
	$addon26_total = 0; $addon27_total = 0; $addon28_total = 0; $addon29_total = 0; $addon30_total = 0;
	
 	if ($_SESSION['addon1_qty'] != '') { $addon1_qty = $_SESSION['addon1_qty']; $addon1_total = $addon1_qty * $addon1_rate;	}
 	if ($_SESSION['addon2_qty'] != '') { $addon2_qty = $_SESSION['addon2_qty']; $addon2_total = $addon2_qty * $addon2_rate;	}
 	if ($_SESSION['addon3_qty'] != '') { $addon3_qty = $_SESSION['addon3_qty']; $addon3_total = $addon3_qty * $addon3_rate; }
 	if ($_SESSION['addon4_qty'] != '') { $addon4_qty = $_SESSION['addon4_qty']; $addon4_total = $addon4_qty * $addon4_rate; }
 	if ($_SESSION['addon5_qty'] != '') { $addon5_qty = $_SESSION['addon5_qty']; $addon5_total = $addon5_qty * $addon5_rate; }
 	if ($_SESSION['addon6_qty'] != '') { $addon6_qty = $_SESSION['addon6_qty']; $addon6_total = $addon6_qty * $addon6_rate;	}
 	if ($_SESSION['addon7_qty'] != '') { $addon7_qty = $_SESSION['addon7_qty']; $addon7_total = $addon7_qty * $addon7_rate;	}
 	if ($_SESSION['addon8_qty'] != '') { $addon8_qty = $_SESSION['addon8_qty']; $addon8_total = $addon8_qty * $addon8_rate; }
 	if ($_SESSION['addon9_qty'] != '') { $addon9_qty = $_SESSION['addon9_qty']; $addon9_total = $addon9_qty * $addon9_rate; }
 	if ($_SESSION['addon10_qty'] != '') { $addon10_qty = $_SESSION['addon10_qty']; $addon10_total = $addon10_qty * $addon10_rate; }

 	if ($_SESSION['addon11_qty'] != '') { $addon11_qty = $_SESSION['addon11_qty']; $addon11_total = $addon11_qty * $addon11_rate;	}
 	if ($_SESSION['addon12_qty'] != '') { $addon12_qty = $_SESSION['addon12_qty']; $addon12_total = $addon12_qty * $addon12_rate;	}
 	if ($_SESSION['addon13_qty'] != '') { $addon13_qty = $_SESSION['addon13_qty']; $addon13_total = $addon13_qty * $addon13_rate; }
 	if ($_SESSION['addon14_qty'] != '') { $addon14_qty = $_SESSION['addon14_qty']; $addon14_total = $addon14_qty * $addon14_rate; }
 	if ($_SESSION['addon15_qty'] != '') { $addon15_qty = $_SESSION['addon15_qty']; $addon15_total = $addon15_qty * $addon15_rate; }
 	if ($_SESSION['addon16_qty'] != '') { $addon16_qty = $_SESSION['addon16_qty']; $addon16_total = $addon16_qty * $addon16_rate;	}
 	if ($_SESSION['addon17_qty'] != '') { $addon17_qty = $_SESSION['addon17_qty']; $addon17_total = $addon17_qty * $addon17_rate;	}
 	if ($_SESSION['addon18_qty'] != '') { $addon18_qty = $_SESSION['addon18_qty']; $addon18_total = $addon18_qty * $addon18_rate; }
 	if ($_SESSION['addon19_qty'] != '') { $addon19_qty = $_SESSION['addon19_qty']; $addon19_total = $addon19_qty * $addon19_rate; }
 	if ($_SESSION['addon20_qty'] != '') { $addon20_qty = $_SESSION['addon20_qty']; $addon20_total = $addon20_qty * $addon20_rate; }

 	if ($_SESSION['addon21_qty'] != '') { $addon21_qty = $_SESSION['addon21_qty']; $addon21_total = $addon21_qty * $addon21_rate;	}
 	if ($_SESSION['addon22_qty'] != '') { $addon22_qty = $_SESSION['addon22_qty']; $addon22_total = $addon22_qty * $addon22_rate;	}
 	if ($_SESSION['addon23_qty'] != '') { $addon23_qty = $_SESSION['addon23_qty']; $addon23_total = $addon23_qty * $addon23_rate; }
 	if ($_SESSION['addon24_qty'] != '') { $addon24_qty = $_SESSION['addon24_qty']; $addon24_total = $addon24_qty * $addon24_rate; }
 	if ($_SESSION['addon25_qty'] != '') { $addon25_qty = $_SESSION['addon25_qty']; $addon25_total = $addon25_qty * $addon25_rate; }
 	if ($_SESSION['addon26_qty'] != '') { $addon26_qty = $_SESSION['addon26_qty']; $addon26_total = $addon26_qty * $addon26_rate;	}
 	if ($_SESSION['addon27_qty'] != '') { $addon27_qty = $_SESSION['addon27_qty']; $addon27_total = $addon27_qty * $addon27_rate;	}
 	if ($_SESSION['addon28_qty'] != '') { $addon28_qty = $_SESSION['addon28_qty']; $addon28_total = $addon28_qty * $addon28_rate; }
 	if ($_SESSION['addon29_qty'] != '') { $addon29_qty = $_SESSION['addon29_qty']; $addon29_total = $addon29_qty * $addon29_rate; }
 	if ($_SESSION['addon30_qty'] != '') { $addon30_qty = $_SESSION['addon30_qty']; $addon30_total = $addon30_qty * $addon30_rate; }

	$grand_addon_total = 
			$addon1_total + $addon2_total + $addon3_total + $addon4_total + $addon5_total +
			$addon6_total + $addon7_total + $addon8_total + $addon9_total + $addon10_total +

			$addon11_total + $addon12_total + $addon13_total + $addon14_total + $addon15_total +
			$addon16_total + $addon17_total + $addon18_total + $addon19_total + $addon20_total +

			$addon21_total + $addon22_total + $addon23_total + $addon24_total + $addon25_total +
			$addon26_total + $addon27_total + $addon28_total + $addon29_total + $addon30_total ;

	//echo '<br> grand_addon_total : ' . $grand_addon_total;	

	
/*
	echo '<br> proceed_to_confirmation : ' . $proceed_to_confirmation;	
	echo '<br> select_branch : ' . $select_branch;

	echo "<br> _SESSION addon1_id [ " . $_SESSION['addon1_qty'] . "]";
	echo "<br> addon1_id [ " . $addon1_id .  " ] addon1_qty [ " . $addon1_qty . "]";

	echo "<br> _SESSION addon2_id [ " . $_SESSION['addon2_qty'] . "]";
	echo "<br> addon2_id [ " . $addon2_id .  " ] addon2_qty [ " . $addon2_qty . "]";

	echo "<br> _SESSION addon3_id [ " . $_SESSION['addon3_qty'] . "]";
	echo "<br> addon3_id [ " . $addon3_id .  " ] addon3_qty [ " . $addon3_qty . "]";

	echo "<br> _SESSION addon4_id [ " . $_SESSION['addon4_qty'] . "]";
	echo "<br> addon4_id [ " . $addon4_id .  " ] addon4_qty [ " . $addon4_qty . "]";

	echo "<br> _SESSION addon5_id [ " . $_SESSION['addon5_qty'] . "]";
	echo "<br> addon5_id [ " . $addon5_id .  " ] addon5_qty [ " . $addon5_qty . "]";
*/

	
	
	
	//for the food posting of variables
	//starting from the first variable onwards
$food1_id=''; $food2_id=''; $food3_id=''; $food4_id=''; $food5_id=''; $food6_id=''; $food7_id=''; $food8_id=''; $food9_id=''; $food10_id='';
$food11_id=''; $food12_id=''; $food13_id=''; $food14_id=''; $food15_id=''; $food16_id=''; $food17_id=''; $food18_id=''; $food19_id=''; $food20_id='';
$food21_id=''; $food22_id=''; $food23_id=''; $food24_id=''; $food25_id=''; $food26_id=''; $food27_id=''; $food28_id=''; $food29_id=''; $food30_id='';

$food1_name=''; $food2_name=''; $food3_name=''; $food4_name=''; $food5_name=''; $food6_name=''; $food7_name=''; $food8_name=''; $food9_name=''; $food10_name='';
$food11_name=''; $food12_name=''; $food13_name=''; $food14_name=''; $food15_name=''; $food16_name=''; $food17_name=''; $food18_name=''; $food19_name=''; $food20_name=''; 
$food21_name=''; $food22_name=''; $food23_name=''; $food24_name=''; $food25_name=''; $food26_name=''; $food27_name=''; $food28_name=''; $food29_name=''; $food30_name='';

$food1_qty=0; $food2_qty=0; $food3_qty=0; $food4_qty=0; $food5_qty=0; $food6_qty=0; $food7_qty=0; $food8_qty=0; $food9_qty=0; $food10_qty=0;
$food11_qty=0; $food12_qty=0; $food13_qty=0; $food14_qty=0; $food15_qty=0; $food16_qty=0; $food17_qty=0; $food18_qty=0; $food19_qty=0; $food20_qty=0;
$food21_qty=0; $food22_qty=0; $food23_qty=0; $food24_qty=0; $food25_qty=0; $food26_qty=0; $food27_qty=0; $food28_qty=0; $food29_qty=0; $food30_qty=0;

$food1_total=0; $food2_total=0; $food3_total=0; $food4_total=0; $food5_total=0; $food6_total=0; $food7_total=0; $food8_total=0; $food9_total=0; $food10_total=0;
$food11_total=0; $food12_total=0; $food13_total=0; $food14_total=0; $food15_total=0; $food16_total=0; $food17_total=0; $food18_total=0; $food19_total=0; $food20_total=0;
$food21_total=0; $food22_total=0; $food23_total=0; $food24_total=0; $food25_total=0; $food26_total=0; $food27_total=0; $food28_total=0; $food29_total=0; $food30_total=0;
	
	/*
	$_SESSION['food1_qty'] = 0; $_SESSION['food2_qty'] = 0; $_SESSION['food3_qty'] = 0; $_SESSION['food4_qty'] = 0; $_SESSION['food5_qty'] = 0;	
	$_SESSION['food6_qty'] = 0; $_SESSION['food7_qty'] = 0; $_SESSION['food8_qty'] = 0; $_SESSION['food9_qty'] = 0; $_SESSION['food0_qty'] = 0;	

	$_SESSION['food11_qty'] = 0; $_SESSION['food12_qty'] = 0; $_SESSION['food13_qty'] = 0; $_SESSION['food14_qty'] = 0; $_SESSION['food15_qty'] = 0;	
	$_SESSION['food16_qty'] = 0; $_SESSION['food17_qty'] = 0; $_SESSION['food18_qty'] = 0; $_SESSION['food19_qty'] = 0; $_SESSION['food20_qty'] = 0;	

	$_SESSION['food21_qty'] = 0; $_SESSION['food21_qty'] = 0; $_SESSION['food21_qty'] = 0; $_SESSION['food21_qty'] = 0; $_SESSION['food21_qty'] = 0;	
	$_SESSION['food26_qty'] = 0; $_SESSION['food27_qty'] = 0; $_SESSION['food28_qty'] = 0; $_SESSION['food29_qty'] = 0; $_SESSION['food30_qty'] = 0;	
	*/


	//b.blcode LIKE '%$select_branch%' and 
		
	$roomfood_count = 1;
	$query_roomfood = " 
		SELECT 
			*
		FROM 
			branch_list b, food_list c
		WHERE 
			b.blid = c.blid and 
			b.blactive = 'Y' and
			b.blcode <> '' and
			c.flactive = 'Y' and
			c.flname <> '' and
			c.flrate > 0
		ORDER BY 
			b.blcode, c.flname ";
	$result_roomfood = mysql_query($query_roomfood);
	echo mysql_error();				
	while ($row_roomfood =  mysql_fetch_array ($result_roomfood)) 
	{
		if ($food1_id == '') { $food1_id = $row_roomfood['flid']; $food1_name = $row_roomfood['flname']; $food1_rate = $row_roomfood['flrate']; } else 
		if ($food2_id == '') { $food2_id = $row_roomfood['flid']; $food2_name = $row_roomfood['flname']; $food2_rate = $row_roomfood['flrate']; } else
		if ($food3_id == '') { $food3_id = $row_roomfood['flid']; $food3_name = $row_roomfood['flname']; $food3_rate = $row_roomfood['flrate']; } else 
		if ($food4_id == '') { $food4_id = $row_roomfood['flid']; $food4_name = $row_roomfood['flname']; $food4_rate = $row_roomfood['flrate']; } else 
		if ($food5_id == '') { $food5_id = $row_roomfood['flid']; $food5_name = $row_roomfood['flname']; $food5_rate = $row_roomfood['flrate']; } else 
		if ($food6_id == '') { $food6_id = $row_roomfood['flid']; $food6_name = $row_roomfood['flname']; $food6_rate = $row_roomfood['flrate']; } else 
		if ($food7_id == '') { $food7_id = $row_roomfood['flid']; $food7_name = $row_roomfood['flname']; $food7_rate = $row_roomfood['flrate']; } else 
		if ($food8_id == '') { $food8_id = $row_roomfood['flid']; $food8_name = $row_roomfood['flname']; $food8_rate = $row_roomfood['flrate']; } else 
		if ($food9_id == '') { $food9_id = $row_roomfood['flid']; $food9_name = $row_roomfood['flname']; $food9_rate = $row_roomfood['flrate']; } else 
		if ($food10_id == '') { $food10_id = $row_roomfood['flid']; $food10_name = $row_roomfood['flname']; $food10_rate = $row_roomfood['flrate']; } else 

		if ($food11_id == '') { $food11_id = $row_roomfood['flid']; $food11_name = $row_roomfood['flname']; $food11_rate = $row_roomfood['flrate']; } else 
		if ($food12_id == '') { $food12_id = $row_roomfood['flid']; $food12_name = $row_roomfood['flname']; $food12_rate = $row_roomfood['flrate']; } else
		if ($food13_id == '') { $food13_id = $row_roomfood['flid']; $food13_name = $row_roomfood['flname']; $food13_rate = $row_roomfood['flrate']; } else 
		if ($food14_id == '') { $food14_id = $row_roomfood['flid']; $food14_name = $row_roomfood['flname']; $food14_rate = $row_roomfood['flrate']; } else 
		if ($food15_id == '') { $food15_id = $row_roomfood['flid']; $food15_name = $row_roomfood['flname']; $food15_rate = $row_roomfood['flrate']; } else 
		if ($food16_id == '') { $food16_id = $row_roomfood['flid']; $food16_name = $row_roomfood['flname']; $food16_rate = $row_roomfood['flrate']; } else 
		if ($food17_id == '') { $food17_id = $row_roomfood['flid']; $food17_name = $row_roomfood['flname']; $food17_rate = $row_roomfood['flrate']; } else 
		if ($food18_id == '') { $food18_id = $row_roomfood['flid']; $food18_name = $row_roomfood['flname']; $food18_rate = $row_roomfood['flrate']; } else 
		if ($food19_id == '') { $food19_id = $row_roomfood['flid']; $food19_name = $row_roomfood['flname']; $food19_rate = $row_roomfood['flrate']; } else 
		if ($food20_id == '') { $food20_id = $row_roomfood['flid']; $food20_name = $row_roomfood['flname']; $food20_rate = $row_roomfood['flrate']; } else 

		if ($food21_id == '') { $food21_id = $row_roomfood['flid']; $food21_name = $row_roomfood['flname']; $food21_rate = $row_roomfood['flrate']; } else 
		if ($food22_id == '') { $food22_id = $row_roomfood['flid']; $food22_name = $row_roomfood['flname']; $food22_rate = $row_roomfood['flrate']; } else
		if ($food23_id == '') { $food23_id = $row_roomfood['flid']; $food23_name = $row_roomfood['flname']; $food23_rate = $row_roomfood['flrate']; } else 
		if ($food24_id == '') { $food24_id = $row_roomfood['flid']; $food24_name = $row_roomfood['flname']; $food24_rate = $row_roomfood['flrate']; } else 
		if ($food25_id == '') { $food25_id = $row_roomfood['flid']; $food25_name = $row_roomfood['flname']; $food25_rate = $row_roomfood['flrate']; } else 
		if ($food26_id == '') { $food26_id = $row_roomfood['flid']; $food26_name = $row_roomfood['flname']; $food26_rate = $row_roomfood['flrate']; } else 
		if ($food27_id == '') { $food27_id = $row_roomfood['flid']; $food27_name = $row_roomfood['flname']; $food27_rate = $row_roomfood['flrate']; } else 
		if ($food28_id == '') { $food28_id = $row_roomfood['flid']; $food28_name = $row_roomfood['flname']; $food28_rate = $row_roomfood['flrate']; } else 
		if ($food29_id == '') { $food29_id = $row_roomfood['flid']; $food29_name = $row_roomfood['flname']; $food29_rate = $row_roomfood['flrate']; } else 
		if ($food30_id == '') { $food30_id = $row_roomfood['flid']; $food30_name = $row_roomfood['flname']; $food30_rate = $row_roomfood['flrate']; } 
					
		$roomfood_count = 	$roomfood_count + 1;
	}	
		
	if(isset($_POST['food1_qty'])) { $food1_qty = $_POST['food1_qty']; $_SESSION['food1_qty'] = $food1_qty; }		
	if(isset($_POST['food2_qty'])) { $food2_qty = $_POST['food2_qty']; $_SESSION['food2_qty'] = $food2_qty; }		
	if(isset($_POST['food3_qty'])) { $food3_qty = $_POST['food3_qty']; $_SESSION['food3_qty'] = $food3_qty; }		
	if(isset($_POST['food4_qty'])) { $food4_qty = $_POST['food4_qty']; $_SESSION['food4_qty'] = $food4_qty; }		
	if(isset($_POST['food5_qty'])) { $food5_qty = $_POST['food5_qty']; $_SESSION['food5_qty'] = $food5_qty; }		
	if(isset($_POST['food6_qty'])) { $food6_qty = $_POST['food6_qty']; $_SESSION['food6_qty'] = $food6_qty; }		
	if(isset($_POST['food7_qty'])) { $food7_qty = $_POST['food7_qty']; $_SESSION['food7_qty'] = $food7_qty; }		
	if(isset($_POST['food8_qty'])) { $food8_qty = $_POST['food8_qty']; $_SESSION['food8_qty'] = $food8_qty; }		
	if(isset($_POST['food9_qty'])) { $food9_qty = $_POST['food9_qty']; $_SESSION['food9_qty'] = $food9_qty; }		
	if(isset($_POST['food10_qty'])) { $food10_qty = $_POST['food10_qty']; $_SESSION['food10_qty'] = $food10_qty; }		

	if(isset($_POST['food11_qty'])) { $food11_qty = $_POST['food11_qty']; $_SESSION['food11_qty'] = $food11_qty; }		
	if(isset($_POST['food12_qty'])) { $food12_qty = $_POST['food12_qty']; $_SESSION['food12_qty'] = $food12_qty; }		
	if(isset($_POST['food13_qty'])) { $food13_qty = $_POST['food13_qty']; $_SESSION['food13_qty'] = $food13_qty; }		
	if(isset($_POST['food14_qty'])) { $food14_qty = $_POST['food14_qty']; $_SESSION['food14_qty'] = $food14_qty; }		
	if(isset($_POST['food15_qty'])) { $food15_qty = $_POST['food15_qty']; $_SESSION['food15_qty'] = $food15_qty; }		
	if(isset($_POST['food16_qty'])) { $food16_qty = $_POST['food16_qty']; $_SESSION['food16_qty'] = $food16_qty; }		
	if(isset($_POST['food17_qty'])) { $food17_qty = $_POST['food17_qty']; $_SESSION['food17_qty'] = $food17_qty; }		
	if(isset($_POST['food18_qty'])) { $food18_qty = $_POST['food18_qty']; $_SESSION['food18_qty'] = $food18_qty; }		
	if(isset($_POST['food19_qty'])) { $food19_qty = $_POST['food19_qty']; $_SESSION['food19_qty'] = $food19_qty; }		
	if(isset($_POST['food20_qty'])) { $food20_qty = $_POST['food20_qty']; $_SESSION['food20_qty'] = $food20_qty; }		

	if(isset($_POST['food21_qty'])) { $food21_qty = $_POST['food21_qty']; $_SESSION['food21_qty'] = $food21_qty; }		
	if(isset($_POST['food22_qty'])) { $food22_qty = $_POST['food22_qty']; $_SESSION['food22_qty'] = $food22_qty; }		
	if(isset($_POST['food23_qty'])) { $food23_qty = $_POST['food23_qty']; $_SESSION['food23_qty'] = $food23_qty; }		
	if(isset($_POST['food24_qty'])) { $food24_qty = $_POST['food24_qty']; $_SESSION['food24_qty'] = $food24_qty; }		
	if(isset($_POST['food25_qty'])) { $food25_qty = $_POST['food25_qty']; $_SESSION['food25_qty'] = $food25_qty; }		
	if(isset($_POST['food26_qty'])) { $food26_qty = $_POST['food26_qty']; $_SESSION['food26_qty'] = $food26_qty; }		
	if(isset($_POST['food27_qty'])) { $food27_qty = $_POST['food27_qty']; $_SESSION['food27_qty'] = $food27_qty; }		
	if(isset($_POST['food28_qty'])) { $food28_qty = $_POST['food28_qty']; $_SESSION['food28_qty'] = $food28_qty; }		
	if(isset($_POST['food29_qty'])) { $food29_qty = $_POST['food29_qty']; $_SESSION['food29_qty'] = $food29_qty; }		
	if(isset($_POST['food30_qty'])) { $food30_qty = $_POST['food30_qty']; $_SESSION['food30_qty'] = $food30_qty; }		
	
	if ($_SESSION['food1_qty'] != '') { $food1_qty = $_SESSION['food1_qty']; }	
	if ($_SESSION['food2_qty'] != '') { $food2_qty = $_SESSION['food2_qty']; }	
	if ($_SESSION['food3_qty'] != '') { $food3_qty = $_SESSION['food3_qty']; }	
	if ($_SESSION['food4_qty'] != '') { $food4_qty = $_SESSION['food4_qty']; }	
	if ($_SESSION['food5_qty'] != '') { $food5_qty = $_SESSION['food5_qty']; }	
	if ($_SESSION['food6_qty'] != '') { $food6_qty = $_SESSION['food6_qty']; }	
	if ($_SESSION['food7_qty'] != '') { $food7_qty = $_SESSION['food7_qty']; }	
	if ($_SESSION['food8_qty'] != '') { $food8_qty = $_SESSION['food8_qty']; }	
	if ($_SESSION['food9_qty'] != '') { $food9_qty = $_SESSION['food9_qty']; }	
	if ($_SESSION['food10_qty'] != '') { $food10_qty = $_SESSION['food10_qty']; }	

	if ($_SESSION['food11_qty'] != '') { $food11_qty = $_SESSION['food11_qty']; }	
	if ($_SESSION['food12_qty'] != '') { $food12_qty = $_SESSION['food12_qty']; }	
	if ($_SESSION['food13_qty'] != '') { $food13_qty = $_SESSION['food13_qty']; }	
	if ($_SESSION['food14_qty'] != '') { $food14_qty = $_SESSION['food14_qty']; }	
	if ($_SESSION['food15_qty'] != '') { $food15_qty = $_SESSION['food15_qty']; }	
	if ($_SESSION['food16_qty'] != '') { $food16_qty = $_SESSION['food16_qty']; }	
	if ($_SESSION['food17_qty'] != '') { $food17_qty = $_SESSION['food17_qty']; }	
	if ($_SESSION['food18_qty'] != '') { $food18_qty = $_SESSION['food18_qty']; }	
	if ($_SESSION['food19_qty'] != '') { $food19_qty = $_SESSION['food19_qty']; }	
	if ($_SESSION['food20_qty'] != '') { $food20_qty = $_SESSION['food20_qty']; }	

	if ($_SESSION['food21_qty'] != '') { $food21_qty = $_SESSION['food21_qty']; }	
	if ($_SESSION['food22_qty'] != '') { $food22_qty = $_SESSION['food22_qty']; }	
	if ($_SESSION['food23_qty'] != '') { $food23_qty = $_SESSION['food23_qty']; }	
	if ($_SESSION['food24_qty'] != '') { $food24_qty = $_SESSION['food24_qty']; }	
	if ($_SESSION['food25_qty'] != '') { $food25_qty = $_SESSION['food25_qty']; }	
	if ($_SESSION['food26_qty'] != '') { $food26_qty = $_SESSION['food26_qty']; }	
	if ($_SESSION['food27_qty'] != '') { $food27_qty = $_SESSION['food27_qty']; }	
	if ($_SESSION['food28_qty'] != '') { $food28_qty = $_SESSION['food28_qty']; }	
	if ($_SESSION['food29_qty'] != '') { $food29_qty = $_SESSION['food29_qty']; }	
	if ($_SESSION['food30_qty'] != '') { $food30_qty = $_SESSION['food30_qty']; }	
	
	$food1_total = $food1_qty * $food1_rate;	
	$food2_total = $food2_qty * $food2_rate;	
	$food3_total = $food3_qty * $food3_rate;	
	$food4_total = $food4_qty * $food4_rate;	
	$food5_total = $food5_qty * $food5_rate;	
	$food6_total = $food6_qty * $food6_rate;	
	$food7_total = $food7_qty * $food7_rate;	
	$food8_total = $food8_qty * $food8_rate;	
	$food9_total = $food9_qty * $food9_rate;	
	$food10_total = $food10_qty * $food10_rate;	

	$food11_total = $food11_qty * $food11_rate;	
	$food12_total = $food12_qty * $food12_rate;	
	$food13_total = $food13_qty * $food13_rate;	
	$food14_total = $food14_qty * $food14_rate;	
	$food15_total = $food15_qty * $food15_rate;	
	$food16_total = $food16_qty * $food16_rate;	
	$food17_total = $food17_qty * $food17_rate;	
	$food18_total = $food18_qty * $food18_rate;	
	$food19_total = $food19_qty * $food19_rate;	
	$food20_total = $food20_qty * $food20_rate;	

	$food21_total = $food21_qty * $food21_rate;	
	$food22_total = $food22_qty * $food22_rate;	
	$food23_total = $food23_qty * $food23_rate;	
	$food24_total = $food24_qty * $food24_rate;	
	$food25_total = $food25_qty * $food25_rate;	
	$food26_total = $food26_qty * $food26_rate;	
	$food27_total = $food27_qty * $food27_rate;	
	$food28_total = $food28_qty * $food28_rate;	
	$food29_total = $food29_qty * $food29_rate;	
	$food30_total = $food30_qty * $food30_rate;	

	$grand_food_total = 
		$food1_total + $food2_total + $food3_total + $food4_total + $food5_total + $food6_total + $food7_total + $food8_total + $food9_total + $food10_total + 
		$food11_total + $food12_total + $food13_total + $food14_total + $food15_total + $food16_total + $food17_total + $food18_total + $food19_total + $food20_total +
		$food21_total + $food22_total + $food23_total + $food24_total + $food25_total + $food26_total + $food27_total + $food28_total + $food29_total + $food30_total;
	
	//echo '<br> grand_food_total : ' . $grand_food_total;	
	
	$grand_total = $room_total + $grand_addon_total + $grand_food_total
	
	
?>								
                        <h3>Welcome to <span class="branch-name">Victoria Court</span> - <span class="branch-main"><?php print($select_branch); ?></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="room-booking">
        <div class="fixed-bg-pattern"></div>
        <div class="wrapper">
            <section class="step-tabs-holder">
                <div class="container">
                    <div class="row">
                        <div class="nav-book-steps">
                            <div class="col-xs-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="not-active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                            Reservation Details
                                        </a>
                                    </li>
                                    <li role="presentation" class="active">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                            Payment Setup
                                        </a>
                                    </li>
                                    <li role="presentation" class="not-active">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                            Payment Confirmation
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content-book-steps">
                            <div class="col-xs-12 no-padding">
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="step2">
                                        <div class="col-xs-12">
                                            <div class="room-choice">
                                                <div class="holder">
                                                    <div class="img-holder">
                                                         <img src="admin/pages/room/<?php print($rlpicture); ?>" />
                                                    </div>
                                                    <div class="content">
	<h3><span class="room-title"><?php print($rlname); ?></span><span class="room-price pull-right"><?php print(number_format($rlrate,2)); ?> PHP</span></h3>
                                                        
<?php 
	if ($rlroom_testimonial != '')
	{
?>												
		<p class="testimonial">"<?php print($rlroom_testimonial); ?>"</p>												
<?php 
	}
?>															
	<p class="room-desc">
		<?php print($rldesc); ?>
	</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 less-padding-right">
                                            <div class="confirm-customer-details">
                                                <p class="title">Customer Details</p>
                                                <p>Customer Name : <strong><?php print($fname . ' ' . $lname); ?></strong></p>
                                                <p>Email : <strong><?php print($email); ?></strong></p>
                                                <p>Contact Number : <strong><?php print($contact); ?></strong></p>
												
<?php
	if ($allow == 'false')
	{
		print('<br><br><br> <font size="6" color="#FFFFFF">Sorry, the room you are viewing is no longer available, it may just have been booked by another customer. We apologize for the inconvenience, please select another room to your liking. 
- Victoria Court Management.</font>');
	} 
?>													
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 less-padding-left">
                                            <div class="confirm-check-info">
                                                <table>
                                                    <tbody>
                            
							
			<tr>
				<td colspan="2" class="total-price">
				BOOKING INFORMATION
				</td>
			</tr>														
							
							
							                            <tr>
                                                            <td>Check-in:</td>
                                                            <td class="check-in-date"><?php print($check_in); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Check-out:</td>
                                                            <td class="check-out-date"><?php print($check_out); ?></td>
                                                        </tr>
														<tr>
															<td>Check-in Time:</td>
															<td class="check-out-date"><?php print($check_in_time); ?></td>
														</tr>			
														<tr>
															<td>Hours of Stay:</td>
															<td class="check-out-date"><?php print($hours_of_stay); ?></td>
														</tr>																									
														<tr>
															<td colspan="2"><?php print($no_of_days); ?> Night/s</td>
														</tr>
														<tr>
															<td colspan="2"><?php print($adults_count); ?> Adult/s</td>
														</tr>
														<tr>
															<td colspan="2"><?php print($kids_count); ?> Kid/s</td>
														</tr>
                                                        <tr class="cap_text">
                                                            <td class=""><?php print($rlname . " @ " . number_format($rlrate,2)); ?> PHP </td>
                                                            <td class="room-price"><?php print(number_format($room_total,2)); ?> PHP</td>
                                                        </tr> 
                                                        <tr class="cap_text">
                                                            <td class="promo-title">Promo code</td>
                                                            <td class="code"><?php print($promo_code); ?></td>
                                                        </tr>


<?php
if ($grand_addon_total > 0) 
{
?>

                                                        <tr class="border">
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr class="space">
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
														
			<tr>
				<td colspan="2" class="total-price">
				ROOM ADD-ON'S
				</td>
			</tr>														

														
<?php
	if ($addon1_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon1_qty); ?> x <?php print($addon1_name); ?> @ <?php print(number_format($addon1_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon1_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon2_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon2_qty); ?> x <?php print($addon2_name); ?> @ <?php print(number_format($addon2_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon2_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon3_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon3_qty); ?> x <?php print($addon3_name); ?> @ <?php print(number_format($addon3_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon3_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon4_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon4_qty); ?> x <?php print($addon4_name); ?> @ <?php print(number_format($addon4_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon4_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon5_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon5_qty); ?> x <?php print($addon5_name); ?> @ <?php print(number_format($addon5_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon5_total,2)); ?> PHP</td>
		</tr>
<?php
	}
	
	if ($addon6_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon6_qty); ?> x <?php print($addon6_name); ?> @ <?php print(number_format($addon6_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon6_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon7_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon7_qty); ?> x <?php print($addon7_name); ?> @ <?php print(number_format($addon7_rate,7)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon7_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon8_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon8_qty); ?> x <?php print($addon8_name); ?> @ <?php print(number_format($addon8_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon8_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon9_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon9_qty); ?> x <?php print($addon9_name); ?> @ <?php print(number_format($addon9_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon9_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon10_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon10_qty); ?> x <?php print($addon10_name); ?> @ <?php print(number_format($addon10_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon10_total,2)); ?> PHP</td>
		</tr>
<?php
	}	
	
	
	
	
	if ($addon11_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon11_qty); ?> x <?php print($addon11_name); ?> @ <?php print(number_format($addon11_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon11_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon12_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon12_qty); ?> x <?php print($addon12_name); ?> @ <?php print(number_format($addon12_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon12_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon13_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon13_qty); ?> x <?php print($addon13_name); ?> @ <?php print(number_format($addon13_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon13_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon14_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon14_qty); ?> x <?php print($addon14_name); ?> @ <?php print(number_format($addon14_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon14_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon15_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon15_qty); ?> x <?php print($addon15_name); ?> @ <?php print(number_format($addon15_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon15_total,2)); ?> PHP</td>
		</tr>
<?php
	}
	
	if ($addon16_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon16_qty); ?> x <?php print($addon16_name); ?> @ <?php print(number_format($addon16_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon16_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon17_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon17_qty); ?> x <?php print($addon17_name); ?> @ <?php print(number_format($addon17_rate,7)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon17_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon18_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon18_qty); ?> x <?php print($addon18_name); ?> @ <?php print(number_format($addon18_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon18_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon19_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon19_qty); ?> x <?php print($addon19_name); ?> @ <?php print(number_format($addon19_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon19_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon20_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon20_qty); ?> x <?php print($addon20_name); ?> @ <?php print(number_format($addon20_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon20_total,2)); ?> PHP</td>
		</tr>
<?php
	}	
	
	
	
	if ($addon21_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon21_qty); ?> x <?php print($addon21_name); ?> @ <?php print(number_format($addon21_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon21_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon22_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon22_qty); ?> x <?php print($addon22_name); ?> @ <?php print(number_format($addon22_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon22_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon23_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon23_qty); ?> x <?php print($addon23_name); ?> @ <?php print(number_format($addon23_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon23_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon24_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon24_qty); ?> x <?php print($addon24_name); ?> @ <?php print(number_format($addon24_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon24_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon25_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon25_qty); ?> x <?php print($addon25_name); ?> @ <?php print(number_format($addon25_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon25_total,2)); ?> PHP</td>
		</tr>
<?php
	}
	
	if ($addon26_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon26_qty); ?> x <?php print($addon26_name); ?> @ <?php print(number_format($addon26_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon26_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon27_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon27_qty); ?> x <?php print($addon27_name); ?> @ <?php print(number_format($addon27_rate,7)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon27_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon28_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon28_qty); ?> x <?php print($addon28_name); ?> @ <?php print(number_format($addon28_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon28_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon29_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon29_qty); ?> x <?php print($addon29_name); ?> @ <?php print(number_format($addon29_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon29_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($addon30_qty > 0)
	{
?>	
		<tr>
			<td><?php print($addon30_qty); ?> x <?php print($addon30_name); ?> @ <?php print(number_format($addon30_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($addon30_total,2)); ?> PHP</td>
		</tr>
<?php
	}	

}

if ($grand_food_total > 0) 
{
?>

                                                        <tr class="border">
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr class="space">
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
														
			<tr>
				<td colspan="2" class="total-price">
				ORDERED FOOD
				</td>
			</tr>														
														
														
<?php
	if ($food1_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food1_qty); ?> x <?php print($food1_name); ?> @ <?php print(number_format($food1_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food1_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food2_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food2_qty); ?> x <?php print($food2_name); ?> @ <?php print(number_format($food2_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food2_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food3_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food3_qty); ?> x <?php print($food3_name); ?> @ <?php print(number_format($food3_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food3_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food4_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food4_qty); ?> x <?php print($food4_name); ?> @ <?php print(number_format($food4_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food4_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food5_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food5_qty); ?> x <?php print($food5_name); ?> @ <?php print(number_format($food5_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food5_total,2)); ?> PHP</td>
		</tr>
<?php
	}
	
	if ($food6_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food6_qty); ?> x <?php print($food6_name); ?> @ <?php print(number_format($food6_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food6_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food7_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food7_qty); ?> x <?php print($food7_name); ?> @ <?php print(number_format($food7_rate,7)); ?> PHP</td>
			<td class="price"><?php print(number_format($food7_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food8_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food8_qty); ?> x <?php print($food8_name); ?> @ <?php print(number_format($food8_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food8_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food9_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food9_qty); ?> x <?php print($food9_name); ?> @ <?php print(number_format($food9_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food9_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food10_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food10_qty); ?> x <?php print($food10_name); ?> @ <?php print(number_format($food10_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food10_total,2)); ?> PHP</td>
		</tr>
<?php
	}	
	
	
	
	
	if ($food11_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food11_qty); ?> x <?php print($food11_name); ?> @ <?php print(number_format($food11_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food11_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food12_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food12_qty); ?> x <?php print($food12_name); ?> @ <?php print(number_format($food12_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food12_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food13_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food13_qty); ?> x <?php print($food13_name); ?> @ <?php print(number_format($food13_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food13_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food14_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food14_qty); ?> x <?php print($food14_name); ?> @ <?php print(number_format($food14_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food14_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food15_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food15_qty); ?> x <?php print($food15_name); ?> @ <?php print(number_format($food15_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food15_total,2)); ?> PHP</td>
		</tr>
<?php
	}
	
	if ($food16_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food16_qty); ?> x <?php print($food16_name); ?> @ <?php print(number_format($food16_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food16_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food17_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food17_qty); ?> x <?php print($food17_name); ?> @ <?php print(number_format($food17_rate,7)); ?> PHP</td>
			<td class="price"><?php print(number_format($food17_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food18_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food18_qty); ?> x <?php print($food18_name); ?> @ <?php print(number_format($food18_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food18_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food19_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food19_qty); ?> x <?php print($food19_name); ?> @ <?php print(number_format($food19_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food19_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food20_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food20_qty); ?> x <?php print($food20_name); ?> @ <?php print(number_format($food20_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food20_total,2)); ?> PHP</td>
		</tr>
<?php
	}	
	
	
	
	if ($food21_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food21_qty); ?> x <?php print($food21_name); ?> @ <?php print(number_format($food21_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food21_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food22_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food22_qty); ?> x <?php print($food22_name); ?> @ <?php print(number_format($food22_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food22_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food23_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food23_qty); ?> x <?php print($food23_name); ?> @ <?php print(number_format($food23_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food23_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food24_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food24_qty); ?> x <?php print($food24_name); ?> @ <?php print(number_format($food24_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food24_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food25_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food25_qty); ?> x <?php print($food25_name); ?> @ <?php print(number_format($food25_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food25_total,2)); ?> PHP</td>
		</tr>
<?php
	}
	
	if ($food26_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food26_qty); ?> x <?php print($food26_name); ?> @ <?php print(number_format($food26_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food26_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food27_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food27_qty); ?> x <?php print($food27_name); ?> @ <?php print(number_format($food27_rate,7)); ?> PHP</td>
			<td class="price"><?php print(number_format($food27_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food28_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food28_qty); ?> x <?php print($food28_name); ?> @ <?php print(number_format($food28_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food28_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food29_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food29_qty); ?> x <?php print($food29_name); ?> @ <?php print(number_format($food29_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food29_total,2)); ?> PHP</td>
		</tr>
<?php
	}

	if ($food30_qty > 0)
	{
?>	
		<tr>
			<td><?php print($food30_qty); ?> x <?php print($food30_name); ?> @ <?php print(number_format($food30_rate,2)); ?> PHP</td>
			<td class="price"><?php print(number_format($food30_total,2)); ?> PHP</td>
		</tr>
<?php
	}	
}
?>

                                                        <tr class="border">
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr class="space">
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
														
<?php 
	$grand_discount = 0;
	$gross_total = $room_total + $grand_addon_total + $grand_food_total;

//$promo_valid = $_SESSION['promo_valid'];
//echo "<br> promo_valid " . $promo_valid;

	if ($_SESSION['promo_valid'] != '')
	{
		if ($_SESSION['promo_valid'] == 'INVALID')
		{
?>
			<tr>
				<td colspan="2" class="total-price">
				Promo Code : INVALID
				</td>
			</tr>														
<?php		
		}
		else
		{		
?>
			<tr>
				<td colspan="2" class="total-price">
				Total Amount: 
<?php 
print(number_format($gross_total ,2) . ' PHP');
?>	
				</td>
			</tr>
<?php		
			if ($_SESSION['promo_food'] > 0)
			{
				$grand_discount = $grand_food_total * ($_SESSION['promo_food'] / 100);		
				?>
				<tr>
					<td colspan="2" class="total-price">
					Food Promo ( <?php print($promo_code); ?> ) : <?php print(number_format($grand_discount ,2) . ' PHP'); ?>
					</td>
				</tr>														
				<?php				
			}
			if ($_SESSION['promo_room'] > 0)
			{
				$grand_discount = $room_total * ($_SESSION['promo_room'] / 100);		
				?>
				<tr>
					<td colspan="2" class="total-price">
					Room Promo ( <?php print($promo_code); ?> ) : <?php print(number_format($grand_discount ,2) . ' PHP'); ?>
					</td>
				</tr>														
				<?php				
			}
			if ($_SESSION['promo_addon'] > 0)
			{
				$grand_discount = $grand_addon_total * ($_SESSION['promo_addon'] / 100);		
				?>
				<tr>
					<td colspan="2" class="total-price">
					Add-On Promo ( <?php print($promo_code); ?> ) : <?php print(number_format($grand_discount ,2) . ' PHP'); ?>
					</td>
				</tr>														
				<?php				
			}
				if ($_SESSION['promo_all'] > 0)
			{
				$grand_discount = $grand_total * ($_SESSION['promo_all'] / 100);		
				?>
				<tr>
					<td colspan="2" class="total-price">
					Discount Promo ( <?php print($promo_code); ?> ) : <?php print(number_format($grand_discount ,2) . ' PHP'); ?>
					</td>
				</tr>														
				<?php				
			}								
		}
	}
	
	$grand_total = $room_total + $grand_addon_total + $grand_food_total - $grand_discount;	
?>	
															</td>
                                                        </tr>														
														
														
                                                        <tr>
                                                            <td colspan="2" class="total-price">
															 
<?php 
if ($grand_discount > 0) 
 	print('Net Amount : ' . number_format($grand_total ,2) . ' PHP');
else 
 	print('Total Amount : ' . number_format($grand_total ,2) . ' PHP');
?>	
															</td>
                                                        </tr>
														
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

<?php
$plname = 'Now that your all set, would you like to order food?';
$pltext1 = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
		eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
		ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
		aliquip ex ea commodo consequat. Duis aute irure dolor in
		reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
		Excepteur sint occaecat cupidatat non proident, sunt in
		culpa qui officia deserunt mollit anim id est laborum.';
$pltext2 = '';
$pltext3 = '';

$query_foot = " SELECT *
		   FROM page_list ";
$result_foot = mysql_query($query_foot);
echo mysql_error();				
while ($row_foot =  mysql_fetch_array ($result_foot)) 
{
	if ($row_foot['pltype'] == 'Food Menu')
	{	
		$plname = $row_foot['plname'];
		$pltext1 = $row_foot['pltext1'];
		$pltext2 = $row_foot['pltext2'];
		$pltext3 = $row_foot['pltext3'];
	}
}
?>	
										
										<div class="col-xs-12 col-sm-4 less-padding-right">
                                            <div class="policies-holder">
                                                <p class="title">
													<?php print($plname); ?>
												</p>
												
												<p>
													<?php print($pltext1); ?>
													<?php print($pltext2); ?>
													<?php print($pltext3); ?>
												</p>	
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-8 less-padding-left">
                                            <div class="policies-holder">
                                                 <img src="assets/images/roombookingpage/680x300.jpg" />
                                            </div>
                                        </div>
													
                                        <div class="col-xs-12 no-padding">
                                            <div class="col-xs-12 col-sm-6 less-padding-right">
                                                 <a href="index.php?body=menu" class="btn gray-bttn view-menu-bttn edit-food-orders">Add Food</a>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 less-padding-left">
											
                                                
											
											
                                           

									                                            
<?php
	//add them to this session
	$tlid = 0;
	$tldate = $globaldate;

	$tldocno = 1;
	$query_docno = " 
	SELECT count(a.tlid) tldocno
	FROM transaction_list a ";
	$result_docno = mysql_query($query_docno);
	echo mysql_error();				
	while ($row_docno =  mysql_fetch_array ($result_docno)) 
	{
		$tldocno = $row_docno[tldocno];
	}
	$tldocno = $tldocno + 1;
	
	$tlsession = 'vc' . session_id() . 'key';
	
	$tlname = $lname . ', ' . $fname;
	$tlemail = $email;
	$tlphone = $contact;
	$tlmobile = $contact;
	
	$tlroom = $room_total;
	$tlfood = $grand_food_total;
	$tladdon = $grand_addon_total;
	$tlpromo = $grand_discount;
	$tlamt = $grand_total;
	
	$tltype = 'INCOMPLETE';
	$tlpaid = 0;
	
	$tlactive = 'Y';
	$tluser = 'ON-LINE WEBSITE';
	$tlstamp = $globaldatetime;		
		
	if ($_SESSION['tlsession'] != '')
	{
		 //edit the record
		 //if ($_SESSION['tlsession'] == $tlsession)
		 //{
		 	$tlid = $_SESSION['tlid'];
			$tldocno = $_SESSION['tldocno']; 
			$tlsession = $_SESSION['tlsession']; 
			
			$query_sess_edit = 	 
				"UPDATE 
					transaction_list 
				SET 
					tlid = '$tlid',
					tldate = '$tldate',
					tldocno = '$tldocno',
					tlsession = '$tlsession',
					
					tlname = '$tlname',
					tlemail = '$tlemail',
					tlphone = '$tlphone',
					tlmobile = '$tlmobile',
					
					tlroom = '$tlroom',
					tladdon = '$tladdon',
					tlpromo = '$tlpromo',
					tlfood = '$tlfood',
					tlamt = '$tlamt',
					
					tltype = '$tltype',
					tlpaid = '$tlpaid',
					
					tlactive = '$tlactive',
					tluser = '$tluser',
					tlstamp = '$tlstamp'
					WHERE
					tlid = '$tlid'";
			mysql_query($query_sess_edit) or die('The entry has links to other tables. Cannot continue to process...');  
		 //}
		 //else
		 //{
		 //	die('hijacking in progress');
		 //}
	}
	else	
	if ($_SESSION['tlsession'] == '')
	{
		$query_add_sess = 
		"INSERT INTO transaction_list (
			tlid,
			tldate,
			tldocno,
			tlsession,
			
			tlname,
			tlemail,
			tlphone,
			tlmobile,
			
			tlroom,
			tlfood,
			tladdon,
			tlpromo,
			tlamt,
			
			tltype,
			tlpaid,
			
			tlactive,
			tluser,
			tlstamp
		) 
		VALUES 
		(
			'$tlid',
			'$tldate',
			'$tldocno',
			'$tlsession',
			
			'$tlname',
			'$tlemail',
			'$tlphone',
			'$tlmobile',
			
			'$tlroom',
			'$tlfood',
			'$tladdon',
			'$tlpromo',
			'$tlamt',
			
			'$tltype',
			'$tlpaid',
			
			'$tlactive',
			'$tluser',
			'$tlstamp'
		)";
		mysql_query($query_add_sess) or die('The entry has links to other tables. Cannot continue to process...');  
		
		$tlid = 0;
		$query_id = " 
		SELECT a.tlid
		FROM transaction_list a
		WHERE a.tldocno = '$tldocno' ";
		$result_id = mysql_query($query_id);
		echo mysql_error();				
		while ($row_id =  mysql_fetch_array ($result_id)) 
		{
			$tlid = $row_id[tlid];
		}		
			
		$_SESSION['tlid'] = $tlid; 
		$_SESSION['tldocno'] = $tldocno; 
		$_SESSION['tlsession'] = $tlsession; 
	}
	
	
	if ($_SESSION['tlid'] != '')
	{
		//rooom info
		
		$trid = 0;
		$trdate = $globaldate;
		$trname = $rlname;
		$tradults = $adults_count;
		$trakids = $kids_count;
		$trdays = $no_of_days;
		$trrate = $rlrate;
		$tramt = $no_of_days * $rlrate;
		$trtime = $check_in_time;
		$trstay = $hours_of_stay;
		
		$check_in = date('Y-m-d', strtotime($check_in));
		$trfrom = $check_in;
		$check_out = date('Y-m-d', strtotime($check_out));
		$trto = $check_out;
		
		$trserve = $food_serving_checkin_time;
		$trserve_time = $food_serving_time; 
		
		$rlid = $rlid;
		$rlname = $rlname;
		
		$tractive = 'Y';
		$truser = $_SESSION["ulname"];
		$trstamp = $globaldatetime;
	
		//delete all room details
		$query_room_del = 
			"DELETE FROM 
			transaction_room 
			WHERE
			tlid = '$tlid'";
		mysql_query($query_room_del) or die('Cannot remove room info.');  
		
		//add room detail
		$query_room_add = 
			"INSERT INTO transaction_room (
				trid,
				trdate,
				trname,
				tradults,
				trakids,
				trdays,
				trrate,
				tramt,
				trtime,
				trstay,

				trfrom,
				trto,
				trserve,
				trserve_time,
				
				tlid,
				rlid,
				
				tractive,
				truser,
				trstamp
			) 
			VALUES 
			(
				'$trid',
				'$trdate',
				'$trname',
				'$tradults',
				'$trakids',
				'$trdays',
				'$trrate',
				'$tramt',
				'$trtime',
				'$trstay',
				
				'$trfrom',
				'$trto',
				'$trserve',
				'$trserve_time',
				
				'$tlid',
				'$rlid',
				
				'$tractive',
				'$truser',
				'$trstamp'
			)";

		//mysql_query($query_room_add) or die('Cannot add new room info.');  
		mysql_query($query_room_add) or die('New Room : ' . mysql_error());  
		

		$trid = 0;
		$query_id = " 
		SELECT a.trid
		FROM transaction_room a
		WHERE a.tlid = '$tlid' ";
		$result_id = mysql_query($query_id);
		echo mysql_error();				
		while ($row_id =  mysql_fetch_array ($result_id)) 
		{
			$trid = $row_id[trid];
		}				
	}
	

	if ($_SESSION['tlid'] != '')
	{	
		//promo info
		if ($_SESSION['promo_valid'] == 'VALID')
		{
			$_SESSION['promo_all'] = 0;

			$tpid = 0;
			$tpdate = $globaldate;
			$tpcode = $plcode;
			$tpname = $plname;
			$tpamt = $_SESSION['promo_all'] + $_SESSION['promo_food'] + $_SESSION['promo_room'] + $_SESSION['promo_addon'];
			
			$plid = $plid;
			
			$tpactive = 'Y';
			$tpuser = $_SESSION["ulname"];
			$tpstamp = $globaldatetime;
		
			//delete all promo details
			$query_promo_del = 
				"DELETE FROM 
				transaction_promo 
				WHERE
				tlid = '$tlid'";
			mysql_query($query_promo_del) or die('Cannot delete old promo info');  
			
			//add promo detail
			$query_promo_add = 
				"INSERT INTO transaction_promo (
					tpid,
					tpdate,
					tpcode,
					tpname,
					tpamt,
					
					tlid,
					plid,
					
					tpactive,
					tpuser,
					tpstamp
				) 
				VALUES 
				(
					'$tpid',
					'$tpdate',
					'$tlcode',
					'$tpname',
					'$tpamt',
					
					'$tlid',
					'$plid',
					
					'$tpactive',
					'$tpuser',
					'$tpstamp'
				)";
				
			//mysql_query($query_promo_add) or die('Cannot add new promo info');
			mysql_query($query_promo_add) or die('Promo : ' . mysql_error());  
			
		}  
	}	
	

	if ($_SESSION['tlid'] != '')
	{
//echo "<br> tlid " . $tlid;
 	
		//food info
		//delete all room details
		$query_food_del = 
			"DELETE FROM 
			transaction_food
			WHERE
			tlid = '$tlid'";
		mysql_query($query_food_del) or die('Cannot delete old food info');  
		
		$mycounter = 1;
		while ($mycounter <= 30)
		{
			$food_qty = 0;
			if ($mycounter == 1) {  $food_id =  $food1_id; $food_qty =  $food1_qty; $food_name =  $food1_name; $food_rate =  $food1_rate; };
			if ($mycounter == 2) {  $food_id =  $food2_id; $food_qty =  $food2_qty; $food_name =  $food2_name; $food_rate =  $food2_rate; };
			if ($mycounter == 3) {  $food_id =  $food3_id; $food_qty =  $food3_qty; $food_name =  $food3_name; $food_rate =  $food3_rate; };
			if ($mycounter == 4) {  $food_id =  $food4_id; $food_qty =  $food4_qty; $food_name =  $food4_name; $food_rate =  $food4_rate; };
			if ($mycounter == 5) {  $food_id =  $food5_id;  $food_qty =  $food5_qty; $food_name =  $food5_name; $food_rate =  $food5_rate; };
			if ($mycounter == 6) {  $food_id =  $food6_id; $food_qty =  $food6_qty; $food_name =  $food6_name; $food_rate =  $food6_rate; };
			if ($mycounter == 7) {  $food_id =  $food7_id; $food_qty =  $food7_qty; $food_name =  $food7_name; $food_rate =  $food7_rate; };
			if ($mycounter == 8) {  $food_id =  $food8_id; $food_qty =  $food8_qty; $food_name =  $food8_name; $food_rate =  $food8_rate; };
			if ($mycounter == 9) {  $food_id =  $food9_id; $food_qty =  $food9_qty; $food_name =  $food9_name; $food_rate =  $food9_rate; };
			if ($mycounter == 10) {  $food_id =  $food10_id; $food_qty =  $food10_qty; $food_name =  $food10_name; $food_rate =  $food10_rate; };
	
			if ($mycounter == 11) {  $food_id =  $food11_id; $food_qty =  $food11_qty; $food_name =  $food11_name; $food_rate =  $food11_rate; };
			if ($mycounter == 12) {  $food_id =  $food12_id; $food_qty =  $food12_qty; $food_name =  $food12_name; $food_rate =  $food12_rate; };
			if ($mycounter == 13) {  $food_id =  $food13_id; $food_qty =  $food13_qty; $food_name =  $food13_name; $food_rate =  $food13_rate; };
			if ($mycounter == 14) {  $food_id =  $food14_id; $food_qty =  $food14_qty; $food_name =  $food14_name; $food_rate =  $food14_rate; };
			if ($mycounter == 15) {  $food_id =  $food15_id; $food_qty =  $food15_qty; $food_name =  $food15_name; $food_rate =  $food15_rate; };
			if ($mycounter == 16) {  $food_id =  $food16_id; $food_qty =  $food16_qty; $food_name =  $food16_name; $food_rate =  $food16_rate; };
			if ($mycounter == 17) {  $food_id =  $food17_id; $food_qty =  $food17_qty; $food_name =  $food17_name; $food_rate =  $food17_rate; };
			if ($mycounter == 18) {  $food_id =  $food18_id; $food_qty =  $food18_qty; $food_name =  $food18_name; $food_rate =  $food18_rate; };
			if ($mycounter == 19) {  $food_id =  $food19_id; $food_qty =  $food19_qty; $food_name =  $food19_name; $food_rate =  $food19_rate; };
			if ($mycounter == 20) {  $food_id =  $food20_id; $food_qty =  $food20_qty; $food_name =  $food20_name; $food_rate =  $food20_rate; };
	
			if ($mycounter == 21) {  $food_id =  $food21_id; $food_qty =  $food21_qty; $food_name =  $food21_name; $food_rate =  $food21_rate; };
			if ($mycounter == 22) {  $food_id =  $food22_id; $food_qty =  $food22_qty; $food_name =  $food22_name; $food_rate =  $food22_rate; };
			if ($mycounter == 23) {  $food_id =  $food23_id; $food_qty =  $food23_qty; $food_name =  $food23_name; $food_rate =  $food23_rate; };
			if ($mycounter == 24) {  $food_id =  $food24_id; $food_qty =  $food24_qty; $food_name =  $food24_name; $food_rate =  $food24_rate; };
			if ($mycounter == 25) {  $food_id =  $food25_id; $food_qty =  $food25_qty; $food_name =  $food25_name; $food_rate =  $food25_rate; };
			if ($mycounter == 26) {  $food_id =  $food26_id; $food_qty =  $food26_qty; $food_name =  $food26_name; $food_rate =  $food26_rate; };
			if ($mycounter == 27) {  $food_id =  $food27_id; $food_qty =  $food27_qty; $food_name =  $food27_name; $food_rate =  $food27_rate; };
			if ($mycounter == 28) {  $food_id =  $food28_id; $food_qty =  $food28_qty; $food_name =  $food28_name; $food_rate =  $food28_rate; };
			if ($mycounter == 29) {  $food_id =  $food29_id; $food_qty =  $food29_qty; $food_name =  $food29_name; $food_rate =  $food29_rate; };
			if ($mycounter == 30) {  $food_id =  $food30_id; $food_qty =  $food30_qty; $food_name =  $food30_name; $food_rate =  $food30_rate; };
			
			if ($food_qty > 0)  
			{ 
				$tfid = 0;
				$tfdate = $globaldate;
				$tfname = $food_name;

				$tfqty = $food_qty;
				$tfrate = $food_rate;
				$tfamt = $food_qty * $food_rate;
				
				//$tlid = $tlid;
				$flid = $food_id;
				
				$tfactive = 'Y';
				$tfuser = $_SESSION["ulname"];
				$tfstamp = $globaldatetime;		
					
//echo "<br> tlid " . $tlid;
//echo "<br> flid " . $flid;
					
					
				//add room detail
				$query_food_add = 
					"INSERT INTO transaction_food (
						tfid,
						tfdate,
						tfname,
						tfqty,
						tfrate,
						tfamt,
						
						tlid,
						flid,
						
						tfactive,
						tfuser,
						tfstamp
					) 
					VALUES 
					(
						'$tfid',
						'$tfdate',
						'$tfname',
						'$tfqty',
						'$tfrate',
						'$tfamt',
						
						'$tlid',
						'$flid',
						
						'$tfactive',
						'$tfuser',
						'$tfstamp'
					)";
					
				//mysql_query($query_food_add) or die('Cannot add new food entries');
				mysql_query($query_food_add) or die('New Food : ' . mysql_error());  
			}		

			$mycounter = $mycounter + 1;		
		}		
	}	
		
		


	if ($_SESSION['tlid'] != '')
	{
		//addon info
				
		//delete all room details
		$query_addon_del = 
			"DELETE FROM 
			transaction_addon 
			WHERE
			tlid = '$tlid'";
		mysql_query($query_addon_del) or die('Cannot remove old addon entries');  
		
		$mycounter = 1;
		while ($mycounter <= 30)
		{
			$addon_qty = 0;
			if ($mycounter == 1) {  $addon_id =  $addon1_id; $addon_qty =  $addon1_qty; $addon_name =  $addon1_name; $addon_rate =  $addon1_rate; };
			if ($mycounter == 2) {  $addon_id =  $addon2_id; $addon_qty =  $addon2_qty; $addon_name =  $addon2_name; $addon_rate =  $addon2_rate; };
			if ($mycounter == 3) {  $addon_id =  $addon3_id; $addon_qty =  $addon3_qty; $addon_name =  $addon3_name; $addon_rate =  $addon3_rate; };
			if ($mycounter == 4) {  $addon_id =  $addon4_id; $addon_qty =  $addon4_qty; $addon_name =  $addon4_name; $addon_rate =  $addon4_rate; };
			if ($mycounter == 5) {  $addon_id =  $addon5_id;  $addon_qty =  $addon5_qty; $addon_name =  $addon5_name; $addon_rate =  $addon5_rate; };
			if ($mycounter == 6) {  $addon_id =  $addon6_id; $addon_qty =  $addon6_qty; $addon_name =  $addon6_name; $addon_rate =  $addon6_rate; };
			if ($mycounter == 7) {  $addon_id =  $addon7_id; $addon_qty =  $addon7_qty; $addon_name =  $addon7_name; $addon_rate =  $addon7_rate; };
			if ($mycounter == 8) {  $addon_id =  $addon8_id; $addon_qty =  $addon8_qty; $addon_name =  $addon8_name; $addon_rate =  $addon8_rate; };
			if ($mycounter == 9) {  $addon_id =  $addon9_id; $addon_qty =  $addon9_qty; $addon_name =  $addon9_name; $addon_rate =  $addon9_rate; };
			if ($mycounter == 10) {  $addon_id =  $addon10_id; $addon_qty =  $addon10_qty; $addon_name =  $addon10_name; $addon_rate =  $addon10_rate; };
	
			if ($mycounter == 11) {  $addon_id =  $addon11_id; $addon_qty =  $addon11_qty; $addon_name =  $addon11_name; $addon_rate =  $addon11_rate; };
			if ($mycounter == 12) {  $addon_id =  $addon12_id; $addon_qty =  $addon12_qty; $addon_name =  $addon12_name; $addon_rate =  $addon12_rate; };
			if ($mycounter == 13) {  $addon_id =  $addon13_id; $addon_qty =  $addon13_qty; $addon_name =  $addon13_name; $addon_rate =  $addon13_rate; };
			if ($mycounter == 14) {  $addon_id =  $addon14_id; $addon_qty =  $addon14_qty; $addon_name =  $addon14_name; $addon_rate =  $addon14_rate; };
			if ($mycounter == 15) {  $addon_id =  $addon15_id; $addon_qty =  $addon15_qty; $addon_name =  $addon15_name; $addon_rate =  $addon15_rate; };
			if ($mycounter == 16) {  $addon_id =  $addon16_id; $addon_qty =  $addon16_qty; $addon_name =  $addon16_name; $addon_rate =  $addon16_rate; };
			if ($mycounter == 17) {  $addon_id =  $addon17_id; $addon_qty =  $addon17_qty; $addon_name =  $addon17_name; $addon_rate =  $addon17_rate; };
			if ($mycounter == 18) {  $addon_id =  $addon18_id; $addon_qty =  $addon18_qty; $addon_name =  $addon18_name; $addon_rate =  $addon18_rate; };
			if ($mycounter == 19) {  $addon_id =  $addon19_id; $addon_qty =  $addon19_qty; $addon_name =  $addon19_name; $addon_rate =  $addon19_rate; };
			if ($mycounter == 20) {  $addon_id =  $addon20_id; $addon_qty =  $addon20_qty; $addon_name =  $addon20_name; $addon_rate =  $addon20_rate; };
	
			if ($mycounter == 21) {  $addon_id =  $addon21_id; $addon_qty =  $addon21_qty; $addon_name =  $addon21_name; $addon_rate =  $addon21_rate; };
			if ($mycounter == 22) {  $addon_id =  $addon22_id; $addon_qty =  $addon22_qty; $addon_name =  $addon22_name; $addon_rate =  $addon22_rate; };
			if ($mycounter == 23) {  $addon_id =  $addon23_id; $addon_qty =  $addon23_qty; $addon_name =  $addon23_name; $addon_rate =  $addon23_rate; };
			if ($mycounter == 24) {  $addon_id =  $addon24_id; $addon_qty =  $addon24_qty; $addon_name =  $addon24_name; $addon_rate =  $addon24_rate; };
			if ($mycounter == 25) {  $addon_id =  $addon25_id; $addon_qty =  $addon25_qty; $addon_name =  $addon25_name; $addon_rate =  $addon25_rate; };
			if ($mycounter == 26) {  $addon_id =  $addon26_id; $addon_qty =  $addon26_qty; $addon_name =  $addon26_name; $addon_rate =  $addon26_rate; };
			if ($mycounter == 27) {  $addon_id =  $addon27_id; $addon_qty =  $addon27_qty; $addon_name =  $addon27_name; $addon_rate =  $addon27_rate; };
			if ($mycounter == 28) {  $addon_id =  $addon28_id; $addon_qty =  $addon28_qty; $addon_name =  $addon28_name; $addon_rate =  $addon28_rate; };
			if ($mycounter == 29) {  $addon_id =  $addon29_id; $addon_qty =  $addon29_qty; $addon_name =  $addon29_name; $addon_rate =  $addon29_rate; };
			if ($mycounter == 30) {  $addon_id =  $addon30_id; $addon_qty =  $addon30_qty; $addon_name =  $addon30_name; $addon_rate =  $addon30_rate; };
			
			if ($addon_qty > 0)  
			{ 
				$taid = 0;
				$tadate = $globaldate;
				$taname = $addon_name;

				$taqty = $addon_qty;
				$tarate = $addon_rate;
				$taamt = $addon_qty * $addon_rate;
				
				//$tlid = $tlid;
				
				$raid = $addon_id;
				
				$taactive = 'Y';
				$tauser = $_SESSION["ulname"];
				$tastamp = $globaldatetime;		
					
				//add room detail
				$query_addon_add = 
					"INSERT INTO transaction_addon (
						taid,
						tadate,
						taname,
						taqty,
						tarate,
						taamt,
						
						tlid,
						raid,
						
						taactive,
						tauser,
						tastamp
					) 
					VALUES 
					(
						'$taid',
						'$tadate',
						'$taname',
						'$taqty',
						'$tarate',
						'$taamt',
						
						'$tlid',
						'$raid',
						
						'$taactive',
						'$tauser',
						'$tastamp'
					)";
					
				//mysql_query($query_addon_add) or die('Cannot add new room add-on entries.');
				mysql_query($query_addon_add) or die('New Add-On : ' . mysql_error());  				  		
			}		

			$mycounter = $mycounter + 1;		
		}		
	}	
	
?>											

<?php											
	if ($allow == 'true')
	{
?>	



<?php
//////////////////// PAY PAL //////////////////////

/*
<form id = "paypal_checkout" action = "<?php echo $paypal_myaction; ?>" method = "post">
	<input name = "cmd" value = "_cart" type = "hidden">
	<input name = "upload" value = "1" type = "hidden">
	<input name = "no_note" value = "0" type = "hidden">
	<input name = "bn" value = "PP-BuyNowBF" type = "hidden">
	<input name = "tax" value = "0" type = "hidden">
	<input name = "rm" value = "2" type = "hidden">
	
	<input name = "lc" value = "PH" type = "hidden">
	<input name = "currency_code" value="PHP" type = "hidden">

	<input name = "business" value="<?php echo $paypal_mybusiness; ?>" type = "hidden">
	<input name = "discount_amount_cart" type="hidden" value="<?php echo $grand_discount; ?>" />	
	
	<input type="hidden" name="notify_url" value="<?php echo $config_basedir; ?>index.php?body=paypal_notify&mystatus=<? echo $_SESSION['SESS_SESSION']; ?>">
	<input type="hidden" name="return" value = "<?php echo $config_basedir; ?>index.php?body=paypal_return&mystatus=<? echo $_SESSION['SESS_SESSION']; ?>">
	<input type="hidden" name="cbt" value = "Return to My Site and Get the Tracking ID">
	<input type="hidden" name="cancel_return" value = "<?php echo $config_basedir; ?>index.php?body=paypal_cancel&mystatus=<? echo $_SESSION['SESS_SESSION']; ?>">
			
	<input type = "hidden" name ="custom" value = "<?php echo $tlid; ?>">
	<input type = "hidden" name="address1" value="">
	<input type = "hidden" name="address2" value="">
	<input type = "hidden" name="city" value="">
	<input type = "hidden" name="state" value="n/a">
	<input type = "hidden" name="zip" value="">
	<input type = "hidden" name="country" value="PH">	

	<input name = "first_name" type="hidden" value="<?php echo $fname; ?>" />
	<input name = "last_name" type="hidden" value="<?php echo $lname; ?>" />
	<input name = "payer_email" type="hidden" value="<?php echo $email; ?>" />	
	<input name = "contact_phone" type="hidden" value="<?php echo $contact; ?>" />	

<?php
	$mycount = 0;
	$mycounter = 1;
	while ($mycounter <= 30)
	{
		$addon_qty = 0;
		if ($mycounter == 1) { $addon_qty =  $addon1_qty; $addon_name =  $addon1_name; $addon_rate =  $addon1_rate; };
		if ($mycounter == 2) { $addon_qty =  $addon2_qty; $addon_name =  $addon2_name; $addon_rate =  $addon2_rate; };
		if ($mycounter == 3) { $addon_qty =  $addon3_qty; $addon_name =  $addon3_name; $addon_rate =  $addon3_rate; };
		if ($mycounter == 4) { $addon_qty =  $addon4_qty; $addon_name =  $addon4_name; $addon_rate =  $addon4_rate; };
		if ($mycounter == 5) { $addon_qty =  $addon5_qty; $addon_name =  $addon5_name; $addon_rate =  $addon5_rate; };
		if ($mycounter == 6) { $addon_qty =  $addon6_qty; $addon_name =  $addon6_name; $addon_rate =  $addon6_rate; };
		if ($mycounter == 7) { $addon_qty =  $addon7_qty; $addon_name =  $addon7_name; $addon_rate =  $addon7_rate; };
		if ($mycounter == 8) { $addon_qty =  $addon8_qty; $addon_name =  $addon8_name; $addon_rate =  $addon8_rate; };
		if ($mycounter == 9) { $addon_qty =  $addon9_qty; $addon_name =  $addon9_name; $addon_rate =  $addon9_rate; };
		if ($mycounter == 10) { $addon_qty =  $addon10_qty; $addon_name =  $addon10_name; $addon_rate =  $addon10_rate; };

		if ($mycounter == 11) { $addon_qty =  $addon11_qty; $addon_name =  $addon11_name; $addon_rate =  $addon11_rate; };
		if ($mycounter == 12) { $addon_qty =  $addon12_qty; $addon_name =  $addon12_name; $addon_rate =  $addon12_rate; };
		if ($mycounter == 13) { $addon_qty =  $addon13_qty; $addon_name =  $addon13_name; $addon_rate =  $addon13_rate; };
		if ($mycounter == 14) { $addon_qty =  $addon14_qty; $addon_name =  $addon14_name; $addon_rate =  $addon14_rate; };
		if ($mycounter == 15) { $addon_qty =  $addon15_qty; $addon_name =  $addon15_name; $addon_rate =  $addon15_rate; };
		if ($mycounter == 16) { $addon_qty =  $addon16_qty; $addon_name =  $addon16_name; $addon_rate =  $addon16_rate; };
		if ($mycounter == 17) { $addon_qty =  $addon17_qty; $addon_name =  $addon17_name; $addon_rate =  $addon17_rate; };
		if ($mycounter == 18) { $addon_qty =  $addon18_qty; $addon_name =  $addon18_name; $addon_rate =  $addon18_rate; };
		if ($mycounter == 19) { $addon_qty =  $addon19_qty; $addon_name =  $addon19_name; $addon_rate =  $addon19_rate; };
		if ($mycounter == 20) { $addon_qty =  $addon20_qty; $addon_name =  $addon20_name; $addon_rate =  $addon20_rate; };

		if ($mycounter == 21) { $addon_qty =  $addon21_qty; $addon_name =  $addon21_name; $addon_rate =  $addon21_rate; };
		if ($mycounter == 22) { $addon_qty =  $addon22_qty; $addon_name =  $addon22_name; $addon_rate =  $addon22_rate; };
		if ($mycounter == 23) { $addon_qty =  $addon23_qty; $addon_name =  $addon23_name; $addon_rate =  $addon23_rate; };
		if ($mycounter == 24) { $addon_qty =  $addon24_qty; $addon_name =  $addon24_name; $addon_rate =  $addon24_rate; };
		if ($mycounter == 25) { $addon_qty =  $addon25_qty; $addon_name =  $addon25_name; $addon_rate =  $addon25_rate; };
		if ($mycounter == 26) { $addon_qty =  $addon26_qty; $addon_name =  $addon26_name; $addon_rate =  $addon26_rate; };
		if ($mycounter == 27) { $addon_qty =  $addon27_qty; $addon_name =  $addon27_name; $addon_rate =  $addon27_rate; };
		if ($mycounter == 28) { $addon_qty =  $addon28_qty; $addon_name =  $addon28_name; $addon_rate =  $addon28_rate; };
		if ($mycounter == 29) { $addon_qty =  $addon29_qty; $addon_name =  $addon29_name; $addon_rate =  $addon29_rate; };
		if ($mycounter == 30) { $addon_qty =  $addon30_qty; $addon_name =  $addon30_name; $addon_rate =  $addon30_rate; };
		
		if ($addon_qty > 0) 
		{ 
			$mycount = $mycount + 1;
			$myamount = $addon_qty * $addon_rate;
		?>
			<div id = "item_<?php echo $mycount; ?>" class = "itemwrap">
				<input name = "item_name_<?php echo $mycount; ?>" value = "<?php echo $addon_name; ?>" type = "hidden">
				<input name = "quantity_<?php echo $mycount; ?>" value = "<?php echo $addon_qty; ?>" type = "hidden">
				<input name = "amount_<?php echo $mycount; ?>" value = "<?php echo $addon_rate; ?>" type = "hidden">
			</div>
		<?php	
		}		

		
		//echo $itemlistrow['plname'] . '<br>'; 
		//echo number_format($itemlistrow['tldqty']) . '<br>'; 
		//echo $itemlistrow['tldprice'] . '<br>'; 
		
		$mycounter = $mycounter + 1;		
	}
	
	$mycounter = 1;
	while ($mycounter <= 30)
	{
		$food_qty = 0;
		if ($mycounter == 1) { $food_qty =  $food1_qty; $food_name =  $food1_name; $food_rate =  $food1_rate; };
		if ($mycounter == 2) { $food_qty =  $food2_qty; $food_name =  $food2_name; $food_rate =  $food2_rate; };
		if ($mycounter == 3) { $food_qty =  $food3_qty; $food_name =  $food3_name; $food_rate =  $food3_rate; };
		if ($mycounter == 4) { $food_qty =  $food4_qty; $food_name =  $food4_name; $food_rate =  $food4_rate; };
		if ($mycounter == 5) { $food_qty =  $food5_qty; $food_name =  $food5_name; $food_rate =  $food5_rate; };
		if ($mycounter == 6) { $food_qty =  $food6_qty; $food_name =  $food6_name; $food_rate =  $food6_rate; };
		if ($mycounter == 7) { $food_qty =  $food7_qty; $food_name =  $food7_name; $food_rate =  $food7_rate; };
		if ($mycounter == 8) { $food_qty =  $food8_qty; $food_name =  $food8_name; $food_rate =  $food8_rate; };
		if ($mycounter == 9) { $food_qty =  $food9_qty; $food_name =  $food9_name; $food_rate =  $food9_rate; };
		if ($mycounter == 10) { $food_qty =  $food10_qty; $food_name =  $food10_name; $food_rate =  $food10_rate; };

		if ($mycounter == 11) { $food_qty =  $food11_qty; $food_name =  $food11_name; $food_rate =  $food11_rate; };
		if ($mycounter == 12) { $food_qty =  $food12_qty; $food_name =  $food12_name; $food_rate =  $food12_rate; };
		if ($mycounter == 13) { $food_qty =  $food13_qty; $food_name =  $food13_name; $food_rate =  $food13_rate; };
		if ($mycounter == 14) { $food_qty =  $food14_qty; $food_name =  $food14_name; $food_rate =  $food14_rate; };
		if ($mycounter == 15) { $food_qty =  $food15_qty; $food_name =  $food15_name; $food_rate =  $food15_rate; };
		if ($mycounter == 16) { $food_qty =  $food16_qty; $food_name =  $food16_name; $food_rate =  $food16_rate; };
		if ($mycounter == 17) { $food_qty =  $food17_qty; $food_name =  $food17_name; $food_rate =  $food17_rate; };
		if ($mycounter == 18) { $food_qty =  $food18_qty; $food_name =  $food18_name; $food_rate =  $food18_rate; };
		if ($mycounter == 19) { $food_qty =  $food19_qty; $food_name =  $food19_name; $food_rate =  $food19_rate; };
		if ($mycounter == 20) { $food_qty =  $food20_qty; $food_name =  $food20_name; $food_rate =  $food20_rate; };

		if ($mycounter == 21) { $food_qty =  $food21_qty; $food_name =  $food21_name; $food_rate =  $food21_rate; };
		if ($mycounter == 22) { $food_qty =  $food22_qty; $food_name =  $food22_name; $food_rate =  $food22_rate; };
		if ($mycounter == 23) { $food_qty =  $food23_qty; $food_name =  $food23_name; $food_rate =  $food23_rate; };
		if ($mycounter == 24) { $food_qty =  $food24_qty; $food_name =  $food24_name; $food_rate =  $food24_rate; };
		if ($mycounter == 25) { $food_qty =  $food25_qty; $food_name =  $food25_name; $food_rate =  $food25_rate; };
		if ($mycounter == 26) { $food_qty =  $food26_qty; $food_name =  $food26_name; $food_rate =  $food26_rate; };
		if ($mycounter == 27) { $food_qty =  $food27_qty; $food_name =  $food27_name; $food_rate =  $food27_rate; };
		if ($mycounter == 28) { $food_qty =  $food28_qty; $food_name =  $food28_name; $food_rate =  $food28_rate; };
		if ($mycounter == 29) { $food_qty =  $food29_qty; $food_name =  $food29_name; $food_rate =  $food29_rate; };
		if ($mycounter == 30) { $food_qty =  $food30_qty; $food_name =  $food30_name; $food_rate =  $food30_rate; };
		
		if ($food_qty > 0) 
		{ 
			$mycount = $mycount + 1;
			$myamount = $food_qty * $food_rate;
		?>
			<div id = "item_<?php echo $mycount; ?>" class = "itemwrap">
				<input name = "item_name_<?php echo $mycount; ?>" value = "<?php echo $food_name; ?>" type = "hidden">
				<input name = "quantity_<?php echo $mycount; ?>" value = "<?php echo $food_qty; ?>" type = "hidden">
				<input name = "amount_<?php echo $mycount; ?>" value = "<?php echo $food_rate; ?>" type = "hidden">
			</div>
		<?php	
		}		

		
		//echo $itemlistrow['plname'] . '<br>'; 
		//echo number_format($itemlistrow['tldqty']) . '<br>'; 
		//echo $itemlistrow['tldprice'] . '<br>'; 
		
		$mycounter = $mycounter + 1;		
	}
	
	//this is for the room rate
	$mycount = $mycount + 1;
?>

	<div id = "item_<?php echo $mycount; ?>" class = "itemwrap">
		<input name = "item_name_<?php echo $mycount; ?>" value = "<?php echo $rlname; ?>" type = "hidden">
		<input name = "quantity_<?php echo $mycount; ?>" value = "<?php echo $trdays; ?>" type = "hidden">
		<input name = "amount_<?php echo $mycount; ?>" value = "<?php echo $rlrate; ?>" type = "hidden">
	</div>
	
	<input id = "ppcheckoutbtn" value = "PAY NOW"  class="btn next-step gray-bttn" type = "submit">
	
</form>	
*/
?>










<?php
////////////////////// ASIA PAY ////////////////////////////////

/*
<form name="payFormCcard" method="post" action="<?php echo $ASIAPAY_URL_TEST; ?>">
<input type="hidden" name="merchantId" value="<?php echo $ASIAPAY_MERCHANT_ID_TEST; ?>">
				
<input type="hidden" name="amount" value="<?php echo $grand_total; ?>" >

<input type="hidden" name="orderRef" value="<?php $tlid = $tlid + 1; echo $tlid; ?>">
<input type="hidden" name="currCode" value="608" >
<input type="hidden" name="mpsMode" value="NIL" >

<input type="hidden" name="successUrl" value="<?php echo $config_basedir; ?>index.php?body=paypal_notify&mystatus=<? echo $tlsession; ?>">
<input type="hidden" name="failUrl" value="<?php echo $config_basedir; ?>index.php?body=paypal_return&mystatus=<? echo $tlsession; ?>">
<input type="hidden" name="cancelUrl" value="<?php echo $config_basedir; ?>index.php?body=paypal_cancel&mystatus=<? echo $tlsession; ?>">

<input type="hidden" name="payType" value="N">
<input type="hidden" name="lang" value="E">
<input type="hidden" name="payMethod" value="CC">
<input type="hidden" name="secureHash" value="<?php echo $SECURITY_HASH; ?>">

<input id = "ppcheckoutbtn" value = "PAY NOW"  class="btn next-step gray-bttn" type = "submit">
</form>

*/
?>


<?php
//////////////// PAYNAMICS ////////////////////////

	//get comapany info
	$query_company = " SELECT *
			   FROM company_list ";
	$result_company = mysql_query($query_company);
	echo mysql_error();				
	while ($row_company =  mysql_fetch_array ($result_company)) 
	{
		$coid = $row_company[coid];
		$coname = $row_company[coname];
		$coaddr = $row_company[coaddr];
		$cophone = $row_company[cophone];
		$cofax = $row_company[cofax];
		$coemail = $row_company[coemail];
		$comobile = $row_company[comobile];
		$cowebsite = $row_company[cowebsite];
		
		$cofacebook = $row_company[cofacebook];
		$cotwitter = $row_company[cotwitter];
		$coinstagram = $row_company[coinstagram];
		$coyoutube = $row_company[coyoutube];
		
		$comarketing = $row_company[comarketing];
		
		$comerchant_key = $row_company[comerchant_key];
		$comerchant_id = $row_company[comerchant_id];
		$coip_address = $row_company[coip_address];
		
		$coactive = $row_company[coactive];
		$couser = $row_company[couser];
		$costamp = $row_company[costamp];
	}
	  
	  
	  
	  
                                                      
/*	
	echo "<br> tlid " . $tlid;
	echo "<br> tldocno " . $tldocno;
	echo "<br> tlfood " . $tlfood;
	echo "<br> tladdon " . $tladdon;
	echo "<br> tlsession " . $tlsession;
		
	echo '<br> check_in : ' . $check_in;
	echo '<br> check_in : ' . $check_in;
	
	echo '<br> check_out : ' . $check_out;
	echo '<br> check_out : ' . $check_out;
	
	echo '<br> nearest_branch : ' . $nearest_branch;
	echo '<br> select_branch : ' . $select_branch;
	echo '<br> check_in_time : ' . $check_in_time;
	echo '<br> view_rooms : ' . $view_rooms;
	
	echo '<br> adults_count : ' . $adults_count;
	echo '<br> kids_count : ' . $kids_count;
	
	echo '<br> party_rooms : ' . $party_rooms;
	echo '<br> suite : ' . $suite;
	echo '<br> mini_suite : ' . $mini_suite;
	echo '<br> super_deluxe : ' . $super_deluxe;
	echo '<br> deluxe : ' . $deluxe;
	echo '<br> single : ' . $single;
	
	echo '<br> chosen_room : ' . $chosen_room;

	echo '<br> food_serving_checkin_time : ' . $food_serving_checkin_time;
	echo '<br> food_serving_time : ' . $food_serving_time;	  
*/	  
	  
	  
	  
	  
	  
	$_mid = $comerchant_id; //<-- your merchant id
	//$_requestid = substr(uniqid(), 0, 13);
	$_requestid = $tlid;
	$_ipaddress = $coip_address;
	
	// url where response is posted
	// simple page
	$_noturl = $config_basedir . "body_paypal_notify.php"; 
	
	// url of merchant landing page
	// notify page if ok
	$_resurl = $config_basedir . "index.php?body=paypal_return&mystatus=" . $_SESSION['SESS_SESSION'];
	
	//url of merchant cancel landing page
	// 
	$_cancelurl = $config_basedir . "index.php?body=paypal_cancel&mystatus=" . $_SESSION['SESS_SESSION'];

	
	// kindly set this to first name of the cutomer
	$_fname = $fname; 
	// kindly set this to middle name of the cutomer
	$_mname = " . "; 
	// kindly set this to last name of the cutomer
	$_lname = $lname; 
	// kindly set this to address1 of the cutomer
	$_addr1 = "care of vc";
	// kindly set this to address2 of the cutomer 
	$_addr2 = "care of vc";
	// kindly set this to city of the cutomer
	$_city = "care of vc"; 
	// kindly set this to state of the cutomer
	$_state = "care of vc"; 
	// kindly set this to country of the cutomer
	$_country = "care of vc"; 
	// kindly set this to zip/postal of the cutomer
	$_zip = "care of vc"; 
	//
	$_sec3d = "try3d"; //
	// kindly set this to email of the cutomer 
	$_email = $email; 
	// kindly set this to phone number of the cutomer
	$_phone = $contact;  
	// kindly set this to mobile number of the cutomer
	$_mobile = $contact; 
	
	$_clientip = $_SERVER['REMOTE_ADDR'];
	
	// kindly set this to the total amount of the transaction. Set the amount to 2 decimal point before generating signature.
	//$_amount = number_format($grand_total,2);
	$_amount = number_format($gross_total,2);
	$_amount = str_replace(",","", $_amount);
	
	//TEST
	//$_amount = number_format(10.00,2); 
	
	//PHP or USD
	$_currency = "PHP"; 
	$forSign = $_mid . $_requestid . $_ipaddress . $_noturl . $_resurl .  $_fname . $_lname . $_mname . $_addr1 . $_addr2 . $_city . $_state . $_country . $_zip . $_email . $_phone . $_clientip . $_amount . $_currency . $_sec3d;
	$cert = $comerchant_key; //<-- your merchant key
	
	//echo "<br> mid " . $_mid . "<hr />";
	//echo "<br> cert " . $cert . "<hr />";
	//echo "<br> forSign " . $forSign . "<hr />";
	
	$_sign = hash("sha512", $forSign.$cert);
	$xmlstr = "";
	
	$strxml = "";
	
	$strxml = $strxml . "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
	$strxml = $strxml . "<Request>";
	$strxml = $strxml . "<orders>";
	$strxml = $strxml . "<items>";
	$strxml = $strxml . "<Items>";
	
	///////////////// room  /////////////////	
	
	if ($tramt > 0) 
	{
		$tramt2 = number_format($tramt,2);
		$tramt2 = str_replace(",","", $tramt2);
		$strxml = $strxml . "<itemname>" . $trname . "</itemname><quantity>" . $trdays . "</quantity><amount>" . $tramt2 . "</amount>";
	} 
	
	///////////////// promo discount /////////////////	
		
	if ($tpamt > 0) 
	{
		$tpqty2 = 1 * (-1);
	
		$tpamt2 = $tpamt * (-1);
		$tpamt2 = number_format($tpamt2,2);
		$tpamt2 = str_replace(",","", $tpamt2);
		$strxml = $strxml . "<itemname>" . $tpname . "</itemname><quantity>" . $tpqty2 . "</quantity><amount>" . $tpamt2 . "</amount>"; 
	}
	  
	///////////////// add on  /////////////////	
	$mycount = 0;
	$mycounter = 1;
	while ($mycounter <= 30)
	{
		$addon_qty = 0;
		if ($mycounter == 1) { $addon_qty =  $addon1_qty; $addon_name =  $addon1_name; $addon_rate =  $addon1_rate; };
		if ($mycounter == 2) { $addon_qty =  $addon2_qty; $addon_name =  $addon2_name; $addon_rate =  $addon2_rate; };
		if ($mycounter == 3) { $addon_qty =  $addon3_qty; $addon_name =  $addon3_name; $addon_rate =  $addon3_rate; };
		if ($mycounter == 4) { $addon_qty =  $addon4_qty; $addon_name =  $addon4_name; $addon_rate =  $addon4_rate; };
		if ($mycounter == 5) { $addon_qty =  $addon5_qty; $addon_name =  $addon5_name; $addon_rate =  $addon5_rate; };
		if ($mycounter == 6) { $addon_qty =  $addon6_qty; $addon_name =  $addon6_name; $addon_rate =  $addon6_rate; };
		if ($mycounter == 7) { $addon_qty =  $addon7_qty; $addon_name =  $addon7_name; $addon_rate =  $addon7_rate; };
		if ($mycounter == 8) { $addon_qty =  $addon8_qty; $addon_name =  $addon8_name; $addon_rate =  $addon8_rate; };
		if ($mycounter == 9) { $addon_qty =  $addon9_qty; $addon_name =  $addon9_name; $addon_rate =  $addon9_rate; };
		if ($mycounter == 10) { $addon_qty =  $addon10_qty; $addon_name =  $addon10_name; $addon_rate =  $addon10_rate; };
	
		if ($mycounter == 11) { $addon_qty =  $addon11_qty; $addon_name =  $addon11_name; $addon_rate =  $addon11_rate; };
		if ($mycounter == 12) { $addon_qty =  $addon12_qty; $addon_name =  $addon12_name; $addon_rate =  $addon12_rate; };
		if ($mycounter == 13) { $addon_qty =  $addon13_qty; $addon_name =  $addon13_name; $addon_rate =  $addon13_rate; };
		if ($mycounter == 14) { $addon_qty =  $addon14_qty; $addon_name =  $addon14_name; $addon_rate =  $addon14_rate; };
		if ($mycounter == 15) { $addon_qty =  $addon15_qty; $addon_name =  $addon15_name; $addon_rate =  $addon15_rate; };
		if ($mycounter == 16) { $addon_qty =  $addon16_qty; $addon_name =  $addon16_name; $addon_rate =  $addon16_rate; };
		if ($mycounter == 17) { $addon_qty =  $addon17_qty; $addon_name =  $addon17_name; $addon_rate =  $addon17_rate; };
		if ($mycounter == 18) { $addon_qty =  $addon18_qty; $addon_name =  $addon18_name; $addon_rate =  $addon18_rate; };
		if ($mycounter == 19) { $addon_qty =  $addon19_qty; $addon_name =  $addon19_name; $addon_rate =  $addon19_rate; };
		if ($mycounter == 20) { $addon_qty =  $addon20_qty; $addon_name =  $addon20_name; $addon_rate =  $addon20_rate; };
	
		if ($mycounter == 21) { $addon_qty =  $addon21_qty; $addon_name =  $addon21_name; $addon_rate =  $addon21_rate; };
		if ($mycounter == 22) { $addon_qty =  $addon22_qty; $addon_name =  $addon22_name; $addon_rate =  $addon22_rate; };
		if ($mycounter == 23) { $addon_qty =  $addon23_qty; $addon_name =  $addon23_name; $addon_rate =  $addon23_rate; };
		if ($mycounter == 24) { $addon_qty =  $addon24_qty; $addon_name =  $addon24_name; $addon_rate =  $addon24_rate; };
		if ($mycounter == 25) { $addon_qty =  $addon25_qty; $addon_name =  $addon25_name; $addon_rate =  $addon25_rate; };
		if ($mycounter == 26) { $addon_qty =  $addon26_qty; $addon_name =  $addon26_name; $addon_rate =  $addon26_rate; };
		if ($mycounter == 27) { $addon_qty =  $addon27_qty; $addon_name =  $addon27_name; $addon_rate =  $addon27_rate; };
		if ($mycounter == 28) { $addon_qty =  $addon28_qty; $addon_name =  $addon28_name; $addon_rate =  $addon28_rate; };
		if ($mycounter == 29) { $addon_qty =  $addon29_qty; $addon_name =  $addon29_name; $addon_rate =  $addon29_rate; };
		if ($mycounter == 30) { $addon_qty =  $addon30_qty; $addon_name =  $addon30_name; $addon_rate =  $addon30_rate; };
		
		if ($addon_qty > 0) 
		{ 
			$mycount = $mycount + 1;
			
			$myamount = $addon_qty * $addon_rate;
			$myamount2 = number_format($myamount,2);
			$myamount2 = str_replace(",","", $myamount2);	
			$strxml = $strxml . "<itemname>" . $addon_name . "</itemname><quantity>" . $addon_qty . "</quantity><amount>" . $myamount2 . "</amount>"; 
		}		
		
		//echo $itemlistrow['plname'] . '<br>'; 
		//echo number_format($itemlistrow['tldqty']) . '<br>'; 
		//echo $itemlistrow['tldprice'] . '<br>'; 
		
		$mycounter = $mycounter + 1;		
	}
	
	///////////////// food  /////////////////	
	$mycounter = 1;
	while ($mycounter <= 30)
	{
		$food_qty = 0;
		if ($mycounter == 1) { $food_qty =  $food1_qty; $food_name =  $food1_name; $food_rate =  $food1_rate; };
		if ($mycounter == 2) { $food_qty =  $food2_qty; $food_name =  $food2_name; $food_rate =  $food2_rate; };
		if ($mycounter == 3) { $food_qty =  $food3_qty; $food_name =  $food3_name; $food_rate =  $food3_rate; };
		if ($mycounter == 4) { $food_qty =  $food4_qty; $food_name =  $food4_name; $food_rate =  $food4_rate; };
		if ($mycounter == 5) { $food_qty =  $food5_qty; $food_name =  $food5_name; $food_rate =  $food5_rate; };
		if ($mycounter == 6) { $food_qty =  $food6_qty; $food_name =  $food6_name; $food_rate =  $food6_rate; };
		if ($mycounter == 7) { $food_qty =  $food7_qty; $food_name =  $food7_name; $food_rate =  $food7_rate; };
		if ($mycounter == 8) { $food_qty =  $food8_qty; $food_name =  $food8_name; $food_rate =  $food8_rate; };
		if ($mycounter == 9) { $food_qty =  $food9_qty; $food_name =  $food9_name; $food_rate =  $food9_rate; };
		if ($mycounter == 10) { $food_qty =  $food10_qty; $food_name =  $food10_name; $food_rate =  $food10_rate; };
	
		if ($mycounter == 11) { $food_qty =  $food11_qty; $food_name =  $food11_name; $food_rate =  $food11_rate; };
		if ($mycounter == 12) { $food_qty =  $food12_qty; $food_name =  $food12_name; $food_rate =  $food12_rate; };
		if ($mycounter == 13) { $food_qty =  $food13_qty; $food_name =  $food13_name; $food_rate =  $food13_rate; };
		if ($mycounter == 14) { $food_qty =  $food14_qty; $food_name =  $food14_name; $food_rate =  $food14_rate; };
		if ($mycounter == 15) { $food_qty =  $food15_qty; $food_name =  $food15_name; $food_rate =  $food15_rate; };
		if ($mycounter == 16) { $food_qty =  $food16_qty; $food_name =  $food16_name; $food_rate =  $food16_rate; };
		if ($mycounter == 17) { $food_qty =  $food17_qty; $food_name =  $food17_name; $food_rate =  $food17_rate; };
		if ($mycounter == 18) { $food_qty =  $food18_qty; $food_name =  $food18_name; $food_rate =  $food18_rate; };
		if ($mycounter == 19) { $food_qty =  $food19_qty; $food_name =  $food19_name; $food_rate =  $food19_rate; };
		if ($mycounter == 20) { $food_qty =  $food20_qty; $food_name =  $food20_name; $food_rate =  $food20_rate; };
	
		if ($mycounter == 21) { $food_qty =  $food21_qty; $food_name =  $food21_name; $food_rate =  $food21_rate; };
		if ($mycounter == 22) { $food_qty =  $food22_qty; $food_name =  $food22_name; $food_rate =  $food22_rate; };
		if ($mycounter == 23) { $food_qty =  $food23_qty; $food_name =  $food23_name; $food_rate =  $food23_rate; };
		if ($mycounter == 24) { $food_qty =  $food24_qty; $food_name =  $food24_name; $food_rate =  $food24_rate; };
		if ($mycounter == 25) { $food_qty =  $food25_qty; $food_name =  $food25_name; $food_rate =  $food25_rate; };
		if ($mycounter == 26) { $food_qty =  $food26_qty; $food_name =  $food26_name; $food_rate =  $food26_rate; };
		if ($mycounter == 27) { $food_qty =  $food27_qty; $food_name =  $food27_name; $food_rate =  $food27_rate; };
		if ($mycounter == 28) { $food_qty =  $food28_qty; $food_name =  $food28_name; $food_rate =  $food28_rate; };
		if ($mycounter == 29) { $food_qty =  $food29_qty; $food_name =  $food29_name; $food_rate =  $food29_rate; };
		if ($mycounter == 30) { $food_qty =  $food30_qty; $food_name =  $food30_name; $food_rate =  $food30_rate; };
		
		if ($food_qty > 0) 
		{ 
			$mycount = $mycount + 1;
			
			$myamount = $food_qty * $food_rate;
			$myamount2 = number_format($myamount,2);
			$myamount2 = str_replace(",","", $myamount2);	
			$strxml = $strxml . "<itemname>" . $food_name . "</itemname><quantity>" . $food_qty . "</quantity><amount>" . $myamount2 . "</amount>"; 
		}		
		
		//echo $itemlistrow['plname'] . '<br>'; 
		//echo number_format($itemlistrow['tldqty']) . '<br>'; 
		//echo $itemlistrow['tldprice'] . '<br>'; 
		
		$mycounter = $mycounter + 1;		
	}
	
	//this is for the room rate
	$mycount = $mycount + 1;	  
	  
	
	// pls change this value to the preferred item to be seen by customer. 
	//(eg. Room Detail (itemname - Beach Villa, 1 Room, 2 Adults       
	//quantity - 0       amount - 10)) 
	//NOTE : total amount of item/s should be equal to the amount passed in amount xml node below. 
	
	//TEST
	//$_amount = number_format(10.00,2); 
	//$strxml = $strxml . "<itemname>item 1</itemname><quantity>1</quantity><amount>" . $_amount . "</amount>"; 
	
	$strxml = $strxml . "</Items>";
	$strxml = $strxml . "</items>";
	$strxml = $strxml . "</orders>";
	$strxml = $strxml . "<mid>" . $_mid . "</mid>";
	$strxml = $strxml . "<request_id>" . $_requestid . "</request_id>";
	$strxml = $strxml . "<ip_address>" . $_ipaddress . "</ip_address>";
	$strxml = $strxml . "<notification_url>" . $_noturl . "</notification_url>";
	$strxml = $strxml . "<response_url>" . $_resurl . "</response_url>";
	$strxml = $strxml . "<cancel_url>" . $_cancelurl . "</cancel_url>";
	// pls set this to the url where your terms and conditions are hosted
	$strxml = $strxml . "<mtac_url></mtac_url>"; 
	// pls set this to the descriptor of the merchant ""
	$strxml = $strxml . "<descriptor_note>''</descriptor_note>"; 
	$strxml = $strxml . "<fname>" . $_fname . "</fname>";
	$strxml = $strxml . "<lname>" . $_lname . "</lname>";
	$strxml = $strxml . "<mname>" . $_mname . "</mname>";
	$strxml = $strxml . "<address1>" . $_addr1 . "</address1>";
	$strxml = $strxml . "<address2>" . $_addr2 . "</address2>";
	$strxml = $strxml . "<city>" . $_city . "</city>";
	$strxml = $strxml . "<state>" . $_state . "</state>";
	$strxml = $strxml . "<country>" . $_country . "</country>";
	$strxml = $strxml . "<zip>" . $_zip . "</zip>";
	$strxml = $strxml . "<secure3d>" . $_sec3d . "</secure3d>";
	$strxml = $strxml . "<trxtype>sale</trxtype>";
	$strxml = $strxml . "<email>" . $_email . "</email>";
	$strxml = $strxml . "<phone>" . $_phone . "</phone>";
	$strxml = $strxml . "<mobile>" . $_mobile . "</mobile>";
	$strxml = $strxml . "<client_ip>" . $_clientip . "</client_ip>";
	$strxml = $strxml . "<amount>" . $_amount . "</amount>";
	$strxml = $strxml . "<currency>" . $_currency . "</currency>";
	$strxml = $strxml . "<mlogo_url>http://www.victoriacourt.biz/captivate/assets/images/logo.png</mlogo_url>";// pls set this to the url where your logo is hosted
	$strxml = $strxml . "<pmethod></pmethod>";
	$strxml = $strxml . "<signature>" . $_sign . "</signature>";
	$strxml = $strxml . "</Request>";
	$b64string =  base64_encode($strxml);
	
	//echo "<br> strxml  <pre>" . $strxml . "</pre><hr />";
	
	//echo "<br> base64 " . $b64string . "<hr />";
	
	//TEST URL
	//echo '<form name="form1" method="post" action="https://testpti.payserv.net/webpaymentv2/default.aspx">
	//20170423
	//LIVE URL
	//echo '<form name="form1" method="post" action="https://ptiapps.paynamics.net/webpayment_v2/default.aspx">

		
		
	echo '<form name="form1" method="post" action="https://ptiapps.paynamics.net/webpayment_v2/default.aspx">
		<input type="hidden" name="paymentrequest" id="paymentrequest" value="'.$b64string.'">
		<input class="btn next-step gray-bttn" type="submit" value="PAY NOW">
	</form>';
	
?>

		
<?php	
	}
	else
	{
?> 	
<form id = "paypal_checkout" action = "index.php?body=room-selection" method = "post">
	<input id = "ppcheckoutbtn" value = "BACK TO ROOM SELECTION"  class="btn next-step gray-bttn" type = "submit">
</form>	
<?php											
	}
	
	//<button class="btn next-step gray-bttn">Proceed to Confirmation</button>
?>													
												
                                            </div>
                                        </div>											
																					
                                        <div class="col-xs-12">
                                            <div class="policies-holder">
                                                <p class="title">Policies</p>
                                                <p>All times indicated in the policies are expressed in hotel's local time (GMT +08:00). </p>
                                                <p class="space"></p>
                                                <p>Check-In: 02:00 PM </p>
                                                <p>Check-Out: 12:00 PM </p>
                                                <p class="space"></p>
                                                <p>Children Policy: Children 12 and below can stay in the hotel for free. Maximum number of children allowed to stay for free depends on the room type booked.</p>
                                                <p class="space"></p>
                                                <p>Modification Policy: Must be 3 days or more before the check-in date. if done later, the first night of reservation will be charged. </p>
                                                <p class="space"></p>
                                                <p>Cancellation Policy: Book & buy, non-refundable. </p>
                                                <p class="space"></p>
                                                <p>No-show Policy: Guests who do not arrive within 24 hours of check-in date and time of the hotel will be charged the total amount of the reservation. </p>
                                                <p class="space"></p>
                                                <p>Cancellations for short time stays, we strictly follow the time of arrival indicated in their vouchers. We can only give a leeway of 15 minutes for those who will be late. Should they go beyond the 15 minute leeway, their reservation will be forfeited and no refund will be given to them. Modification of their stay is not allowed. Cancellations & Modifications for 12 & 24 hours stay should be made 3 days prior check in date. If they cancel beyond 3 days, they will be charged for 1 night. </p>
                                                
                                                <p>Additional Information:</p>
                                                <p>Children: One child, 12 years old and below, is free of charge when not requiring an extra bed while staying in the same room as parents or guardian.</p>
                                                <p>Credit Cards: Major credit cards accepted.</p>
                                                <p>Daily Payment: Guests are required to settle room charges every 24 hours.</p>
                                                <p>Late Check-out: Late check-out is subject to room availability. The applicable late check-out charge is based on the current overtime rate of the room.</p>
                                                <p>No Firearms: No firearms allowed in the hotel premises. </p>
                                                <p>No Pets: Pets are allowed in Malate, Gil Puyat & Cuneta. </p>
                                                <p class="space"></p>
                                                <p>Disclaimer</p>
                                                <p>
                                                    Each room design is distinct from each other and is subject for availability. You may email the Duty Manager at Contact Us if you wish to reserve a
                                                    specific room design.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>
    <footer>
        <section class="testimonial-sec">
            <div class="testi-gallery-holder">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
                            <?php include "testimonial.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="instagram-feeds">
            <div id="instafeed">
                <div id="instagram-carousel"></div>
            </div>
        </section>
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <?php include "footer_menu.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>