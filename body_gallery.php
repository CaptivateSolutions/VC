<?php
	$select_gallery = '';	
	if(isset($_POST['select_gallery']))
	{
		if ($_POST['select_gallery'])
		{
			$select_gallery = $_POST['select_gallery'];
		}
	}	

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
	
	if (($party_rooms == '') && ($suite == '') && ($mini_suite == '') && ($super_deluxe == '') && ($deluxe == '') && ($standard == '')) 
	{
		$party_rooms = 'YES';
		$suite = 'YES';
	}	
	

?>
    <nav class="navbar custom-navbar fixed-top">
        <div class="container">
        	<?php include "navigation.php" ?>
        </div>
    </nav>
    <main class="gallery">
        <div class="fixed-bg-pattern"></div>
        <div class="wrapper">
            <section class="gal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-3">
							<form name="room-selectionA" action="index.php?body=gallery" method="post">
                            <div class="gallery-sidebar sticky-sidebar">
                                <div class="heading visible-xs">
                                    <div class="open-gallery">Room Search Options <span class="fa fa-search"></span></div>
                                    <div class="close-gallery"><img src="assets/images/icon-close-black.png" /></div>
                                </div>
                                <div class="holder">
                                    <div class="content">
                                        <div class="branch-select">
											<h4>Branch</h4>
<?php 
	print($myparam); 

/*
	echo "<br> select_gallery ". $select_gallery;
	echo "<br> party_rooms ". $party_rooms;
	echo "<br> suite ". $suite;
	echo "<br> mini_suite ". $mini_suite;
	echo "<br> super_deluxe ". $super_deluxe;
	echo "<br> deluxe ". $deluxe;
	echo "<br> standard ". $standard;
*/	
?>
                                            <select class="form-control custom-style" name="select_gallery">
                                                <option><?php print($select_gallery); ?></option>
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
		echo '<option>' .	$row_branch['blcode'] . '</option>';
		$branch_count = $branch_count + 1;
	}
