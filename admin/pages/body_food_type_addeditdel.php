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
				
		$ftid = 0;	
		if(isset($_GET['ftid']))
		{
			if ($_GET['ftid'])
			{
				$ftid = $_GET['ftid'];
			}
		}
		//echo '<br> ftid : ' . $ftid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$ftid = 0;
$ftname = '';

$ftactive = 'Y';
$ftuser = $_SESSION["ulname"];
$ftstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM food_type 
						   WHERE ftid='$ftid'";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$ftid = $row[ftid];
$ftname = $row[ftname];

$ftactive = $row[ftactive];
$ftuser = $row[ftuser];
$ftstamp = $row[ftstamp];
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
                    <h1 class="page-header">Food Type List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=food_type_dbase">
Back to Food Type List
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
<form role="form" method="post" action="index.php?body=food_type_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&ftid=<?php print($ftid); ?>">
	<div class="form-group">
		<label>Food Type Name</label>
		<input class="form-control" placeholder="Enter Food Type" name="ftname"  value="<?php print ("$ftname"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='ftactive'>
			<option><?php print ("$ftactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>		
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$ftuser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$ftstamp"); ?>
	</div>
						
	<input type="hidden" name="ftid" value="<?php print ("$ftid"); ?>" />
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
<form role="form" method="post" action="index.php?body=food_type_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&ftid=<?php print($ftid); ?>">
	<div class="form-group">
		<label>Food Type Name</label>
		<br>
		<?php print ("$ftname"); ?>
	</div>
	<input type="hidden" name="ftid" value="<?php print ("$ftid"); ?>" />
	<input type="hidden" name="ftname" value="<?php print ("$ftname"); ?>" />
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
$ftid = $_POST['ftid'];
$ftname = $_POST['ftname'];
$ftname = htmlspecialchars($ftname, ENT_QUOTES);

$ftactive = $_POST['ftactive'];
$ftuser = $_SESSION["ulname"];
$ftstamp = $globaldatetime;

//echo "<br> ftid " . $ftid;

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
                    <h1 class="page-header">Food Type List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=food_type_dbase">
Back to Food Type List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Food Type Name</label>
		<br />
		 <? print("$ftname"); ?>
	</div>
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($ftid == 0) 
			{
$query = 
"INSERT INTO food_type (
ftid,
ftname,

ftactive,
ftuser,
ftstamp
) 
VALUES 
(
'$ftid',
'$ftname',

'$ftactive',
'$ftuser',
'$ftstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
food_type 
SET 
ftname = '$ftname',

ftactive = '$ftactive',
ftuser = '$ftuser',
ftstamp = '$ftstamp'
WHERE
ftid = '$ftid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
food_type 
WHERE
ftid = '$ftid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');     

/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=food_type_dbase">  
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