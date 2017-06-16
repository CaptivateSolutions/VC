<?php include 'config8298928293189.php';

	$link = mysql_connect("$dbhost", "$dbuser", "$dbpassword")or die("cannot connect to server ");
	@mysql_select_db("$dbdatabase")or die("Unable to select database.");
	
//	$test_mode = 'YES';
	$test_mode = 'NO';
	
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
		
	////  paynamics ////
	
	$orderid = '';
	$txn_id = '';
	
	try{
		$body = $_POST["paymentresponse"];
		$body = str_replace(" ", "+", $body);
		$Decodebody = base64_decode($body);
		
		echo "DECODEd : </br></br> ";		
		$ServiceResponseWPF = new SimpleXMLElement($Decodebody);
		$application = $ServiceResponseWPF->application;
		$responseStatus = $ServiceResponseWPF->responseStatus;
		
		echo "Response: " . $ServiceResponseWPF->application->signature;
		$cert = $comerchant_key; //merchantkey
		
		$forSign = $application->merchantid . $application->request_id . $application->response_id . $responseStatus->response_code . $responseStatus->response_message . $responseStatus->response_advise . $application->timestamp . $application->rebill_id . $cert;
		
		$_sign = hash("sha512", $forSign);
		echo "</br>Computed:" . $_sign;
		
		if($_sign == $ServiceResponseWPF->application->signature)
		{
			echo "</br>VALIDATE SIGNATURE *** ";
			if($responseStatus->response_code=="GR001" || $responseStatus->response_code=="GR002")
			{	
				//if GR001 = regular
				//if GR002 = 3D transaction
				
				echo "</br>SUCCESS TRANSACTION";
				$orderid = $ServiceResponseWPF->application->request_id;	
				$txn_id = $ServiceResponseWPF->application->signature;	
				echo "</br> Order ID : " . $orderid;
				echo "</br> Signature : " . $txn_id;
			}
			else
			{
				echo "</br>FAILED TRANSACTION";
				$orderid = '';
				$txn_id = '';
			}
		}
		else
		{
			echo "</br>INVALID SIGNATURE";
			$orderid = '';
			$txn_id = '';
		}
	
	}
	catch(Exception $ex)
	{
		echo "</br>EXCEPTION ERROR";
		echo $ex->getMessage();
	}
	
	/////////////////////////////// TEST  ////////////////////////////////////
	
	if ($test_mode == 'YES')
	{
		$txn_id = 'vc59e3a16377cc2e56fca4e35f34c09abckey';
		//$orderid = 58;  6 hours stay
		$orderid = 10;  //24 hours stay
	}
	
	/////////////////////////////// TEST  ////////////////////////////////////
		 
	if ($orderid != "" && $txn_id != "") 
	{ 
	  //create a mysqli connection
	  $con = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase, 3306,
		 "/var/lib/mysql/mysql.sock");
	
	  $tlactive = 'Y';
	  $tluser = 'Paynamics';
	  $tlstamp = date('Y-m-d H:i:s');	
	
	  //update database with txn id
	  //$strsql1 = "INSERT INTO transaction_payment ( tpdate, tptype , tpname , tpamt , tlid , tpactive , tpuser, tpstamp ) VALUES ( '$globaldate', 'PAYPAL', '$txn_id' , '$price' , '$orderid' , '$tlactive', '$tluser', '$tlstamp' ) ";
	  //$con->query($strsql1);
	  
	  
	  $query_update_pay = "UPDATE transaction_list SET tlpaid = tlamt, tltype = 'PAID', tlpaynamics = '$txn_id' WHERE tlid = '$orderid'";
		mysql_query($query_update_pay) or die('The entry has links to other tables. Cannot continue to process...'); 	
		
		$trdetails= mysql_query("SELECT * FROM transaction_room WHERE tlid='$orderid'");
		while($r=mysql_fetch_assoc($trdetails))
		{
			$rlid=$r['rlid'];
			$trdate=$r['trdate'];
			$trfrom=$r['trfrom'];
			$trto=$r['trto'];
			$trdays=$r['trdays'];
			$trrate=$r['trrate'];
			$trstay=$r['trstay'];
			$trtime=$r['trtime'];
			$trid=$r['trid'];
			$tlidfetch=$r['tlid'];
		}
		
		$tldetails= mysql_query("SELECT * FROM transaction_list WHERE tlid='$tlidfetch'");
		while($d=mysql_fetch_assoc($tldetails))
		{
			$tlname=$d['tlname'];
			$tlemail=$d['tlemail'];
			$tlphone=$d['tlphone'];
		}
		
		$queryblid="SELECT blid FROM transaction_room AS tr JOIN room_list AS rl ON tr.rlid=rl.rlid WHERE tr.rlid='$rlid' AND tr.trid='$trid'";
		$exblid=mysql_query($queryblid);
		$blid=mysql_fetch_assoc($exblid);
	
		if($blid['blid']==1)
			$locale_id=8;
		if ($blid['blid']==2)
			$locale_id=31;
		if ($blid['blid']==3)
			$locale_id=33;
		if ($blid['blid']==4)
			$locale_id=1;
		if ($blid['blid']==5)
			$locale_id=3;
		if ($blid['blid']==6)
			$locale_id=4;
		if ($blid['blid']==7)
			$locale_id=6;
		if ($blid['blid']==8)
			$locale_id=2;
		if ($blid['blid']==9)
			$locale_id=32;
		if ($blid['blid']==11)
			$locale_id=5;

	} 
	
	if ($orderid != '') 
	{
		$tlid = $orderid;
		
		$query_id = " SELECT 
						*
				   FROM 
						transaction_list a, transaction_room b, 
						room_list c, branch_list d
				   WHERE 
						a.tlid = b.tlid and 
						b.rlid = c.rlid and 
						c.blid = d.blid and 
						a.tlid='$tlid' ";
		$result_id = mysql_query($query_id);
		echo mysql_error();				
		while ($row_id =  mysql_fetch_array ($result_id)) 
		{
			$tlid = $row_id[tlid];
			$tldate = $row_id[tldate];
			$tldocno = $row_id[tldocno];
			$tlsession = $row_id[tlsession];
			
			$tlname = $row_id[tlname];
			$tlemail = $row_id[tlemail];
			$tlphone = $row_id[tlphone];
			$tlmobile = $row_id[tlmobile];
			
			$tlroom = $row_id[tlroom];
			$tlfood = $row_id[tlfood];
			$tladdon = $row_id[tladdon];
			$tlpromo = $row_id[tlpromo];
			$tlamt = $row_id[tlamt];
			
			$tltype = $row_id[tltype];
			$tlpaid = $row_id[tlpaid];
			
			$tlactive = $row_id[tlactive];
			$tluser = $row_id[tluser];
			$tlstamp = $row_id[tlstamp];
					
			$trid = $row_id[trid];
			$trdate = $row_id[trdate];
			$trname = $row_id[trname];
			$tradults = $row_id[tradults];
			$trakids = $row_id[trakids];
			$trdays = $row_id[trdays];
			$trrate = $row_id[trrate];
			$tramt = $row_id[tramt];
			$trtime = $row_id[trtime];
			$tramt_old = $row_id[tramt];
			$trstay = $row_id[trstay];
			
			$trfrom = $row_id[trfrom];
			$trto = $row_id[trto];
			
			//$tlid = $row[tlid];
			
			$rlid = $row_id[rlid];
			$rlname = $row_id[rlname];
			$rlkey = $row_id[rlkey];
			$rlpicture = $row_id[rlpicture];
	
			$blid = $row_id[blid];
			$blkey = $row_id[blkey];
			$blname = $row_id[blname];
			$blemail = $row_id[blemail];
			$blmobile = $row_id[blmobile];
			$bladdr = $row_id[bladdr];
			$blphone = $row_id[blphone];
			
			$tractive = $row_id[tractive];
			$truser = $row_id[truser];
			$trstamp = $row_id[trstamp];			
		}	
	
	
		/*
		//record payment
		$query_trans = "
			UPDATE 
				transaction_list 
			SET 
				tltype = 'PAID',
				tlpaid = '$price'
			WHERE
				tlid = '$tlid'";
		mysql_query($query_trans) or die('The entry has links to other tables. Cannot continue to process...'); 	
		
		//update transaction payment
		$query_pay = 
			"INSERT INTO transaction_payment (
				tpid,
				tpdate,
				tptype,
				tpname,
				tpamt,
				
				tlid,
				
				tpactive,
				tpuser,
				tpstamp
			) 
			VALUES 
			(
				'$0',
				'$globaldate',
				'PAYPAL',
				'PAYPAL',
				'$price',
				
				'$tlid',
				
				'Y',
				'ON-LINE',
				'$globaldatetime'
			)";
		mysql_query($query_pay) or die('The entry has links to other tables. Cannot continue to process...'); 	
		*/
		
		$allow = 'true';
		
		$id = '';
		$rscode = '';
		$query = " SELECT *
				   FROM rooms a
				   WHERE a.locale = '$blkey' and a.roomno = '$rlkey' ";
		$result = mysql_query($query);
		echo mysql_error();				
		while ($row =  mysql_fetch_array ($result)) 
		{
			$id = $row[id];
			$rscode = $row[rscode];
		}			
	
		if (($id != '') && ($rscode != ''))
		{
			if ($tldate == $globaldate)
			{
				//reserve the room table
				//if room is connected to VC
				//update ROOMS table RSCODE 
				$query_rooms = "
					UPDATE 
						rooms 
					SET 
						rscode = '4',
						arrival = '$trtime'
					WHERE
						id = '$id'";
				mysql_query($query_rooms) or die('The entry has links to other tables. Cannot continue to process...'); 
			}
		}	
		else	
		{
			if ($tldate == $globaldate)
			{
				//reserve the room table
				//if room is NOT connected to VC
				//update ROOM_LIST table AVAILABILITY
				$query_available = "
					UPDATE 
						room_list 
					SET 
						rlavailable = 'N'
					WHERE
						rlid = '$rlid'";
				mysql_query($query_available) or die('The entry has links to other tables. Cannot continue to process...'); 
			}
		}		
		
		
		$tldate = date('m/d/Y', strtotime($tldate));
		$trfrom = date('m/d/Y', strtotime($trfrom));
		$trto = date('m/d/Y', strtotime($trto));
	}
	
		
	if ($tlid != 0)
	{
		$query = " SELECT 
						*
				   FROM 
						transaction_list a, transaction_food b
				   WHERE 
						a.tlid = b.tlid and 
						a.tlid='$tlid'";
		$result = mysql_query($query);
		echo mysql_error();		
		$food_ordered = 1;	
		$food_string = '';	
		while ($row =  mysql_fetch_array ($result)) 
		{
			$tfqty = $row[tfqty];
			$tfname = $row[tfname];
			if ($food_string == '')
			{
				$food_string = $food_string . '(' . number_format($tfqty,0) . ') ' . $tfname;
			}
			else
			{
				$food_string = $food_string . ' , ' . '(' . number_format($tfqty,0) . ') ' .  $tfname;
			}
			$food_ordered = $food_ordered + 1;
		}	
		$food_string = $food_string . '&nbsp;';
	}
	
	
	if ($tlid != 0)
	{
		$query = " SELECT 
						*
				   FROM 
						transaction_list a, transaction_addon b
				   WHERE 
						a.tlid = b.tlid and 
						a.tlid='$tlid'";
		$result = mysql_query($query);
		echo mysql_error();		
		$addon_ordered = 1;		
		$addon_string = '';		
		while ($row =  mysql_fetch_array ($result)) 
		{
			$taqty = $row[taqty];
			$taname = $row[taname];
			if ($addon_string == '')
			{
				$addon_string = $addon_string . '(' . number_format($taqty,0) . ') ' . $taname;
			}
			else
			{
				$addon_string = $addon_string . ' , ' . '(' . number_format($taqty,0) . ') ' . $taname;
			}	
			$addon_ordered = $addon_ordered + 1;
		}	
		$addon_string = $addon_string . '&nbsp;';

		/*	
		<option value="3 Hours">3 Hours</option>
		<option value="4 Hours">4 Hours</option>
		<option value="5 Hours">5 Hours</option>
		<option value="6 Hours">6 Hours</option>
		<option value="8 Hours">8 Hours</option>
		<option value="12 Hours">12 Hours</option>
		<option value="24 Hours">24 Hours</option>	
		*/
		
		//20170426
		$mystay = '';
		if ($trstay == '24 Hours')
		{
			//show days
			$trdays = $trdays - 1;
			
			if ($trdays == 0)
			{
				$trdays = 1;
			}
			
			if ($trdays == 1)
			{
				$mystay = $trdays . ' night';
			}
			else
			{
				$mystay = $trdays . ' nights';
			}
		}
		else
		{
			//show hours stay
			$mystay = $trstay . ' Stay';
		}
	}	
		
		





















	$message = '
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	</head>
	
	<body>
	<div align="center" style="font-family: Lato; font-size: 14px;">
		<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;" width="620">
			<tbody>
				<tr>
					<td align="center" style="font-family: Arial, Helvetica, Verdana; border-collapse: collapse; vertical-align: top; valign=" top"="">
						<table bgcolor="#000000" border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px; background-color: #000000;" width="600">
							<tbody>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 10px 10px; margin: 0px;" valign="top">
										<center><a href="http://www.victoriacourt.biz/" target="_blank">
										<img alt="Victoria Court" id="vclogo" src="' . $config_basedir . 'vc_email_banner.png"></a>
										</center>
									</td>
								</tr>
							</tbody>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
							<tbody>
								<tr>
									<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">
									&nbsp;
									</td>
								</tr>
							</tbody>
						</table>
						<table bgcolor="#efffc5" border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; width: 600px; margin: 0px; padding: 0px; border-color: rgb(181, 210, 153); border-style: solid; background-color: #000000;">
							<tbody>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 33px; padding: 10px; margin: 0px;" valign="top" width="28">
										<img alt="This booking is guaranteed." height="28" id="8392692000000785015_imgsrc_url_2" src="' . $config_basedir . 'vc_green_check.png" style="line-height: 10px; outline: none; border-width: 0px;" width="28">
									</td>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 10px 10px 10px 10px; margin: 0px;" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
											<tbody>
												<tr>
													<td align="left" style="font-size: 16px; border-collapse: collapse; vertical-align: top; line-height: 24px; padding: 0px; margin: 0px; font-weight: bold; color: #ffffff;" valign="top">
														Your booking is guaranteed and all paid for. </td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						
						
						<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
							<tbody>
								<tr>
									<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">
										&nbsp;
									</td>
								</tr>
							</tbody>
						</table>
						<table bgcolor="#eae8e0" border="1" cellpadding="0" cellspacing="0" style="border-spacing: 0px; width: 600px; margin: 0px; padding: 0px; background-color: #fff;">
							<tbody>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 10px; margin: 0px;" valign="top">
										<table align="right" border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;" width="250">
											<tbody>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 1px; padding: 0px; margin: 0px;" valign="top">
														<img alt="' . $blname . '" id="8392692000000785015_imgsrc_url_6" src="' . $config_basedir . 'admin/pages/room/' . $rlpicture . '" style="line-height: 14px; outline: none; border-width: 0px;" width="250"></td>
												</tr>
											</tbody>
										</table>
										<table align="left" border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;" width="310">
											<tbody>
												<tr>
													<td align="left" style="font-size: 16px; border-collapse: collapse; vertical-align: top; line-height: 24px; padding: 0px; margin: 0px;" valign="top">
														<strong>' . $blname . '</strong></td>
												</tr>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 5px 0px 10px; margin: 0px;" valign="top">
														' . $bladdr . '
													</td>
												</tr>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px; margin: 0px;" valign="top">
														' . $blphone . '
													</td>
												</tr>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px; margin: 0px;" valign="top">
														' . $blmobile . '
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
							<tbody>
								<tr>
									<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">
									&nbsp;
									</td>
								</tr>
							</tbody>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; width: 600px; margin: 0px; padding: 0px;">
							<tbody>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 6px 10px; margin: 0px;" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
											<tbody>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 0px 0px; margin: 0px; width: 240px;" valign="top">
														<strong>Confirmation Number</strong>
													</td>
													<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
														' . $tlid . '
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								

								<tr>
									<td align="left" style="font-size: 1px; border-collapse: collapse; vertical-align: top; line-height: 1px; padding: 0px; margin: 0px; border-bottom-color: rgb(204, 204, 204);" valign="top">
									&nbsp;
									</td>
								</tr>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 6px 10px; margin: 0px;" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
											<tbody>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 0px 0px; margin: 0px; width: 240px;" valign="top">
														<strong>Guest Name</strong></td>
													<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
														' . $tlname . ' </td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>										
								
								<tr>
									<td align="left" style="font-size: 1px; border-collapse: collapse; vertical-align: top; line-height: 1px; padding: 0px; margin: 0px; border-bottom-color: rgb(204, 204, 204);" valign="top">
									&nbsp;
									</td>
								</tr>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 6px 10px; margin: 0px;" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
											<tbody>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 0px 0px; margin: 0px; width: 240px;" valign="top">
														<strong>Check in</strong></td>
													<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
														' . date('l M d, Y', strtotime($trfrom)) . ' &nbsp;(' . $trtime . ')</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								
						
								
								<tr>
									<td align="left" style="font-size: 1px; border-collapse: collapse; vertical-align: top; line-height: 1px; padding: 0px; margin: 0px; border-bottom-color: rgb(204, 204, 204);" valign="top">
										&nbsp;
									</td>
								</tr>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 6px 10px; margin: 0px;" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
											<tbody>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 0px 0px; margin: 0px; width: 240px;" valign="top">
														<strong>Check out</strong>
													</td>
													<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
														' . date('l M d, Y', strtotime($trto)) . '</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td align="left" style="font-size: 1px; border-collapse: collapse; vertical-align: top; line-height: 1px; padding: 0px; margin: 0px; border-bottom-color: rgb(204, 204, 204);" valign="top">
										&nbsp;
										</td>
								</tr>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 6px 10px; margin: 0px;" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
											<tbody>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 0px 0px; margin: 0px; width: 240px;" valign="top">
														<strong>Your stay</strong>
													</td>
													<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
														' . $mystay . ', 1 room
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td align="left" style="font-size: 1px; border-collapse: collapse; vertical-align: top; line-height: 1px; padding: 0px; margin: 0px; border-bottom-color: rgb(204, 204, 204);" valign="top">&nbsp;
										</td>
								</tr>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 6px 10px; margin: 0px;" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
											<tbody>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 0px 0px; margin: 0px; width: 240px;" valign="top">
														<strong>Additionals</strong>
													</td>
													<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
														' . $addon_string . '
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 6px 10px; margin: 0px;" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
											<tbody>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 0px 0px; margin: 0px; width: 240px;" valign="top">
														<strong>Food Orders</strong>
													</td>
													<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
														' . $food_string . '
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td align="left" bgcolor="#efffc5" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 6px 10px; margin: 0px; background-color: rgb(239, 255, 197); border-top-style: solid; border-top-color: rgb(204, 204, 204);" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
											<tbody>
												<tr>
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 0px 0px; margin: 0px; width: 240px;" valign="top">
														<strong>Total Amount Paid</strong></td>
													<td align="right" style="font-size: 16px; border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
														<strong>PHP ' . number_format($tlamt,2) . '</strong></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
	
						<hr>
						
						<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding-top: 10px;">
							<tbody>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 0px 0px; margin: 0px; width: 180px;" valign="top">
										<strong>Required at check in</strong></td>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px; margin: 0px; width: 410px;" valign="top">
										<ul style="margin: 0px 0px 0px 24px; padding: 0px; list-style-type: square;">
											<li style="margin: 0px; padding: 0px;">
												Incidental deposit of P1,000.00 cash</li>
											<li style="margin: 0px; padding: 0px;">
												Minimum check-in age is 21</li>
										</ul>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
		
		
			
		<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
			<tbody>
				<tr>
					<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">
					&nbsp;
					</td>
				</tr>
			</tbody>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
			<tbody>
				<tr>
					<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">
					&nbsp;
					</td>
				</tr>
			</tbody>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; width: 600px; margin: 0px; padding: 0px;">
			<tbody>
				<tr>
					<td align="left" bgcolor="#efffc5" style="border-collapse: collapse; vertical-align: top; line-height: 20px; margin: 0px; padding: 10px; border-color: rgb(181, 210, 153); border-style: solid; background-color: rgb(239, 255, 197);" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; width: 578px; margin: 0px; padding: 0px;">
							<tbody>
								<tr>
									<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px; margin: 0px;" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
											<tbody>
												<tr>
													
												
													<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px; margin: 0px; color: rgb(62, 110, 0);" valign="top">
																			<strong>Thank you for paying. Your booking is guaranteed.</strong><br>You\'ll need to pay any additional charges and fees incurred during your stay at our hotel in Philippine currency.<br /><br />
																			
																			
																		 <font color="#000000"><p align="center"><strong>HOTEL GUIDELINES</strong></p><p><strong>General Terms</strong><br></p><p>No minors (persons below 21) will be allowed entry, unless part of the family, or a legal guardian can provide the necessary papers. The Hotel reserves the right to decline entry of said guests. This will not result to a refund.</p><ul><li>The voucher provided by the Hotel, along with the credit card used in the purchase, or a photocopy thereof, and a valid I.D. must be presented to the hotel staff during check-in. Failure to do so may result in the reservation not being honored or an alternative method of payment being required by the hotel.</li>
																		 
											
																		 <li>Maximum of 3 persons per room for couple stay, one being a child.</li><li>Once the voucher has been purchased, it must be used on the booked date and arrival time. There is no refund for cancellations.</li><li>The specific time of arrival will be strictly followed. In case of a late arrival, the hotel will provide a 30 minutes grace period otherwise; the chosen room will become available to walk-in guests.<br></li><li>A no-show guest, or a shortening of stay, will not be given any refund.</li><li>Receipts will not bear Victoria Court\'s name on it, rather, it will bear the discreet company title of the branch</li><li>Guests are requested to avail of the various food and beverage selections at the Hotel. Bringing in of food is prohibited. (except for Gil Puyat, Malate and Cuneta branches)</li><li>No pets allowed in the hotel premises. (except for Gil Puyat, Malate and Cuneta branches)</li><li>Guests will be required to pay for an incidental deposit of P1,000.00 cash prior to check-in. This is to cover additional costs beyond the room rate which may include food, beverages and other miscellaneous requests, and possible damages during the stay. <br></li><li>In leaving the hotel premises, expect that our Security Guards will do their verifications by politely asking for some information for specific reasons such as if you have outstanding balances that needs to be fully paid, if someone was left alone in the room, and other security reason. </li></ul><p><strong>Services</strong><br></p><p>Extra mattress is applicable only to Suite Rooms. Please note that an extra mattress charge will include breakfast. (except for Gil Puyat, Malate and Cuneta branches)</p><ul><li>Special requests depends on availability.</li><li>Airport Transfer must be requested with the hotel directly. Each branch will have different rates for the service, depending on the distance from/to the airport. The Hotel is not obligated to provide this service.</li><li>The hotel will not charge you for the room; however you will be responsible for any additional services used during your stay. (mini-bar, laundry, and associated costs thereof)</li><li>For any questions, you may contact the Victoria Court\'s Marketing Department at 671-23-17 or 0917-827-3783 and for Cuneta, Gil Puyat and Malate, 310-2808 loc. 309-310 or 0917-981-0084, 10 hours a day, 5 days per week, between the hours 9 a.m-7 p.m., Mondays to Fridays, Philippine time.</li></ul><p><strong>Modification Policy</strong></p><p>Modifications to reservations must be made 3 days before the arrival date.</p><ul><li>If modification is done after the said period, the guest will be charged with the full amount of their 1st night.</li><li>For parties and photo shoots, you may contact the Victoria Court\'s Marketing Department at 671-23-17 or 0917-827-3783 and for Cuneta, Gil Puyat and Malate, 310-2808 loc. 309-310 or 0917-981-0084, 1between the hours 9 A.M. - 7 P.M., Mondays to Fridays, Philippine time.</li></ul><p><br></p><p><strong>Pet-Friendly Hotel Polices (For Gil Puyat, Malate and Cuneta only)</strong><br></p><p> Pet must not be left unattended in the hotel room or suite.</p><ul><li>Pet must be fully trained and appropriately restrained by guest.</li><li>Pet must be kept on a leash when in the hotel or on hotel property unless it is in the guest\'s room.</li><li>Guests are responsible for cleaning up after their pet on hotel property and in the neighborhood.</li><li>Any disturbances such as barking must be curtailed to ensure other guests are not inconvenienced.</li><li>Guests are responsible for all property damages and/or personal injuries resulting from their pet.</li><li>Guests agree to indemnify and hold harmless the hotel. its owners and its operator from all liability and damage suffered as a result of the guest\'s pet. The hotel reserves the right to charge guest\'s account commensurate to the cost of such damages.</li></ul><p><br></p></td>
																			
																			
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							
							<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
								<tbody>
									<tr>
										<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">
											&nbsp;</td>
									</tr>
								</tbody>
							</table>
							<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; width: 600px; margin: 0px; padding: 0px;">
								<tbody>
									<tr>
										<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px; margin: 0px;" valign="top">
											<table align="left" border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
												<tbody>
													<tr>
														<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 0px 0px; margin: 0px; width: 180px;" valign="top">
															<strong>Cancellation policy</strong></td>
														<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px; margin: 0px; width: 410px;" valign="top">
															
															<li>We will not be able to refund any payment for no-shows or early check-out.</li>
															
															<li>Cancellations for short time stays, we strictly follow the time of arrival indicated in their vouchers. We can only give a leeway of 15 minutes for those who will be late. Should they go beyond the 15 minute leeway, their reservation will be forfeited and no refund will be given to them. Modification of their stay is not allowed. </li><li>

