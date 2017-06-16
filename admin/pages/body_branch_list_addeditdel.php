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
				
		$blid = 0;	
		if(isset($_GET['blid']))
		{
			if ($_GET['blid'])
			{
				$blid = $_GET['blid'];
			}
		}
		//echo '<br> blid : ' . $blid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$blid = '';
$blname = '';
$blcode = '';
$blkey = '';
$blkey_old = '';
$bladdr = '';
$blmap = '';
$blphone = '';
$blfax = '';
$blemail = '';
$blmobile = '';

$blfacebook = '';
$bltwitter = '';

$blactive = 'Y';
$bluser = $_SESSION["ulname"];
$blstamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM branch_list 
						   WHERE blid='$blid'";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$blid = $row[blid];
$blname = $row[blname];
$blcode = $row[blcode];
$blkey = $row[blkey];
$blkey_old = $row[blkey];
$bladdr = $row[bladdr];
$blmap = $row[blmap];
$blphone = $row[blphone];
$blfax = $row[blfax];
$blemail = $row[blemail];
$blmobile = $row[blmobile];

$blfacebook = $row[blfacebook];
$bltwitter = $row[bltwitter];

$blactive = $row[blactive];
$bluser = $row[bluser];
$blstamp = $row[blstamp];
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
                    <h1 class="page-header">Branches List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=branch_list_dbase">
Back to Branches List
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
<form role="form" method="post" action="index.php?body=branch_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&blid=<?php print($blid); ?>">
	
	<div class="form-group">
		<label>Branch Name</label>
		<input class="form-control" placeholder="Enter branch name" name="blname"  value="<?php print ("$blname"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Short Name</label>
		<input class="form-control" placeholder="Enter a short name for the branch" name="blcode"  value="<?php print ("$blcode"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Locale Code (e.g. HVMA , VCGP, Panorama, HillCrest)</label>
		<input class="form-control" placeholder="Enter the branch local used" name="blkey"  value="<?php print ("$blkey"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Address</label>
		<textarea class="form-control" rows="4" name="bladdr" ><?php print("$bladdr"); ?></textarea>	
	</div>
	<div class="form-group">
		<label>Telephone</label>
		<input class="form-control" placeholder="Enter telephone" name="blphone"  value="<?php print ("$blphone"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Fax No.</label>
		<input class="form-control" placeholder="Enter fax number" name="blfax"  value="<?php print ("$blfax"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Mobile No.</label>
		<input class="form-control" placeholder="Enter mobile #" name="blmobile"  value="<?php print ("$blmobile"); ?>"  maxlength="50" >
	</div>
	<div class="form-group">
		<label>Email</label>
		<input class="form-control" type="email" placeholder="Enter email" name="blemail"  value="<?php print ("$blemail"); ?>"   maxlength="50" >
	</div>	

	<div class="form-group">
		<label>Geo Map</label>
		<textarea class="form-control" rows="4" name="blmap" ><?php print("$blmap"); ?></textarea>	
	</div>

	<div class="form-group">
		<label>Facebook Link</label>
		<input class="form-control" type="email" placeholder="Enter facebook account" name="blfacebook"  value="<?php print ("$blfacebook"); ?>"   maxlength="50" >
	</div>	
	<div class="form-group">
		<label>Twitter Link</label>
		<input class="form-control" type="email" placeholder="Enter twitter account" name="bltwitter"  value="<?php print ("$bltwitter"); ?>"   maxlength="50" >
	</div>	
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='blactive'>
			<option><?php print ("$blactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>		
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$bluser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$blstamp"); ?>
	</div>
				
	<input type="hidden" name="blid" value="<?php print ("$blid"); ?>" />
	<input type="hidden" name="blkey_old" value="<?php print ("$blkey_old"); ?>" />
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
<form role="form" method="post" action="index.php?body=branch_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&blid=<?php print($blid); ?>">
	<div class="form-group">
		<label>Branch Name</label>
		<br>
		<?php print ("$blname"); ?>
	</div>
	<input type="hidden" name="blid" value="<?php print ("$blid"); ?>" />
	<input type="hidden" name="blname" value="<?php print ("$blname"); ?>" />
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
$blid = $_POST['blid'];
$blname = $_POST['blname'];
$blname = htmlspecialchars($blname, ENT_QUOTES);
$blcode = $_POST['blcode'];
$blcode = htmlspecialchars($blcode, ENT_QUOTES);
$blkey = $_POST['blkey'];
$blkey_old = $_POST['blkey_old'];

$bladdr = $_POST['bladdr'];
$bladdr = str_replace('"', '&quot;', $bladdr); 
$bladdr = str_replace('\'', '&acute;', $bladdr); 
$bladdr = htmlspecialchars($bladdr, ENT_QUOTES);

$blmap = $_POST['blmap'];
$blphone = $_POST['blphone'];
$blfax = $_POST['blfax'];
$blemail = $_POST['blemail'];
$blmobile = $_POST['blmobile'];

$blfacebook = $_POST['blfacebook'];
$bltwitter = $_POST['bltwitter'];

$blactive = $_POST['blactive'];
$bluser = $_SESSION["ulname"];
$blstamp = $globaldatetime;

//echo "<br> blid " . $blid;

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
                    <h1 class="page-header">Branches List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=branch_list_dbase">
Back to Branches List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Branch Name</label>
		<br />
		 <? print("$blname"); ?>
	</div>
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($blid == 0) 
			{
$query = 
"INSERT INTO branch_list (
blid,
blname,
blcode,
blkey,
bladdr,
blmap,
blphone,
blfax,
blemail,
blmobile,

blfacebook,
bltwitter,

blactive,
bluser,
blstamp
) 
VALUES 
(
'$blid',
'$blname',
'$blcode',
'$blkey',
'$bladdr',
'$blmap',
'$blphone',
'$blfax',
'$blemail',
'$blmobile',

'$blfacebook',
'$bltwitter',

'$blactive',
'$bluser',
'$blstamp'
)";
				mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');     

			}
			else
			{
				$query = 
"UPDATE 
branch_list 
SET 
blname = '$blname',
blcode = '$blcode',
blkey = '$blkey',
bladdr = '$bladdr',
blmap = '$blmap',
blphone = '$blphone',
blfax = '$blfax',
blemail = '$blemail',
blmobile = '$blmobile',

blfacebook = '$blfacebook',
bltwitter = '$bltwitter',

blactive = '$blactive',
bluser = '$bluser',
blstamp = '$blstamp'
WHERE
blid = '$blid'";
				mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');     
						
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
branch_list 
WHERE
blid = '$blid'";
			mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');     			
		}
		

/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=branch_list_dbase">  
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