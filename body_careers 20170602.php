<?php

	$career_fullname = '';	
	if(isset($_POST['career_fullname']))
	{
		if ($_POST['career_fullname'])
		{
			$career_fullname = $_POST['career_fullname'];
			$career_fullname = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($career_fullname))))));
		}
	}

	$career_email = '';	
	if(isset($_POST['career_email']))
	{
		if ($_POST['career_email'])
		{
			$career_email = $_POST['career_email'];
			$career_email = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9@ ]/', ' ', urldecode(html_entity_decode(strip_tags($career_email))))));
		}
	}
	
	$career_contact = '';	
	if(isset($_POST['career_contact']))
	{
		if ($_POST['career_contact'])
		{
			$career_contact = $_POST['career_contact'];
			$career_contact = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($career_contact))))));
		}
	}	
	
	$career_file_name = '';	
	if(isset($_POST['career_file_name']))
	{
		if ($_POST['career_file_name'])
		{
			$career_file_name = $_POST['career_file_name'];
			$career_file_name = trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($career_file_name))))));
		}
	}	

	$career_id = '';	
	if(isset($_POST['career_id']))
	{
		if ($_POST['career_id'])
		{
			$career_id = $_POST['career_id'];
		}
	}		

	$career_name = '';	
	if(isset($_POST['career_name']))
	{
		if ($_POST['career_name'])
		{
			$career_name = $_POST['career_name'];
		}
	}
	
	$career_submit = '';	
	if(isset($_POST['career_submit']))
	{
		if ($_POST['career_submit'])
		{
			$career_submit = $_POST['career_submit'];
		}
	}		

	$if_valid = 'N';		
	if ($career_submit == 'SUBMIT')
	{
		if ($career_fullname == '')
		{
			echo "<script type='text/javascript'>alert('Please enter name to continue!')</script>";
		}
		else
		if ($career_contact == '')
		{
			echo "<script type='text/javascript'>alert('Please enter your contact number to continue!')</script>";
		}
		else
		if ($career_email == '')
		{
			echo "<script type='text/javascript'>alert('Please enter your email to continue!')</script>";
		}
		else
		if (strpos($career_email, '@') == false) 
		{
			echo "<script type='text/javascript'>alert('Email invalid format!')</script>";
		}
		else		
		{
			$if_valid = 'Y';		
		}	
		
			
		//if they DID upload a file...
		if($_FILES['career_file']['name'])
		{
			$cakey = 0;
			$query_apply = " SELECT max(caid) caid
					   FROM career_applicants ";
			$result_apply = mysql_query($query_apply);
			echo mysql_error();				
			while ($row_apply =  mysql_fetch_array ($result_apply)) 
			{
				$cakey = $row_apply['caid'];
			}				
			if ($cakey == 0) 
				$cakey = 1;				
			$cakey = $cakey * 77 + 23;				

			$career_file_name = $cakey . $_FILES['career_file']['name'];	
			
			//if no errors...
			if(!$_FILES['career_file']['error'])
			{
				//now is the time to modify the future file name and validate the file
				$valid_file = true;
				$new_file_name = strtolower($_FILES['career_file']['tmp_name']); //rename file
				if($_FILES['career_file']['size'] > (2048000)) //can't be larger than 1 MB
				{
					$if_valid = 'N';
					echo "<script type='text/javascript'>alert('Oops!  Your file\'s size is larger than 2MB.')</script>";
				}
		
				//if the file has passed the test
				if($if_valid == 'Y')
				{
					//get the next applicant number 
				
				
					//move it to where we want it to be
					$currentdir = getcwd();
					$target = $currentdir .'/admin/pages/applicants/' . $cakey . basename($_FILES['career_file']['name']);
					move_uploaded_file($_FILES['career_file']['tmp_name'], $target);
				}
			}
			else
			{
				//if there is an error..
				//set that to be the returned message
				$if_valid = 'N';
				echo "<script type='text/javascript'>alert('Ooops!  Your upload triggered the following error: " . $_FILES['career_file']['error'] . "')</script>";
			}
		}
	}

?>

    <nav class="navbar custom-navbar fixed-top">
        <div class="container">
        	<?php include "navigation.php" ?>
        </div>
    </nav>
    <main class="careers-page">
        <div class="fixed-bg-pattern"></div>
        <div class="wrapper">
            <section class="careers-content">
                <div class="container">
                    <div class="row">
                        <div class="career-list">
                            <div class="col-xs-12">
                                <div class="accordion" id="mainAcc">
