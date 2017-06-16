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
				
		$cuid = 0;	
		if(isset($_GET['cuid']))
		{
			if ($_GET['cuid'])
			{
				$cuid = $_GET['cuid'];
			}
		}
		//echo '<br> cuid : ' . $cuid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$cuid = '';
$cuemail = '';
$cuname = '';
$cuhome = '';
$cubusiness = '';
$cumobile = '';
$cudealer = '';
$cumodel = '';
$cuplateno = '';

$curodate = date("m/d/y", strtotime($globaldate));
$curono = '';
$cumileage = '';
$curelease = date("m/d/y", strtotime($globaldate));

$cuaddr1 = '';
$cuaddr2 = '';
$cucity = '';
$custate = '';
$curemarks = '';

$cuactive = 'Y';
$cuuser = $_SESSION["ulname"];
$custamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM contact_us 
						   WHERE cuid='$cuid'";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$cuid = $row[cuid];
$cuemail = $row[cuemail];
$cuname = $row[cuname];
$cuhome = $row[cuhome];
$cubusiness = $row[cubusiness];
$cumobile = $row[cumobile];
$cudealer = $row[cudealer];
$cumodel = $row[cumodel];
$cuplateno = $row[cuplateno];

$curodate = $row[curodate];
if ($curodate != '')
{
	$curodate =  date("m/d/y", strtotime($curodate));
}

$curono = $row[curono];
$cumileage = $row[cumileage];

$curelease = $row[curelease];
if ($curelease != '')
{
	$curelease =  date("m/d/y", strtotime($curelease));
}

$cuaddr1 = $row[cuaddr1];
$cuaddr2 = $row[cuaddr2];
$cucity = $row[cucity];
$custate = $row[custate];
$curemarks = $row[curemarks];

$cuactive = $row[cuactive];
$cuuser = $row[cuuser];
$custamp = $row[custamp];
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
                    <h1 class="page-header">Contact Us List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=contact_us_dbase">
Back to Contact Us List
</a>	

<?php
//echo "<br> cuid " . $cuid;
//echo "<br> cuemail " . $cuemail;
?>
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
<form role="form" method="post" action="index.php?body=contact_us_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&cuid=<?php print($cuid); ?>">

	<div class="form-group">
		<label>Contact Us Code</label>
		<input class="form-control" name="cuemail"  value="<?php print ("$cuemail"); ?>"  maxlength="20" >
	</div>
	<div class="form-group">
		<label>Contact Us Name</label>
		<input class="form-control" name="cuname"  value="<?php print ("$cuname"); ?>"  maxlength="100" >
	</div>
	
	<div class="form-group">
		<label>Home Telephone No.</label>
		<input class="form-control" name="cuhome"  value="<?php print ("$cuhome"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Business Phone No.</label>
		<input class="form-control" name="cubusiness"  value="<?php print ("$cubusiness"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Mobile No.</label>
		<input class="form-control" name="cumobile"  value="<?php print ("$cumobile"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Dealer Code</label>
		<input class="form-control" name="cudealer"  value="<?php print ("$cudealer"); ?>"   maxlength="50" >
	</div>	
	<div class="form-group">
		<label>Model</label>
		<input class="form-control" name="cumodel" value="<?php print ("$cumodel"); ?>"   maxlength="50">
	</div>	
	<div class="form-group">
		<label>Plate No.</label>
		<input class="form-control" name="cuplateno" value="<?php print ("$cuplateno"); ?>"   maxlength="50">
	</div>	
	
	<div class="form-group">
		<label>OR Date</label>
		<input class="form-control" name="curodate"  value="<?php print ("$curodate"); ?>"   maxlength="50" >
	</div>	
	<div class="form-group">
		<label>OR No.</label>
		<input class="form-control" name="curono" value="<?php print ("$curono"); ?>"   maxlength="50">
	</div>	
	<div class="form-group">
		<label>Mileage.</label>
		<input class="form-control" name="cumileage" value="<?php print ("$cumileage"); ?>"   maxlength="50">
	</div>		
	<div class="form-group">
		<label>Release.</label>
		<input class="form-control" name="curelease" value="<?php print ("$curelease"); ?>"   maxlength="50">
	</div>		

	<div class="form-group">
		<label>Address (1)</label>
		<input class="form-control" name="cuaddr1"  value="<?php print ("$cuaddr1"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Address (2)</label>
		<input class="form-control" name="cuaddr2"  value="<?php print ("$cuaddr2"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>City</label>
		<input class="form-control" name="cucity"  value="<?php print ("$cucity"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>State</label>
		<input class="form-control" name="custate"  value="<?php print ("$custate"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='cuactive'>
			<option><?php print ("$cuactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$cuuser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$custamp"); ?>
	</div>
						
	<input type="hidden" name="cuid" value="<?php print ("$cuid"); ?>" />
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
<form role="form" method="post" action="index.php?body=contact_us_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&cuid=<?php print($cuid); ?>">
	<div class="form-group">
		<label>Contact Us Name</label>
		<br>
		<?php print ("$cuname"); ?>
	</div>
	<input type="hidden" name="cuid" value="<?php print ("$cuid"); ?>" />
	<input type="hidden" name="cuname" value="<?php print ("$cuname"); ?>" />
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
$cuid = $_POST['cuid'];
$cuemail = $_POST['cuemail'];
$cuemail = htmlspecialchars($cuemail, ENT_QUOTES);
$cuname = $_POST['cuname'];
$cuname = htmlspecialchars($cuname, ENT_QUOTES);
$cuhome = $_POST['cuhome'];
$cuhome = htmlspecialchars($cuhome, ENT_QUOTES);
$cubusiness = $_POST['cubusiness'];
$cubusiness = htmlspecialchars($cubusiness, ENT_QUOTES);
$cumobile = $_POST['cumobile'];
$cumobile = htmlspecialchars($cumobile, ENT_QUOTES);
$cudealer = $_POST['cudealer'];
$cudealer = htmlspecialchars($cudealer, ENT_QUOTES);
$cumodel = $_POST['cumodel'];
$cumodel = htmlspecialchars($cumodel, ENT_QUOTES);
$cuplateno = $_POST['cuplateno'];
$cuplateno = htmlspecialchars($cuplateno, ENT_QUOTES);

