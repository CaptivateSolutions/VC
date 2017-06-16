<?php 

 	if ($_SESSION['nearest_branch'] != '')
 	$nearest_branch = $_SESSION['nearest_branch'];
 	if ($_SESSION['select_branch'] != '')
 	$select_branch = $_SESSION['select_branch'];


														
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
	
	$proceed_to_confirmation = '';	
	if(isset($_POST['proceed_to_confirmation']))
	{
		if ($_POST['proceed_to_confirmation'])
		{
			$proceed_to_confirmation = $_POST['proceed_to_confirmation'];
		 	$_SESSION['proceed_to_confirmation'] = $proceed_to_confirmation;
		}
	}	

 	if ($_SESSION['food_serving_checkin_time'] != '')
	 	$food_serving_checkin_time = $_SESSION['food_serving_checkin_time'];
 
 	if ($_SESSION['food_serving_time'] != '')
 		$food_serving_time = $_SESSION['food_serving_time'];
 
	/*	
	echo '<br> food_serving_checkin_time : ' . $food_serving_checkin_time;
	echo '<br> food_serving_specific_time : ' . $food_serving_specific_time;
	echo '<br> food_serving_time : ' . $food_serving_time;
	echo '<br> proceed_to_confirmation : ' . $proceed_to_confirmation;
	*/	



	//create room adons here
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
	

	$roomfood_count = 1;
	$query_roomfood = " 
		SELECT 
			*
		FROM 
			branch_list b, food_list c
		WHERE 
			b.blid = c.blid and 
			b.blcode LIKE '%$select_branch%' and 
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

	/*
	$_SESSION['food1_qty'] = 0; $_SESSION['food2_qty'] = 0; $_SESSION['food3_qty'] = 0; $_SESSION['food4_qty'] = 0; $_SESSION['food5_qty'] = 0;	
	$_SESSION['food6_qty'] = 0; $_SESSION['food7_qty'] = 0; $_SESSION['food8_qty'] = 0; $_SESSION['food9_qty'] = 0; $_SESSION['food0_qty'] = 0;	

	$_SESSION['food11_qty'] = 0; $_SESSION['food12_qty'] = 0; $_SESSION['food13_qty'] = 0; $_SESSION['food14_qty'] = 0; $_SESSION['food15_qty'] = 0;	
	$_SESSION['food16_qty'] = 0; $_SESSION['food17_qty'] = 0; $_SESSION['food18_qty'] = 0; $_SESSION['food19_qty'] = 0; $_SESSION['food20_qty'] = 0;	

	$_SESSION['food21_qty'] = 0; $_SESSION['food21_qty'] = 0; $_SESSION['food21_qty'] = 0; $_SESSION['food21_qty'] = 0; $_SESSION['food21_qty'] = 0;	
	$_SESSION['food26_qty'] = 0; $_SESSION['food27_qty'] = 0; $_SESSION['food28_qty'] = 0; $_SESSION['food29_qty'] = 0; $_SESSION['food30_qty'] = 0;	
	*/
		
		
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
	
	//echo '<br> proceed_to_confirmation : ' . $proceed_to_confirmation;
	if ($proceed_to_confirmation == 'Confirm & Add to Total Bill')
	{
		//go to the next page
		/*
		*/
		?>
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=room-confirmation">  
		</HTML>		
		<?php		
	}
	else
	{
		//still stay on the page
		
 		$_SESSION['food_serving_checkin_time'] = '';
	 	$food_serving_checkin_time = '';
 
 		$_SESSION['food_serving_time'] = '';
 		$food_serving_time = '';		
	}
	
	

	/*
	echo '<br> food_serving_checkin_time : ' . $food_serving_checkin_time;
	echo '<br> food_serving_time : ' . $food_serving_time;

	echo '<br> proceed_to_confirmation : ' . $proceed_to_confirmation;	
	echo '<br> select_branch : ' . $select_branch;

	echo "<br> food1_id [ " . $food1_id .  " ] food1_qty [ " . $food1_qty . " ] ";
	echo "<br> food2_id [ " . $food2_id .  " ] food2_qty [ " . $food2_qty . " ] ";
	echo "<br> food3_id [ " . $food3_id .  " ] food3_qty [ " . $food3_qty . " ] ";
	echo "<br> food4_id [ " . $food4_id .  " ] food4_qty [ " . $food4_qty . " ] ";
	echo "<br> food5_id [ " . $food5_id .  " ] food5_qty [ " . $food5_qty . " ] ";
	*/
 ?>
    <nav class="navbar custom-navbar2">
        <div class="container">
            <div class="navbar-header">
                <div class="nav-holder">
                    <div class="back-link">
                        <h3><a href="index.php?body=room-confirmation" ><span class="fa fa-angle-left"></span> <span class="text">Back</span></a></h3>
                    </div>
                    <div class="head-title">
                        <h3>Welcome to <span class="branch-name">Victoria Court</span> - <span class="branch-main"><?php print($select_branch); ?></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="menu-page menu-page-order">
        <div class="fixed-bg-pattern"></div>
        <div class="wrapper">
            <section class="menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
								<form id="food-selection" name="food-selection" action="index.php?body=menu" method="post">									
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <div class="food-selection-sidebar menu-food-sel-sb sticky-sidebar">
                                        <div class="heading visible-xs">
                                            <div class="open-room-selection">
												Order Details <span class="fa fa-search"></span>
											</div>
                                            <div class="close-room-selection"><img src="assets/images/icon-close-black.png" /></div>
                                        </div>
                                        <div class="holder">
                                            <div class="content">
											
                                                <div class="food-choices">
                                                    <img src="assets/images/Chef_Victoria.png" />
