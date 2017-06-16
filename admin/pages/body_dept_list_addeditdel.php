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
				
		$dlid = 0;	
		if(isset($_GET['dlid']))
		{
			if ($_GET['dlid'])
			{
				$dlid = $_GET['dlid'];
			}
		}
		//echo '<br> dlid : ' . $dlid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$dlid = 0;
$dlname = '';
$dltype = '';

$dlactive = 'Y';
$dluser = $_SESSION["ulname"];
$dlstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM dept_list 
						   WHERE dlid='$dlid'";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$dlid = $row[dlid];
$dlname = $row[dlname];
$dltype = $row[dltype];

$dlactive = $row[dlactive];
$dluser = $row[dluser];
$dlstamp = $row[dlstamp];
				}
				 
				mysql_query($query) or die('Error, insert query failed');  
		
				if ($mybox == 'edit') 
				{
					$formtitle = 'MODIFY RECORD';			
				}
				
				if ($mybox == 'del')
				{
					$formtitle = 'REMOVE RECORD';			
				}
			}	
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Department List - <?php echo $formtitle; ?></h1>
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
Basic Information
									</td>
									<td align="right">
<a href="index.php?body=dept_list_dbase">
Back to Department List
</a>	
									</td>
								</tr>
							</table>
                        </div>
						
					<?php
					if (($mybox == 'add') or ($mybox == 'edit'))
					{
					?>						
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<form role="form" method="post" action="index.php?body=dept_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&dlid=<?php print($dlid); ?>">
	<div class="form-group">
		<label>Department Name</label>
		<input class="form-control" placeholder="Enter department" name="dlname"  value="<?php print ("$dlname"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Type</label>
		<select class="form-control" name='dltype'>
			<option><?php print ("$dltype"); ?></option>	
			<option>SERVICE</option>	
			<option>MARKETING</option>	
			<option>ADMIN</option>	
			<option>INSURANCE</option>	
			<option>COMPUTER</option>	
			<option></option>	
		</select>
	</div>
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='dlactive'>
			<option><?php print ("$dlactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>		
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$dluser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$dlstamp"); ?>
	</div>
						
	<input type="hidden" name="dlid" value="<?php print ("$dlid"); ?>" />
	<button type="submit" class="btn btn-default">Save</button>
	<button type="reset" class="btn btn-default">Reset</button>
</form>		
                                </div>		
                                <!-- /.col-lg-6 (nested) -->																								
							</div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
						
					<?php
					}
					else
					{
					?>		
									
						<div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<form role="form" method="post" action="index.php?body=dept_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&dlid=<?php print($dlid); ?>">
	<div class="form-group">
		<label>Department Name</label>
		<br>
		<?php print ("$dlname"); ?>
	</div>
	<input type="hidden" name="dlid" value="<?php print ("$dlid"); ?>" />
	<input type="hidden" name="dlname" value="<?php print ("$dlname"); ?>" />
	<button type="submit" class="btn btn-default">Delete Record</button>
</form>		
                                </div>		
                                <!-- /.col-lg-6 (nested) -->																								
							</div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->

					<?php
					}
					?>						
						
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
<?php
		}
		else
		{
$dlid = $_POST['dlid'];
$dlname = $_POST['dlname'];
$dlname = htmlspecialchars($dlname, ENT_QUOTES);
$dltype = $_POST['dltype'];

$dlactive = $_POST['dlactive'];
$dluser = $_SESSION["ulname"];
$dlstamp = $globaldatetime;

//echo "<br> dlid " . $dlid;

if ($mybox == 'add') 
{
	$formtitle = 'ADD RECORD';			
}
else
if ($mybox == 'edit') 
{
	$formtitle = 'MODIFY RECORD';			
}

if ($mybox == 'del')
{
	$formtitle = 'REMOVE RECORD';			
}
?>	

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Department List - <?php echo $formtitle; ?></h1>
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
Basic Information
									</td>
									<td align="right">
<a href="index.php?body=dept_list_dbase">
Back to Department List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Department Name</label>
		<br />
		 <? print("$dlname"); ?>
	</div>
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($dlid == 0) 
			{
$query = 
"INSERT INTO dept_list (
dlid,
dlname,
dltype,
dlactive,
dluser,
dlstamp
) 
VALUES 
(
'$dlid',
'$dlname',
'$dltype',
'$dlactive',
'$dluser',
'$dlstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
dept_list 
SET 
dlname = '$dlname',
dltype = '$dltype',
dlactive = '$dlactive',
dluser = '$dluser',
dlstamp = '$dlstamp'
WHERE
dlid = '$dlid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
dept_list 
WHERE
dlid = '$dlid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');     

/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=dept_list_dbase">  
		</HTML>
	</div>
                                </div>		
                                <!-- /.col-lg-6 (nested) -->																								
							</div>
                            <!-- /.row (nested) -->
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

    </div>
    <!-- /#wrapper -->


<?php	
		}
	}
?>			