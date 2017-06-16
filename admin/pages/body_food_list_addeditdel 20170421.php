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
				
		$flid = 0;	
		if(isset($_GET['flid']))
		{
			if ($_GET['flid'])
			{
				$flid = $_GET['flid'];
			}
		}
		//echo '<br> flid : ' . $flid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$flid = 0;
$flname = '';
$fldesc = '';
$flrate = '';
$flcount = '';
$flavailable = 'Y';
$rlgeomap = '';

$blid = '';
$blname = '';

$ftid = '';
$ftname = '';

$flpicture = '';
$flpicture1 = '';
$flpicture2 = '';
$flpicture3 = '';
$flpicture4 = '';
$flpicture5 = '';

$flfeatured = 'N';
$flactive = 'Y';
$fluser = $_SESSION["ulname"];
$flstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM food_list a, branch_list b, food_type c
						   WHERE a.blid = b.blid and 
						         a.ftid = c.ftid and 
						         a.flid='$flid' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$flid = $row[flid];
$flname = $row[flname];
$fldesc = $row[fldesc];
$flrate = $row[flrate];
$flcount = $row[flcount];
$flavailable = $row[flavailable];
$rlgeomap = $row[rlgeomap];

$blid = $row[blid];
$blname = $row[blname];

$ftid = $row[ftid];
$ftname = $row[ftname];

$flpicture = $row[flpicture];
$flpicture1 = $row[flpicture1];
$flpicture2 = $row[flpicture2];
$flpicture3 = $row[flpicture3];
$flpicture4 = $row[flpicture4];
$flpicture5 = $row[flpicture5];

$flfeatured = $row[flfeatured];
$flactive = $row[flactive];
$fluser = $row[fluser];
$flstamp = $row[flstamp];
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
                    <h1 class="page-header">Food List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=food_list_dbase">
Back to Food List
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
<form role="form" method="post" action="index.php?body=food_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&flid=<?php print($flid); ?>" enctype="multipart/form-data">


	<div class="form-group">
		<label>Branch</label>
<?php 
	echo "<select class=\"form-control\" name=\"blid\" > ";	
	
	if ($flname != '') 
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
		<label>Food Type</label>