<?php
/*
	echo "<br> food1_id [ " . $food1_id .  " ] food1_qty [ " . $food1_qty . " ] " . $_SESSION['food1_qty'];
	echo "<br> food2_id [ " . $food2_id .  " ] food2_qty [ " . $food2_qty . " ] " . $_SESSION['food2_qty'];
	echo "<br> food3_id [ " . $food3_id .  " ] food3_qty [ " . $food3_qty . " ] " . $_SESSION['food3_qty'];
	echo "<br> food4_id [ " . $food4_id .  " ] food4_qty [ " . $food4_qty . " ] " . $_SESSION['food4_qty'];
	echo "<br> food5_id [ " . $food5_id .  " ] food5_qty [ " . $food5_qty . " ] " . $_SESSION['food5_qty'];
	echo '<br> proceed_to_confirmation : ' . $proceed_to_confirmation;
	echo '<br> grand_food_total : ' . $grand_food_total;
	
	echo '<br> _POST menu_count1 : ' . $_POST['menu_count1'];
	echo '<br> _POST menu_count2 : ' . $_POST['menu_count2'];

	echo '<br> _POST food1_qty : ' . $_POST['food1_qty'];
	echo '<br> _SESSION food1_qty : ' . $_SESSION['food1_qty'];
	echo '<br> var food1_qty : ' . $food1_qty;
*/	
	
	$menu_count1 = ''; if(isset($_POST['menu_count1'])) { $menu_count1 = $_POST['menu_count1']; }
	$menu_count2 = ''; if(isset($_POST['menu_count2'])) { $menu_count2 = $_POST['menu_count2']; }
	$menu_count3 = ''; if(isset($_POST['menu_count3'])) { $menu_count3 = $_POST['menu_count3']; }
	$menu_count4 = ''; if(isset($_POST['menu_count4'])) { $menu_count4 = $_POST['menu_count4']; }
	$menu_count5 = ''; if(isset($_POST['menu_count5'])) { $menu_count5 = $_POST['menu_count5']; }
	$menu_count6 = ''; if(isset($_POST['menu_count6'])) { $menu_count6 = $_POST['menu_count6']; }
	$menu_count7 = ''; if(isset($_POST['menu_count7'])) { $menu_count7 = $_POST['menu_count7']; }
	$menu_count8 = ''; if(isset($_POST['menu_count8'])) { $menu_count8 = $_POST['menu_count8']; }
	$menu_count9 = ''; if(isset($_POST['menu_count9'])) { $menu_count9 = $_POST['menu_count9']; }
	$menu_count10 = ''; if(isset($_POST['menu_count10'])) { $menu_count10 = $_POST['menu_count10']; }

	$menu_count11 = ''; if(isset($_POST['menu_count11'])) { $menu_count11 = $_POST['menu_count11']; }
	$menu_count12 = ''; if(isset($_POST['menu_count12'])) { $menu_count12 = $_POST['menu_count12']; }
	$menu_count13 = ''; if(isset($_POST['menu_count13'])) { $menu_count13 = $_POST['menu_count13']; }
	$menu_count14 = ''; if(isset($_POST['menu_count14'])) { $menu_count14 = $_POST['menu_count14']; }
	$menu_count15 = ''; if(isset($_POST['menu_count15'])) { $menu_count15 = $_POST['menu_count15']; }
	$menu_count16 = ''; if(isset($_POST['menu_count16'])) { $menu_count16 = $_POST['menu_count16']; }
	$menu_count17 = ''; if(isset($_POST['menu_count17'])) { $menu_count17 = $_POST['menu_count17']; }
	$menu_count18 = ''; if(isset($_POST['menu_count18'])) { $menu_count18 = $_POST['menu_count18']; }
	$menu_count19 = ''; if(isset($_POST['menu_count19'])) { $menu_count19 = $_POST['menu_count19']; }
	$menu_count20 = ''; if(isset($_POST['menu_count20'])) { $menu_count20 = $_POST['menu_count20']; }

	$menu_count21 = ''; if(isset($_POST['menu_count21'])) { $menu_count21 = $_POST['menu_count21']; }
	$menu_count22 = ''; if(isset($_POST['menu_count22'])) { $menu_count22 = $_POST['menu_count22']; }
	$menu_count23 = ''; if(isset($_POST['menu_count23'])) { $menu_count23 = $_POST['menu_count23']; }
	$menu_count24 = ''; if(isset($_POST['menu_count24'])) { $menu_count24 = $_POST['menu_count24']; }
	$menu_count25 = ''; if(isset($_POST['menu_count25'])) { $menu_count25 = $_POST['menu_count25']; }
	$menu_count26 = ''; if(isset($_POST['menu_count26'])) { $menu_count26 = $_POST['menu_count26']; }
	$menu_count27 = ''; if(isset($_POST['menu_count27'])) { $menu_count27 = $_POST['menu_count27']; }
	$menu_count28 = ''; if(isset($_POST['menu_count28'])) { $menu_count28 = $_POST['menu_count28']; }
	$menu_count29 = ''; if(isset($_POST['menu_count29'])) { $menu_count29 = $_POST['menu_count29']; }
	$menu_count30 = ''; if(isset($_POST['menu_count30'])) { $menu_count30 = $_POST['menu_count30']; }

	if (($menu_count1 == '') && ($menu_count7 == '') && ($menu_count13 == '') && ($menu_count19 == '') && ($menu_count25 == '') && 
		($menu_count2 == '') && ($menu_count8 == '') && ($menu_count14 == '') && ($menu_count20 == '') && ($menu_count26 == '') && 
		($menu_count3 == '') && ($menu_count9 == '') && ($menu_count15 == '') && ($menu_count21 == '') && ($menu_count27 == '') && 
		($menu_count4 == '') && ($menu_count10 == '') && ($menu_count16 == '') && ($menu_count22 == '') && ($menu_count28 == '') && 
		($menu_count5 == '') && ($menu_count11 == '') && ($menu_count17 == '') && ($menu_count23 == '') && ($menu_count29 == '') && 
		($menu_count6 == '') && ($menu_count12 == '') && ($menu_count18 == '') && ($menu_count24 == '') && ($menu_count30 == ''))
	{
		$mychecked = 'checked';
	}


