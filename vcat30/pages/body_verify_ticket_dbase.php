<?php
	$ulverify_ticket = 'N';
	if(isset($_SESSION['ulverify_ticket']))
		if ($_SESSION['ulverify_ticket'] == 'Y')
			$ulverify_ticket = $_SESSION['ulverify_ticket'];		

	$uladmin = 'N';
	if(isset($_SESSION['uladmin']))
		$uladmin = $_SESSION['uladmin'];	

	if ($uladmin == 'Y')
		$ulverify_ticket = 'Y';	
		
		
	$mystatus = '';	
	if(isset($_GET['mystatus']))
	{
		if ($_GET['mystatus'])
		{
			$mystatus = $_GET['mystatus'];
		}
	}
	//echo '<br> mystatus : ' . $mystatus;
	
	
	
	$mybox = '';	
	if(isset($_GET['mybox']))
	{
		if ($_GET['mybox'])
		{
			$mybox = $_GET['mybox'];
		}
	}
	//echo '<br> mybox : ' . $mybox;
	


	$my_invoice_no = '';	
	if(isset($_POST['my_invoice_no']))
	{
		if ($_POST['my_invoice_no'])
		{
			$my_invoice_no = $_POST['my_invoice_no'];
		}
	}
	//echo '<br> my_invoice_no : ' . $my_invoice_no;



	$my_invoice_amt = '';	
	if(isset($_POST['my_invoice_amt']))
	{
		if ($_POST['my_invoice_amt'])
		{
			$my_invoice_amt = $_POST['my_invoice_amt'];
		}
	}
	//echo '<br> my_invoice_amt : ' . $my_invoice_amt;



	if ($mybox != 'add')
	{
		$ulverify_ticket = 'N';
	}	



	if ($ulverify_ticket == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	{

		/*LOG-IN FORM*/
	 	if ($_SESSION['logverify_ticket'] == '') 
		{
			$_SESSION['logverify_ticket'] = $_SESSION["ulname"];
			$modulename = 'verify_ticket';
			$updatedby = $_SESSION["ulname"];
			$logdate = $globaldate;
			$logstamp = $globaldatetime;
			$logtype = 'LOG-IN';
			$query = "INSERT INTO user_log (logdate, logform, logtype, loguser, logstamp) 
					  VALUES ('$logdate', '$modulename', '$logtype', '$updatedby', '$logstamp')";
			mysql_query($query) or die(mysql_error());   	
		}
		/*LOG-IN FORM*/		
	
		$ulbranch = $_SESSION['ulbranch'];
	
		//check if ticket exists
		$my_ticket_message = '';
		//check if valid for printing - new print and reprint
		$verify_print_valid = '';
		//save all of the promo codes 
		$my_ticket_list = '';
		//show all tickets 
		$tlid = '';
		$tlticket = '';		
		

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

		if (($my_invoice_no != '') && ($my_invoice_amt != ''))
		{
			//verify if invoice and branch does not exists
			
			$ulbranch = $_SESSION['ulbranch'];
		
			//generate a new number
			$querydb  = "
				   SELECT  
					 *
				   FROM 
					 ticket_list a
				   WHERE
				     a.tlissue_branch = '$ulbranch' and
					 a.tlissue_invoice = '$my_invoice_no'
				   ORDER BY
					 a.tlticket ";			 
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
			}
				
			//check if ticket exists
			//$tltaken_status =   TAKEN    CANCEL
			if (($tlissue_invoice == $my_invoice_no) && ($tlissue_amount != $my_invoice_amt))						
			{
				//if the amount is not the same, baka nagkamali lang ng
				//pindot ang cashier
					 
				$my_ticket_message = 'Raffle Code already issued for this branch!';
			}
			else
			if (($tlissue_invoice == $my_invoice_no) && ($tlissue_amount == $my_invoice_amt))						
			{
				//if reprint, the amount and the invoice number
				//should be the same
				$my_ticket_message = 'REPRINT';
				$verify_print_valid = 'PRINT';
			}
			else
			{
				//if invoice no and amount is unique and no printing
				//has been done yet
				$my_ticket_message = 'VERIFIED';
				$verify_print_valid = 'PRINT';
			}
		}
	
		
		$computer_user = $_SESSION["ulname"];
		$computer_stamp = $globaldatetime;
		

		$mytag = '';	
		if(isset($_GET['mytag']))
		{
			if ($_GET['mytag'])
			{
				$mytag = $_GET['mytag'];
			}
		}	
		
		$mybox = '';	
		if(isset($_GET['mybox']))
		{
			if ($_GET['mybox'])
			{
				$mybox = $_GET['mybox'];
			}
		}
		if(isset($_POST['mybox']))
		{
			if ($_POST['mybox'])
			{
				$mybox = $_POST['mybox'];
			}
		}		
		//echo '<br> mybox : ' . $mybox;				
		
		$coevent_minimum_valid = 'false';
		$coevent_minimum = $_SESSION["coevent_minimum"];
		if ($coevent_minimum  != '')
		{
			if ($coevent_minimum <> '0') 
			{
				if (is_numeric($coevent_minimum))
				{
					$coevent_minimum_valid = 'true';
				}
			}
		}
		
		$my_invoice_amt_valid = 'false';
		if ($my_invoice_amt  != '')
		{
			if ($my_invoice_amt <> '0') 
			{
				if (is_numeric($my_invoice_amt))
				{
					$my_invoice_amt_valid = 'true';
				}
			}
		}
?>		

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
					Issue Raffle Code - <?php print($ulbranch); ?>
					</h1>
<?php
	//echo '<br> ulbranch : ' . $ulbranch;
	//echo '<br> my_invoice_no : ' . $my_invoice_no;
	//echo '<br> my_invoice_amt : ' . $my_invoice_amt;
?>					
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php
			if ($coevent_minimum_valid == 'true')
			{
				echo "<strong>Minimum of " . number_format($coevent_minimum,2) . ' per Raffle Code</strong>';
			}
			else
			{
				echo "<strong>Minimum value in Company List is not set! Generation of Raffle Code is disabled!</strong>";
			}
	//echo '<br> ulbranch : ' . $ulbranch;
	//echo '<br> my_invoice_no : ' . $my_invoice_no;
	//echo '<br> my_invoice_amt : ' . $my_invoice_amt;
?>	
                        </div>
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<form name="import" method="post" action="index.php?body=verify_ticket_dbase&mybox=add&mytag=POST">
	<div class="form-group">
		<label>Enter Invoice Number</label>
		<input class="form-control" type="text" name="my_invoice_no" autofocus required />
		<br>
		<label>Enter Invoice Amount</label>
		<input class="form-control" type="text" name="my_invoice_amt" required />
		<br>
		<button type="submit" class="btn btn-default">Verify</button>
		<button type="reset" class="btn btn-default">Reset</button>
	</div>
	
<?php		
	//echo "<br> my_invoice_no " . $my_invoice_no;
	//echo "<br> my_invoice_amt " . $my_invoice_amt;
	//echo "<br> my_ticket_message " . $my_ticket_message;
	//echo "<br> verify_print_valid " . $verify_print_valid;
	//echo "<br> tlid " . $tlid;
	
	
	$cowebsite = $_SESSION["cowebsite"];
	$coemail = $_SESSION["coemail"];
	$coevent_name = $_SESSION["coevent_name"];
	$coevent_tag = $_SESSION["coevent_tag"];
	
	/*
	echo "<br> cowebsite " . $cowebsite;
	echo "<br> coemail " . $coemail;
	echo "<br> coevent_name " . $coevent_name;
	echo "<br> coevent_tag " . $coevent_tag;
	*/
	
	if ($my_ticket_message != '')
	{
		echo '<div class="form-group">';

		if (($my_ticket_message == 'VERIFIED') || ($my_ticket_message == 'REPRINT'))
		{						
			
			//$coevent_minimum_valid = false;
			//$coevent_minimum = $_SESSION["coevent_minimum"];
			if ($my_ticket_message == 'VERIFIED') 
			{
				
				if ($coevent_minimum_valid == 'false') 
				{
					//mimimum amoun invalid
					$my_new_raffle_code = '';
					$verify_print_valid = '';
				} 
				if ($my_invoice_amt_valid == 'false')
				{
					//invoice amount invalid
					$my_new_raffle_code = '';
					$verify_print_valid = '';
				}
				if ($my_invoice_amt >= $coevent_minimum)
				{
				
					//version 1	
					function random_string($length) {
						$key = '';
						$keys = array_merge(range(0, 9), range('a', 'z'));
					
						for ($i = 0; $i < $length; $i++) {
							$key .= $keys[array_rand($keys)];
						}
					
						return $key;
					}
					//echo random_string(9);
					//version 1	
					
					
					//version 3	
					function random_string_ver3($numLenth) {
						//$numLenth = 9;
						function make_seed_Token() {
						  list($usec, $sec) = explode(' ', microtime());
						  return (float) $sec + ((float) $usec * 100000);
						}
						srand(make_seed_Token());
						$numSeed = "abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHJKLMNPQRSTWXYZ";
						$getNumber = "";
						for($i = 0; $i < $numLenth; $i ++) {
						 $getNumber .= $numSeed[rand(0, strlen($numSeed))];
						}
						return $getNumber;
					}
					//echo $getNumber;
					//version 3					
					
					
					//version 4
					function random_string_ver4($random_string_length) {					
						//$random_string_length= 9;
						$characters = 'abcdnopqHJKLMNPrstuvwxyz0123456789ABCDEFGQRefghijkmSTWXYZ';
						$string = '';
						$max = strlen($characters) - 1;
						for ($i = 0; $i < $random_string_length; $i++) {
							  $string .= $characters[mt_rand(0, $max)];
						}
						return $string;
					}
					//echo $getNumber;
					//version 4							
									

					$my_promo_codes = floor($my_invoice_amt / $coevent_minimum);
					//echo "<br> my_promo_codes " . $my_promo_codes;
				
					$my_loop = 0;
					$my_ticket_list = '';
					while ($my_loop < $my_promo_codes)
					{
						$my_new_raffle_code = '';
						$unique_already = 'false';
						while ($unique_already == 'false') 
						{
							//version 2
							//$my_new_raffle_code = make_random_custom_string(9, "15");

							if ($my_promo_codes == 1)
							{
								//version 3
								$my_new_raffle_code = random_string_ver3(9);
								//echo '<br> v3 my_new_raffle_code : ' . $my_new_raffle_code . '<br>'; 
							}
							else
							{
								//version 4
								$my_new_raffle_code = random_string_ver4(9);
								//echo '<br> v4 my_new_raffle_code : ' . $my_new_raffle_code . '<br>'; 
							}
							
							
							//20170404 add magic letter
							$my_new_raffle_code = $magic_letter . $my_new_raffle_code;
							
							//echo '<br> my_new_raffle_code : ' . $my_new_raffle_code . '<br>'; 
					
							//generate a new number
							$new_promo_code_tlid = '';
							$query_new_tlid  = "
								   SELECT  
									 *
								   FROM 
									 ticket_list a
								   WHERE
									 a.tlticket = '$my_new_raffle_code' ";			 
							$result_new_tlid = mysql_query($query_new_tlid);
							while ($row_new_tlid =  mysql_fetch_array ($result_new_tlid)) 
							{
								//echo '<br> verify new code : ' . $my_new_raffle_code;
								$new_promo_code_tlid = $row_new_tlid[tlid];
							}						
							if ($new_promo_code_tlid == '')
							{
								//echo '<br> new code found : ' . $my_new_raffle_code;
								$unique_already = 'true';
							}
						}
						
						if ($my_new_raffle_code != '')
						{
							if ($my_ticket_list == '')
							{
								$my_ticket_list = $my_new_raffle_code;
							}
							else
							{
								$my_ticket_list = $my_ticket_list . '<br>' . $my_new_raffle_code;
							}
						
							$tlid = '0';
							$tlticket = $my_new_raffle_code;
							$tldate = $globaldate;
							$tlbatch = $globaldatetime;
							$tlbranch = $_SESSION['ulbranch'];
							
							$tlactive = 'Y';
							$tluser = $_SESSION['ulname'];
							$tlstamp = $globaldatetime;
							
							$tlissue_date = $globaldate;
							$tlissue_batch = $globaldatetime;
							$tlissue_branch = $_SESSION['ulbranch'];
							$tlissue_invoice = $my_invoice_no;
							$tlissue_amount = $my_invoice_amt;
							$tlissue_name = $_SESSION['ulname'];
							$tlissue_stamp = $globaldatetime;
				
							//update the table that the ticket has been accepted
							$query_verify = 
							"INSERT INTO ticket_list (
								tlid,
								tlticket,
								tldate,
								tlbatch,
								tlbranch,
								
								tlactive,
								tluser,
								tlstamp,
								
								tlissue_date,
								tlissue_batch,
								tlissue_branch,
								tlissue_invoice,
								tlissue_amount,
								tlissue_name,
								tlissue_stamp )
								
							VALUES (
								'$tlid',
								'$tlticket',
								'$tldate',
								'$tlbatch',
								'$tlbranch',
								
								'$tlactive',
								'$tluser',
								'$tlstamp',
								
								'$tlissue_date',
								'$tlissue_batch',
								'$tlissue_branch',
								'$tlissue_invoice',
								'$tlissue_amount',
								'$tlissue_name',
								'$tlissue_stamp')
							  ";						
							mysql_query($query_verify) or die(mysql_error());   											
						}
						
						$my_loop = $my_loop + 1;
					}

					echo '<font size="+2"> NEW Raffle Codes has been issued!</font>';
					echo "<br> Invoice No. : " . $my_invoice_no;
					echo "<br> Invoice Amount : " . $my_invoice_amt;
					echo "<br> This was issued from Victoria Court " . $ulbranch . ".";
					
					//echo "<br> my_ticket_list : " . $my_ticket_list;
				}
				else
				{
					//amount not enough
					$my_new_raffle_code = '';
					$verify_print_valid = '';
				
					echo '<font size="+2"> Invoice Amount not enought!</font>';
					echo "<br> Invoice No. : " . $my_invoice_no;
					echo "<br> Invoice Amount : " . $my_invoice_amt;
				}
			}
			else
			if ($my_ticket_message == 'REPRINT')
			{
				$my_ticket_list = '';
				$my_new_raffle_code = '';
				
				//generate a new number
				$query_print  = "
					   SELECT  
						 *
					   FROM 
						 ticket_list a
					   WHERE
						 a.tlissue_branch = '$ulbranch' and
						 a.tlissue_invoice = '$my_invoice_no'
					   ORDER BY
						 a.tlticket ";			 
				$result_print = mysql_query($query_print);
				while ($row_print =  mysql_fetch_array ($result_print)) 
				{
					$my_new_raffle_code = $row_print[tlticket];
			
					if ($my_ticket_list == '')
					{
						$my_ticket_list = $my_new_raffle_code;
					}
					else
					{
						$my_ticket_list = $my_ticket_list . '<br>' . $my_new_raffle_code;
					}					
				}				
			
				echo '<font size="+2"> Invoice No. and Amount found! <br> System will re-print of Raffle Codes!</font>';
				echo "<br> Invoice No. : " . $my_invoice_no;
				echo "<br> Invoice Amount : " . $my_invoice_amt;
				//echo "<br> my_ticket_list : " . $my_ticket_list;
			}			
			
			if ($verify_print_valid == 'PRINT')
			{
				// ----------------- PRINTER CODE ----------------- //
				//put the code to print the tag using the POS printer
	
				//there are 2 sets of this code. reprinting the receipt
				//and if printing for the first time

				$ulprinter = $_SESSION['ulprinter'];
				//$ulprinter = "U220";
				//$ulprinter = "\\\\GLENN\\hp deskjet 990c";
	
				echo "<br> POS Printer : " . $ulprinter;
				//echo "<br> verify_print_valid : " . $verify_print_valid;

				if ($ulprinter == '')
				{
					$my_ticket_message = "* No printer name in user profile!*";
				}
				else
				if (!file_exists('testing_dont_print.txt'))
				{
					error_reporting(E_ALL);
					
					$handle_success = printer_open($ulprinter);
					
					
					if($handle_success)
						$my_ticket_message = "*** Success! Printer is connected *";
					else
						$my_ticket_message = "*** POS printer not connected *";     
					
					////// PRINTING UPPER PART ///////////
					
					$coprint1 = $_SESSION['coprint1'];
					$coprint2 = $_SESSION['coprint2'];
					if (($coprint1 != '') || ($coprint2 != ''))
					{					
						printer_set_option($handle_success, PRINTER_MODE, "RAW");
						printer_set_option($handle_success, PRINTER_TEXT_ALIGN, PRINTER_TA_RIGHT);
						if ($coprint1 != '')
						{
							printer_write($handle_success, "\n");
							printer_write($handle_success, $coprint1 . "\n");
						}
						if ($coprint2 != '')
						{
							printer_write($handle_success, "\n");
							printer_write($handle_success, $coprint2 . "\n");
						}
						
						
						//20170410 
						printer_write($handle_success, "\n");
						printer_write($handle_success, "This was issued from Victoria Court " . $ulbranch . "."  . "\n");
						
						
						/*
						printer_write($handle_success, "\n");
						printer_write($handle_success, 'You qualify for 2 (two) raffle entries ' . "\n");
						printer_write($handle_success, 'for the 30th Victoria Court'  . "\n");
						printer_write($handle_success, 'Anniversary Raffle' . "\n");
						printer_write($handle_success, "\n");
						printer_write($handle_success, 'Register today at ' . "\n");
						printer_write($handle_success, 'www.victoriacourt.biz/VCat30/' . "\n");
						printer_write($handle_success, 'using the code below and have the ' . "\n");
						printer_write($handle_success, 'chance to win an Apple iPhone 7.' . "\n");
						printer_write($handle_success, "\n");
						printer_write($handle_success, "\n");
						*/
						printer_close($handle_success);
					}
					
					
					
					

					////// PRINTING MIDDLE PART ///////////

					////////////////////// smallfont ////////////////////////
					$handle_success = printer_open($ulprinter);
					printer_set_option($handle_success, PRINTER_MODE, "RAW");
					printer_set_option($handle_success, PRINTER_TEXT_ALIGN, PRINTER_TA_RIGHT);
					

					///////// 20170207 ///////// 
					//generate sql for the tickets
					//echo "<br> Invoice No. : " . $my_invoice_no;
					//echo "<br> Invoice Amount : " . $my_invoice_amt;
					//echo "<br> my_ticket_list : " . $my_ticket_list;
					$query_ticket = " SELECT 
					  			 *
							   FROM 
							     ticket_list 
							   WHERE 
							     tlissue_invoice = '$my_invoice_no' and
							     tlissue_amount = '$my_invoice_amt' 
							   ORDER BY 
							     tlid ";
					$result_ticket = mysql_query($query_ticket);
					echo mysql_error();				
					while ($row_ticket =  mysql_fetch_array ($result_ticket)) 
					{
						$tlid = mysql_real_escape_string($row_ticket['tlid']);
						$tlticket = mysql_real_escape_string($row_ticket['tlticket']);					
					
						printer_write($handle_success, $tlticket . "\n");
					}
					//generate sql for the tickets
					///////// 20170207 ///////// 					
					
					//printer_write($handle_success, "\n");
					//printer_write($handle_success, "\n");
					
					printer_close($handle_success);					
					////////////////////// small font ////////////////////////

					
					/*	
					////////////////////// big font ////////////////////////
					$handle_success = printer_open($ulprinter); // The name of our printer on Windows
					printer_start_doc($handle_success, "Victoria Court - Raffle System");
					printer_start_page($handle_success);
					

							
					///////// 20170207 ///////// 
					//generate sql for the tickets
					//echo "<br> Invoice No. : " . $my_invoice_no;
					//echo "<br> Invoice Amount : " . $my_invoice_amt;
					//echo "<br> my_ticket_list : " . $my_ticket_list;
					$query_ticket = " SELECT 
					  			 *
							   FROM 
							     ticket_list 
							   WHERE 
							     tlissue_invoice = '$my_invoice_no' and
							     tlissue_amount = '$my_invoice_amt' 
							   ORDER BY 
							     tlid ";
					$result_ticket = mysql_query($query_ticket);
					echo mysql_error();				
					while ($row_ticket =  mysql_fetch_array ($result_ticket)) 
					{
						$tlid = mysql_real_escape_string($row_ticket['tlid']);
						$tlticket = mysql_real_escape_string($row_ticket['tlticket']);					
					
						$font = printer_create_font("Arial", 55, 25, 50, false, false, false, 0);
						printer_select_font($handle_success, $font);
						//printer_draw_text($handle_success, "ABCDEFG", 10, 10);
						//printer_draw_text($handle_success, $my_ticket_list, 10, 10);
						printer_draw_text($handle_success, $tlticket, 10, 10);
						printer_write($handle_success, "\n");
					}
					//generate sql for the tickets
					///////// 20170207 ///////// 

					printer_delete_font($font);
					
					printer_end_page($handle_success);
					printer_end_doc($handle_success);
					printer_close($handle_success);
					////////////////////// big font ////////////////////////
					*/
					
					
					
					
					////// PRINTING LOWER PART ///////////
					
					$handle_success = printer_open($ulprinter);
					printer_set_option($handle_success, PRINTER_MODE, "RAW");
					printer_set_option($handle_success, PRINTER_TEXT_ALIGN, PRINTER_TA_RIGHT);
					
					printer_write($handle_success, "\n");
					printer_write($handle_success, "\n");
					
					printer_close($handle_success);
				}
				
				// ----------------- PRINTER CODE ----------------- //
				//put the code to print the tag using the POS printer
			}
		}
		else
		{
			echo '<font size="+2"> ' . $my_ticket_message . '</font>';
			echo "<br> Invoice No. : " . $my_invoice_no;
			echo "<br> Invoice Amount : " . $my_invoice_amt;
		}
		
		echo '</div>';
	}
