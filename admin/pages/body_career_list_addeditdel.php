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
				
		$clid = 0;	
		if(isset($_GET['clid']))
		{
			if ($_GET['clid'])
			{
				$clid = $_GET['clid'];
			}
		}
		//echo '<br> clid : ' . $clid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$clid = 0;
$cldate = $globaldate;
$clvacancy = '';
$clname = '';
$cldesc = '';

$blid = '';
$blname = '';

$clactive = 'Y';
$cluser = $_SESSION["ulname"];
$clstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM career_list a, branch_list b
						   WHERE a.blid = b.blid and 
						         a.clid='$clid' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$clid = $row[clid];
$cldate = $row[cldate];

if ($cldate == '')
	$cldate = $globaldate;

$clvacancy = $row[clvacancy];
$clname = $row[clname];
$cldesc = $row[cldesc];

$blid = $row[blid];
$blname = $row[blname];

$clactive = $row[clactive];
$cluser = $row[cluser];
$clstamp = $row[clstamp];
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
                    <h1 class="page-header">Career List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=career_list_dbase">
Back to Career List
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
<form role="form" method="post" action="index.php?body=career_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&clid=<?php print($clid); ?>" enctype="multipart/form-data">

	<div class="form-group">
		<label>Date</label>
		<input class="form-control" name="cldate"  value="<?php print ("$cldate"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Branch</label>
<?php 
	echo "<select class=\"form-control\" name=\"blid\" > ";	
	
	if ($clname != '') 
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
		<label>Position</label>
		<input class="form-control" name="clname"  value="<?php print ("$clname"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Vacancy</label>
		<input class="form-control" name="clvacancy"  value="<?php print ("$clvacancy"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Description</label>
		<textarea class="form-control" rows="4" name="cldesc" ><?php print("$cldesc"); ?></textarea>	
	</div>

	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='clactive'>
			<option><?php print ("$clactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$cluser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$clstamp"); ?>
	</div>
						
	<input type="hidden" name="clid" value="<?php print ("$clid"); ?>" />
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
<form role="form" method="post" action="index.php?body=career_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&clid=<?php print($clid); ?>">
	<div class="form-group">
		<label>Branch </label>
		<br>
		<?php print ("$blname"); ?>
	</div>
	<div class="form-group">
		<label>Position</label>
		<br>
		<?php print ("$clname"); ?>
	</div>
	<input type="hidden" name="clid" value="<?php print ("$clid"); ?>" />
	<input type="hidden" name="clname" value="<?php print ("$clname"); ?>" />
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
$clid = $_POST['clid'];
$cldate = $_POST['cldate'];

$clvacancy = $_POST['clvacancy'];
$clvacancy = htmlspecialchars($clvacancy, ENT_QUOTES);

$clname = $_POST['clname'];
$clname = htmlspecialchars($clname, ENT_QUOTES);

$cldesc = $_POST['cldesc'];
$cldesc = str_replace('"', '&quot;', $cldesc); 
$cldesc = str_replace('\'', '&acute;', $cldesc); 
$cldesc = htmlspecialchars($cldesc, ENT_QUOTES);

$blid = $_POST['blid'];

$clactive = $_POST['clactive'];

$cluser = $_SESSION['ulname'];
$clstamp = $globaldatetime;

//echo "<br> clid " . $clid;

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
                    <h1 class="page-header">Career List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=career_list_dbase">
Back to Career List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Position</label>
		<br />
		 <? print("$clname"); ?>
	</div>
	
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($clid == 0) 
			{
$query = 
"INSERT INTO career_list (
clid,
cldate,
clname,
clvacancy,
cldesc,

blid,

clactive,
cluser,
clstamp
) 
VALUES 
(
'$clid',
'$cldate',
'$clname',
'$clvacancy',
'$cldesc',

'$blid',

'$clactive',
'$cluser',
'$clstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
career_list 
SET 
cldate = '$cldate',
clname = '$clname',
clvacancy = '$clvacancy',
cldesc = '$cldesc',

blid = '$blid',

clactive = '$clactive',
cluser = '$cluser',
clstamp = '$clstamp'
WHERE
clid = '$clid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = "DELETE FROM career_applicants WHERE clid = '$clid'";
			mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  

			$query = "DELETE FROM career_list WHERE clid = '$clid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  

/*
		mysql_query($query) or die(mysql_error());  
*/
		?>				
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=career_list_dbase">  
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