/*
echo "<br> menu_count1 " . $menu_count1;  
echo "<br> menu_count2 " . $menu_count2;  
echo "<br> menu_count3 " . $menu_count3;  
*/

	$menu_count = 1;
	$query_menu = " 
		SELECT 
			*
		FROM 
			food_type a
		WHERE 
			a.ftactive = 'Y' and
			a.ftname <> '' 
		ORDER BY 
			a.ftname ";
	$result_menu = mysql_query($query_menu);
	echo mysql_error();				
	while ($row_menu =  mysql_fetch_array ($result_menu)) 
	{
	
		$put_check = '';
		if (($row_menu['ftname'] == 'BREAKFAST') && ($mychecked == 'checked'))
		{
			$put_check = $mychecked;
			if ($menu_count == 1) { $menu_count1 = $row_menu[ftname]; }
			if ($menu_count == 2) { $menu_count2 = $row_menu[ftname]; }
			if ($menu_count == 3) { $menu_count3 = $row_menu[ftname]; }
			if ($menu_count == 4) { $menu_count4 = $row_menu[ftname]; }
			if ($menu_count == 5) { $menu_count5 = $row_menu[ftname]; }
			if ($menu_count == 6) { $menu_count6 = $row_menu[ftname]; }
			if ($menu_count == 7) { $menu_count7 = $row_menu[ftname]; }
			if ($menu_count == 8) { $menu_count8 = $row_menu[ftname]; }
			if ($menu_count == 9) { $menu_count9 = $row_menu[ftname]; }
			if ($menu_count == 10) { $menu_count10 = $row_menu[ftname]; }
			if ($menu_count == 11) { $menu_count11 = $row_menu[ftname]; }
			if ($menu_count == 12) { $menu_count12 = $row_menu[ftname]; }
			if ($menu_count == 13) { $menu_count13 = $row_menu[ftname]; }
			if ($menu_count == 14) { $menu_count14 = $row_menu[ftname]; }
			if ($menu_count == 15) { $menu_count15 = $row_menu[ftname]; }
			if ($menu_count == 16) { $menu_count16 = $row_menu[ftname]; }
			if ($menu_count == 17) { $menu_count17 = $row_menu[ftname]; }
			if ($menu_count == 18) { $menu_count18 = $row_menu[ftname]; }
			if ($menu_count == 19) { $menu_count19 = $row_menu[ftname]; }
			if ($menu_count == 20) { $menu_count20 = $row_menu[ftname]; }
			if ($menu_count == 21) { $menu_count21 = $row_menu[ftname]; }
			if ($menu_count == 22) { $menu_count22 = $row_menu[ftname]; }
			if ($menu_count == 23) { $menu_count23 = $row_menu[ftname]; }
			if ($menu_count == 24) { $menu_count24 = $row_menu[ftname]; }
			if ($menu_count == 25) { $menu_count25 = $row_menu[ftname]; }
			if ($menu_count == 26) { $menu_count26 = $row_menu[ftname]; }
			if ($menu_count == 27) { $menu_count27 = $row_menu[ftname]; }
			if ($menu_count == 28) { $menu_count28 = $row_menu[ftname]; }
			if ($menu_count == 29) { $menu_count29 = $row_menu[ftname]; }
			if ($menu_count == 30) { $menu_count30 = $row_menu[ftname]; }
		}
		
		if (($menu_count1 != '') && ($menu_count1 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count2 != '') && ($menu_count2 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count3 != '') && ($menu_count3 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count4 != '') && ($menu_count4 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count5 != '') && ($menu_count5 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count6 != '') && ($menu_count6 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count7 != '') && ($menu_count7 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count8 != '') && ($menu_count8 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count9 != '') && ($menu_count9 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count10 != '') && ($menu_count10 == $row_menu[ftname])) { $put_check = 'checked'; }

		if (($menu_count11 != '') && ($menu_count11 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count12 != '') && ($menu_count12 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count13 != '') && ($menu_count13 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count14 != '') && ($menu_count14 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count15 != '') && ($menu_count15 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count16 != '') && ($menu_count16 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count17 != '') && ($menu_count17 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count18 != '') && ($menu_count18 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count19 != '') && ($menu_count19 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count20 != '') && ($menu_count20 == $row_menu[ftname])) { $put_check = 'checked'; }

		if (($menu_count21 != '') && ($menu_count21 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count22 != '') && ($menu_count22 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count23 != '') && ($menu_count23 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count24 != '') && ($menu_count24 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count25 != '') && ($menu_count25 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count26 != '') && ($menu_count26 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count27 != '') && ($menu_count27 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count28 != '') && ($menu_count28 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count29 != '') && ($menu_count29 == $row_menu[ftname])) { $put_check = 'checked'; }
		if (($menu_count30 != '') && ($menu_count30 == $row_menu[ftname])) { $put_check = 'checked'; }
		
			
?>					
		<div class="radio-selector">
			<input type="checkbox" name="menu_count<?php print($menu_count); ?>" id="menu_count<?php print($menu_count); ?>" value="<?php print($row_menu['ftname']); ?>" <?php print($put_check);?>  onclick="document.forms[0].submit()" >
			<label class="" for="menu_count<?php print($menu_count); ?>"><?php print($row_menu['ftname']); ?></label>
		</div>				
 <?php 
		$menu_count = 	$menu_count + 1;
	}


