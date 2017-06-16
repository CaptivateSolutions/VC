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
	
	$chosen_room = '';	
	if(isset($_POST['chosen_room']))
	{
		if ($_POST['chosen_room'])
		{
			$chosen_room = $_POST['chosen_room'];
		 	$_SESSION['chosen_room'] = $chosen_room;
		}
	}		
	
	

	$fname = '';	
	if(isset($_POST['fname']))
	{
		if ($_POST['fname'])
		{
			$fname = $_POST['fname'];
			$fname = mysql_real_escape_string($fname); 
		 	$_SESSION['fname'] = $fname;
		}
	}						

	$lname = '';	
	if(isset($_POST['lname']))
	{
		if ($_POST['lname'])
		{
			$lname = $_POST['lname'];
			$lname = mysql_real_escape_string($lname); 
		 	$_SESSION['lname'] = $lname;
		}
	}	
	
	$email = '';	
	if(isset($_POST['email']))
	{
		if ($_POST['email'])
		{
			$email = $_POST['email'];
			$email = mysql_real_escape_string($email);  
		 	$_SESSION['email'] = $email;
		}
	}						

	$re_email = '';	
	if(isset($_POST['re_email']))
	{
		if ($_POST['re_email'])
		{
			$re_email = $_POST['re_email'];
			$re_email = mysql_real_escape_string($re_email);
		 	$_SESSION['re_email'] = $re_email;
		}
	}		
	
	$contact = '';	
	if(isset($_POST['contact']))
	{
		if ($_POST['contact'])
		{
			$contact = $_POST['contact'];
			$contact = mysql_real_escape_string($contact);
		 	$_SESSION['contact'] = $contact;
		}
	}						

	$promo_code = '';	
	if(isset($_POST['promo_code']))
	{
		if ($_POST['promo_code'])
		{
			$promo_code = $_POST['promo_code'];
			$promo_code = mysql_real_escape_string($promo_code); 
		 	$_SESSION['promo_code'] = $promo_code;
		}
	}							
		



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
 
 
	if ($adults_count == 'Adults')
	$adults_count = 0;
	if ($kids_count == 'Kids')
	$kids_count = 0;
	
	

	//2017423
	//if it is less than 12 hours
	//the date and time should be changed to the date now
	//if ($hours_of_stay == '24 Hours')
	if (($hours_of_stay == '3 Hours') || ($hours_of_stay == '4 Hours') ||
	    ($hours_of_stay == '5 Hours') || ($hours_of_stay == '6 Hours') ||
	    ($hours_of_stay == '8 Hours') || ($hours_of_stay == '12 Hours'))
	{
		if ($check_in != $check_out)
		{
			$check_out = $check_in;
			$_SESSION['check_out'] = $check_in;
		} 
	}
	

	
	//create room adons here
	//starting from the first variable onwards
	$addon1_id = ''; $addon2_id = ''; $addon3_id = ''; $addon4_id = ''; $addon5_id = '';
	$addon6_id = ''; $addon7_id = ''; $addon8_id = ''; $addon9_id = ''; $addon10_id = '';
	
	$addon1_name = ''; $addon2_name = ''; $addon3_name = ''; $addon4_name = ''; $addon5_name = '';
	$addon6_name = ''; $addon7_name = ''; $addon8_name = ''; $addon9_name = ''; $addon10_name = '';
	
	$addon1_qty = 0; $addon2_qty = 0; $addon3_qty = 0; $addon4_qty = 0; $addon5_qty = 0;
	$addon6_qty = 0; $addon7_qty = 0; $addon8_qty = 0; $addon9_qty = 0; $addon10_qty = 0;
		

	$addon11_id = ''; $addon12_id = ''; $addon13_id = ''; $addon14_id = ''; $addon15_id = '';
	$addon16_id = ''; $addon17_id = ''; $addon18_id = ''; $addon19_id = ''; $addon20_id = '';
	
	$addon11_name = ''; $addon12_name = ''; $addon13_name = ''; $addon14_name = ''; $addon15_name = '';
	$addon16_name = ''; $addon17_name = ''; $addon18_name = ''; $addon19_name = ''; $addon20_name = '';
	
	$addon11_qty = 0; $addon12_qty = 0; $addon13_qty = 0; $addon14_qty = 0; $addon15_qty = 0;
	$addon16_qty = 0; $addon17_qty = 0; $addon18_qty = 0; $addon19_qty = 0; $addon20_qty = 0;


	$addon21_id = ''; $addon22_id = ''; $addon23_id = ''; $addon24_id = ''; $addon25_id = '';
	$addon26_id = ''; $addon27_id = ''; $addon28_id = ''; $addon29_id = ''; $addon30_id = '';
	
	$addon21_name = ''; $addon22_name = ''; $addon23_name = ''; $addon24_name = ''; $addon25_name = '';
	$addon26_name = ''; $addon27_name = ''; $addon28_name = ''; $addon29_name = ''; $addon30_name = '';
	
	$addon21_qty = 0; $addon22_qty = 0; $addon23_qty = 0; $addon24_qty = 0; $addon25_qty = 0;
	$addon26_qty = 0; $addon27_qty = 0; $addon28_qty = 0; $addon29_qty = 0; $addon30_qty = 0;
	

	$roomaddon_count = 1;
	$query_roomaddon = " 
		SELECT 
			*
		FROM 
			branch_list b, room_addons c
		WHERE 
			b.blid = c.blid and 
			b.blcode LIKE '%$select_branch%' and 
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
	$_SESSION['addon1_qty'] = 0;	
	if(isset($_POST['addon1_qty']))
	{
		$addon1_qty = $_POST['addon1_qty'];
		$_SESSION['addon1_qty'] = $addon1_qty;
	}		
	$addon2_qty = 0;	
	$_SESSION['addon2_qty'] = 0;	
	if(isset($_POST['addon2_qty']))
	{
		$addon2_qty = $_POST['addon2_qty'];
		$_SESSION['addon2_qty'] = $addon2_qty;
	}		
	$addon3_qty = 0;
	$_SESSION['addon3_qty'] = 0;	
	if(isset($_POST['addon3_qty']))
	{
		$addon3_qty = $_POST['addon3_qty'];
		$_SESSION['addon3_qty'] = $addon3_qty;
	}		
	$addon4_qty = 0;
	$_SESSION['addon4_qty'] = 0;	
	if(isset($_POST['addon4_qty']))
	{
		$addon4_qty = $_POST['addon4_qty'];
		$_SESSION['addon4_qty'] = $addon4_qty;
	}		
	$addon5_qty = 0;
	$_SESSION['addon5_qty'] = 0;			
	if(isset($_POST['addon5_qty']))
	{
		$addon5_qty = $_POST['addon5_qty'];
		$_SESSION['addon5_qty'] = $addon5_qty;
	}		
		

	$addon6_qty = 0;	
	$_SESSION['addon6_qty'] = 0;			
	if(isset($_POST['addon6_qty']))
	{
		$addon6_qty = $_POST['addon6_qty'];
		$_SESSION['addon6_qty'] = $addon6_qty;
	}		
	$addon7_qty = 0;
	$_SESSION['addon7_qty'] = 0;			
	if(isset($_POST['addon7_qty']))
	{
		$addon7_qty = $_POST['addon7_qty'];
		$_SESSION['addon7_qty'] = $addon7_qty;
	}		
	$addon8_qty = 0;
	$_SESSION['addon8_qty'] = 0;			
	if(isset($_POST['addon8_qty']))
	{
		$addon8_qty = $_POST['addon8_qty'];
		$_SESSION['addon8_qty'] = $addon8_qty;
	}		
	$addon9_qty = 0;	
	$_SESSION['addon9_qty'] = 0;			
	if(isset($_POST['addon9_qty']))
	{
		$addon9_qty = $_POST['addon9_qty'];
		$_SESSION['addon9_qty'] = $addon9_qty;
	}		
	$addon10_qty = 0;	
	$_SESSION['addon10_qty'] = 0;			
	if(isset($_POST['addon10_qty']))
	{
		$addon10_qty = $_POST['addon10_qty'];
		$_SESSION['addon10_qty'] = $addon10_qty;
	}		
				
	
	$addon11_qty = 0;	
	$_SESSION['addon11_qty'] = 0;			
	if(isset($_POST['addon11_qty']))
	{
		$addon11_qty = $_POST['addon11_qty'];
		$_SESSION['addon11_qty'] = $addon11_qty;
	}		
	$addon12_qty = 0;	
	$_SESSION['addon12_qty'] = 0;			
	if(isset($_POST['addon12_qty']))
	{
		$addon12_qty = $_POST['addon12_qty'];
		$_SESSION['addon12_qty'] = $addon12_qty;
	}		
	$addon13_qty = 0;	
	$_SESSION['addon13_qty'] = 0;			
	if(isset($_POST['addon13_qty']))
	{
		$addon13_qty = $_POST['addon13_qty'];
		$_SESSION['addon13_qty'] = $addon13_qty;
	}		
	$addon14_qty = 0;	
	$_SESSION['addon14_qty'] = 0;			
	if(isset($_POST['addon14_qty']))
	{
		$addon14_qty = $_POST['addon14_qty'];
		$_SESSION['addon14_qty'] = $addon14_qty;
	}		
	$addon15_qty = 0;
	$_SESSION['addon15_qty'] = 0;					
	if(isset($_POST['addon15_qty']))
	{
		$addon15_qty = $_POST['addon15_qty'];
		$_SESSION['addon15_qty'] = $addon15_qty;
	}		
		

	$addon16_qty = 0;
	$_SESSION['addon16_qty'] = 0;			
	if(isset($_POST['addon16_qty']))
	{
		$addon16_qty = $_POST['addon16_qty'];
		$_SESSION['addon16_qty'] = $addon16_qty;
	}		
	$addon17_qty = 0;	
	$_SESSION['addon17_qty'] = 0;			
	if(isset($_POST['addon17_qty']))
	{
		$addon17_qty = $_POST['addon17_qty'];
		$_SESSION['addon17_qty'] = $addon17_qty;
	}		
	$addon18_qty = 0;	
	$_SESSION['addon18_qty'] = 0;			
	if(isset($_POST['addon18_qty']))
	{
		$addon18_qty = $_POST['addon18_qty'];
		$_SESSION['addon18_qty'] = $addon18_qty;
	}		
	$addon19_qty = 0;	
	$_SESSION['addon19_qty'] = 0;			
	if(isset($_POST['addon19_qty']))
	{
		$addon19_qty = $_POST['addon19_qty'];
		$_SESSION['addon19_qty'] = $addon19_qty;
	}		
	$addon20_qty = 0;		
	$_SESSION['addon20_qty'] = 0;			
	if(isset($_POST['addon20_qty']))
	{
		$addon20_qty = $_POST['addon20_qty'];
		$_SESSION['addon20_qty'] = $addon10_qty;
	}		
				

	$addon21_qty = 0;	
	$_SESSION['addon21_qty'] = 0;			
	if(isset($_POST['addon21_qty']))
	{
		$addon21_qty = $_POST['addon21_qty'];
		$_SESSION['addon21_qty'] = $addon21_qty;
	}		
	$addon22_qty = 0;	
	$_SESSION['addon22_qty'] = 0;			
	if(isset($_POST['addon22_qty']))
	{
		$addon22_qty = $_POST['addon22_qty'];
		$_SESSION['addon22_qty'] = $addon22_qty;
	}		
	$addon23_qty = 0;	
	$_SESSION['addon23_qty'] = 0;			
	if(isset($_POST['addon23_qty']))
	{
		$addon23_qty = $_POST['addon23_qty'];
		$_SESSION['addon23_qty'] = $addon23_qty;
	}		
	$addon24_qty = 0;	
	$_SESSION['addon24_qty'] = 0;			
	if(isset($_POST['addon24_qty']))
	{
		$addon24_qty = $_POST['addon24_qty'];
		$_SESSION['addon24_qty'] = $addon24_qty;
	}		
	$addon25_qty = 0;	
	$_SESSION['addon25_qty'] = 0;			
	if(isset($_POST['addon25_qty']))
	{
		$addon25_qty = $_POST['addon25_qty'];
		$_SESSION['addon25_qty'] = $addon25_qty;
	}		
		

	$addon26_qty = 0;	
	$_SESSION['addon26_qty'] = 0;			
	if(isset($_POST['addon26_qty']))
	{
		$addon26_qty = $_POST['addon26_qty'];
		$_SESSION['addon26_qty'] = $addon26_qty;
	}		
	$addon27_qty = 0;	
	$_SESSION['addon27_qty'] = 0;			
	if(isset($_POST['addon27_qty']))
	{
		$addon27_qty = $_POST['addon27_qty'];
		$_SESSION['addon27_qty'] = $addon27_qty;
	}		
	$addon28_qty = 0;	
	$_SESSION['addon28_qty'] = 0;			
	if(isset($_POST['addon28_qty']))
	{
		$addon28_qty = $_POST['addon28_qty'];
		$_SESSION['addon28_qty'] = $addon28_qty;
	}		
	$addon29_qty = 0;	
	$_SESSION['addon29_qty'] = 0;			
	if(isset($_POST['addon29_qty']))
	{
		$addon29_qty = $_POST['addon29_qty'];
		$_SESSION['addon29_qty'] = $addon29_qty;
	}		
	$addon30_qty = 0;	
	$_SESSION['addon30_qty'] = 0;			
	if(isset($_POST['addon30_qty']))
	{
		$addon30_qty = $_POST['addon30_qty'];
		$_SESSION['addon30_qty'] = $addon30_qty;
	}		
			

 	if ($_SESSION['addon1_qty'] != '') $addon1_qty = $_SESSION['addon1_qty'];	
 	if ($_SESSION['addon2_qty'] != '') $addon2_qty = $_SESSION['addon2_qty'];	
 	if ($_SESSION['addon3_qty'] != '') $addon3_qty = $_SESSION['addon3_qty'];	
 	if ($_SESSION['addon4_qty'] != '') $addon4_qty = $_SESSION['addon4_qty'];	
 	if ($_SESSION['addon5_qty'] != '') $addon5_qty = $_SESSION['addon5_qty'];	
	if ($_SESSION['addon6_qty'] != '') $addon6_qty = $_SESSION['addon6_qty'];	
 	if ($_SESSION['addon7_qty'] != '') $addon7_qty = $_SESSION['addon7_qty'];	
 	if ($_SESSION['addon8_qty'] != '') $addon8_qty = $_SESSION['addon8_qty'];	
 	if ($_SESSION['addon9_qty'] != '') $addon9_qty = $_SESSION['addon9_qty'];	
 	if ($_SESSION['addon10_qty'] != '') $addon10_qty = $_SESSION['addon10_qty'];	

 	if ($_SESSION['addon11_qty'] != '') $addon11_qty = $_SESSION['addon11_qty'];	
 	if ($_SESSION['addon12_qty'] != '') $addon12_qty = $_SESSION['addon12_qty'];	
 	if ($_SESSION['addon13_qty'] != '') $addon13_qty = $_SESSION['addon13_qty'];	
 	if ($_SESSION['addon14_qty'] != '') $addon14_qty = $_SESSION['addon14_qty'];	
 	if ($_SESSION['addon15_qty'] != '') $addon15_qty = $_SESSION['addon15_qty'];	
	if ($_SESSION['addon16_qty'] != '') $addon16_qty = $_SESSION['addon16_qty'];	
 	if ($_SESSION['addon17_qty'] != '') $addon17_qty = $_SESSION['addon17_qty'];	
 	if ($_SESSION['addon18_qty'] != '') $addon18_qty = $_SESSION['addon18_qty'];	
 	if ($_SESSION['addon19_qty'] != '') $addon19_qty = $_SESSION['addon19_qty'];	
 	if ($_SESSION['addon20_qty'] != '') $addon20_qty = $_SESSION['addon20_qty'];	

 	if ($_SESSION['addon21_qty'] != '') $addon21_qty = $_SESSION['addon21_qty'];	
 	if ($_SESSION['addon22_qty'] != '') $addon22_qty = $_SESSION['addon22_qty'];	
 	if ($_SESSION['addon23_qty'] != '') $addon23_qty = $_SESSION['addon23_qty'];	
 	if ($_SESSION['addon24_qty'] != '') $addon24_qty = $_SESSION['addon24_qty'];	
 	if ($_SESSION['addon25_qty'] != '') $addon25_qty = $_SESSION['addon25_qty'];	
	if ($_SESSION['addon26_qty'] != '') $addon26_qty = $_SESSION['addon26_qty'];	
 	if ($_SESSION['addon27_qty'] != '') $addon27_qty = $_SESSION['addon27_qty'];	
 	if ($_SESSION['addon28_qty'] != '') $addon28_qty = $_SESSION['addon28_qty'];	
 	if ($_SESSION['addon29_qty'] != '') $addon29_qty = $_SESSION['addon29_qty'];	
 	if ($_SESSION['addon30_qty'] != '') $addon30_qty = $_SESSION['addon30_qty'];		

	
	
	
	
	
	
	
	


	$proceed_to_confirmation = '';	
	if(isset($_POST['proceed_to_confirmation']))
	{
		if ($_POST['proceed_to_confirmation'])
		{
			$proceed_to_confirmation = $_POST['proceed_to_confirmation'];
		 	$_SESSION['proceed_to_confirmation'] = $proceed_to_confirmation;
		}
	}	
	
	if ($proceed_to_confirmation != '')
	{
		$if_valid = 'N';		
		
		if ($fname == '')
		{
			echo "<script type='text/javascript'>alert('Please enter first name to continue!')</script>";
		}
		else
		if ($lname == '')
		{
			echo "<script type='text/javascript'>alert('Please enter last name to continue!')</script>";
		}
		else
		if ($email == '')
		{
			echo "<script type='text/javascript'>alert('Please enter your email to continue!')</script>";
		}
		else
		if ($re_email == '')
		{
			echo "<script type='text/javascript'>alert('Please enter your email again to continue!')</script>";
		}
		else
		if ($email != $re_email)
		{
			echo "<script type='text/javascript'>alert('Please re-enter email. They are not the same!')</script>";
		}
		else		
		if (strpos($email, '@') == false) 
		{
			echo "<script type='text/javascript'>alert('Email invalid format!')</script>";
		}
		else		
		{
			$if_valid = 'Y';		
		}	
		
		if ($if_valid == 'Y')
		{
			//redirect to ROOM BOOKING
			/*
			*/
			?>
			<HTML> 		
			<meta http-equiv="refresh" content="0;URL=index.php?body=room-confirmation">  
			</HTML>			
			<?php				
		}
	}
	
	
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
 ?>
    <nav class="navbar custom-navbar2">
        <div class="container">
            <div class="navbar-header">
                <div class="nav-holder">
                    <div class="back-link">
                        <h3><a href="index.php?body=room-selection"><span class="fa fa-angle-left"></span> <span class="text">Back</span></a></h3>
                    </div>
                    <div class="head-title">