?>														
                                                <option></option>
                                            </select>
                                        </div>

                                        <div class="room-type">
                                            <h4>Select Room Type</h4>
											
											<div class="radio-selector">
											<?php
												$mycheck = '';
												if ($party_rooms != '') { $mycheck = 'checked'; }
											?>
                                                <input type="checkbox" name="party_rooms" id="party_rooms" value="YES" <?php print($mycheck); ?>>
                                                <label class="" for="party_rooms">Party Rooms</label>
                                            </div>
                                            <div class="radio-selector">
											<?php
												$mycheck = '';
												if ($suite != '') { $mycheck = 'checked'; }
											?>
                                                <input type="checkbox" name="suite" id="suite" value="YES" <?php print($mycheck); ?>>
                                                <label class="" for="suite">Suite</label>
                                            </div>
                                            <div class="radio-selector">
											<?php
												$mycheck = '';
												if ($mini_suite != '') { $mycheck = 'checked'; }
											?>
                                                <input type="checkbox" name="mini_suite" id="mini_suite" value="YES" <?php print($mycheck); ?>>
                                                <label class="" for="mini_suite">Mini Suite</label>
                                            </div>
                                            <div class="radio-selector">
											<?php
												$mycheck = '';
												if ($super_deluxe != '') { $mycheck = 'checked'; }
											?>
                                                <input type="checkbox" name="super_deluxe" id="super_deluxe" value="YES" <?php print($mycheck); ?>>
                                                <label class="" for="super_deluxe">Super Deluxe</label>
                                            </div>
                                            <div class="radio-selector">
											<?php
												$mycheck = '';
												if ($deluxe != '') { $mycheck = 'checked'; }
											?>
                                                <input type="checkbox" name="deluxe" id="deluxe" value="YES" <?php print($mycheck); ?>>
                                                <label class="" for="deluxe">Deluxe</label>
                                            </div>
                                            <div class="radio-selector">
											<?php
												$mycheck = '';
												if ($standard != '') { $mycheck = 'checked'; }
											?>
                                                <input type="checkbox" name="standard" id="standard" value="YES" <?php print($mycheck); ?>>
                                                <label class="" for="standard">Standard</label>
                                            </div>
                                        </div>
                                        <div class="search-room-sel">
                                            <input type="submit" class="form-control btn search-room-bttn" value="Search Room" />
                                        </div>
                                    </div>
                                    <div class="search-again-holder visible-xs">
                                        <button type="submit" class="form-control btn gray-bttn search-room-bttn">Search Again <span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </div>
							</form>
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-9 no-padding">
                            <div class="gal-list">
                                
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
			b.blcode LIKE '%$select_gallery%' and 
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
	

	
	if (($party_rooms == '') && ($suite == '') && ($mini_suite == '') && ($super_deluxe == '') && ($deluxe == '') && ($standard == '')) 
	{
		if ($room_type == '')
			$room_type = $room_type . " (d.rtname = 'Party Rooms') ";
		else
			$room_type = $room_type . " or (d.rtname = 'Party Rooms') ";
			
		if ($room_type == '')
			$room_type = $room_type . " (d.rtname = 'Suite') ";
		else
			$room_type = $room_type . " or (d.rtname = 'Suite') ";			
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
			c.rlname ";
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
?> 								

								<div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="itm-list">
                                        <div class="itm_img_holder">
                                            <img class="main_img" src="admin/pages/room/<?php print($row_roomlist['rlpicture']); ?>" />
                                        </div>
                                        <div class="desc">
                                            <p class="itm-name"><?php print($row_roomlist['rlname']); ?></p>
                                            <p class="itm-loc"><?php print($row_roomlist['blcode']); ?></p>
                                        </div>
                                        <div class="thumb_list hidden">
<?php
		if ($row_roomlist['rlpicture1'] != '')
		{
			?>										
			<div class="itm_thumb">
				<img src="admin/pages/room/<?php print($row_roomlist['rlpicture1']); ?>" />
			</div>
			<?php
		}

		if ($row_roomlist['rlpicture2'] != '')
		{
			?>										
			<div class="itm_thumb">
				<img src="admin/pages/room/<?php print($row_roomlist['rlpicture2']); ?>" />
			</div>
			<?php
		}

		if ($row_roomlist['rlpicture3'] != '')
		{
			?>										
			<div class="itm_thumb">
				<img src="admin/pages/room/<?php print($row_roomlist['rlpicture3']); ?>" />
			</div>
			<?php
		}

		if ($row_roomlist['rlpicture4'] != '')
		{
			?>										
			<div class="itm_thumb">
				<img src="admin/pages/room/<?php print($row_roomlist['rlpicture4']); ?>" />
			</div>
			<?php
		}

		if ($row_roomlist['rlpicture5'] != '')
		{
			?>										
			<div class="itm_thumb">
				<img src="admin/pages/room/<?php print($row_roomlist['rlpicture5']); ?>" />
			</div>
			<?php
		}
?>										
                                        </div>
                                    </div>
                                </div>
								
<?php
		$roomlist_count = $roomlist_count + 1;
	}
?>		
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="itm_gal_preview">
            <div class="itm_prev_holder">
                <div class="container">
                   <div class="row">
                        <div class="col-xs-12 col-md-10 col-md-offset-1">
                            <div class="itm_gal">
                                <div class="prev_header">
                                    <span class="pull-left">
                                        <span class="prev_itm_name"></span>
                                        <span class="prev_itm_loc"></span>
                                    </span>
                                    <span class="pull-right">
                                        <span class="close_itm_prev">X</span>
                                    </span>
                                </div>
                                <div class="prev_itm_main_img">
                                    <img src="" />
                                </div>
                                <div class="prev_footer">
                                    <div class="thumb_list">
                                    </div>
                                </div>
                            </div>
                        </div>
                       
