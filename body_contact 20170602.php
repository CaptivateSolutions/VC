<?php

	$contact_fullname = '';	
	if(isset($_POST['contact_fullname']))
	{
		if ($_POST['contact_fullname'])
		{
			$contact_fullname = $_POST['contact_fullname'];
			$contact_fullname = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($contact_fullname))))));
		}
	}

	$contact_email = '';	
	if(isset($_POST['contact_email']))
	{
		if ($_POST['contact_email'])
		{
			$contact_email = $_POST['contact_email'];
			$contact_email = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9@ ]/', ' ', urldecode(html_entity_decode(strip_tags($contact_email))))));
		}
	}
	
	$contact_contact = '';	
	if(isset($_POST['contact_contact']))
	{
		if ($_POST['contact_contact'])
		{
			$contact_contact = $_POST['contact_contact'];
			$contact_contact = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($contact_contact))))));
		}
	}	
	
	$contact_inquiry = '';	
	if(isset($_POST['contact_inquiry']))
	{
		if ($_POST['contact_inquiry'])
		{
			$contact_inquiry = $_POST['contact_inquiry'];
			$contact_inquiry = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($contact_inquiry))))));
		}
	}	

	$contact_id = '';	
	if(isset($_POST['contact_id']))
	{
		if ($_POST['contact_id'])
		{
			$contact_id = $_POST['contact_id'];
		}
	}		

	$contact_code = '';	
	if(isset($_POST['contact_code']))
	{
		if ($_POST['contact_code'])
		{
			$contact_code = $_POST['contact_code'];
		}
	}
	
	$contact_mail = '';	
	if(isset($_POST['contact_mail']))
	{
		if ($_POST['contact_mail'])
		{
			$contact_mail = $_POST['contact_mail'];
		}
	}	
	
	$contact_submit = '';	
	if(isset($_POST['contact_submit']))
	{
		if ($_POST['contact_submit'])
		{
			$contact_submit = $_POST['contact_submit'];
		}
	}		

	$if_valid = 'N';		
	if ($contact_submit == 'SUBMIT')
	{
		if ($contact_fullname == '')
		{
			echo "<script type='text/javascript'>alert('Please enter name to continue!')</script>";
		}
		else
		if ($contact_contact == '')
		{
			echo "<script type='text/javascript'>alert('Please enter your contact number to continue!')</script>";
		}
		else
		if ($contact_email == '')
		{
			echo "<script type='text/javascript'>alert('Please enter your email to continue!')</script>";
		}
		else
		if (strpos($contact_email, '@') == false) 
		{
			echo "<script type='text/javascript'>alert('Email invalid format!')</script>";
		}
		else		
		if ($contact_inquiry == '')
		{
			echo "<script type='text/javascript'>alert('Please enter message!')</script>";
		}
		else			
		{
			$if_valid = 'Y';		
		}	
	}
?>

    <nav class="navbar custom-navbar fixed-top">
        <div class="container">
        	<?php include "navigation.php" ?>
        </div>
    </nav>
    <main class="contact-us-page">
        <div class="fixed-bg-pattern"></div>
        <div class="wrapper">
            <section class="contact-us-content">
                <div class="container">
                    <div class="row">
                        <div class="contact-list">
                            <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                                <div class="accordion" id="mainAcc">
								
