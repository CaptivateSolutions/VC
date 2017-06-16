<?php
	include "./pages/config8292838292029.php"; 
	$link = mysql_connect("$dbhost", "$dbuser", "$dbpassword")or die("cannot connect to server ");
	@mysql_select_db("$dbdatabase")or die("Unable to select database.");

	//echo '<br> globaldate : ' . $globaldate;
	//echo '<br> globaldatetime : ' . $globaldatetime;

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

	$tlid = '';
	$tlissue_date = '';
	$tlreg_date = '';

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
			$tlissue_date = $rowdb[tlissue_date];
			$tlreg_date = $rowdb[tlreg_date];
		}
		
	}
	
	//echo '<br> vc_promo_code : ' . $vc_promo_code;
	//echo '<br> tlid : ' . $tlid;
	//echo '<br> tlissue_date : ' . $tlissue_date;
	//echo '<br> tlreg_date : ' . $tlreg_date;
	
	mysql_close($link);		
	
	if (($tlreg_date != '') && ($tlid != ''))
	{	
?>

<!DOCTYPE html>

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
                                <h3 class="form-title text-center">Raffle Code Registration</h3>

<form class="form-header" action="index.php" role="form" method="POST" id="#">
	<div class="form-group">
		Raffle Code : <font size="+3"><?php print($vc_promo_code); ?></font>
	</div>
	<div class="form-group last">
		<input type="submit" class="btn btn-warning btn-block btn-lg" name="submit" value="Go to Home Page">
	</div>
	<p class="privacy text-center">Thank You for your time!</p>
</form>
								
<?php
	if ($my_ticket_message != '') 
	{
		echo '<br>';
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
		exit;
	}
?>