<?php 
	echo "<select class=\"form-control\" name=\"ftid\" > ";	
	
	if ($flname != '') 
	{
		echo "<option value='" . $ftid .  "'>" . $ftname . "</option>";
	}
	else
	{
		echo "<option></option>";
	}
	
	$query = "SELECT a.ftid, a.ftname 
			  FROM food_type a
			  ORDER BY ftname"; //Populate Vendor Dropdown
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
		<label>Food Name</label>
		<input class="form-control" name="flname"  value="<?php print ("$flname"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Description</label>
		<textarea class="form-control" rows="4" name="fldesc" ><?php print("$fldesc"); ?></textarea>	
	</div>
	
	<div class="form-group">
		<label>Rate</label>
		<input class="form-control" name="flrate"  value="<?php print ("$flrate"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>Still Available</label>
		<select class="form-control" name='flavailable'>
			<option><?php print ("$flavailable"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>		
	
	<div class="form-group">
		<label>Main Picture</label>
		<input class="form-control" type="text" name="flpicture" value="<?php print("$flpicture"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload" id="fileToUpload">		
	</div>		
	
	<div class="form-group">
		<label>Picture (1)</label>
		<input class="form-control" type="text" name="flpicture1" value="<?php print("$flpicture1"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload1" id="fileToUpload1">		
	</div>		
	<div class="form-group">
		<label>Picture (2)</label>
		<input class="form-control" type="text" name="flpicture2" value="<?php print("$flpicture2"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload2" id="fileToUpload2">		
	</div>		
	<div class="form-group">
		<label>Picture (3)</label>
		<input class="form-control" type="text" name="flpicture3" value="<?php print("$flpicture3"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload3" id="fileToUpload3">		
	</div>		
	<div class="form-group">
		<label>Picture (4)</label>
		<input class="form-control" type="text" name="flpicture4" value="<?php print("$flpicture4"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload4" id="fileToUpload4">		
	</div>		
	<div class="form-group">
		<label>Picture (5)</label>
		<input class="form-control" type="text" name="flpicture5" value="<?php print("$flpicture5"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload5" id="fileToUpload5">		
	</div>		

	<div class="form-group">
		<label>Featured</label>
		<select class="form-control" name='flfeatured'>
			<option><?php print ("$flfeatured"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='flactive'>
			<option><?php print ("$flactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$fluser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$flstamp"); ?>
	</div>
						
	<input type="hidden" name="flid" value="<?php print ("$flid"); ?>" />
	<input type="hidden" name="flcount"  value="<?php print ("$flcount"); ?>" >
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
<form role="form" method="post" action="index.php?body=food_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&flid=<?php print($flid); ?>">
	<div class="form-group">
		<label>Food Name</label>
		<br>
		<?php print ("$flname"); ?>
	</div>
	<input type="hidden" name="flid" value="<?php print ("$flid"); ?>" />
	<input type="hidden" name="flname" value="<?php print ("$flname"); ?>" />
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
$flid = $_POST['flid'];
$flname = $_POST['flname'];
$flname = htmlspecialchars($flname, ENT_QUOTES);

$fldesc = $_POST['fldesc'];
$fldesc = str_replace('"', '&quot;', $fldesc); 
$fldesc = str_replace('\'', '&acute;', $fldesc); 
$fldesc = htmlspecialchars($fldesc, ENT_QUOTES);

$flrate = $_POST['flrate'];
$flcount = $_POST['flcount'];
$flavailable = $_POST['flavailable'];

$blid = $_POST['blid'];
$blname = $_POST['blname'];

$ftid = $_POST['ftid'];
$ftname = $_POST['ftname'];

$flpicture = $_POST['flpicture'];
$flpicture1 = $_POST['flpicture1'];
$flpicture2 = $_POST['flpicture2'];
$flpicture3 = $_POST['flpicture3'];
$flpicture4 = $_POST['flpicture4'];
$flpicture5 = $_POST['flpicture5'];

$flfeatured = $_POST['flfeatured'];
$flactive = $_POST['flactive'];
$fluser = $_SESSION['ulname'];
$flstamp = $globaldatetime;

//echo "<br> flid " . $flid;

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
                    <h1 class="page-header">Food List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=food_list_dbase">
Back to Food List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Food Name</label>
		<br />
		 <? print("$flname"); ?>
	</div>
	
	<div class="form-group">
		<label>Main Picture</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload']['name'])
{
	$flpicture = $_FILES['fileToUpload']['name'];	
	
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
			$target = $currentdir .'/food/' . basename($_FILES['fileToUpload']['name']);
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
echo "Image Name : " . $flpicture;
?>		
	</div>
	

	<div class="form-group">
		<label>Picture (1)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload1']['name'])
{
	$flpicture1 = $_FILES['fileToUpload1']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload1']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload1']['tmp_name']); //rename file
		if($_FILES['fileToUpload1']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/food/' . basename($_FILES['fileToUpload1']['name']);
			move_uploaded_file($_FILES['fileToUpload1']['tmp_name'], $target);
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['fileToUpload1']['error'];
	}
}

//you get the following information for each file:
//echo "<br> name : " . $_FILES['fileToUpload1']['name'];
//echo "<br> size : " . $_FILES['fileToUpload1']['size'];
//echo "<br> type : " . $_FILES['fileToUpload1']['type'];
//echo "<br> tmp_name : " . $_FILES['fileToUpload1']['tmp_name'];
echo "Image Name : " . $flpicture1;
?>		
	</div>	
	
	
	

	<div class="form-group">
		<label>Picture (2)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload2']['name'])
{
	$flpicture2 = $_FILES['fileToUpload2']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload2']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload2']['tmp_name']); //rename file
		if($_FILES['fileToUpload2']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/food/' . basename($_FILES['fileToUpload2']['name']);
			move_uploaded_file($_FILES['fileToUpload2']['tmp_name'], $target);
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['fileToUpload2']['error'];
	}
}

