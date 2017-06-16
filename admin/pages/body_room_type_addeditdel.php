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
				
		$rtid = 0;	
		if(isset($_GET['rtid']))
		{
			if ($_GET['rtid'])
			{
				$rtid = $_GET['rtid'];
			}
		}
		//echo '<br> rtid : ' . $rtid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$rtid = 0;
$rtname = '';

$rtactive = 'Y';
$rtuser = $_SESSION["ulname"];
$rtstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM room_type 
						   WHERE rtid='$rtid'";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$rtid = $row[rtid];
$rtname = $row[rtname];

$rtactive = $row[rtactive];
$rtuser = $row[rtuser];
$rtstamp = $row[rtstamp];
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
                    <h1 class="page-header">Room Type List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=room_type_dbase">
Back to Room Type List
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
<form role="form" method="post" action="index.php?body=room_type_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&rtid=<?php print($rtid); ?>">
	<div class="form-group">
		<label>Room Type Name</label>
		<input class="form-control" placeholder="Enter Room Type" name="rtname"  value="<?php print ("$rtname"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='rtactive'>
			<option><?php print ("$rtactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>		
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$rtuser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$rtstamp"); ?>
	</div>
						
	<input type="hidden" name="rtid" value="<?php print ("$rtid"); ?>" />
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
<form role="form" method="post" action="index.php?body=room_type_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&rtid=<?php print($rtid); ?>">
	<div class="form-group">
		<label>Room Type Name</label>
		<br>
		<?php print ("$rtname"); ?>
	</div>
	<input type="hidden" name="rtid" value="<?php print ("$rtid"); ?>" />
	<input type="hidden" name="rtname" value="<?php print ("$rtname"); ?>" />
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
$rtid = $_POST['rtid'];
$rtname = $_POST['rtname'];
$rtname = htmlspecialchars($rtname, ENT_QUOTES);

$rtactive = $_POST['rtactive'];
$rtuser = $_SESSION["ulname"];
$rtstamp = $globaldatetime;

//echo "<br> rtid " . $rtid;

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
                    <h1 class="page-header">Room Type List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=room_type_dbase">
Back to Room Type List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Room Type Name</label>
		<br />
		 <? print("$rtname"); ?>
	</div>
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($rtid == 0) 
			{
$query = 
"INSERT INTO room_type (
rtid,
rtname,

rtactive,
rtuser,
rtstamp
) 
VALUES 
(
'$rtid',
'$rtname',

'$rtactive',
'$rtuser',
'$rtstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
room_type 
SET 
rtname = '$rtname',

rtactive = '$rtactive',
rtuser = '$rtuser',
rtstamp = '$rtstamp'
WHERE
rtid = '$rtid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
room_type 
WHERE
rtid = '$rtid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');     

/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=room_type_dbase">  
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