<?php /*					   
					    <div class="col-xs-12 col-md-10 col-md-offset-1">
						<form name="room-selection" action="index.php?body=gallery" method="get">
                           <div class="visible-xs bookRoom-holder">
                               <p>The room is available!</p>
							   <button type="button" class="btn input-style-bttn" id="showRoomBookFilter">Book Room</button>
                           </div>
                           
						   <div class="bookRoom hidden-xs">
                               <div class="form-inline">
                                   <div class="form-group">
										<input type="text" name="check_in" class="form-control custom-style datepick js-checkindate-gallery" placeholder="Check-in Date" id="datepicker5" />
                                   </div>
                                   <div class="form-group">
										<input type="text" name="check_out" class="form-control custom-style datepick js-checkoutdate-gallery" placeholder="Check-out Date" id="datepicker6" />
                                   </div>
                                   <div class="form-group">
										<input type="text" name="check_in_time" class="form-control custom-style datepick js-checkintime-gallery" placeholder="Check-in Time" id="timepicker4" />
                                   </div>
									<div class="form-group">
										<select class="form-control custom-style js-hourstay-gallery" name="hours_of_stay" required>
										<option value="3 Hours">3 Hours</option>
										<option value="4 Hours">4 Hours</option>
										<option value="5 Hours">5 Hours</option>
										<option value="6 Hours">6 Hours</option>
										<option value="8 Hours">8 Hours</option>
										<option value="12 Hours">12 Hours</option>
										<option value="24 Hours">24 Hours</option>
										</select>	
                                    </div>									   
									<div class="form-group">
										<input type="hidden" name="body" value="gallery" >								   
										<input type="hidden" name="select_branch" value="<?php print($select_gallery);?>" >								   
										<input type="submit" name="view_rooms" class="form-control input-style-bttn view-rooms" value="Book Now" />
										<input class="js-gallery-room" type="hidden" name="selected_room" value="" />
                               		</div>
                               </div>
                           </div>
                       </form>
                       </div>
*/ ?>					   
                    </div>
                </div>
            </div>
        </div>
       
<?php /*	   
 		<form name="room-selection" action="index.php?body=gallery" method="get">
		<div class="visible-xs" id="bookRoom">
             <div class="heading">
                 <div class="head_text">Book Room</div>
                 <div class="close_roomBook"><img src="assets/images/icon-close-black.png" /></div>
             </div>
             <div class="form-inline">
                 <div class="form-group desc hidden-xs">The room you're viewing is available!</div>
                 <div class="form-group">
                     <input type="text" name="check_in" class="form-control custom-style datepick js-checkindate-gallery" placeholder="Check-in Date" id="datepicker5" />
                 </div>
                 <div class="form-group">
                     <input type="text" name="check_out" class="form-control custom-style datepick js-checkoutdate-gallery" placeholder="Check-out Date" id="datepicker6" />
                 </div>
                 <div class="form-group">
                     <input type="text" name="check_in_time" class="form-control custom-style datepick js-checkintime-gallery" placeholder="Check-in Time" id="timepicker4" />
                 </div>
                 <div class="form-group">
                   <select class="form-control custom-style js-hourstay-gallery" name="hours_of_stay" required>
                     <option value="">Hours of Stay?</option>
                     <option value="3 Hours">3 Hours</option>
                     <option value="6 Hours">6 Hours</option>
                     <option value="12 Hours">12 Hours</option>
                     <option value="24 Hours">24 Hours</option>
                   </select>
                 </div>
                 <div class="form-group">
					<input type="hidden" name="body" value="gallery" >								   
					<input type="hidden" name="select_branch" value="<?php print($select_gallery);?>" >		
                    <input type="submit" name="view_rooms" class="form-control input-style-bttn view-rooms visible-xs" value="PROCEED TO RESERVATION" />
                    <input class="js-gallery-room" type="hidden" name="selected_room" value="" />
                 </div>
             </div>
         </div>
         </form>
*/ ?>		 		
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