//you get the following information for each file:
//echo "<br> name : " . $_FILES['fileToUpload2']['name'];
//echo "<br> size : " . $_FILES['fileToUpload2']['size'];
//echo "<br> type : " . $_FILES['fileToUpload2']['type'];
//echo "<br> tmp_name : " . $_FILES['fileToUpload2']['tmp_name'];
echo "Image Name : " . $flpicture2;
?>		
	</div>		
	
	

	<div class="form-group">
		<label>Picture (3)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload3']['name'])
{
	$flpicture3 = $_FILES['fileToUpload3']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload3']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload3']['tmp_name']); //rename file
		if($_FILES['fileToUpload3']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/food/' . basename($_FILES['fileToUpload3']['name']);
			move_uploaded_file($_FILES['fileToUpload3']['tmp_name'], $target);
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['fileToUpload3']['error'];
	}
}

//you get the following information for each file:
//echo "<br> name : " . $_FILES['fileToUpload3']['name'];
//echo "<br> size : " . $_FILES['fileToUpload3']['size'];
//echo "<br> type : " . $_FILES['fileToUpload3']['type'];
//echo "<br> tmp_name : " . $_FILES['fileToUpload3']['tmp_name'];
echo "Image Name : " . $flpicture3;
?>		
	</div>	
	
	
	

	<div class="form-group">
		<label>Picture (4)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload4']['name'])
{
	$flpicture4 = $_FILES['fileToUpload4']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload4']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload4']['tmp_name']); //rename file
		if($_FILES['fileToUpload4']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/food/' . basename($_FILES['fileToUpload4']['name']);
			move_uploaded_file($_FILES['fileToUpload4']['tmp_name'], $target);
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['fileToUpload4']['error'];
	}
}

//you get the following information for each file:
//echo "<br> name : " . $_FILES['fileToUpload4']['name'];
//echo "<br> size : " . $_FILES['fileToUpload4']['size'];
//echo "<br> type : " . $_FILES['fileToUpload4']['type'];
//echo "<br> tmp_name : " . $_FILES['fileToUpload4']['tmp_name'];
echo "Image Name : " . $flpicture4;
?>		
	</div>	
	
	

	<div class="form-group">
		<label>Picture (5)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload5']['name'])
{
	$flpicture5 = $_FILES['fileToUpload5']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload5']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload5']['tmp_name']); //rename file
		if($_FILES['fileToUpload5']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/food/' . basename($_FILES['fileToUpload5']['name']);
			move_uploaded_file($_FILES['fileToUpload5']['tmp_name'], $target);
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['fileToUpload5']['error'];
	}
}

//you get the following information for each file:
//echo "<br> name : " . $_FILES['fileToUpload5']['name'];
//echo "<br> size : " . $_FILES['fileToUpload5']['size'];
//echo "<br> type : " . $_FILES['fileToUpload5']['type'];
//echo "<br> tmp_name : " . $_FILES['fileToUpload5']['tmp_name'];
echo "Image Name : " . $flpicture5;
?>		
	</div>			
		
	
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($flid == 0) 
			{
$query = 
"INSERT INTO food_list (
flid,
flname,
fldesc,
flrate,
flcount,
flavailable,

blid,
ftid,

flpicture,
flpicture1,
flpicture2,
flpicture3,
flpicture4,
flpicture5,

flfeatured,
flactive,
fluser,
flstamp
) 
VALUES 
(
'$flid',
'$flname',
'$fldesc',
'$flrate',
'$flcount',
'$flavailable',

'$blid',
'$ftid',

'$flpicture',
'$flpicture1',
'$flpicture2',
'$flpicture3',
'$flpicture4',
'$flpicture5',

'$flfeatured',
'$flactive',
'$fluser',
'$flstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
food_list 
SET 
flname = '$flname',
fldesc = '$fldesc',
flrate = '$flrate',
flcount = '$flcount',
flavailable = '$flavailable',

blid = '$blid',
ftid = '$ftid',

flpicture = '$flpicture',
flpicture1 = '$flpicture1',
flpicture2 = '$flpicture2',
flpicture3 = '$flpicture3',
flpicture4 = '$flpicture4',
flpicture5 = '$flpicture5',

flfeatured = '$flfeatured',
flactive = '$flactive',
fluser = '$fluser',
flstamp = '$flstamp'
WHERE
flid = '$flid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
food_list 
WHERE
flid = '$flid'";
		}
		
		mysql_query($query) or die(mysql_error());  

/*
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
		mysql_query($query) or die(mysql_error());  
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=food_list_dbase">  
		</HTML>
*/
		?>				
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=food_list_dbase">  
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