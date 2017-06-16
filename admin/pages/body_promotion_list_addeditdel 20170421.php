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
$pldate = $globaldate;
$plcode = '';
$plname = '';
$pldesc = '';
$plidscount = 0;
$pltype = '';

$plfrom = $globaldate;
$plto = $globaldate;

$blid = '';
$blname = '';

$plactive = 'Y';
$pluser = $_SESSION["ulname"];
$plstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM promotion_list a, branch_list b
						   WHERE a.blid = b.blid and 
						         a.plid='$plid' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$plid = $row[plid];
$pldate = $row[pldate];
$plcode = $row[plcode];
$plname = $row[plname];
$pldesc = $row[pldesc];
$plidscount = $row[plidscount];
$pltype = $row[pltype];

$plfrom = $row[plfrom];
$plto = $row[plto];

$blid = $row[blid];
$blname = $row[blname];

$plpicture = $row[plpicture];

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
                    <h1 class="page-header">Promotion List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=promotion_list_dbase">
Back to Promotion List
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
<form role="form" method="post" action="index.php?body=promotion_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&plid=<?php print($plid); ?>" enctype="multipart/form-data">


	<div class="form-group">
		<label>Branch</label>
<?php 
	echo "<select class=\"form-control\" name=\"blid\" > ";	
	
	if ($plname != '') 
	{
		echo "<option value='" . $blid .  "'>" . $blname . "</option>";
	}
	else
	{
		echo "<option></option>";
	}

	$myblid = $_SESSION['blid'];
	$myadmin = $_SESSION['myadmin'];

	$query = "SELECT a.blid, a.blname 
			  FROM branch_list a ";
	if ($myadmin == 'N')	
	{				 
		$query = $query . " WHERE a.blid = '$myblid' ";
	}
	$query = $query . " 				  
			  ORDER BY blname"; //Populate Vendor Dropdown
	$result = mysql_query($query);                            
	while($row = mysql_fetch_row($result))
	{
		echo "<option value='$row[0]'>$row[1]</option>";
	} 
	echo "</select>";
	mysql_query($query) or die('Error, insert query failed');  
?>
	</div>

	<div class="form-group">
		<label>Date</label>
		<input class="form-control" name="pldate"  value="<?php print ("$pldate"); ?>"  maxlength="30" >
	</div>
	
	<div class="form-group">
		<label>Promotion Code</label>
		<input class="form-control" name="plcode"  value="<?php print ("$plcode"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Promotion Name</label>
		<input class="form-control" name="plname"  value="<?php print ("$plname"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Description</label>
		<textarea class="form-control" rows="4" name="pldesc" ><?php print("$pldesc"); ?></textarea>	
	</div>
	
	<div class="form-group">
		<label>Discount</label>
		<input class="form-control" name="plidscount"  value="<?php print ("$plidscount"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>Promotion Type</label>
		<select class="form-control" name='pltype'>
			<option><?php print ("$pltype"); ?></option>	
			<option>ALL</option>	
			<option>ROOM</option>	
			<option>FOOD</option>	
			<option>ADDON</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Date From</label>
		<input class="form-control" name="plfrom"  value="<?php print ("$plfrom"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>Date To</label>
		<input class="form-control" name="plto"  value="<?php print ("$plto"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>Main Picture</label>
		<input class="form-control" type="text" name="plpicture" value="<?php print("$plpicture"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload" id="fileToUpload">		
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
<form role="form" method="post" action="index.php?body=promotion_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&plid=<?php print($plid); ?>">
	<div class="form-group">
		<label>Promotion Name</label>
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
$pldate = $_POST['pldate'];

$plcode = $_POST['plcode'];
$plcode = htmlspecialchars($plcode, ENT_QUOTES);
$plname = $_POST['plname'];
$plname = htmlspecialchars($plname, ENT_QUOTES);

$pldesc = $_POST['pldesc'];
$pldesc = str_replace('"', '&quot;', $pldesc); 
$pldesc = str_replace('\'', '&acute;', $pldesc); 
$pldesc = htmlspecialchars($pldesc, ENT_QUOTES);

$plidscount = $_POST['plidscount'];
$pltype = $_POST['pltype'];
$plpicture = $_POST['plpicture'];

$plfrom = $_POST['plfrom'];
$plto = $_POST['plto'];

$blid = $_POST['blid'];

$plactive = $_POST['plactive'];
$pluser = $_SESSION['ulname'];
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
                    <h1 class="page-header">Promotion List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=promotion_list_dbase">
Back to Promotion List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Promotion Name</label>
		<br />
		 <? print("$plname"); ?>
	</div>
	
	<div class="form-group">
		<label>Main Picture</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload']['name'])
{
	$plpicture = $_FILES['fileToUpload']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload']['tmp_name']); //rename file
		if($_FILES['fileToUpload']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/promo/' . basename($_FILES['fileToUpload']['name']);
			move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['fileToUpload']['error'];
	}
}

//you get the following information for each file:
//echo "<br> name : " . $_FILES['fileToUpload']['name'];
//echo "<br> size : " . $_FILES['fileToUpload']['size'];
//echo "<br> type : " . $_FILES['fileToUpload']['type'];
//echo "<br> tmp_name : " . $_FILES['fileToUpload']['tmp_name'];
echo "Image Name : " . $plpicture;
?>		
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
"INSERT INTO promotion_list (
plid,
pldate,
plcode,
plname,
pldesc,
plidscount,
pltype,

plfrom,
plto,

blid,

plpicture,

plactive,
pluser,
plstamp
) 
VALUES 
(
'$plid',
'$pldate',
'$plcode',
'$plname',
'$pldesc',
'$plidscount',
'$pltype',

'$plfrom',
'$plto',

'$blid',

'$plpicture',

'$plactive',
'$pluser',
'$plstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
promotion_list 
SET 
plid = '$plid',
pldate = '$pldate',
plcode = '$plcode',
plname = '$plname',
pldesc = '$pldesc',
plidscount = '$plidscount',
pltype = '$pltype',

plfrom = '$plfrom',
plto = '$plto',

blid = '$blid',

plpicture = '$plpicture',

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
promotion_list 
WHERE
plid = '$plid'";
		}
		
		mysql_query($query) or die(mysql_error());  

/*
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
		mysql_query($query) or die(mysql_error());  
*/
		?>				
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=promotion_list_dbase">  
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