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
				
		$raid = 0;	
		if(isset($_GET['raid']))
		{
			if ($_GET['raid'])
			{
				$raid = $_GET['raid'];
			}
		}
		//echo '<br> raid : ' . $raid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$raid = 0;
$raname = '';
$radesc = '';
$rarate = '';

$blid = '';
$blname = '';

$rapicture = '';
$rapicture1 = '';
$rapicture2 = '';
$rapicture3 = '';
$rapicture4 = '';
$rapicture5 = '';

$raactive = 'Y';
$rauser = $_SESSION["ulname"];
$rastamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM room_addons a, branch_list b
						   WHERE a.blid = b.blid and raid='$raid' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$raid = $row[raid];
$raname = $row[raname];
$radesc = $row[radesc];
$rarate = $row[rarate];

$blid = $row[blid];
$blname = $row[blname];

$rapicture = $row[rapicture];
$rapicture1 = $row[rapicture1];
$rapicture2 = $row[rapicture2];
$rapicture3 = $row[rapicture3];
$rapicture4 = $row[rapicture4];
$rapicture5 = $row[rapicture5];

$raactive = $row[raactive];
$rauser = $row[rauser];
$rastamp = $row[rastamp];
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
                    <h1 class="page-header">Room Add-On List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=room_addons_dbase">
Back to Room Add-On List
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
<form role="form" method="post" action="index.php?body=room_addons_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&raid=<?php print($raid); ?>" enctype="multipart/form-data">


	<div class="form-group">
		<label>Branch</label>
<?php 
	echo "<select class=\"form-control\" name=\"blid\" > ";	
	
	if ($raname != '') 
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
		<label>Room Add-On Name</label>
		<input class="form-control" name="raname"  value="<?php print ("$raname"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Description</label>
		<textarea class="form-control" rows="4" name="radesc" ><?php print("$radesc"); ?></textarea>	
	</div>
	
	<div class="form-group">
		<label>Rate</label>
		<input class="form-control" name="rarate"  value="<?php print ("$rarate"); ?>"  maxlength="30" >
	</div>
	
	<div class="form-group">
		<label>Main Picture</label>
		<input class="form-control" type="text" name="rapicture" value="<?php print("$rapicture"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload" id="fileToUpload">		
	</div>		
	
	<div class="form-group">
		<label>Picture (1)</label>
		<input class="form-control" type="text" name="rapicture1" value="<?php print("$rapicture1"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload1" id="fileToUpload1">		
	</div>		
	<div class="form-group">
		<label>Picture (2)</label>
		<input class="form-control" type="text" name="rapicture2" value="<?php print("$rapicture2"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload2" id="fileToUpload2">		
	</div>		
	<div class="form-group">
		<label>Picture (3)</label>
		<input class="form-control" type="text" name="rapicture3" value="<?php print("$rapicture3"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload3" id="fileToUpload3">		
	</div>		
	<div class="form-group">
		<label>Picture (4)</label>
		<input class="form-control" type="text" name="rapicture4" value="<?php print("$rapicture4"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload4" id="fileToUpload4">		
	</div>		
	<div class="form-group">
		<label>Picture (5)</label>
		<input class="form-control" type="text" name="rapicture5" value="<?php print("$rapicture5"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload5" id="fileToUpload5">		
	</div>		
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='raactive'>
			<option><?php print ("$raactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$rauser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$rastamp"); ?>
	</div>
						
	<input type="hidden" name="raid" value="<?php print ("$raid"); ?>" />
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
<form role="form" method="post" action="index.php?body=room_addons_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&raid=<?php print($raid); ?>">
	<div class="form-group">
		<label>Room Add-On Name</label>
		<br>
		<?php print ("$raname"); ?>
	</div>
	<input type="hidden" name="raid" value="<?php print ("$raid"); ?>" />
	<input type="hidden" name="raname" value="<?php print ("$raname"); ?>" />
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
$raid = $_POST['raid'];
$raname = $_POST['raname'];
$raname = htmlspecialchars($raname, ENT_QUOTES);

$radesc = $_POST['radesc'];
$radesc = str_replace('"', '&quot;', $radesc); 
$radesc = str_replace('\'', '&acute;', $radesc); 
$radesc = htmlspecialchars($radesc, ENT_QUOTES);