<?php
	//echo '<br> myparam : ' . $myparam;

                                                      
 
/*	
	echo '<br> check_in : ' . $check_in;
	echo '<br> check_out : ' . $check_out;
	echo date('d/m/Y', strtotime($check_in));

	echo '<br> nearest_branch : ' . $nearest_branch;
	echo '<br> select_branch : ' . $select_branch;
	echo '<br> check_in : ' . $check_in;
	echo '<br> check_out : ' . $check_out;
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



		$rlpicture = $row_roomlist['rlpicture'];
		$rldesc = $row_roomlist['rldesc'];
		$rlroom_testimonial = $row_roomlist['rlroom_testimonial'];
		
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

?>				
                        <h3>Welcome to <span class="branch-name">Victoria Court</span> - <span class="branch-main"> <?php print($select_branch); ?></span></h3>
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
                                    <li role="presentation" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                            Reservation Details
                                        </a>
                                    </li>
                                    <li role="presentation" class="not-active">
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
                                    <div class="tab-pane active" role="tabpanel" id="step1">
										<form name="room-selection" action="index.php?body=room-booking" method="post">									
                                        <div class="col-xs-12">
                                            <div class="room-choice">
                                                <div class="holder">
                                                    <div class="img-holder">
                                                        <img src="admin/pages/room/<?php print($rlpicture); ?>" />
                                                    </div>
                                                    <div class="content">
	<h3>
	<span class="room-title"><?php print($rlname); ?></span>
	<span class="room-price pull-right">
	<?php 
	//echo "<br> hours_of_stay " . $hours_of_stay;
	print(number_format($room_rate,2)); 
	?>  
	PHP
	</span>
	</h3>
	
<?php 
	if ($rlroom_testimonial != '')
	{
?>												
		<p class="testimonial">"<?php print($rlroom_testimonial); ?>"</p>												
<?php 
	}
?>														
	<p class="room-desc">
		<?php 
		print($rldesc); 
		?>
	</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 no-padding">
                                            <div class="col-xs-12 col-sm-6 less-padding-right">
                                                <div class="additionals">

						
<?php
	if ($allow == 'false')
	{
		print('<br><br><br> <font size="6" color="#FFFFFF">Sorry, the room you are viewing is no longer available, it may just have been booked by another customer. We apologize for the inconvenience, please select another room to your liking. 
- Victoria Court Management.</font>');
	} 

	$roomaddon_count = 1;
	$query_roomaddon = " 
		SELECT 
			*
		FROM 
			branch_list b, room_addons c
		WHERE 
			b.blid = c.blid and 
			b.blcode LIKE '%$select_branch%' and 
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
		if ($roomaddon_count == 1) $myresult = $addon1_qty;
		if ($roomaddon_count == 2) $myresult = $addon2_qty;
		if ($roomaddon_count == 3) $myresult = $addon3_qty;
		if ($roomaddon_count == 4) $myresult = $addon4_qty;
		if ($roomaddon_count == 5) $myresult = $addon5_qty;
		if ($roomaddon_count == 6) $myresult = $addon6_qty;
		if ($roomaddon_count == 7) $myresult = $addon7_qty;
		if ($roomaddon_count == 8) $myresult = $addon8_qty;
		if ($roomaddon_count == 9) $myresult = $addon9_qty;
		if ($roomaddon_count == 10) $myresult = $addon10_qty;
		
		if ($roomaddon_count == 11) $myresult = $addon11_qty;
		if ($roomaddon_count == 12) $myresult = $addon12_qty;
		if ($roomaddon_count == 13) $myresult = $addon13_qty;
		if ($roomaddon_count == 14) $myresult = $addon14_qty;
		if ($roomaddon_count == 15) $myresult = $addon15_qty;
		if ($roomaddon_count == 16) $myresult = $addon16_qty;
		if ($roomaddon_count == 17) $myresult = $addon17_qty;
		if ($roomaddon_count == 18) $myresult = $addon18_qty;
		if ($roomaddon_count == 19) $myresult = $addon19_qty;
		if ($roomaddon_count == 20) $myresult = $addon20_qty;
		
		if ($roomaddon_count == 21) $myresult = $addon21_qty;
		if ($roomaddon_count == 22) $myresult = $addon22_qty;
		if ($roomaddon_count == 23) $myresult = $addon23_qty;
		if ($roomaddon_count == 24) $myresult = $addon24_qty;
		if ($roomaddon_count == 25) $myresult = $addon25_qty;
		if ($roomaddon_count == 26) $myresult = $addon26_qty;
		if ($roomaddon_count == 27) $myresult = $addon27_qty;
		if ($roomaddon_count == 28) $myresult = $addon28_qty;
		if ($roomaddon_count == 29) $myresult = $addon29_qty;
		if ($roomaddon_count == 30) $myresult = $addon30_qty;
		
		if ($myresult != '0')
			$myactive = 'checked';
		else
			$myactive = '';
?>												
<div class="holder block-selection">
	<label for="addon<?php print($roomaddon_count); ?>_qty">
		<div class="toggle-opt">
			<input type="checkbox" name="addon<?php print($roomaddon_count); ?>_qty" id="addon<?php print($roomaddon_count); ?>_qty" value="1" <?php print($myactive); ?>>
			<div class="radio-select-no-label">
			</div>
		</div>
		<div class="img-holder">
			<img src="admin/pages/addon/<?php print($row_roomaddon['rapicture']); ?>" />
		</div>
		<div class="info">
			<p class="add-name"><?php print($row_roomaddon['raname']); ?></p>
			<p class="add-desc"><?php print($row_roomaddon['radesc']); ?></p>
			<p class="add-price">(PHP <?php print(number_format($row_roomaddon['rarate'],2)); ?>)</p>
		</div>
	</label>
</div>
<?php 
		$roomaddon_count = 	$roomaddon_count + 1;
	}
?>													
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 less-padding-left">
                                                <div class="first-mbl">
                                                    <div class="check-info js-checkinfo">
                                                        <table>
                                                            <tbody>
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
																	<td class=""><?php print($rlname); ?></td>
																	<td class="room-price"><?php 
																	print(number_format($rlrate,2)); ?> 
																	PHP</td>
																</tr>
                                                                <tr>
                                                                    <td colspan="2" class="total-price">Total: <?php print(number_format($room_total,2));?> PHP</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
												
                                                <div class="second-mbl">
                                                    <div class="customer-details js-customerdetails">
                                                        <p>Customer Details</p>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control custom-style" name="fname" placeholder="First Name" value="<?php print($fname); ?>" required />
                                                            <input type="text" class="form-control custom-style" name="lname" placeholder="Last Name" value="<?php print($lname); ?>" required />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" class="form-control custom-style" name="email" placeholder="Email" value="<?php print($email); ?>" required />
                                                            <input type="email" class="form-control custom-style" name="re_email" placeholder="Re-type email" value="<?php print($re_email); ?>" required />
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control custom-style" name="contact" placeholder="Contact no." value="<?php print($contact); ?>" required />
                                                            <input type="text" class="form-control custom-style" name="promo_code" placeholder="PROMO CODE" value="<?php print($promo_code); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 no-padding">
                                            <div class="col-xs-12 col-sm-6 less-padding-right">
												&nbsp;
                                            </div>
                                            <div class="col-xs-12 col-sm-6 less-padding-left">
<?php											
	if ($allow == 'true')
	{
?>
		<input type="hidden" name="proceed_to_confirmation" value="YES" />											
		<input type="submit" name="proceed_to_confirmation_button" class="btn next-step gray-bttn" value="Proceed to Confirmation" />
<?php	
	}
?> 											
                                            </div>
                                        </div>
										</form>
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