Cancellations & Modifications for 12 & 24 hours stay should be made 3 days prior check in date. If they cancel beyond 3 days, they will be charged for 1 night. 
</li>
															</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
							<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
								<tbody>
									<tr>
										<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">
											&nbsp;</td>
									</tr>
								</tbody>
							</table>
							
							<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
								<tbody>
									<tr>
										<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">
											&nbsp;</td>
									</tr>
								</tbody>
							</table>
							<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; width: 600px; margin: 0px; padding: 0px;">
								<tbody>
									<tr>
										<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 12px 10px; margin: 0px;" valign="top">
											<h1 style="font-size: 20px; line-height: 28px; color: rgb(51, 51, 51); margin: 0px;">
												Got a question?</h1>
										</td>
									</tr>
									<tr>
										<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 0px 10px 10px; margin: 0px;" valign="top">
											Please feel free to call the duty manager in charge at ' . $blname . ' at ' . $blphone . '<br>
					
				</td></tr>
			</tbody>
		</table>
						

		</div>
	</body>
</html>';

	$email_title =  "Victoria Court: Voucher Confirmation $tlid";
	

	if ($test_mode == 'YES')
	{
		echo "<br> email_title " . $email_title;
		echo "<br>";
		echo "<br> message " . $message;
	}


	//blemail - branch email
	//tlemail - customer email
	//mktg - marketing email

	//send to branch
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To: ' . $blemail . "\r\n";
	$headers .= 'From: noreply@victoriacourt.biz' . "\r\n";		
	mail($blemail, $email_title, $message, $headers);

	//send to customer
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To: ' . $tlemail . "\r\n";
	$headers .= 'From: noreply@victoriacourt.biz' . "\r\n";			
	mail($tlemail, $email_title, $message, $headers);

        //send to dsi-marketing
	$mktg =	'reservations@victoriacourt.biz';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To: ' . $mktg . "\r\n";
	$headers .= 'From: noreply@victoriacourt.biz' . "\r\n";			
	mail($mktg, $email_title, $message, $headers);

	//send to marketing
	$mktg =	'marketing@victoriacourt.biz';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To: ' . $mktg . "\r\n";
	$headers .= 'From: noreply@victoriacourt.biz' . "\r\n";			
	mail($mktg, $email_title, $message, $headers);

	
		//send to marketing
	$mktg =	'tech@captivategrp.com';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'To: ' . $mktg . "\r\n";
	$headers .= 'From: noreply@victoriacourt.biz' . "\r\n";				
	mail($mktg, $email_title, $message, $headers);
	
	///////////////////////////////////////
