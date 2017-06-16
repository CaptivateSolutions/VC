<?php
	$myadmin = 'N';
	if(isset($_SESSION['myadmin']))
		$myadmin = $_SESSION['myadmin'];	

	if ($myadmin == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	{
		/*LOG-IN FORM*/
	 	if ($_SESSION['ultransaction_list'] == '') 
		{
			$_SESSION['ultransaction_list'] = $_SESSION["ulname"];
			$modulename = 'transaction_list';
			$updatedby = $_SESSION["ulname"];
			$logdate = $globaldate;
			$logstamp = $globaldatetime;
			$logtype = 'LOG-IN';
			$query = "INSERT INTO user_log (logdate, logform, logtype, loguser, logstamp) 
					  VALUES ('$logdate', '$modulename', '$logtype', '$updatedby', '$logstamp')";
			mysql_query($query) or die(mysql_error());   	
		}
		/*LOG-IN FORM*/	
		
		$mytag = '';	
		if(isset($_GET['mytag']))
		{
			if ($_GET['mytag'])
			{
				$mytag = $_GET['mytag'];
			}
		}	
		
		$search_text = '';
		$search_text = $_POST["search_text"];	
		
		if(isset($_GET['search_text']))
		{
			if ($_GET['search_text'])
			{
				$search_text = $_GET['search_text'];
			}
		}	
			
		$querydb  = "SELECT 
					 * 
				   FROM 
					 transaction_list a
				   WHERE
					 a.tlname LIKE '%$search_text%' 
				   ORDER BY 
					 a.tldate, a.tlid, a.tlname";
		$resultdb = mysql_query($querydb);
		//echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Booking List</h1>
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
<form method="post" action="index.php?body=transaction_list_dbase">
Filter By Name
<INPUT TYPE="TEXT" NAME="search_text" VALUE="<?php print($search_text); ?>" SIZE="25" MAXLENGTH="50">
<input type="submit" value="Filter" />
</form>									
									</td>
									<td align="right">
<a title="Add a new entry?" href="index.php?body=transaction_list_addeditdel&mybox=add">
Add Record
</a>
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
										<th>Confirm No.</th>
										<th width="10%">Name</th>
										<th width="10%">Email</th>
										<th width="10%">Mobile</th>
										<th>Type</th>
										<th>Amount</th>
										<th>Modify</th>
										<th>Remove</th>
									</tr>
								</thead>
                                <tbody>
                                    
								
<?php
//fetch the results from the database
$countdb = $countdb + 1;
while ($rowdb =  mysql_fetch_array ($resultdb)) 
{
	print("<tr class=\"odd gradeX\">");

	print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb[tldate])). "</td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[tlid] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[tlname]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[tlemail]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[tlmobile]  </td>\n");
	print("<td align=\"center\" valign=\"middle\">$rowdb[tltype]  </td>\n");
	print("<td align=\"right\" valign=\"middle\">" . number_format($rowdb[tlamt],2) . "</td>\n");

	print("<td align=\"CENTER\" valign=\"middle\">");
	print("<a title=\"Update entry?\" href=\"index.php?body=transaction_list_addeditdel&mybox=edit&tlid=$rowdb[tlid]\"> Update </a>"); 
	print("</td>");

	print("<td align=\"CENTER\" valign=\"middle\">");
	print("<a title=\"Delete this entry?\" href=\"index.php?body=transaction_list_addeditdel&mybox=del&tlid=$rowdb[tlid]\"> Delete </a>");
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
?>		