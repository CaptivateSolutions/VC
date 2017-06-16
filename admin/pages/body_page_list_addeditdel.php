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
$pltext1 = '';
$pltext2 = '';
$pltext3 = '';

$plactive = 'Y';
$pluser = $_SESSION["ulname"];
$plstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM page_list 
						   WHERE plid='$plid'";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$plid = $row[plid];
$plname = $row[plname];
$pltype = $row[pltype];
$pltext1 = $row[pltext1];
$pltext2 = $row[pltext2];
$pltext3 = $row[pltext3];

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
                    <h1 class="page-header">Pages List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=page_list_dbase">
Back to Pages List
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
<form role="form" method="post" action="index.php?body=page_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&plid=<?php print($plid); ?>">

	<div class="form-group">
		<label>Page Type</label>
		<select class="form-control" name='pltype'>
			<option><?php print ("$pltype"); ?></option>	
			<option>Food Menu</option>	
			<option>Footer Menu A</option>	
			<option>Footer Menu B</option>	
			<option>Footer Menu C</option>	
			<option>Footer Menu D</option>	
			<option>Terms and Conditions</option>	
			<option>Privacy Policy</option>	
		</select>		
	</div>	

	<div class="form-group">
		<label>Page Name</label>
		<input class="form-control" placeholder="Enter page name that will appear" name="plname"  value="<?php print ("$plname"); ?>"  maxlength="100" >
	</div>

	<div class="form-group">
		<label>1st Column</label>
		<textarea class="form-control" rows="10" name="pltext1" ><?php print("$pltext1"); ?></textarea>	
	</div>
	<div class="form-group">
		<label>2nd Column</label>
		<textarea class="form-control" rows="10" name="pltext2" ><?php print("$pltext2"); ?></textarea>	
	</div>
	<div class="form-group">
		<label>3rd Column</label>
		<textarea class="form-control" rows="10" name="pltext3" ><?php print("$pltext3"); ?></textarea>	
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
<form role="form" method="post" action="index.php?body=page_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&plid=<?php print($plid); ?>">
	<div class="form-group">
		<label>Pages Name</label>
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
$pltype = htmlspecialchars($pltype, ENT_QUOTES);

$pltext1 = $_POST['pltext1'];
$pltext1 = str_replace('"', '&quot;', $pltext1); 
$pltext1 = str_replace('\'', '&acute;', $pltext1); 
$pltext1 = htmlspecialchars($pltext1, ENT_QUOTES);

$pltext2 = $_POST['pltext2'];
$pltext2 = str_replace('"', '&quot;', $pltext2); 
$pltext2 = str_replace('\'', '&acute;', $pltext2); 
$pltext2 = htmlspecialchars($pltext2, ENT_QUOTES);

$pltext3 = $_POST['pltext3'];
$pltext3 = str_replace('"', '&quot;', $pltext3); 
$pltext3 = str_replace('\'', '&acute;', $pltext3); 
$pltext3 = htmlspecialchars($pltext3, ENT_QUOTES);

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
                    <h1 class="page-header">Pages List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=page_list_dbase">
Back to Pages List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Pages Name</label>
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
"INSERT INTO page_list (
plid,
plname,
pltype,

pltext1,
pltext2,
pltext3,

plactive,
pluser,
plstamp
) 
VALUES 
(
'$plid',
'$plname',
'$pltype',

'$pltext1',
'$pltext2',
'$pltext3',

'$plactive',
'$pluser',
'$plstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
page_list 
SET 
plname = '$plname',
pltype = '$pltype',

pltext1 = '$pltext1',
pltext2 = '$pltext2',
pltext3 = '$pltext3',

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
page_list 
WHERE
plid = '$plid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  

/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=page_list_dbase">  
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