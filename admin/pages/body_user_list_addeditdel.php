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
				
		$ulid = 0;	
		if(isset($_GET['ulid']))
		{
			if ($_GET['ulid'])
			{
				$ulid = $_GET['ulid'];
			}
		}
		//echo '<br> ulid : ' . $ulid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$ulid = 0;
$ulcode = '';
$ulpass = '';
$ulname = '';
$uladdr = '';
$ulphone = '';
$ulemail = '';
$ulmobile = '';
$ulpicture = '';

$uladmin = 'N';

$blid = '';
$blname = '';

$plid = '';
$plname = '';

$ulactive = 'Y';
$uluser = $_SESSION["ulname"];
$ulstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM user_list a, branch_list b, pos_list c
						   WHERE a.blid = b.blid and a.plid = c.plid and ulid='$ulid' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$ulid = $row[ulid];
$ulcode = $row[ulcode];

$ulpass = $row[ulpass];
$ulpass = base64_decode ($ulpass);
$ulpass = substr($ulpass, 2, 100);

$ulname = $row[ulname];
$ulname = htmlspecialchars($ulname, ENT_QUOTES);
$uladdr = $row[uladdr];
$uladdr = htmlspecialchars($uladdr, ENT_QUOTES);
$ulphone = $row[ulphone];
$ulphone = htmlspecialchars($ulphone, ENT_QUOTES);
$ulemail = $row[ulemail];
$ulemail = htmlspecialchars($ulemail, ENT_QUOTES);
$ulmobile = $row[ulmobile];
$ulmobile = htmlspecialchars($ulmobile, ENT_QUOTES);
$ulpicture = $row[ulpicture];

$uladmin = $row[uladmin];

$blid = $row[blid];
$blname = $row[blname];
$blname = htmlspecialchars($blname, ENT_QUOTES);

$plid = $row[plid];
$plname = $row[plname];
$plname = htmlspecialchars($plname, ENT_QUOTES);

$ulactive = $row[ulactive];
$uluser = $row[uluser];
$ulstamp = $row[ulstamp];
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
                    <h1 class="page-header">User List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=user_list_dbase">
Back to User List
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
<form role="form" method="post" action="index.php?body=user_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&ulid=<?php print($ulid); ?>" enctype="multipart/form-data">


	<div class="form-group">
		<label>Branch</label>
<?php 
	echo "<select class=\"form-control\" name=\"blid\" > ";	
	
	if ($blname != '') 
	{
		echo "<option value='" . $blid .  "'>" . $blname . "</option>";
	}
	else
	{
		echo "<option></option>";
	}
	
	$query = "SELECT a.blid, a.blname 
			  FROM branch_list a
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
		<label>Position</label>
<?php 
	echo "<select class=\"form-control\" name=\"plid\" > ";	
	
	if ($blname != '') 
	{
		echo "<option value='" . $plid .  "'>" . $plname . "</option>";
	}
	else
	{
		echo "<option></option>";
	}
	
	$query = "SELECT a.plid, a.plname 
			  FROM pos_list a
			  ORDER BY plname"; //Populate Vendor Dropdown
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
		<label>User Name</label>
		<input class="form-control" placeholder="Enter User name" name="ulname"  value="<?php print ("$ulname"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>User Code</label>
		<input class="form-control" placeholder="Enter User code" name="ulcode"  value="<?php print ("$ulcode"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Password</label>