<?php
	/*
	//you get the following information for each file:
	echo "<br> contact_fullname : " . $contact_fullname;
	echo "<br> contact_email : " . $contact_email;
	echo "<br> contact_contact : " . $contact_contact;
	echo "<br> contact_id : " . $contact_id;
	echo "<br> contact_code : " . $contact_name;
	echo "<br> contact_inquiry : " . $contact_inquiry;
	*/
	
	if ($if_valid == 'Y')
	{
		//redirect to ROOM BOOKING
		//echo "<br> VALID ENTRY !!!!!";
		
		$blid = $contact_id;
		$blemail = $contact_mail;
		
		$cuid = 0;
		$cudate = $globaldate;
		$cuname = $contact_fullname;
		$cuemail = $contact_email;
		$cucontact = $contact_contact;
		$cuinquiry = $contact_inquiry;
		
		$cuactive = 'Y';
		$cuuser = 'ON-LINE USER';
		$custamp = $globaldatetime;	
		$custatus = 'NEW';	
		
		$query_add_contact = 
			"INSERT INTO contact_us (
				cuid,
				cudate,
				cuname,
				cuemail,
				cucontact,
				cuinquiry,
				custatus,
				
				blid,
				
				cuactive,
				cuuser,
				custamp
			) 
			VALUES 
			(
				'$cuid',
				'$cudate',
				'$cuname',
				'$cuemail',
				'$cucontact',
				'$cuinquiry',
				'$custatus',
				
				'$blid',
				
				'$cuactive',
				'$cuuser',
				'$custamp'
			) ";
		//mysql_query($query_add_contact) or die(mysql_error());	
		mysql_query($query_add_contact) or die('The entry has links to other tables. Cannot continue to process...');  
		
		//send email to the branch
		if ($user != "root")
		{
			if ($blemail != '')
			{
				$recipient = $blemail;
				$subject = "Victoria Court : Inquiry Page [" . $cuname . "]";
				$message = "Name : " . $cuname . " \n\n" . "Contact No. : " . $cucontact . " \n\n" . "Email : " . $cuemail . " \n\n" . "Message : " . $cuinquiry;

				$mailheader = "From: $cuemail\n";
				$mailheader .= "Reply-To: $cuemail\n\n";
				mail($recipient, $subject, $message, $mailheader) or die ("Failure");
			
				echo "<script type='text/javascript'>alert('Thank you we have received your inquiry!')</script>";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Thank you we have received your inquiry! <br> But there is no default company email!')</script>";
			}
		}
		else
		{	
			echo "<script type='text/javascript'>alert('Thank you we have received your inquiry! <br> Although email was not sent due to ROOT account!')</script>";
		}		
	}

	$contactlist_count = 1;
	$query_contactlist = " 
		SELECT 
			*
		FROM 
			branch_list b
		WHERE 
		 	b.blactive = 'Y' and
			b.blcode <> ''  
		ORDER BY 
			b.blcode ";
	$result_contactlist = mysql_query($query_contactlist);
	echo mysql_error();				
	while ($row_contactlist =  mysql_fetch_array ($result_contactlist)) 
	{
		$contact_blid = $row_contactlist['blid'];
		$contact_blcode = $row_contactlist['blcode'];
		$contact_blname = $row_contactlist['blname'];

		//echo " <br> contact_blcode " . $contact_blcode;
		$contact_blcode_hash = str_replace(' ', '_', $contact_blcode);
		?> 				

		<div class="panel acc_main_holder">
			<div class="acc_list_head">
				<h3 class="" data-parent="#mainAcc" data-toggle="collapse" data-target="#<?php print($contact_blcode_hash); ?>">
				<span class="cr_loc"><?php print($contact_blcode); ?></span>
				</h3>
			</div>
			<div class="acc_list_body collapse accordion" id="<?php print($contact_blcode_hash); ?>">
				<div class="sub_acc_list_body contact_list_body">
					<div class="col-xs-12">
						<h4 class="con_det_txt">Contact Details</h4>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-8">
						<div class="contact_details">
							<p class="address"><?php print($row_contactlist['bladdr']); ?></p>
							<p class="p-no-margin mobile">M: <?php print($row_contactlist['blmobile']); ?></p>
							<p class="p-no-margin tel">T: <?php print($row_contactlist['blphone']); ?></p>
							<p class="p-no-margin fax">Fax: <?php print($row_contactlist['blfax']); ?></p>
						</div>
						<div class="google_map_holder">
							<iframe style="height:100%;width:100%;border:0;" frameborder="0" src="<?php print($row_contactlist['blmap']); ?>"></iframe>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="contact_form">
							<form role="form" method="post" action="index.php?body=contact" enctype="multipart/form-data">
								<div class="form-group">
									<input type="text" class="form-control custom-style" placeholder="Full name"  name="contact_fullname"  />
								</div>
								<div class="form-group">
									<input type="text" class="form-control custom-style" placeholder="Email" name="contact_email" />
								</div>
								<div class="form-group">
									<input type="text" class="form-control custom-style" placeholder="Contact no." name="contact_contact"  />
								</div>
								<div class="form-group">
									<textarea placeholder="Inquiry" class="form-control custom-style" name="contact_inquiry"></textarea>
								</div>
								<div class="form-group">
									<input type="hidden" name="contact_id" value="<?php print($row_contactlist['blid']); ?>" />
									<input type="hidden" name="contact_code" value="<?php print($row_contactlist['blcode']); ?>" />
									<input type="hidden" name="contact_mail" value="<?php print($row_contactlist['blemail']); ?>" />
									<input type="submit" class="form-control submit-app-bttn" name="contact_submit" value="SUBMIT" />								
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		$contactlist_count = $contactlist_count + 1;
	}
?>										

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