<?php
	/*
	//you get the following information for each file:
	echo "<br> career_fullname : " . $career_fullname;
	echo "<br> career_email : " . $career_email;
	echo "<br> career_contact : " . $career_contact;
	echo "<br> career_id : " . $career_id;
	echo "<br> career_name : " . $career_name;
	echo "<br> career_file_name : " . $career_file_name;
	*/
	
	if ($if_valid == 'Y')
	{
		//redirect to ROOM BOOKING
		//echo "<br> VALID ENTRY !!!!!";
		
		$clid = $career_id;
		
		$caid = 0;
		$cadate = $globaldate;
		$caname = $career_fullname;
		$caemail = $career_email;
		$cacontact = $career_contact;
		$cafile = $career_file_name;
		
		$caactive = 'Y';
		$causer = 'ON-LINE USER';
		$castamp = $globaldatetime;	
		$castatus = 'NEW';	
		
		$query_add_career = 
			"INSERT INTO career_applicants (
				caid,
				cadate,
				caname,
				caemail,
				cacontact,
				cafile,
				castatus,
				
				clid,
				
				caactive,
				causer,
				castamp
			) 
			VALUES 
			(
				'$caid',
				'$cadate',
				'$caname',
				'$caemail',
				'$cacontact',
				'$cafile',
				'$castatus',
				
				'$clid',
				
				'$caactive',
				'$causer',
				'$castamp'
			) ";
		//mysql_query($query_add_career) or die(mysql_error());	
		mysql_query($query_add_career) or die('The entry has links to other tables. Cannot continue to process...');  
	}

	$careerlist_count = 1;
	$query_careerlist = " 
		SELECT 
			count(c.clid) clcount, 
			b.blid , b.blcode, b.blname
		FROM 
			branch_list b, career_list c
		WHERE 
		    b.blid = c.blid and 
		 	b.blactive = 'Y' and
			b.blcode <> '' and
			c.clvacancy > 0 and 
		    c.clname <> '' and
			c.clactive = 'Y' 
		GROUP BY
		    b.blid , b.blcode, b.blname
		ORDER BY 
			b.blcode ";
	$result_careerlist = mysql_query($query_careerlist);
	echo mysql_error();				
	while ($row_careerlist =  mysql_fetch_array ($result_careerlist)) 
	{
		$career_blid = $row_careerlist['blid'];
		$career_blcode = $row_careerlist['blcode'];
		$career_blname = $row_careerlist['blname'];
?> 							
	
		<div class="panel acc_main_holder">
			<div class="acc_list_head">
				<h3 class="" data-parent="#mainAcc" data-toggle="collapse" data-target="#<?php print($row_careerlist['blcode']); ?>">
				<span class="cr_loc"><?php print($career_blcode); ?></span>
				</h3>
			</div>
			<div class="acc_list_body collapse accordion" id="<?php print($row_careerlist['blcode']); ?>">
						
		
			<?php                                            
			$branchlist_count = 1;
			$query_branchlist = " 
				SELECT 
					*
				FROM 
					career_list c
				WHERE 
					c.blid = '$career_blid' and 
					c.clvacancy > 0 and 
					c.clname <> '' and
					c.clactive = 'Y' 
				ORDER BY 
					c.clname ";
			$result_branchlist = mysql_query($query_branchlist);
			echo mysql_error();				
			while ($row_branchlist =  mysql_fetch_array ($result_branchlist)) 
			{
				$branch_blid = $row_branchlist['clid'];
				$branch_blname = $row_branchlist['clname'];
				?> 													
				
	
				<div class="panel sub_acc_holder">
					<div class="sub_acc_list_head">
						<h4 class="" data-parent="#<?php print($row_careerlist['blcode']); ?>" data-toggle="collapse" data-target="#career<?php print($branch_blid); ?>">
						<span class="cr_position"><?php print($row_branchlist['clname']); ?></span>
						<span class="cr_vacancy">Vacancy: <?php print($row_branchlist['clvacancy']); ?></span>
						<span class="cr_posted">Posted On: <?php print($row_branchlist['clstamp']); ?></span>
						</h4>
					</div>
					<div class="sub_acc_list_body collapse" id="career<?php print($branch_blid); ?>">
						<div class="col-xs-12 col-sm-6 col-md-8">
							<div class="cr_desc">
								<ul>
									<li><?php print($row_branchlist['cldesc']); ?></li>
								</ul>							
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="form_applicant">
								<form role="form" method="post" action="index.php?body=careers" enctype="multipart/form-data">
									<div class="form-group">
										<input type="text" class="form-control custom-style" placeholder="Full name" name="career_fullname" />
									</div>
									<div class="form-group">
										<input type="text" class="form-control custom-style" placeholder="Email" name="career_email" />
									</div>
									<div class="form-group">
										<input type="text" class="form-control custom-style" placeholder="Contact no." name="career_contact" />
									</div>
									<div class="form-group">
										<div class="custom-upload-holder">
											<input type="file" class="form-control cvFile" name="career_file" />
											<input type="text" placeholder="C.V." class="form-control upload-text custom-style" name="career_file_name" />
											<button class="btn bttn-upload">Upload (File < 2MB)</button>
										</div>
									</div>
									<div class="form-group">
										<input type="hidden" name="career_id" value="<?php print($row_branchlist['clid']); ?>" />
										<input type="hidden" name="career_name" value="<?php print($row_branchlist['clname']); ?>" />
										<input type="submit" class="form-control submit-app-bttn" name="career_submit" value="SUBMIT" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>			
				
			<?php
				$branchlist_count = $branchlist_count + 1;
			}
			?>													
				
			</div>
		</div>
<?php
		$careerlist_count = $careerlist_count + 1;
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
<?php
	if ($if_valid == 'Y')
	{
		echo "<script type='text/javascript'>alert('Your application has successfully been posted!')</script>";
	}
?>