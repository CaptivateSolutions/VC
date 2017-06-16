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
				
		$plid = 0;	
		if(isset($_GET['plid']))
		{
			if ($_GET['plid'])
			{
				$plid = $_GET['plid'];
			}
		}
		//echo '<br> plid : ' . $plid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$plid = 0;
$plname = '';
$pltype = '';

$plactive = 'Y';
$pluser = $_SESSION["ulname"];
$plstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM pos_list 
						   WHERE plid='$plid'";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$plid = $row[plid];
$plname = $row[plname];
$pltype = $row[pltype];

$plactive = $row[plactive];
$pluser = $row[pluser];
$plstamp = $row[plstamp];
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
                    <h1 class="page-header">Position List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=pos_list_dbase">
Back to Position List
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
<form role="form" method="post" action="index.php?body=pos_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&plid=<?php print($plid); ?>">
	<div class="form-group">
		<label>Position Name</label>
		<input class="form-control" placeholder="Enter Position" name="plname"  value="<?php print ("$plname"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Type</label>
		<select class="form-control" name='pltype'>
			<option><?php print ("$pltype"); ?></option>	
			<option>ADMIN</option>	
			<option>ACCOUNTING</option>	
			<option>COMPUTER</option>	
			<option>MANAGER</option>	
			<option>MARKETING</option>	
			<option>SERVICE</option>	
			<option></option>	
		</select>
	</div>	
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='plactive'>
			<option><?php print ("$plactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>		
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$pluser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$plstamp"); ?>
	</div>
						
	<input type="hidden" name="plid" value="<?php print ("$plid"); ?>" />
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
<form role="form" method="post" action="index.php?body=pos_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&plid=<?php print($plid); ?>">
	<div class="form-group">
		<label>Position Name</label>
		<br>
		<?php print ("$plname"); ?>
	</div>
	<input type="hidden" name="plid" value="<?php print ("$plid"); ?>" />
	<input type="hidden" name="plname" value="<?php print ("$plname"); ?>" />
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
$plid = $_POST['plid'];
$plname = $_POST['plname'];
$plname = htmlspecialchars($plname, ENT_QUOTES);

$pltype = $_POST['pltype'];

$plactive = $_POST['plactive'];
$pluser = $_SESSION["ulname"];
$plstamp = $globaldatetime;

//echo "<br> plid " . $plid;

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
                    <h1 class="page-header">Position List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=pos_list_dbase">
Back to Position List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Position Name</label>
		<br />
		 <? print("$plname"); ?>
	</div>
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($plid == 0) 
			{
$query = 
"INSERT INTO pos_list (
plid,
plname,
pltype,
plactive,
pluser,
plstamp
) 
VALUES 
(
'$plid',
'$plname',
'$pltype',
'$plactive',
'$pluser',
'$plstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
pos_list 
SET 
plname = '$plname',
pltype = '$pltype',
plactive = '$plactive',
pluser = '$pluser',
plstamp = '$plstamp'
WHERE
plid = '$plid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
pos_list 
WHERE
plid = '$plid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  

/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=pos_list_dbase">  
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