?>		
</form>		
								</div>
							</div>
						</div>
					</div>
					
<?php
	//echo "<br> mytag " . $mytag;
	//echo "<br> tlid " . $tlid;
	/*
	if (($mytag == 'POST') && ($tlid != ''))
	{
?>

					<div class="panel panel-default">
                        <div class="panel-heading">
Raffle Code Information
                        </div>
						
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Field</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Raffle Code</td>
                                            <td><strong><?php print($tlticket);?></strong></td>
                                        </tr>	
                                        <tr>
                                            <td>2</td>
                                            <td>Invoice No.</td>
                                            <td><strong><?php print($tlissue_invoice);?></strong></td>
                                        </tr>	
                                        <tr>
                                            <td>3</td>
                                            <td>Invoice Amount</td>
                                            <td><strong><?php print($tlissue_amount);?></strong></td>
                                        </tr>	
                                        <tr>
                                            <td>4</td>
                                            <td>Created By</td>
                                            <td><strong><?php print($tlissue_name);?></strong></td>
                                        </tr>																					
										<tr>
                                            <td>5</td>
                                            <td>Created On</td>
                                            <td><strong><?php echo date('m/d/Y h:i:s A', strtotime($tlissue_stamp)); ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

<?php
	}
	*/
?>
					
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
										
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php
	}
?>			