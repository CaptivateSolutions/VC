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
	
	
	if(isset($_POST['chosen_room_btn1'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn1']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn1'];
	}
	if(isset($_POST['chosen_room_btn2'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn2']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn2'];
	}
	if(isset($_POST['chosen_room_btn3'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn3']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn3'];
	}
	if(isset($_POST['chosen_room_btn4'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn4']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn4'];
	}
	if(isset($_POST['chosen_room_btn5'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn5']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn5'];
	}
	if(isset($_POST['chosen_room_btn6'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn6']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn6'];
	}
	if(isset($_POST['chosen_room_btn7'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn7']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn7'];
	}
	if(isset($_POST['chosen_room_btn8'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn8']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room8'];
	}
	if(isset($_POST['chosen_room_btn9'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn9']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn9'];
	}
	if(isset($_POST['chosen_room_btn10'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn10']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn10'];
	}						


	
	if(isset($_POST['chosen_room_btn11'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn11']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn11'];
	}
	if(isset($_POST['chosen_room_btn12'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn12']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn12'];
	}
	if(isset($_POST['chosen_room_btn13'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn13']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn13'];
	}
	if(isset($_POST['chosen_room_btn14'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn14']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn14'];
	}
	if(isset($_POST['chosen_room_btn15'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn15']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn15'];
	}
	if(isset($_POST['chosen_room_btn16'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn16']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn16'];
	}
	if(isset($_POST['chosen_room_btn17'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn17']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn17'];
	}
	if(isset($_POST['chosen_room_btn18'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn18']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room18'];
	}
	if(isset($_POST['chosen_room_btn19'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn19']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn19'];
	}
	if(isset($_POST['chosen_room_btn20'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn20']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn20'];
	}	




	
	if(isset($_POST['chosen_room_btn21'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn21']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn21'];
	}
	if(isset($_POST['chosen_room_btn22'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn22']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn22'];
	}
	if(isset($_POST['chosen_room_btn23'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn23']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn23'];
	}
	if(isset($_POST['chosen_room_btn24'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn24']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn24'];
	}
	if(isset($_POST['chosen_room_btn25'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn25']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn25'];
	}
	if(isset($_POST['chosen_room_btn26'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn26']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn26'];
	}
	if(isset($_POST['chosen_room_btn27'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn27']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn27'];
	}
	if(isset($_POST['chosen_room_btn28'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn28']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room18'];
	}
	if(isset($_POST['chosen_room_btn29'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn29']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn29'];
	}
	if(isset($_POST['chosen_room_btn30'])) 
	{ 
		$chosen_room_btn = $_POST['chosen_room_btn30']; 
		if ($chosen_room_btn != '')
			$_SESSION['chosen_room'] = $_POST['chosen_room_btn30'];
	}	



	$chosen_room = $_POST['chosen_room'];

	

	
	
	$party_rooms = '';	
	if(isset($_POST['party_rooms']))
	{
		$party_rooms = $_POST['party_rooms'];
	}	
	$suite = '';	
	if(isset($_POST['suite']))
	{
		$suite = $_POST['suite'];
	}	
	$mini_suite = '';	
	if(isset($_POST['mini_suite']))
	{
		$mini_suite = $_POST['mini_suite'];
	}	
	$super_deluxe = '';	
	if(isset($_POST['super_deluxe']))
	{
		$super_deluxe = $_POST['super_deluxe'];
	}	
	$deluxe = '';	
	if(isset($_POST['deluxe']))
	{
		$deluxe = $_POST['deluxe'];
	}	
	$standard = '';	
	if(isset($_POST['standard']))
	{
		$standard = $_POST['standard'];
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
 
 	if ($_SESSION['adults_count'] != '')
 		$adults_count = $_SESSION['adults_count'];
 	if ($_SESSION['kids_count'] != '')
 		$kids_count = $_SESSION['kids_count'];

 	if ($_SESSION['chosen_room'] != '')
 		$chosen_room = $_SESSION['chosen_room'];
 
 
 

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
 
 

	if ($chosen_room_btn != '')
	{
		//redirect to ROOM BOOKING
		//check data if ok before going to room booking
		$if_valid = 'N';		
		
		if ($check_in == '')
		{
			echo "<script type='text/javascript'>alert('Please enter your check-in date to continue!')</script>";
		}
		else
		if ($check_out == '')
		{
			echo "<script type='text/javascript'>alert('Please enter your check-out date to continue!')</script>";
		}
		else
		if ($check_in_time == '')
		{
			echo "<script type='text/javascript'>alert('Please enter your check-in time to continue!')</script>";
		}
		else
		if ($hours_of_stay == '')
		{
			echo "<script type='text/javascript'>alert('Please enter your hours of stay to continue!')</script>";
		}
		else
		if ((strtotime($check_in)) > (strtotime($check_out)))
		{
			echo "<script type='text/javascript'>alert('Check-In and Check-Out date is invalid!')</script>";
		}
		else
		{
			$if_valid = 'Y';		
		}	
		
		if ($if_valid == 'Y')
		{		
		/*
		*/
?>
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=room-booking">  
		</HTML>
<?php			
		}	
	}
 ?>



<script>
var _datePicker = function () {
        $(document).ready(function () {
            $('#roombooking_checkin, #roombooking_checkout').datetimepicker({
                format: 'LL',
                icons: {
                    time: 'fa fa-time',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
                minDate: moment()
            });
            $('#roombooking_checkintime').datetimepicker({
                format: 'LT',
                icons: {
                    time: 'fa fa-time',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
            });

        });
    };
</script>

    <nav class="navbar custom-navbar cus-nav2">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" /></a>					
            </div>
            <div id="navbar">
                <ul class="nav navbar-nav navbar-right">
<?php
/*
	echo '<br> view_rooms : ' . $view_rooms;
	echo '<br> chosen_room : ' . $chosen_room;
	echo '<br> chosen_room_btn : ' . $chosen_room_btn;

	echo '<br> check_in : ' . $check_in;
	echo '<br> check_out : ' . $check_out;
	
	echo '<br> nearest_branch : ' . $nearest_branch;
	echo '<br> select_branch : ' . $select_branch;
	echo '<br> check_in : ' . $check_in;
	echo '<br> check_out : ' . $check_out;
	echo '<br> check_in_time : ' . $check_in_time;
	echo '<br> hours_of_stay : ' . $hours_of_stay;
	echo '<br> view_rooms : ' . $view_rooms;
	
	echo '<br> adults_count : ' . $adults_count;
	echo '<br> kids_count : ' . $kids_count;
	
	echo '<br> party_rooms : ' . $party_rooms;
	echo '<br> suite : ' . $suite;
	echo '<br> mini_suite : ' . $mini_suite;
	echo '<br> super_deluxe : ' . $super_deluxe;
	echo '<br> deluxe : ' . $deluxe;
	echo '<br> standard : ' . $standard;

	$chosen_room_btn1 = $_POST['chosen_room_btn1']; 
	echo "<br> chosen_room_btn1 " . $chosen_room_btn1;
	$chosen_room_btn2 = $_POST['chosen_room_btn2']; 
	echo "<br> chosen_room_btn2 " . $chosen_room_btn2;
	$chosen_room_btn3 = $_POST['chosen_room_btn3']; 
	echo "<br> chosen_room_btn3 " . $chosen_room_btn3;

	echo '<br> nearest_branch : ' . $nearest_branch;
	echo '<br> select_branch : ' . $select_branch;
	echo '<br> check_in : ' . $check_in;
	echo '<br> check_out : ' . $check_out;
	echo '<br> check_in_time : ' . $check_in_time;
	echo '<br> hours_of_stay : ' . $hours_of_stay;
	echo '<br> view_rooms : ' . $view_rooms;

	echo '<br> chosen_room : ' . $chosen_room;
	echo '<br> chosen_room_btn : ' . $chosen_room_btn;

	echo '<br> SESSION hours_of_stay : ' . $_SESSION['hours_of_stay'];
	echo '<br> POST hours_of_stay : ' . $_POST['hours_of_stay'];
	echo '<br> hours_of_stay : ' . $hours_of_stay;
*/
?>				
                    <li>Welcome to <span class="branch-name">Victoria Court</span> - <span class="branch-main"> <?php print($select_branch); ?></span></li>
                </ul>
            </div> <!--/.nav-collapse -->
        </div>
    </nav>
    <main class="room-selection">
    	<form class="js-form-submit" method="POST">									
        <div class="fixed-bg-pattern"></div>
        <div class="wrapper">
            <section class="room-selection-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-3">
                            <div class="room-selection-sidebar sticky-sidebar">
                                <div class="heading visible-xs">
                                    <div class="open-room-selection">Room Search Options <span class="fa fa-search"></span></div>
                                    <div class="close-room-selection"><img src="assets/images/icon-close.png" /></div>
                                </div>
                                <div class="holder">
                                    <div class="content">
                                        <div class="branch-select">
                                            <h4>Branch</h4>

                                            <select class="form-control custom-style" name="select_branch" required >
                                                <option value="<?php print($select_branch); ?>"><?php print($select_branch); ?></option>
<?php
	$branch_count = 1;
	$query_branch = " 
		SELECT 
			*
		FROM 
			branch_list b
		WHERE 
		 	b.blactive = 'Y' and
			b.blcode <> ''
		ORDER BY 
			b.blcode ";
	$result_branch = mysql_query($query_branch);
	echo mysql_error();				
	while ($row_branch =  mysql_fetch_array ($result_branch)) 
	{
		echo '<option value="' .	$row_branch['blcode'] . '">' .	$row_branch['blcode'] . '</option>';
		$branch_count = $branch_count + 1;
	}
?>														
                                            </select>
                                        </div>									
                                        <div class="available-rooms">
                                            <h4>Checkin Date &amp; Time</h4>
                                            <div class="form-group">
                                                <input type="text" name="check_in" class="custom-style datepick form-control js-checkindate-selection" placeholder="Check-in Date" id="datepicker2" value="<?php print($check_in); ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="check_out" class="custom-style datepick form-control js-checkoutdate-selection" placeholder="Check-out Date" id="datepicker3" value="<?php print($check_out); ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="check_in_time" class="custom-style datepick form-control js-checkintime-selection" placeholder="Check-in Time" id="timepicker2" value="<?php print($check_in_time); ?>" required />
                                            </div>
											<div class="form-group">
                                                <select class="custom-style" name="hours_of_stay" required>
                                                    <option value="<?php print($hours_of_stay); ?>"><?php print($hours_of_stay); ?></option>
													<option value="3 Hours">3 Hours</option>
													<option value="4 Hours">4 Hours</option>
													<option value="5 Hours">5 Hours</option>
													<option value="6 Hours">6 Hours</option>
													<option value="8 Hours">8 Hours</option>
													<option value="12 Hours">12 Hours</option>
													<option value="24 Hours">24 Hours</option>
                                                </select>
                                            </div>											
                                            <div class="form-group atype-sel">
                                                <select class="custom-style" name="adults_count">
                                                    <option><?php print($adults_count); ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                                <select class="custom-style" name="kids_count">
                                                    <option><? print($kids_count); ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
                                            </div>
                                        </div>
										
										<div class="room-type">
											<h4>Select Room Type</h4>
											
											<div class="radio-selector">
                                                <input type="checkbox" name="party_rooms" id="party_rooms" value="YES">
                                                <label class="" for="party_rooms">Party Rooms</label>
                                            </div>
                                            <div class="radio-selector">
                                                <input type="checkbox" name="suite" id="suite" value="YES">
                                                <label class="" for="suite">Suite</label>
                                            </div>
                                            <div class="radio-selector">
                                                <input type="checkbox" name="mini_suite" id="mini_suite" value="YES">
                                                <label class="" for="mini_suite">Mini Suite</label>
                                            </div>
                                            <div class="radio-selector">
                                                <input type="checkbox" name="super_deluxe" id="super_deluxe" value="YES">
                                                <label class="" for="super_deluxe">Super Deluxe</label>
                                            </div>
                                            <div class="radio-selector">
                                                <input type="checkbox" name="deluxe" id="deluxe" value="YES">
                                                <label class="" for="deluxe">Deluxe</label>
                                            </div>
                                            <div class="radio-selector">
                                                <input type="checkbox" name="standard" id="standard" value="YES">
                                                <label class="" for="standard">Standard</label>
                                            </div>
                                        </div>
                                    </div>
									<div class="recommendation">
										<input type="submit" name="view_rooms" class="form-control input-style-bttn view-rooms" value="VIEW ROOMS"/>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-9 no-padding">
						
 <?php
	$roomlist_count = 1;
	$query_roomlist = " 
		SELECT 
			*
		FROM 
			branch_list b, room_list c, room_type d
		WHERE 
		    b.blid = c.blid and 
			c.rtid = d.rtid and 
			b.blcode LIKE '%$select_branch%' and 
		 	b.blactive = 'Y' and
		 	c.rlactive = 'Y' and
		 	c.rlavailable = 'Y' and
			b.blcode <> '' and ( ";

	$room_type = '';		
	if ($party_rooms == 'YES') 
	{
		if ($room_type == '')
			$room_type = $room_type . " (d.rtname = 'Party Rooms') ";
		else
			$room_type = $room_type . " or (d.rtname = 'Party Rooms') ";
	}		

	if ($suite == 'YES') 
	{
		if ($room_type == '')
			$room_type = $room_type . " (d.rtname = 'Suite') ";
		else
			$room_type = $room_type . " or (d.rtname = 'Suite') ";
	}		
	
	if ($mini_suite == 'YES') 
	{
		if ($room_type == '')
			$room_type = $room_type . " (d.rtname = 'Mini Suite') ";
		else
			$room_type = $room_type . " or (d.rtname = 'Mini Suite') ";
	}	
	
	if ($super_deluxe == 'YES') 
	{
		if ($room_type == '')
			$room_type = $room_type . " (d.rtname = 'Super Deluxe') ";
		else
			$room_type = $room_type . " or (d.rtname = 'Super Deluxe') ";
	}	
	
	if ($deluxe == 'YES') 
	{
		if ($room_type == '')
			$room_type = $room_type . " (d.rtname = 'Deluxe') ";
		else
			$room_type = $room_type . " or (d.rtname = 'Deluxe') ";
	}		
	
	if ($standard == 'YES') 
	{
		if ($room_type == '')
			$room_type = $room_type . " (d.rtname = 'Standard') ";
		else
			$room_type = $room_type . " or (d.rtname = 'Standard') ";
	}	
	
	if ($room_type == '')
	{
		$query_roomlist = $query_roomlist . "  c.rlid = c.rlid ";
	}
	else
	{
		$query_roomlist = $query_roomlist . $room_type;
	}
			
	$query_roomlist = $query_roomlist . " ) 		
		ORDER BY 
			b.blcode, c.rlgoldroom, c.rlname ";
	$result_roomlist = mysql_query($query_roomlist);
	
/*
	echo '<br> party_rooms : ' . $party_rooms;
	echo '<br> suite : ' . $suite;
	echo '<br> mini_suite : ' . $mini_suite;
	echo '<br> super_deluxe : ' . $super_deluxe;
	echo '<br> deluxe : ' . $deluxe;
	echo '<br> standard : ' . $standard;			
	echo '<br> room_type : ' . $room_type;			
	echo '<br> query_roomlist : ' . $query_roomlist;			
*/
	
	echo mysql_error();				
	while ($row_roomlist =  mysql_fetch_array ($result_roomlist)) 
	{
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

	//echo '<br> START : ' . $allow;
	
		if (($id != '') && ($rscode == '1'))
			$allow = 'true';
		else
		if (($id != '') && ($rscode != '1'))
			$allow = 'false';	
			
	//echo '<br> RSCODE allow : ' . $allow;

				
		$room_rate = 0;		
		if ($hours_of_stay == '3 Hours')
			$room_rate = $row_roomlist['rlrate3hr']; 
		else
		if ($hours_of_stay == '4 Hours')
			$room_rate = $row_roomlist['rlrate4hr']; 
		else
		if ($hours_of_stay == '5 Hours')
			$room_rate = $row_roomlist['rlrate5hr']; 
		else
		if ($hours_of_stay == '6 Hours')
			$room_rate = $row_roomlist['rlrate6hr']; 
		else
		if ($hours_of_stay == '8 Hours')
			$room_rate = $row_roomlist['rlrate8hr']; 
		else
		if ($hours_of_stay == '12 Hours')
			$room_rate = $row_roomlist['rlrate12hr']; 
		else
		if ($hours_of_stay == '24 Hours')
			$room_rate = $row_roomlist['rlrate']; 			
			
		if ($room_rate == 0)
			$allow = 'false';				

	/*	
	echo '<br> row_roomlist blkey : ' . $row_roomlist[blkey];
	echo '<br> row_roomlist rlkey : ' . $row_roomlist[rlkey];
	echo '<br> id : ' . $id;
	echo '<br> locale : ' . $locale;
	echo '<br> roomno : ' . $roomno;
	echo '<br> rscode : ' . $rscode;
	echo '<br> hours_of_stay : ' . $hours_of_stay;
	echo '<br> room_rate : ' . $room_rate;
	echo '<br> allow : ' . $allow;
	*/	
	
		if ($allow == 'true') 
		{
?> 
 							<div class="col-xs-12">
							<?php 
								if ($row_roomlist['rlgoldroom'] == 'GOLD')
								{
							?>
                                <div class="room-select-holder featured-room">
							<?php 
								}
								else
								{
							?>
                                <div class="room-select-holder">
							<?php
								} 
							?>
	
                                    <!-- Button Overlay -->
                                    <!-- <button class="button-wrapper">&#32;</button> -->
                                    <!-- Button Overlay END -->
                                    <div class="room-sr-holder">
                                        <input type="checkbox" name="chosen_room_btn<?php print($roomlist_count); ?>" id="chosen_room_btn<?php print($roomlist_count); ?>" value="<?php print($row_roomlist['rlid']); ?>">
                                        <label for="chosen_room_btn<?php print($roomlist_count); ?>">
                                            <div class="img-holder">
                                               <img src="admin/pages/room/<?php print($row_roomlist['rlpicture']); ?>" />
                                            </div>
                                            <div class="content">
                                              	<h3>
												<span class="room-title"><?php print($row_roomlist['rlname']); ?> ( <?php print($row_roomlist['rtname']); ?> )</span>
												<span class="room-price pull-right">
<?php 
 	$_SESSION['room_rate'] = $room_rate;
	print(number_format($room_rate,2)); 		
?> PHP
												</span>
												</h3>
												
											<?php 
												if ($row_roomlist['rlroom_testimonial'] != '')
												{
											?>												
												<p class="testimonial">"<?php print($row_roomlist['rlroom_testimonial']); ?>"</p>												
											<?php 
												}
											?>
											
                                                <p class="room-desc">
                                                    <?php print($row_roomlist['rldesc']); ?>
                                                </p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
<?php
		}
		
		$roomlist_count = $roomlist_count + 1;
	}
?>		

                        </div>
                    </div>
                </div>
            </section>
        </div>
		</form>
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
                        <div class="left">
							<?php include "footer_menu.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <button class="btn bttn-room-Up visible-xs hidebttn">Back to Room Filter</button>
