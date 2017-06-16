<?php
	include "./pages/config8292838292029.php"; 
	$link = mysql_connect("$dbhost", "$dbuser", "$dbpassword")or die("cannot connect to server ");
	@mysql_select_db("$dbdatabase")or die("Unable to select database.");

	$vc_promo_code = ''; 		
	if(isset($_GET['vc_promo_code']))
	{
		if ($_GET['vc_promo_code'])
		{
			$vc_promo_code = $_GET['vc_promo_code'];
		}
	}
	//echo '<br> vc_promo_code : ' . $vc_promo_code;
	$vc_promo_code = mysql_real_escape_string($vc_promo_code);

	//echo '<br> globaldate : ' . $globaldate;
	//echo '<br> globaldatetime : ' . $globaldatetime;

	$coname = '';
	$coaddr = '';
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
	
	$tlid = '';
	$tlticket = '';
	$tldate = '';
	$tlbatch = '';
	$tlbranch = '';
	
	$tlactive = '';
	$tluser = '';
	$tlstamp = '';
	
	$tlissue_date = '';
	$tlissue_batch = '';
	$tlissue_branch = '';
	$tlissue_invoice = '';
	$tlissue_amount = '';
	$tlissue_name = '';
	$tlissue_stamp = '';
	
	$tlreg_date = '';
	$tlreg_batch = '';
	$tlreg_name = '';
	$tlreg_addr = '';
	$tlreg_mobile = '';
	$tlreg_email = '';
	$tlreg_stamp = '';

	if ($vc_promo_code != '')
	{
		$querydb  = "
			   SELECT  
				 *
			   FROM 
				 ticket_list a
			   WHERE
				 a.tlticket = '$vc_promo_code' ";			 
		$resultdb = mysql_query($querydb);
		while ($rowdb =  mysql_fetch_array ($resultdb)) 
		{
			$tlid = $rowdb[tlid];
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
		}
		
	}
	
	$my_ticket_message = '';

	if ($tlreg_date != '')
	{
		$my_ticket_message = 'Promo code already registered!';
	}
	else
	if ($submit != '')
	{
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
		else
		{
			$my_ticket_message = "Promo Code registration accepted!";
						
			$tlreg_date = $globaldate;
			$tlreg_batch = $globaldatetime;
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

			?>	
			<HTML> 		
			<meta http-equiv="refresh" content="0;URL=accepted.php?vc_promo_code=<?php print($vc_promo_code); ?>">  
			</HTML>
			<?php
			exit;
		}
	}
	
	mysql_close($link);	
	
	if (($tlreg_date == '') && ($tlid != ''))
	{	
?>

<!DOCTYPE html>
<!-- saved from url=(0061)https://bootstrapthemes.co/demo/html/backyard/demo/index.html -->

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
                                <h3 class="form-title text-center">Your promo code has been accepted!</h3>

Promo Code : <font size="+3"><?php print($vc_promo_code); ?></font>

                                <h3 class="form-title text-center">Please register to complete the process!</h3>
								
<form class="form-header" action="register.php?vc_promo_code=<?php print($vc_promo_code); ?>" role="form" method="POST" id="#">
	<div class="form-group">
		<input class="form-control input-lg" name="vc_reg_name" id="vc_reg_name" type="text" value="<?php print($vc_reg_name); ?>" placeholder="Enter Your Name" size="50" required="Please enter your name!" autofocus>
	</div>
	<div class="form-group">
		<input class="form-control input-lg" name="vc_reg_addr" id="vc_reg_addr" type="text" value="<?php print($vc_reg_addr); ?>" placeholder="Enter Your Address" size="100" required="Please enter your address!" autofocus>
	</div>
	<div class="form-group">
		<input class="form-control input-lg" name="vc_reg_mobile" id="vc_reg_mobile" type="text" value="<?php print($vc_reg_mobile); ?>" placeholder="Enter Your Mobile" size="50" required="Please enter your mobile number!" autofocus>
	</div>
	<div class="form-group">
		<input class="form-control input-lg" name="vc_reg_email" id="vc_reg_email" type="email" value="<?php print($vc_reg_email); ?>" placeholder="Enter Your Email" size="100" required="Please enter your email!" autofocus>
	</div>
	
	<div class="form-group last">
		<input type="submit" class="btn btn-warning btn-block btn-lg" name="submit" value="Save Registration">
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
    
		<script type="text/javascript">( function(){ window.SIG_EXT = {}; } )()</script>
	</body>
</html>

<?php
	}	
	else
	{
?>
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php">  
		</HTML>
<?php	
	}
?>
