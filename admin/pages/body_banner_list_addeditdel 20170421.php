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
				
		$baid = 0;	
		if(isset($_GET['baid']))
		{
			if ($_GET['baid'])
			{
				$baid = $_GET['baid'];
			}
		}
		//echo '<br> baid : ' . $baid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$baid = 0;
$baorder = 0;
$baname = '';
$bafile = '';
$baurl = '';
$bapicture = '';

$blid = '';
$blname = '';

$baactive = 'Y';
$bauser = $_SESSION["ulname"];
$bastamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM banner_list a, branch_list b
						   WHERE a.blid = b.blid and baid='$baid' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$baid = $row[baid];
$baorder = $row[baorder];
$baname = $row[baname];
$bafile = $row[bafile];
$baurl = $row[baurl];
$bapicture = $row[bapicture];

$blid = $row[blid];
$blname = $row[blname];

$baactive = $row[baactive];
$bauser = $row[bauser];
$bastamp = $row[bastamp];
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
                    <h1 class="page-header">Banner List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=banner_list_dbase">
Back to Banner List
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
<form role="form" method="post" action="index.php?body=banner_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&baid=<?php print($baid); ?>" enctype="multipart/form-data">

	
	<div class="form-group">
		<label>Order By</label>
		<input class="form-control" name="baorder"  value="<?php print ("$baorder"); ?>"  maxlength="50" >
	</div>	

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
		<label>Banner Name</label>
		<input class="form-control" name="baname"  value="<?php print ("$baname"); ?>"  maxlength="50" >
	</div>
	
	<!--
	<div class="form-group">
		<label>File</label>
		<input class="form-control" name="bafile"  value="<?php print ("$bafile"); ?>"  maxlength="50" >
	</div>
	-->
	
	<div class="form-group">
		<label>Web URL (http://)</label>
		<input class="form-control" type="text" name="baurl"  value="<?php print ("$baurl"); ?>"   maxlength="50" >
	</div>	
	
	<div class="form-group">
		<label>Picture (300 x 300 pixels)</label>
		<input class="form-control" type="text" name="bapicture" value="<?php print("$bapicture"); ?>" /> 
		<br>
		<input type="file" name="fileToUpload" id="fileToUpload">		
	</div>		
	
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='baactive'>
			<option><?php print ("$baactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$bauser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$bastamp"); ?>
	</div>
						
	<input type="hidden" name="baid" value="<?php print ("$baid"); ?>" />
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
<form role="form" method="post" action="index.php?body=banner_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&baid=<?php print($baid); ?>">
	<div class="form-group">
		<label>Banner Name</label>
		<br>
		<?php print ("$baname"); ?>
	</div>
	<input type="hidden" name="baid" value="<?php print ("$baid"); ?>" />
	<input type="hidden" name="baname" value="<?php print ("$baname"); ?>" />
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
$baid = $_POST['baid'];
$baorder = $_POST['baorder'];

$baname = $_POST['baname'];
$baname = htmlspecialchars($baname, ENT_QUOTES);

$bafile = $_POST['bafile'];
$baurl = $_POST['baurl'];
$bapicture = $_POST['bapicture'];

$blid = $_POST['blid'];

$blname = $_POST['blname'];
$blname = htmlspecialchars($blname, ENT_QUOTES);

$baactive = $_POST['baactive'];
$bauser = $_SESSION["ulname"];
$bastamp = $globaldatetime;

//echo "<br> baid " . $baid;

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
                    <h1 class="page-header">Banner List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=banner_list_dbase">
Back to Banner List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Banner Name</label>
		<br />
		 <? print("$baname"); ?>
	</div>
	
	<div class="form-group">
		<label>Picture</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload']['name'])
{
	$bapicture = $_FILES['fileToUpload']['name'];	
	
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
			$target = $currentdir .'/banner/' . basename($_FILES['fileToUpload']['name']);
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
echo "Image Name : " . $bapicture;
?>		
	</div>
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($baid == 0) 
			{
$query = 
"INSERT INTO banner_list (
baid,
baorder,
baname,
bafile,
baurl,
bapicture,

blid,

baactive,
bauser,
bastamp
) 
VALUES 
(
'$baid',
'$baorder',
'$baname',
'$bafile',
'$baurl',
'$bapicture',

'$blid',

'$baactive',
'$bauser',
'$bastamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
banner_list 
SET 
baorder = '$baorder',
baname = '$baname',
bafile = '$bafile',
baurl = '$baurl',
bapicture = '$bapicture',

blid = '$blid',

baactive = '$baactive',
bauser = '$bauser',
bastamp = '$bastamp'
WHERE
baid = '$baid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
banner_list 
WHERE
baid = '$baid'";
		}
		
		mysql_query($query) or die(mysql_error());  

/*
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
*/
		?>				
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=banner_list_dbase">  
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