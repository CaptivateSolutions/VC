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
				
		$tlid = 0;	
		if(isset($_GET['tlid']))
		{
			if ($_GET['tlid'])
			{
				$tlid = $_GET['tlid'];
			}
		}
		//echo '<br> tlid : ' . $tlid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$tlid = '';
$tldate = $globaldate;
$tlname = '';
$tldesc = '';

$tlactive = 'Y';
$tluser = $_SESSION["ulname"];
$tlstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM testimonial_list 
						   WHERE tlid='$tlid'";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$tlid = $row[tlid];
$tldate = $row[tldate];

if ($tldate == '')
	$tldate = $globaldate;
	
$tlname = $row[tlname];
$tldesc = $row[tldesc];

$tlactive = $row[tlactive];
$tluser = $row[tluser];
$tlstamp = $row[tlstamp];
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
                    <h1 class="page-header">Testimonial List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=testimonial_list_dbase">
Back to Testimonial List
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
<form role="form" method="post" action="index.php?body=testimonial_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&tlid=<?php print($tlid); ?>">
	
	<div class="form-group">
		<label>Date</label>
		<input class="form-control" name="tldate"  value="<?php print ("$tldate"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Testimonial Name</label>
		<input class="form-control" placeholder="Enter Testimonial name" name="tlname"  value="<?php print ("$tlname"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Message</label>
		<textarea class="form-control" rows="4" name="tldesc" ><?php print("$tldesc"); ?></textarea>	
	</div>
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='tlactive'>
			<option><?php print ("$tlactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>		
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$tluser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$tlstamp"); ?>
	</div>
						
	<input type="hidden" name="tlid" value="<?php print ("$tlid"); ?>" />
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
<form role="form" method="post" action="index.php?body=testimonial_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&tlid=<?php print($tlid); ?>">
	<div class="form-group">
		<label>Testimonial Name</label>
		<br>
		<?php print ("$tlname"); ?>
	</div>
	<input type="hidden" name="tlid" value="<?php print ("$tlid"); ?>" />
	<input type="hidden" name="tlname" value="<?php print ("$tlname"); ?>" />
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
$tlid = $_POST['tlid'];
$tldate = $_POST['tldate'];
$tlname = $_POST['tlname'];
$tlname = htmlspecialchars($tlname, ENT_QUOTES);

$tldesc = $_POST['tldesc'];
$tldesc = str_replace('"', '&quot;', $tldesc); 
$tldesc = str_replace('\'', '&acute;', $tldesc); 
$tldesc = htmlspecialchars($tldesc, ENT_QUOTES);

$tlactive = $_POST['tlactive'];
$tluser = $_SESSION["ulname"];
$tlstamp = $globaldatetime;

//echo "<br> tlid " . $tlid;

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
                    <h1 class="page-header">Testimonial List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=testimonial_list_dbase">
Back to Testimonial List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Testimonial Name</label>
		<br />
		 <? print("$tlname"); ?>
	</div>
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($tlid == 0) 
			{
$query = 
"INSERT INTO testimonial_list (
tlid,
tldate,
tlname,
tldesc,

tlactive,
tluser,
tlstamp
) 
VALUES 
(
'$tlid',
'$tldate',
'$tlname',
'$tldesc',

'$tlactive',
'$tluser',
'$tlstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
testimonial_list 
SET 
tldate = '$tldate',
tlname = '$tlname',
tldesc = '$tldesc',

tlactive = '$tlactive',
tluser = '$tluser',
tlstamp = '$tlstamp'
WHERE
tlid = '$tlid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
testimonial_list 
WHERE
tlid = '$tlid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');     

/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=testimonial_list_dbase">  
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