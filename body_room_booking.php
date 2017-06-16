<?php
/*
	$testiid = 0;
	$testiname = 'valued customer';
	$testidesc = 'It was out of this world, i would definitely recommend to my friends. The staff was polite and very accomodating too.';
	$query = " 
		SELECT *
		FROM testimonial_list 
		ORDER BY tlstamp desc";
	$result = mysql_query($query);
	echo mysql_error();				
	while ($row =  mysql_fetch_array ($result)) 
	{
		$testiid = $row[tlid];
		$testidate = $row[tldate];
		$testiname = $row[tlname];
		$testidesc = $row[tldesc];
		
		$blid = $row[blid];
		
		$testiactive = $row[tlactive];
		$testiuser = $row[tluser];
		$testistamp = $row[tlstamp];
	}				 
	mysql_query($query) or die('Error, insert query failed');  	
*/

	//user log-in here
	$rlid = '';	
	if(isset($_GET['rlid']))
	{
		$rlid = $_GET['rlid'];
	}
	else
	if(isset($_POST['rlid']))
	{
		$rlid = $_POST['rlid'];
	}
	//echo '<br> rlid : ' . $rlid;
	
	$branch_count = 0;
	$query_branch = " 
		SELECT 
			*
		FROM 
			branch_list a,
			room_list b
		WHERE 
			a.blid = b.blid and
		 	b.rlactive = 'Y' and
			b.rlid = '$rlid'
		ORDER BY 
			b.rlname ";
	$result_branch = mysql_query($query_branch);
	echo mysql_error();				
	while ($row_branch =  mysql_fetch_array ($result_branch)) 
	{
		$rlid = $row_branch[rlid];
		$rlname = $row_branch[rlname];
		$rldesc = $row_branch[rldesc];
		$rlrate = $row_branch[rlrate];
		$rlcount = $row_branch[rlcount];
		$rlavailable = $row_branch[rlavailable];
		$rlgeomap = $row_branch[rlgeomap];
		
		$blid = $row_branch[blid];
		$blname = $row_branch[blname];
		
		$rtid = $row_branch[rtid];
		
		$rlpicture = $row_branch[rlpicture];
		$rlpicture1 = $row_branch[rlpicture1];
		$rlpicture2 = $row_branch[rlpicture2];
		$rlpicture3 = $row_branch[rlpicture3];
		$rlpicture4 = $row_branch[rlpicture4];
		$rlpicture5 = $row_branch[rlpicture5];
		
		$rlcategory1 = $row_branch[rlcategory1];
		$rlcategory2 = $row_branch[rlcategory2];
		$rlcategory3 = $row_branch[rlcategory3];
		$rlcategory4 = $row_branch[rlcategory4];
		$rlcategory5 = $row_branch[rlcategory5];
		
		$rlactive = $row_branch[rlactive];
		$rluser = $row_branch[rluser];
		$rlstamp = $row_branch[rlstamp];
	}
	
	
	//add the booking to this transaction
	//then go to paypal
	$tlid = 0;
	$tlsession = session_id();
	$query = " SELECT *
			   FROM transaction_list a
			   WHERE a.tlsession='$tlsession' ";
	$result = mysql_query($query);
	echo mysql_error();				
	while ($row =  mysql_fetch_array ($result)) 
	{
		$tlid = $row[tlid];
	}
	
	if ($tlid == 0) 
	{
		$tlid = 0;
		$tldate = $globaldate;
		
		$tldocno = 1;
		$query_docno = " 
		SELECT max(a.tldocno) tldocno
		FROM transaction_list a ";
		$result_docno = mysql_query($query_docno);
		echo mysql_error();				
		while ($row_docno =  mysql_fetch_array ($result_docno)) 
		{
			$tldocno = $row_docno[tldocno];
		}
		$tldocno = $tldocno + 1;
		
		$tlsession = session_id();
		
		$tlname = '';
		$tlemail = '';
		$tlphone = '';
		$tlmobile = '';
		
		$tlroom = $rlrate;
		$tlfood = 0;
		$tladdon = 0;
		$tlpromo = 0;
		$tlamt = $rlrate;
		
		$tltype = 'NEW';
		$tlpaid = 0;
		
		$tlactive = 'Y';
		$tluser = $_SESSION["ulname"];
		$tlstamp = $globaldatetime;
		
		$formtitle = 'ADD RECORD';
		
		//need to save automatically the record
		//to prevent duplicate number for tldocno
		$query = 
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
		mysql_query($query) or die(mysql_error());  
		
			
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
	}

	if ($tlid != 0) 
	{
		//add the room here
		//if not yet in the room list
		$trid = 0;
		$query_id = " 
		SELECT *
		FROM transaction_room a
		WHERE 
			a.tlid = '$tlid' and
			a.rlid = '$rlid' ";
		$result_id = mysql_query($query_id);
		echo mysql_error();				
		while ($row_id =  mysql_fetch_array ($result_id)) 
		{	
			$trid = $row_id['trid'];
		}
		
		if ($trid == 0) 
		{
			$trid = 0;
			$trdate = $globaldate;
			$trname = '';
			$tradults = 0;
			$trakids = 0;
			$trdays = 0;
			$trrate = 0;
			$tramt = 0;
			$trtime = '12:00PM';
			$tramt_old = 0;
			
			$trfrom = $globaldate;
			$trto = $globaldate;
			
			//$tlid = '';
			//$rlid = '';
			//$rlname = '';
			
			$tractive = '';
			$truser = '';
			$trstamp = '';
			
			$tractive = 'Y';
			$truser = $_SESSION["ulname"];
			$trstamp = $globaldatetime;		
						
			$query = 
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
			
			trfrom,
			trto,
			
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
			
			'$trfrom',
			'$trto',
			
			'$tlid',
			'$rlid',
			
			'$tractive',
			'$truser',
			'$trstamp'
			)";	
			mysql_query($query) or die(mysql_error());  			
		}
	}