/*
//remove code 20170423 
<br />

													<div class="order-bttn-holder">
		<input form="food-selection" type="submit" name="proceed_to_confirmation" class="form-control btn order-now-bttn" value="View Again" />
													</div>	
*/
?>											

<br />
<br />

													<div class="order-bttn-holder">
		<input form="food-selection" type="submit" name="proceed_to_confirmation" class="form-control btn order-now-bttn" value="Calculate Total Bill" />
													</div>											
												</div>
<?php 
/*											

*/
?>


<?php 
if ($grand_food_total > 0)
{
?> 
                                                <div class="order-details">
                                                    <h4>Order Details</h4>
                                                    <table>
                                                        <tbody>
														
<?php
	if ($food1_qty > 0) { print('<tr><td>' . $food1_qty . ' x ' .$food1_name . '</td><td class="price">' . number_format($food1_total,2)) . ' PHP</td></tr>'; }
	if ($food2_qty > 0) { print('<tr><td>' . $food2_qty . ' x ' .$food2_name . '</td><td class="price">' . number_format($food2_total,2)) . ' PHP</td></tr>'; }
	if ($food3_qty > 0) { print('<tr><td>' . $food3_qty . ' x ' .$food3_name . '</td><td class="price">' . number_format($food3_total,2)) . ' PHP</td></tr>'; }
	if ($food4_qty > 0) { print('<tr><td>' . $food4_qty . ' x ' .$food4_name . '</td><td class="price">' . number_format($food4_total,2)) . ' PHP</td></tr>'; }
	if ($food5_qty > 0) { print('<tr><td>' . $food5_qty . ' x ' .$food5_name . '</td><td class="price">' . number_format($food5_total,2)) . ' PHP</td></tr>'; }
	if ($food6_qty > 0) { print('<tr><td>' . $food6_qty . ' x ' .$food6_name . '</td><td class="price">' . number_format($food6_total,2)) . ' PHP</td></tr>'; }
	if ($food7_qty > 0) { print('<tr><td>' . $food7_qty . ' x ' .$food7_name . '</td><td class="price">' . number_format($food7_total,2)) . ' PHP</td></tr>'; }
	if ($food8_qty > 0) { print('<tr><td>' . $food8_qty . ' x ' .$food8_name . '</td><td class="price">' . number_format($food8_total,2)) . ' PHP</td></tr>'; }
	if ($food9_qty > 0) { print('<tr><td>' . $food9_qty . ' x ' .$food9_name . '</td><td class="price">' . number_format($food9_total,2)) . ' PHP</td></tr>'; }
	if ($food10_qty > 0) { print('<tr><td>' . $food10_qty . ' x ' .$food10_name . '</td><td class="price">' . number_format($food10_total,2)) . ' PHP</td></tr>'; }

	if ($food11_qty > 0) { print('<tr><td>' . $food11_qty . ' x ' .$food11_name . '</td><td class="price">' . number_format($food11_total,2)) . ' PHP</td></tr>'; }
	if ($food12_qty > 0) { print('<tr><td>' . $food12_qty . ' x ' .$food12_name . '</td><td class="price">' . number_format($food12_total,2)) . ' PHP</td></tr>'; }
	if ($food13_qty > 0) { print('<tr><td>' . $food13_qty . ' x ' .$food13_name . '</td><td class="price">' . number_format($food13_total,2)) . ' PHP</td></tr>'; }
	if ($food14_qty > 0) { print('<tr><td>' . $food14_qty . ' x ' .$food14_name . '</td><td class="price">' . number_format($food14_total,2)) . ' PHP</td></tr>'; }
	if ($food15_qty > 0) { print('<tr><td>' . $food15_qty . ' x ' .$food15_name . '</td><td class="price">' . number_format($food15_total,2)) . ' PHP</td></tr>'; }
	if ($food16_qty > 0) { print('<tr><td>' . $food16_qty . ' x ' .$food16_name . '</td><td class="price">' . number_format($food16_total,2)) . ' PHP</td></tr>'; }
	if ($food17_qty > 0) { print('<tr><td>' . $food17_qty . ' x ' .$food17_name . '</td><td class="price">' . number_format($food17_total,2)) . ' PHP</td></tr>'; }
	if ($food18_qty > 0) { print('<tr><td>' . $food18_qty . ' x ' .$food18_name . '</td><td class="price">' . number_format($food18_total,2)) . ' PHP</td></tr>'; }
	if ($food19_qty > 0) { print('<tr><td>' . $food19_qty . ' x ' .$food19_name . '</td><td class="price">' . number_format($food19_total,2)) . ' PHP</td></tr>'; }
	if ($food20_qty > 0) { print('<tr><td>' . $food20_qty . ' x ' .$food20_name . '</td><td class="price">' . number_format($food20_total,2)) . ' PHP</td></tr>'; }

	if ($food21_qty > 0) { print('<tr><td>' . $food21_qty . ' x ' .$food21_name . '</td><td class="price">' . number_format($food21_total,2)) . ' PHP</td></tr>'; }
	if ($food22_qty > 0) { print('<tr><td>' . $food22_qty . ' x ' .$food22_name . '</td><td class="price">' . number_format($food22_total,2)) . ' PHP</td></tr>'; }
	if ($food23_qty > 0) { print('<tr><td>' . $food23_qty . ' x ' .$food23_name . '</td><td class="price">' . number_format($food23_total,2)) . ' PHP</td></tr>'; }
	if ($food24_qty > 0) { print('<tr><td>' . $food24_qty . ' x ' .$food24_name . '</td><td class="price">' . number_format($food24_total,2)) . ' PHP</td></tr>'; }
	if ($food25_qty > 0) { print('<tr><td>' . $food25_qty . ' x ' .$food25_name . '</td><td class="price">' . number_format($food25_total,2)) . ' PHP</td></tr>'; }
	if ($food26_qty > 0) { print('<tr><td>' . $food26_qty . ' x ' .$food26_name . '</td><td class="price">' . number_format($food26_total,2)) . ' PHP</td></tr>'; }
	if ($food27_qty > 0) { print('<tr><td>' . $food27_qty . ' x ' .$food27_name . '</td><td class="price">' . number_format($food27_total,2)) . ' PHP</td></tr>'; }
	if ($food28_qty > 0) { print('<tr><td>' . $food28_qty . ' x ' .$food28_name . '</td><td class="price">' . number_format($food28_total,2)) . ' PHP</td></tr>'; }
	if ($food29_qty > 0) { print('<tr><td>' . $food29_qty . ' x ' .$food29_name . '</td><td class="price">' . number_format($food29_total,2)) . ' PHP</td></tr>'; }
	if ($food30_qty > 0) { print('<tr><td>' . $food30_qty . ' x ' .$food30_name . '</td><td class="price">' . number_format($food30_total,2)) . ' PHP</td></tr>'; }
?>																	
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td class="total-text">Total:</td>
                                                                <td class="total-food-price">
<?php
	print(number_format($grand_food_total,2) . ' PHP');
?>																	
																</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
<?php
}
?>												
                                                <div class="served-time">
                                                    <p class="head">When do you want your food served?</p>
                                                    <div class="radio-selector-box">
                                                        <input type="radio" name="food_serving_checkin_time" id="check_time">
                                                        <label for="check_time">Serve food on check-in time.</label>
                                                    </div>
                                                    <div class="radio-selector-box">
                                                        <input type="radio" name="food_serving_checkin_time" id="pref_time">
                                                        <label for="pref_time">Serve food on specific time.</label>
                                                        <div class="form-group checkin">
                                                            <input type="text" name="food_serving_time" class="form-control custom-style datepick" placeholder="Check-in time" id="timepicker3" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-bttn-holder">
												<input form="food-selection" type="submit" name="proceed_to_confirmation" class="form-control btn order-now-bttn" value="Confirm & Add to Total Bill" />