<?php
/*
$ulpass = '2kdowkdo22' . $ulpass;
echo "<br> ulpass " . $ulpass;

$mytemp = base64_encode ($ulpass);
echo "<br> encode " . $mytemp;

$mytemp = base64_decode ($mytemp);
echo "<br> decode " . $mytemp;

$ulpass = substr($mytemp, 10, 100);
echo "<br> ulpass [" . $ulpass . "]";
*/
?>

		<input class="form-control" placeholder="Enter password" name="ulpass"  value="<?php print ("$ulpass"); ?>"  maxlength="50" >
	</div>
			
	<div class="form-group">
		<label>Address</label>
		<textarea class="form-control" rows="4" name="uladdr" ><?php print("$uladdr"); ?></textarea>	
	</div>
	<div class="form-group">
		<label>Telephone</label>
		<input class="form-control" placeholder="Enter telephone" name="ulphone"  value="<?php print ("$ulphone"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Mobile No.</label>
		<input class="form-control" placeholder="Enter mobile #" name="ulmobile"  value="<?php print ("$ulmobile"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Email</label>
		<input class="form-control" type="email" placeholder="Enter text" name="ulemail"  value="<?php print ("$ulemail"); ?>"   maxlength="50" >
	</div>	

	<div class="form-group">
		<label>Is Admin?</label>
		<select class="form-control" name='uladmin'>
			<option><?php print ("$uladmin"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>		
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='ulactive'>
			<option><?php print ("$ulactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	
	<div class="form-group">
		<label>Picture (300 x 300 pixels)</label>
		<input class="form-control" type="text" name="ulpicture" value="<?php print("$ulpicture"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload" id="fileToUpload">		
	</div>		
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$uluser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$ulstamp"); ?>
	</div>
						
	<input type="hidden" name="ulid" value="<?php print ("$ulid"); ?>" />
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
<form role="form" method="post" action="index.php?body=user_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&ulid=<?php print($ulid); ?>">
	<div class="form-group">
		<label>User Name</label>
		<br>
		<?php print ("$ulname"); ?>
	</div>
	<input type="hidden" name="ulid" value="<?php print ("$ulid"); ?>" />
	<input type="hidden" name="ulname" value="<?php print ("$ulname"); ?>" />
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
$ulid = $_POST['ulid'];
$ulcode = $_POST['ulcode'];

$ulpass = $my_hash_key_secret . $_POST['ulpass'];
$ulpass = base64_encode ($ulpass);

$ulname = $_POST['ulname'];

$uladdr = $_POST['uladdr'];
$uladdr = str_replace('"', '&quot;', $uladdr); 
$uladdr = str_replace('\'', '&acute;', $uladdr); 

$ulphone = $_POST['ulphone'];
$ulemail = $_POST['ulemail'];
$ulmobile = $_POST['ulmobile'];
$ulpicture = $_POST['ulpicture'];

$uladmin = $_POST['uladmin'];

$blid = $_POST['blid'];
$blname = $_POST['blname'];

$plid = $_POST['plid'];
$plname = $_POST['plname'];

$ulactive = $_POST['ulactive'];
$uluser = $_SESSION["ulname"];
$ulstamp = $globaldatetime;

//echo "<br> ulid " . $ulid;

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
                    <h1 class="page-header">User List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=user_list_dbase">
Back to User List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>User Name</label>
		<br />
		 <? print("$ulname"); ?>
	</div>
	
	<div class="form-group">
		<label>Picture</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload']['name'])
{
	$ulpicture = $_FILES['fileToUpload']['name'];	
	
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
			$target = $currentdir .'/picture/' . basename($_FILES['fileToUpload']['name']);
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
echo "Image Name : " . $ulpicture;
?>		
	</div>
	
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($ulid == 0) 
			{
$query = 
"INSERT INTO user_list (
ulid,
ulcode,
ulpass,
ulname,
uladdr,
ulphone,
ulemail,
ulmobile,
ulpicture,

uladmin,

blid,
plid,

ulactive,
uluser,
ulstamp
) 
VALUES 
(
'$ulid',
'$ulcode',
'$ulpass',
'$ulname',
'$uladdr',
'$ulphone',
'$ulemail',
'$ulmobile',
'$ulpicture',

'$uladmin',

'$blid',
'$plid',

'$ulactive',
'$uluser',
'$ulstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
user_list 
SET 
ulid = '$ulid',
ulcode = '$ulcode',
ulpass = '$ulpass',
ulname = '$ulname',
uladdr = '$uladdr',
ulphone = '$ulphone',
ulemail = '$ulemail',
ulmobile = '$ulmobile',
ulpicture = '$ulpicture',

uladmin = '$uladmin',

blid = '$blid',
plid = '$plid',

ulactive = '$ulactive',
uluser = '$uluser',
ulstamp = '$ulstamp'
WHERE
ulid = '$ulid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
user_list 
WHERE
ulid = '$ulid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  

/*
*/
		?>				
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=user_list_dbase">  
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