//////////// AMH INTEGRATION //////////

		$zhostname = "internal-db.s161964.gridserver.com"; 
		$zusername = "db161964_amhlink"; 
		$zpassword = "s]_qf-3e6GD";
		$zdatabase = "db161964_vc_reserve"; 
		$zdbh1 = mysql_connect($zhostname, $zusername, $zpassword); 
		mysql_select_db($zdatabase, $zdbh1);
		$zinsert_to_vc_dbase = "INSERT INTO db161964_vc_reserve.room_reservation_details (
				Reservation_status, 
				Room_Number, 
				Entry_Date, 
				Reserve_Date, 
				End_Date, 
				
				First_Name, 
				Last_Name, 
				Days, 
				Done, 
				Room_Price, 
				
				Room_Deposit, 
				Currency, 
				Hours, 
				Rtype, 
				MarketSource, 
				
				Time, 
				Reserved_By, 
				Locale_ID, 
				Email_Add, 
				
				Contact_Number, 
				Reserved_Additional_Request, 
				Reserved_Notes, 
				Room_type, 
				Room_Additional_Net_Price, 
				 
				Order_Ref,
				Res_Cat 
				) 
				VALUES 
				( 
				'0', 
				'$rlid', 
				'$trdate', 
				'$trfrom', 
				'$trto', 
				
				'$tlname', 
				'$tlname', 
				'$trdays', 
				'1', 
				'$trrate', 
				
				'1',
				'PHP', 
				'$trstay', 
				'Couples', 
				NULL, 
				
				'$trtime', 
				'1000',
				'$locale_id', 
				'$tlemail', 
				
				'$tlphone', 
				NULL, 
				'None', 
				'STD', 
				NULL, 
				 
				'$txn_id',
				'1' 
				)";
		$insertdb2=mysql_query($zinsert_to_vc_dbase , $zdbh1) or die(mysqli_error()); 
		mysql_close($zdbh1);	
		
		
//////////// AMH INTEGRATION //////////
///////////////////////////////////////
	
	mysql_close($link);		
?>