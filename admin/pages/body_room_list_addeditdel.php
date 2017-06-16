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
				
		$rlid = 0;	
		if(isset($_GET['rlid']))
		{
			if ($_GET['rlid'])
			{
				$rlid = $_GET['rlid'];
			}
		}
		//echo '<br> rlid : ' . $rlid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$rlid = 0;
$rlname = '';
$rlkey = '';
$rlkey_old = '';
$rldesc = '';

$rlrate = 0;
$rlrate3hr = 0;
$rlrate6hr = 0;
$rlrate12hr = 0;
$rlrate4hr = 0;
$rlrate5hr = 0;
$rlrate8hr = 0;

$rlcount = '';
$rlavailable = 'Y';
$rlgeomap = '';

$blid = '';
$blname = '';

$rtid = '';
$rtname = '';

$rlpicture = '';
$rlpicture1 = '';
$rlpicture2 = '';
$rlpicture3 = '';
$rlpicture4 = '';
$rlpicture5 = '';

$rlcategory1 = '';
$rlcategory2 = '';
$rlcategory3 = '';
$rlcategory4 = '';
$rlcategory5 = '';

$rlroom_testimonial = '';
$rlgoldroom = '';

$rlactive = 'Y';
$rluser = $_SESSION["ulname"];
$rlstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM room_list a, branch_list b, room_type c
						   WHERE a.blid = b.blid and 
						         a.rtid = c.rtid and 
						         a.rlid='$rlid' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$rlid = $row[rlid];
$rlname = $row[rlname];
$rlkey = $row[rlkey];
$rlkey_old = $row[rlkey];
$rldesc = $row[rldesc];

$rlrate = $row[rlrate];
$rlrate3hr = $row[rlrate3hr];
$rlrate6hr = $row[rlrate6hr];
$rlrate12hr = $row[rlrate12hr];
$rlrate4hr = $row[rlrate4hr];
$rlrate5hr = $row[rlrate5hr];
$rlrate8hr = $row[rlrate8hr];

$rlcount = $row[rlcount];
$rlavailable = $row[rlavailable];
$rlgeomap = $row[rlgeomap];

$blid = $row[blid];
$blname = $row[blname];

$rtid = $row[rtid];
$rtname = $row[rtname];

$rlpicture = $row[rlpicture];
$rlpicture1 = $row[rlpicture1];
$rlpicture2 = $row[rlpicture2];
$rlpicture3 = $row[rlpicture3];
$rlpicture4 = $row[rlpicture4];
$rlpicture5 = $row[rlpicture5];

$rlcategory1 = $row[rlcategory1];
$rlcategory2 = $row[rlcategory2];
$rlcategory3 = $row[rlcategory3];
$rlcategory4 = $row[rlcategory4];
$rlcategory5 = $row[rlcategory5];

$rlroom_testimonial = $row[rlroom_testimonial];
$rlgoldroom = $row[rlgoldroom];

$rlactive = $row[rlactive];
$rluser = $row[rluser];
$rlstamp = $row[rlstamp];
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
                    <h1 class="page-header">Premium Rooms - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=room_list_dbase">
Back to Room List
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
<form role="form" method="post" action="index.php?body=room_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&rlid=<?php print($rlid); ?>" enctype="multipart/form-data">


	<div class="form-group">
		<label>Branch</label>
<?php 
	echo "<select class=\"form-control\" name=\"blid\" > ";	
	
	if ($rlname != '') 
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
		<label>Room Type</label>