$rarate = $_POST['rarate'];

$blid = $_POST['blid'];
$blname = $_POST['blname'];
$blname = htmlspecialchars($blname, ENT_QUOTES);

$rapicture = $_POST['rapicture'];
$rapicture1 = $_POST['rapicture1'];
$rapicture2 = $_POST['rapicture2'];
$rapicture3 = $_POST['rapicture3'];
$rapicture4 = $_POST['rapicture4'];
$rapicture5 = $_POST['rapicture5'];

$raactive = $_POST['raactive'];
$rauser = $_SESSION['ulname'];
$rastamp = $globaldatetime;

//echo "<br> raid " . $raid;

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
                    <h1 class="page-header">Room Add-On List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=room_addons_dbase">
Back to Room Add-On List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Room Add-On Name</label>
		<br />
		 <? print("$raname"); ?>
	</div>
	
	<div class="form-group">
		<label>Main Picture</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload']['name'])
{
	$rapicture = $_FILES['fileToUpload']['name'];	
	
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
			$target = $currentdir .'/addon/' . basename($_FILES['fileToUpload']['name']);
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
echo "Image Name : " . $rapicture;
?>		
	</div>
	

	<div class="form-group">
		<label>Picture (1)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload1']['name'])
{
	$rapicture1 = $_FILES['fileToUpload1']['name'];	
	
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
			$target = $currentdir .'/addon/' . basename($_FILES['fileToUpload1']['name']);
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
echo "Image Name : " . $rapicture1;
?>		
	</div>	
	
	
	

	<div class="form-group">
		<label>Picture (2)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload2']['name'])
{
	$rapicture2 = $_FILES['fileToUpload2']['name'];	
	
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
			$target = $currentdir .'/addon/' . basename($_FILES['fileToUpload2']['name']);
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
echo "Image Name : " . $rapicture2;
?>		
	</div>		
	
	

	<div class="form-group">
		<label>Picture (3)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload3']['name'])
{
	$rapicture3 = $_FILES['fileToUpload3']['name'];	
	
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
			$target = $currentdir .'/addon/' . basename($_FILES['fileToUpload3']['name']);
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
echo "Image Name : " . $rapicture3;
?>		
	</div>	
	
	
	

	<div class="form-group">
		<label>Picture (4)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload4']['name'])
{
	$rapicture4 = $_FILES['fileToUpload4']['name'];	
	
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
			$target = $currentdir .'/addon/' . basename($_FILES['fileToUpload4']['name']);
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
echo "Image Name : " . $rapicture4;
?>		
	</div>	
	
	

	<div class="form-group">
		<label>Picture (5)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload5']['name'])
{
	$rapicture5 = $_FILES['fileToUpload5']['name'];	
	
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
			$target = $currentdir .'/addon/' . basename($_FILES['fileToUpload5']['name']);
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
echo "Image Name : " . $rapicture5;
?>		
	</div>			
		
	
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($raid == 0) 
			{
$query = 
"INSERT INTO room_addons (
raid,
raname,
radesc,
rarate,

blid,

rapicture,
rapicture1,
rapicture2,
rapicture3,
rapicture4,
rapicture5,

raactive,
rauser,
rastamp
) 
VALUES 
(
'$raid',
'$raname',
'$radesc',
'$rarate',

'$blid',

'$rapicture',
'$rapicture1',
'$rapicture2',
'$rapicture3',
'$rapicture4',
'$rapicture5',

'$raactive',
'$rauser',
'$rastamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
room_addons 
SET 
raname = '$raname',
radesc = '$radesc',
rarate = '$rarate',

blid = '$blid',

rapicture = '$rapicture',
rapicture1 = '$rapicture1',
rapicture2 = '$rapicture2',
rapicture3 = '$rapicture3',
rapicture4 = '$rapicture4',
rapicture5 = '$rapicture5',

raactive = '$raactive',
rauser = '$rauser',
rastamp = '$rastamp'
WHERE
raid = '$raid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
room_addons 
WHERE
raid = '$raid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
/*
*/
		?>				
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=room_addons_dbase">  
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