$curodate = $_POST['curodate'];
if ($curodate != '')
{
	$curodate = date("Y-m-d", strtotime($curodate));
}

$curono = $_POST['curono'];
$cumileage = $_POST['cumileage'];

$curelease = $_POST['curelease'];
if ($curelease != '')
{
	$curelease = date("Y-m-d", strtotime($curelease));
}

$cuaddr1 = $_POST['cuaddr1'];
$cuaddr1 = htmlspecialchars($cuaddr1, ENT_QUOTES);
$cuaddr2 = $_POST['cuaddr2'];
$cuaddr2 = htmlspecialchars($cuaddr2, ENT_QUOTES);
$cucity = $_POST['cucity'];
$cucity = htmlspecialchars($cucity, ENT_QUOTES);
$custate = $_POST['custate'];
$custate = htmlspecialchars($custate, ENT_QUOTES);
$curemarks = $_POST['curemarks'];
$curemarks = htmlspecialchars($curemarks, ENT_QUOTES);

$cuactive = $_POST['cuactive'];
$cuuser = $_SESSION["ulname"];
$custamp = $globaldatetime;

//echo "<br> cuid " . $cuid;

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
                    <h1 class="page-header">Contact Us List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=contact_us_dbase">
Back to Contact Us List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Contact Us Name</label>
		<br />
		 <? print("$cuname"); ?>
	</div>
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($cuid == 0) 
			{
$query = 
"INSERT INTO contact_us (
cuid,
cuemail,
cuname,
cuhome,
cubusiness,
cumobile,
cudealer,
cumodel,
cuplateno,

curodate,
curono,
cumileage,
curelease,
cucallback,

cuaddr1,
cuaddr2,
cucity,
custate,
curemarks,

cuactive,
cuuser,
custamp
) 
VALUES 
(
'$cuid',
'$cuemail',
'$cuname',
'$cuhome',
'$cubusiness',
'$cumobile',
'$cudealer',
'$cumodel',
'$cuplateno',

'$curodate',
'$curono',
'$cumileage',
'$curelease',
'$cucallback',

'$cuaddr1',
'$cuaddr2',
'$cucity',
'$custate',
'$curemarks',

'$cuactive',
'$cuuser',
'$custamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
contact_us 
SET 
cuid = '$cuid',
cuemail = '$cuemail',
cuname = '$cuname',
cuhome = '$cuhome',
cubusiness = '$cubusiness',
cumobile = '$cumobile',
cudealer = '$cudealer',
cumodel = '$cumodel',
cuplateno = '$cuplateno',

curodate = '$curodate',
curono = '$curono',
cumileage = '$cumileage',
curelease = '$curelease',
cucallback = '$cucallback',

cuaddr1 = '$cuaddr1',
cuaddr2 = '$cuaddr2',
cucity = '$cucity',
custate = '$custate',
curemarks = '$curemarks',

cuactive = '$cuactive',
cuuser = '$cuuser',
custamp = '$custamp'
WHERE
cuid = '$cuid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
contact_us 
WHERE
cuid = '$cuid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  

/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=contact_us_dbase">  
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