<?php
/*
	echo '<br> food_serving_checkin_time : ' . $food_serving_checkin_time;
	echo '<br> food_serving_time : ' . $food_serving_time;
	echo '<br> proceed_to_confirmation : ' . $proceed_to_confirmation;
*/
?>													
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-9">
                                    <div class="menu-items">
                                        <div class="grid">

<?php
	$food_count = 1;
	$query_food = " 
		SELECT 
			*
		FROM 
			branch_list b, food_list c, food_type d
		WHERE 
			b.blid = c.blid and 
			c.ftid = d.ftid and 
			b.blcode LIKE '%$select_branch%' and 
			b.blactive = 'Y' and
			b.blcode <> '' and
			c.flactive = 'Y' and
			c.flname <> '' and
			c.flrate > 0 and ( ";
	$mycount = 0;
	while ($mycount <= 30)
	{		
		if ($mycount == 1) $mymenu = $menu_count1;
		if ($mycount == 2) $mymenu = $menu_count2;
		if ($mycount == 3) $mymenu = $menu_count3;
		if ($mycount == 4) $mymenu = $menu_count4;
		if ($mycount == 5) $mymenu = $menu_count5;
		if ($mycount == 6) $mymenu = $menu_count6;
		if ($mycount == 7) $mymenu = $menu_count7;
		if ($mycount == 8) $mymenu = $menu_count8;
		if ($mycount == 9) $mymenu = $menu_count9;
		if ($mycount == 10) $mymenu = $menu_count10;

		if ($mycount == 11) $mymenu = $menu_count11;
		if ($mycount == 12) $mymenu = $menu_count12;
		if ($mycount == 13) $mymenu = $menu_count13;
		if ($mycount == 14) $mymenu = $menu_count14;
		if ($mycount == 15) $mymenu = $menu_count15;
		if ($mycount == 16) $mymenu = $menu_count16;
		if ($mycount == 17) $mymenu = $menu_count17;
		if ($mycount == 18) $mymenu = $menu_count18;
		if ($mycount == 19) $mymenu = $menu_count19;
		if ($mycount == 20) $mymenu = $menu_count20;

		if ($mycount == 21) $mymenu = $menu_count21;
		if ($mycount == 22) $mymenu = $menu_count22;
		if ($mycount == 23) $mymenu = $menu_count23;
		if ($mycount == 24) $mymenu = $menu_count24;
		if ($mycount == 25) $mymenu = $menu_count25;
		if ($mycount == 26) $mymenu = $menu_count26;
		if ($mycount == 27) $mymenu = $menu_count27;
		if ($mycount == 28) $mymenu = $menu_count28;
		if ($mycount == 29) $mymenu = $menu_count29;
		if ($mycount == 30) $mymenu = $menu_count30;

		if ($mymenu != '') 
		{
			if ($mystring != '') 
			  $mystring = $mystring . " or ";
			  
			$mystring = $mystring .  " ( d.ftname = '$mymenu' ) "; 
		}
		
		$mycount = $mycount + 1; 
	}
	  	
	if ($mystring == '') 
		$mystring = 'd.ftid = d.ftid';	
		
	$query_food = $query_food . $mystring ;
			
	$query_food = $query_food . " )
		ORDER BY 
			b.blcode, c.flname ";
	$result_food = mysql_query($query_food);			
	//echo $query_food;
	echo mysql_error();				
	while ($row_food =  mysql_fetch_array ($result_food)) 
	{
		if ($food_count == 1) { $food_qtyz = $food1_qty; }
		if ($food_count == 2) { $food_qtyz = $food2_qty; }
		if ($food_count == 3) { $food_qtyz = $food3_qty; }
		if ($food_count == 4) { $food_qtyz = $food4_qty; }
		if ($food_count == 5) { $food_qtyz = $food5_qty; }
		if ($food_count == 6) { $food_qtyz = $food6_qty; }
		if ($food_count == 7) { $food_qtyz = $food7_qty; }
		if ($food_count == 8) { $food_qtyz = $food8_qty; }
		if ($food_count == 9) { $food_qtyz = $food9_qty; }
		if ($food_count == 10) { $food_qtyz = $food10_qty; }

		if ($food_count == 11) { $food_qtyz = $food11_qty; }
		if ($food_count == 12) { $food_qtyz = $food12_qty; }
		if ($food_count == 13) { $food_qtyz = $food13_qty; }
		if ($food_count == 14) { $food_qtyz = $food14_qty; }
		if ($food_count == 15) { $food_qtyz = $food15_qty; }
		if ($food_count == 16) { $food_qtyz = $food16_qty; }
		if ($food_count == 17) { $food_qtyz = $food17_qty; }
		if ($food_count == 18) { $food_qtyz = $food18_qty; }
		if ($food_count == 19) { $food_qtyz = $food19_qty; }
		if ($food_count == 20) { $food_qtyz = $food20_qty; }

		if ($food_count == 21) { $food_qtyz = $food21_qty; }
		if ($food_count == 22) { $food_qtyz = $food22_qty; }
		if ($food_count == 23) { $food_qtyz = $food23_qty; }
		if ($food_count == 24) { $food_qtyz = $food24_qty; }
		if ($food_count == 25) { $food_qtyz = $food25_qty; }
		if ($food_count == 26) { $food_qtyz = $food26_qty; }
		if ($food_count == 27) { $food_qtyz = $food27_qty; }
		if ($food_count == 28) { $food_qtyz = $food28_qty; }
		if ($food_count == 29) { $food_qtyz = $food29_qty; }
		if ($food_count == 30) { $food_qtyz = $food30_qty; }
		
		if ($food_qtyz == '')
			$food_qtyz = 0;
	
?>									
											
                                            <div class="grid-item">
                                                <div class="item-count-holder">
                                                    <div class="item-count">
                                                        <span class="count"></span>
                                                    </div>
                                                </div>
                                                <div class="minus-holder">
                                                    <div class="minus">
                                                        <span class="fa fa-minus"></span>
                                                    </div>
                                                </div>
<?php
//		echo '<br> var food1_qty : ' . $food1_qty;
//		echo '<br> var food_qtyz : ' . $food_qtyz;
//		echo '<br> var food_count : ' . $food_count;
?>												
                                                <input type="text" class="hidden" name='food<?php print($food_count); ?>_qty' value="<?php print($food_qtyz); ?>" />
                                                <div class="img-holder">
                                                    <img class="plus-order" src="admin/pages/food/<?php print($row_food['flpicture']); ?>" />
                                                </div>
                                                <div class="info">
                                                    <div class="np-holder">
                                                        <div class="item-name"><?php print($row_food['flname']); ?></div>
                                                        <div class="item-price"><?php print(number_format($row_food['flrate'],2)); ?> PHP</div>
                                                    </div>
                                                    <div class="desc">
                                                        <p>
                                                            <?php print($row_food['fldesc']); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
<?php 
		$food_count = 	$food_count + 1;
	}
?>												

                                            <div class="instruct_holder">
                                                <p class="hidden-sm hidden-xs">Click on the picture to add order.<br />Click again to add more.</p>
                                                <p class="visible-sm visible-xs">Tap on the picture to add order.<br />Tap again to add more.</p>
                                                <div class="close-callout-instruct"><img src="assets/images/icon-close.png" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								</form>		
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