<?php 
	echo "<select class=\"form-control\" name=\"rtid\" > ";	
	
	if ($rlname != '') 
	{
		echo "<option value='" . $rtid .  "'>" . $rtname . "</option>";
	}
	else
	{
		echo "<option></option>";
	}
	
	$query = "SELECT a.rtid, a.rtname 
			  FROM room_type a
			  ORDER BY rtname"; //Populate Vendor Dropdown
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
		<label>Room Name</label>
		<input class="form-control" name="rlname"  value="<?php print ("$rlname"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Room No. (Used as link for VC table)</label>
		<input class="form-control" name="rlkey"  value="<?php print ("$rlkey"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Description</label>
		<textarea class="form-control" rows="4" name="rldesc" ><?php print("$rldesc"); ?></textarea>	
	</div>
	
	<div class="form-group">
		<label>Daily Rate</label>
		<input class="form-control" name="rlrate"  value="<?php print ("$rlrate"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>Rate for 3 hours</label>
		<input class="form-control" name="rlrate3hr"  value="<?php print ("$rlrate3hr"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>Rate for 4 hours</label>
		<input class="form-control" name="rlrate4hr"  value="<?php print ("$rlrate4hr"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>Rate for 5 hours</label>
		<input class="form-control" name="rlrate5hr"  value="<?php print ("$rlrate5hr"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>Rate for 6 hours</label>
		<input class="form-control" name="rlrate6hr"  value="<?php print ("$rlrate6hr"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>Rate for 8 hours</label>
		<input class="form-control" name="rlrate8hr"  value="<?php print ("$rlrate8hr"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>Rate for 12 hours</label>
		<input class="form-control" name="rlrate12hr"  value="<?php print ("$rlrate12hr"); ?>"  maxlength="30" >
	</div>

	<div class="form-group">
		<label>No. of Rooms</label>
		<input class="form-control" name="rlcount"  value="<?php print ("$rlcount"); ?>"  maxlength="30" >
	</div>
	

	<div class="form-group">
		<label>Still Available</label>
		<select class="form-control" name='rlavailable'>
			<option><?php print ("$rlavailable"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>		

	<div class="form-group">
		<label>Set to Gold room?</label>
		<select class="form-control" name='rlgoldroom'>
			<option><?php print ("$rlgoldroom"); ?></option>	
			<option>GOLD</option>	
			<option>REGULAR</option>	
			<option></option>	
		</select>		
	</div>	

	<div class="form-group">
		<label>Short Testimonial (100 char)</label>
		<input class="form-control" name="rlroom_testimonial"  value="<?php print ("$rlroom_testimonial"); ?>"  maxlength="100" >
	</div>

	<div class="form-group">
		<label>Geomap URL</label>
		<textarea class="form-control" rows="4" name="rlgeomap" ><?php print("$rlgeomap"); ?></textarea>	
	</div>

	<div class="form-group">
		<label>Main Picture</label>
		<input class="form-control" type="text" name="rlpicture" value="<?php print("$rlpicture"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload" id="fileToUpload">		
	</div>		
	
	<div class="form-group">
		<label>Picture (1)</label>
		<input class="form-control" type="text" name="rlpicture1" value="<?php print("$rlpicture1"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload1" id="fileToUpload1">		
	</div>		
	<div class="form-group">
		<label>Picture (2)</label>
		<input class="form-control" type="text" name="rlpicture2" value="<?php print("$rlpicture2"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload2" id="fileToUpload2">		
	</div>		
	<div class="form-group">
		<label>Picture (3)</label>
		<input class="form-control" type="text" name="rlpicture3" value="<?php print("$rlpicture3"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload3" id="fileToUpload3">		
	</div>		
	<div class="form-group">
		<label>Picture (4)</label>
		<input class="form-control" type="text" name="rlpicture4" value="<?php print("$rlpicture4"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload4" id="fileToUpload4">		
	</div>		
	<div class="form-group">
		<label>Picture (5)</label>
		<input class="form-control" type="text" name="rlpicture5" value="<?php print("$rlpicture5"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload5" id="fileToUpload5">		
	</div>		
	
	
	<div class="form-group">
		<label>Category 1</label>
		<input class="form-control" name="rlcategory1"  value="<?php print ("$rlcategory1"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Category 2</label>
		<input class="form-control" name="rlcategory2"  value="<?php print ("$rlcategory2"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Category 3</label>
		<input class="form-control" name="rlcategory3"  value="<?php print ("$rlcategory3"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Category 4</label>
		<input class="form-control" name="rlcategory4"  value="<?php print ("$rlcategory4"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Category 5</label>
		<input class="form-control" name="rlcategory5"  value="<?php print ("$rlcategory5"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='rlactive'>
			<option><?php print ("$rlactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$rluser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$rlstamp"); ?>
	</div>
						
	<input type="hidden" name="rlid" value="<?php print ("$rlid"); ?>" />
	<input type="hidden" name="rlkey_old" value="<?php print ("$rlkey_old"); ?>" />
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
<form role="form" method="post" action="index.php?body=room_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&rlid=<?php print($rlid); ?>">
	<div class="form-group">
		<label>Room Name</label>
		<br>
		<?php print ("$rlname"); ?>
	</div>
	<input type="hidden" name="rlid" value="<?php print ("$rlid"); ?>" />
	<input type="hidden" name="rlname" value="<?php print ("$rlname"); ?>" />
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
$rlid = $_POST['rlid'];

$rlname = $_POST['rlname'];
$rlname = htmlspecialchars($rlname, ENT_QUOTES);

$rlkey = $_POST['rlkey'];
$rlkey_old = $_POST['rlkey_old'];

$rldesc = $_POST['rldesc'];
$rldesc = str_replace('"', '&quot;', $rldesc); 
$rldesc = str_replace('\'', '&acute;', $rldesc); 
$rldesc = htmlspecialchars($rldesc, ENT_QUOTES);

$rlrate = $_POST['rlrate'];
$rlrate3hr = $_POST['rlrate3hr'];
$rlrate6hr = $_POST['rlrate6hr'];
$rlrate12hr = $_POST['rlrate12hr'];
$rlrate4hr = $_POST['rlrate4hr'];
$rlrate5hr = $_POST['rlrate5hr'];
$rlrate8hr = $_POST['rlrate8hr'];

$rlcount = $_POST['rlcount'];
$rlavailable = $_POST['rlavailable'];
$rlgeomap = $_POST['rlgeomap'];

$blid = $_POST['blid'];
$blname = $_POST['blname'];
$blname = htmlspecialchars($blname, ENT_QUOTES);

$rtid = $_POST['rtid'];
$rtname = $_POST['rtname'];
$rtname = htmlspecialchars($rtname, ENT_QUOTES);

$rlpicture = $_POST['rlpicture'];
$rlpicture1 = $_POST['rlpicture1'];
$rlpicture2 = $_POST['rlpicture2'];
$rlpicture3 = $_POST['rlpicture3'];
$rlpicture4 = $_POST['rlpicture4'];
$rlpicture5 = $_POST['rlpicture5'];

$rlcategory1 = $_POST['rlcategory1'];
$rlcategory2 = $_POST['rlcategory2'];
$rlcategory3 = $_POST['rlcategory3'];
$rlcategory4 = $_POST['rlcategory4'];
$rlcategory5 = $_POST['rlcategory5'];

$rlroom_testimonial = $_POST['rlroom_testimonial'];
$rlroom_testimonial = str_replace('"', '&quot;', $rlroom_testimonial); 
$rlroom_testimonial = str_replace('\'', '&acute;', $rlroom_testimonial); 
$rlroom_testimonial = htmlspecialchars($rlroom_testimonial, ENT_QUOTES);

$rlgoldroom = $_POST['rlgoldroom'];

$rlactive = $_POST['rlactive'];

$rluser = $_SESSION['ulname'];
$rlstamp = $globaldatetime;

//echo "<br> rlid " . $rlid;

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
                    <h1 class="page-header">Room List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=room_list_dbase">
Back to Room List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Room Name</label>
		<br />
		<? 
		print("$rlname"); 
		 
//echo "<br> blkey " . $blkey;
//echo "<br> rlkey " . $rlkey;
//echo "<br> room_table " . $room_table;	 
		?>
	</div>
	
	<div class="form-group">
		<label>Main Picture</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload']['name'])
{
	$rlpicture = $_FILES['fileToUpload']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload']['tmp_name']); //rename file
		/*
		if($_FILES['fileToUpload']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}
		*/
		
		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/room/' . basename($_FILES['fileToUpload']['name']);
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
echo "Image Name : " . $rlpicture;
?>		
	</div>
	

	<div class="form-group">
		<label>Picture (1)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload1']['name'])
{
	$rlpicture1 = $_FILES['fileToUpload1']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload1']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload1']['tmp_name']); //rename file
		/*
		if($_FILES['fileToUpload1']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}
		*/
		
		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/room/' . basename($_FILES['fileToUpload1']['name']);
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
echo "Image Name : " . $rlpicture1;
?>		
	</div>	
	
	
	

	<div class="form-group">
		<label>Picture (2)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload2']['name'])
{
	$rlpicture2 = $_FILES['fileToUpload2']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload2']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload2']['tmp_name']); //rename file
		/*
		if($_FILES['fileToUpload2']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}
		*/
		
		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/room/' . basename($_FILES['fileToUpload2']['name']);
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
echo "Image Name : " . $rlpicture2;
?>		
	</div>		
	
	

	<div class="form-group">
		<label>Picture (3)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload3']['name'])
{
	$rlpicture3 = $_FILES['fileToUpload3']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload3']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload3']['tmp_name']); //rename file
		/*
		if($_FILES['fileToUpload3']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}
		*/
		
		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/room/' . basename($_FILES['fileToUpload3']['name']);
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
echo "Image Name : " . $rlpicture3;
?>		
	</div>	
	
	
	

	<div class="form-group">
		<label>Picture (4)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload4']['name'])
{
	$rlpicture4 = $_FILES['fileToUpload4']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload4']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload4']['tmp_name']); //rename file
		/*
		if($_FILES['fileToUpload4']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}
		*/

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/room/' . basename($_FILES['fileToUpload4']['name']);
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
echo "Image Name : " . $rlpicture4;
?>		
	</div>	
	
	

	<div class="form-group">
		<label>Picture (5)</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload5']['name'])
{
	$rlpicture5 = $_FILES['fileToUpload5']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload5']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload5']['tmp_name']); //rename file
		/*
		if($_FILES['fileToUpload5']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}
		*/

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = $currentdir .'/room/' . basename($_FILES['fileToUpload5']['name']);
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
echo "Image Name : " . $rlpicture5;
?>		
	</div>			
		

	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($rlid == 0) 
			{
				$query = 
"INSERT INTO room_list (
rlid,
rlname,
rlkey,
rldesc,

rlrate,
rlrate3hr,
rlrate6hr,
rlrate12hr,
rlrate4hr,
rlrate5hr,
rlrate8hr,

rlcount,
rlavailable,
rlgeomap,

blid,
rtid,

rlpicture,
rlpicture1,
rlpicture2,
rlpicture3,
rlpicture4,
rlpicture5,

rlcategory1,
rlcategory2,
rlcategory3,
rlcategory4,
rlcategory5,

rlroom_testimonial,
rlgoldroom,

rlactive,
rluser,
rlstamp
) 
VALUES 
(
'$rlid',
'$rlname',
'$rlkey',
'$rldesc',

'$rlrate',
'$rlrate3hr',
'$rlrate6hr',
'$rlrate12hr',
'$rlrate4hr',
'$rlrate5hr',
'$rlrate8hr',

'$rlcount',
'$rlavailable',
'$rlgeomap',

'$blid',
'$rtid',

'$rlpicture',
'$rlpicture1',
'$rlpicture2',
'$rlpicture3',
'$rlpicture4',
'$rlpicture5',

'$rlcategory1',
'$rlcategory2',
'$rlcategory3',
'$rlcategory4',
'$rlcategory5',

'$rlroom_testimonial',
'$rlgoldroom',

'$rlactive',
'$rluser',
'$rlstamp'
)";
				mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
				//mysql_query($query) or die(mysql_error());  
				
			}
			else
			{
				$query = 
"UPDATE 
room_list 
SET 
rlname = '$rlname',
rlkey = '$rlkey',
rldesc = '$rldesc',

rlrate = '$rlrate',
rlrate3hr = '$rlrate3hr',
rlrate6hr = '$rlrate6hr',
rlrate12hr = '$rlrate12hr',
rlrate4hr = '$rlrate4hr',
rlrate5hr = '$rlrate5hr',
rlrate8hr = '$rlrate8hr',

rlcount = '$rlcount',
rlavailable = '$rlavailable',
rlgeomap = '$rlgeomap',

blid = '$blid',
rtid = '$rtid',

rlpicture = '$rlpicture',
rlpicture1 = '$rlpicture1',
rlpicture2 = '$rlpicture2',
rlpicture3 = '$rlpicture3',
rlpicture4 = '$rlpicture4',
rlpicture5 = '$rlpicture5',

rlcategory1 = '$rlcategory1',
rlcategory2 = '$rlcategory2',
rlcategory3 = '$rlcategory3',
rlcategory4 = '$rlcategory4',
rlcategory5 = '$rlcategory5',

rlroom_testimonial = '$rlroom_testimonial',
rlgoldroom = '$rlgoldroom',

rlactive = '$rlactive',
rluser = '$rluser',
rlstamp = '$rlstamp'
WHERE
rlid = '$rlid'";
				mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
	
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
room_list 
WHERE
rlid = '$rlid' ";
			mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
		}
		

/*
		mysql_query($query) or die(mysql_error());  
*/
		?>				
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=room_list_dbase">  
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