?>

    <main class="room-booking">
        <div class="background-fixed-img"></div>
        <div class="wrapper">
            <nav class="navbar custom-navbar">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" /></a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php?body=about">About Us</a></li>
                            <li><a href="index.php?body=menu-catalog">Our Menu</a></li>
                            <li><a href="index.php?body=gallery">Gallery</a></li>
                            <li><a href="index.php?body=promotions">Promotions</a></li>
                            <li><a href="index.php?body=contact">Contact Us</a></li>
                        </ul>
                    </div> <!--/.nav-collapse -->
                </div>
            </nav>
			<br> 
			<br> 
			<br> 
			<br> 
			<br> 
			<br> 
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
                                        &nbsp;
                                    </li>
                                    <li role="presentation" class="not-active">
                                        &nbsp;
                                    </li>
                                </ul>
                            </div>
                        </div>

<form id = "paypal_checkout" action = "<?php echo $paypal_myaction; ?>" method = "post">
                        <div class="content-book-steps">
                            <div class="col-xs-12 no-padding">
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <div class="col-xs-12">
                                            <div class="room-choice">
                                                <div class="holder">
                                                    <div class="img-holder">
                                                        <img src="admin/pages/room/<?php print($rlpicture); ?>" />
                                                    </div>
                                                    <div class="content">
                                                         <h3>Welcome to <span class="branch-name">Branch</span> - <span class="branch-main"><?php print($blname); ?></span></h3>
														
														<h3><span class="room-title"><?php print($rlname); ?></span><span class="room-price pull-right"><?php print($rlrate); ?> PHP</span></h3>
                                                        <p class="testimonial">"<?php print($testiname); ?>"</p>
                                                        <p class="room-desc">
														    <?php print($testidesc); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										
                                        <div class="col-xs-12 no-padding">
                                            <div class="col-xs-12 col-sm-6 col-sm-push-6 less-padding-left">
                                                <div class="additionals">
                                                    <div class="holder">			
                                                        <div class="info">
														   <p>Customer Details</p>
															<div class="form-group">
																<input type="text" class="form-control custom-style" name="first_name" placeholder="First Name" />
																<input type="text" class="form-control custom-style" name="last_name" placeholder="Last Name" />
															</div>
															<div class="form-group">
																<input type="text" class="form-control custom-style" name="payer_email" placeholder="Email" />
																<input type="text" class="form-control custom-style" name="re-email" placeholder="Re-type email" />
															</div>
															<div class="form-group">
																<input type="text" class="form-control custom-style" name="contact_phone" placeholder="Contact no." />
																<input type="text" class="form-control custom-style" name="promo_code" placeholder="PROMO CODE" />
															</div>														
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-sm-pull-6 less-padding-right hidden-xs">
                                                <div class="check-info">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>Check-in:</td>
                                                                <td class="check-in-date"><?php print($globaldate); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Check-out:</td>
                                                                <td class="check-out-date">12:00PM</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">1 Night</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">Max 2 Adults</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="room-title"><?php print($rlname); ?></td>
                                                                <td class="room-price"><?php print($rlrate); ?> PHP</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" class="total-price">Total: <?php print($rlrate); ?>PHP</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>                      
                                        </div>
                                        <div class="col-xs-12 col-sm-6 pull-right less-padding-left">
											<div class="col-xs-12 col-sm-6 pull-right less-padding-left">
											
											
	<input name = "cmd" value = "_cart" type = "hidden">
	<input name = "upload" value = "1" type = "hidden">
	<input name = "no_note" value = "0" type = "hidden">
	<input name = "bn" value = "PP-BuyNowBF" type = "hidden">
	<input name = "tax" value = "0" type = "hidden">
	<input name = "rm" value = "2" type = "hidden">
	
	<input name = "lc" value = "PH" type = "hidden">
	<input name = "currency_code" value="PHP" type = "hidden">

	<input name = "business" value="<?php echo $paypal_mybusiness; ?>" type = "hidden">
	
	<input type="hidden" name="notify_url" value="<?php echo $config_basedir; ?>index.php?body=paypal_notify&mystatus=<? echo $_SESSION['SESS_SESSION']; ?>">
	<input type="hidden" name="return" value = "<?php echo $config_basedir; ?>index.php?body=paypal_return&mystatus=<? echo $_SESSION['SESS_SESSION']; ?>">
	<input type="hidden" name="cbt" value = "Return to My Site and Get the Tracking ID">
	<input type="hidden" name="cancel_return" value = "<?php echo $config_basedir; ?>index.php?body=paypal_cancel&mystatus=<? echo $_SESSION['SESS_SESSION']; ?>">
			
	<input type = "hidden" name="custom" value = "">
	<input type = "hidden" name="address1" value="">
	<input type = "hidden" name="address2" value="">
	<input type = "hidden" name="city" value="">
	<input type = "hidden" name="state" value="n/a">
	<input type = "hidden" name="zip" value="">
	<input type = "hidden" name="country" value="PH">	

	<div id = "item_1" class = "itemwrap">
		<input name = "item_name_1" value = "<?php echo $rlname; ?>" type = "hidden">
		<input name = "quantity_1" value = "1" type = "hidden">
		<input name = "amount_1" value = "<?php echo $rlrate; ?>" type = "hidden">
	</div>

	<input class="btn next-step gray-bttn" id = "ppcheckoutbtn" value = "Go to Paypal" class = "button" type = "submit">

                                            </div>
                                        </div>
                                        <div class="col-xs-12 visible-xs">
                                            <div class="check-info">
                                                <table>
                                                    <tbody>
                                                       <tr>
															<td>Check-in:</td>
															<td class="check-in-date"><?php print($globaldate); ?></td>
														</tr>
														<tr>
															<td>Check-out:</td>
															<td class="check-out-date">12:00PM</td>
														</tr>
														<tr>
															<td colspan="2">1 Night</td>
														</tr>
														<tr>
															<td colspan="2">Max 2 Adults</td>
														</tr>
														 <tr>
															<td class="room-title"><?php print($rlname); ?></td>
															<td class="room-price"><?php print($rlrate); ?> PHP</td>
														</tr>
														<tr>
															<td colspan="2" class="total-price">Total: <?php print($rlrate); ?>PHP</td>
														</tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <div class="col-xs-12">
                                            <div class="room-choice">
                                                <div class="holder">
                                                    <div class="img-holder">
                                                        <img src="http://placehold.it/570x400" />
                                                    </div>
                                                    <div class="content">
                                                        <h3><span class="room-title">Room Title</span><span class="room-price pull-right">XXX.XX PHP</span></h3>
                                                        <p class="testimonial">"one-liner testimonials"</p>
                                                        <p class="room-desc">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                            aliquip ex ea commodo consequat. Duis aute irure dolor in
                                                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                            Excepteur sint occaecat cupidatat non proident, sunt in
                                                            culpa qui officia deserunt mollit anim id est laborum.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 less-padding-right">
                                            <div class="confirm-customer-details">
                                                <p class="title">Customer Details</p>
                                                <p>Customer Name</p>
                                                <p>email</p>
                                                <p>Contact number</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 less-padding-left">
                                            <div class="confirm-check-info">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Check-in:</td>
                                                            <td class="check-in-date">09/07/2016</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Check-out:</td>
                                                            <td class="check-out-date">09/08/2016</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">1 Night</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">2 Adult/s</td>
                                                        </tr>
                                                        <tr class="cap_text">
                                                            <td class="">Room Title</td>
                                                            <td class="room-price">XXXX.XX PHP</td>
                                                        </tr>
                                                        <tr class="cap_text">
                                                            <td class="promo-title">Promo code</td>
                                                            <td class="code">EAXADA21</td>
                                                        </tr>
                                                        <tr class="border">
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr class="space">
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2 x Chopsuey</td>
                                                            <td>XXX.XX PHP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1 x Liempo</td>
                                                            <td>XXX.XX PHP</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="total-price">Total: XXX.XX PHP</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <a href="menu.html" class="btn gray-bttn view-menu-bttn edit-food-orders">Edit Food Orders</a>
                                            <button class="btn next-step gray-bttn">Pay Now</button>
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
                                    <div class="tab-pane" role="tabpanel" id="step3">
                                        <div class="col-xs-12">
                                            <div class="banner-alert">
                                                <h1>Payment Received &amp; Verified</h1>
                                                <p>Thank you for your payment. An invoice has been sent to you email.</p>
                                            </div>
                                            <div class="banner-alert unsuccessful">
                                                <h1>Payment Unsuccessful</h1>
                                                <p>Please check your payment details and try again.</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 less-padding-right">
                                            <div class="confirm-customer-details">
                                                <p class="title">Customer Details</p>
                                                <p>Customer Name</p>
                                                <p>email</p>
                                                <p>Contact number</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 less-padding-left">
                                            <div class="confirm-check-info">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Check-in:</td>
                                                            <td class="check-in-date">09/07/2016</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Check-out:</td>
                                                            <td class="check-out-date">09/08/2016</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">1 Night</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">2 Adult/s</td>
                                                        </tr>
                                                        <tr class="cap_text">
                                                            <td class="">Room Title</td>
                                                            <td class="room-price">XXXX.XX PHP</td>
                                                        </tr>
                                                        <tr class="cap_text">
                                                            <td class="promo-title">Promo code</td>
                                                            <td class="code">EAXADA21</td>
                                                        </tr>
                                                        <tr class="border">
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr class="space">
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2 x Chopsuey</td>
                                                            <td>XXX.XX PHP</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1 x Liempo</td>
                                                            <td>XXX.XX PHP</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" class="total-price">Total: XXXX.XX PHP</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <a href="index.html" class="btn gray-bttn view-menu-bttn gotoHome">Back to Home Page</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
</form>
                    </div>
                </div>
            </section>
        </div>

    </main>
   