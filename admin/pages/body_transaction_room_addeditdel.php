<?php
	$myadmin = 'N';
	if(isset($_SESSION['myadmin']))
		$myadmin = $_SESSION['myadmin'];	


	$myid = '';
	$myid = $_POST["tlid"];	
	
	if(isset($_GET['tlid']))
	{
		if ($_GET['tlid'])
		{
			$myid = $_GET['tlid'];
		}
	}	
	//echo "<br>ssssssssssssssssssssssssssssssssssssssssssssssssssssssssss myid " . $myid;
	
	$mydocno = '';
	$mydocno = $_POST["tldocno"];	
	
	if(isset($_GET['tldocno']))
	{
		if ($_GET['tldocno'])
		{
			$mydocno = $_GET['tldocno'];
		}
	}	
	//echo "<br>ssssssssssssssssssssssssssssssssssssssssssssssssssssssssss mydocno " . $mydocno;
	
	$mysession = '';
	$mysession = $_POST["tlsession"];	
	
	if(isset($_GET['tlsession']))
	{
		if ($_GET['tlsession'])
		{
			$mysession = $_GET['tlsession'];
		}
	}	
	//echo "<br>ssssssssssssssssssssssssssssssssssssssssssssssssssssssssss mysession " . $mysession;


	//if already registred
	//as a universal variable	
	if (($myid != '') && ($mydocno != '') && ($mysession != ''))
	{
		//if the keys are supplied,
		//no need to go to the SESSION	
	}
	else
	{
		$zzz_tlid = $_SESSION[tlid];
		if ($zzz_tlid != '')
		{
			$myid = $_SESSION[tlid];
			$mydocno = $_SESSION[tldocno];
			$mysession = $_SESSION[tlsession];
		}
	}
	
	$tlid = 0;
	if (($myid != '') && ($mydocno != '') && ($mysession != ''))
	{
		//verify if the 3 produces an actual ID
		$query_id = " 
		SELECT *
		FROM transaction_list a
		WHERE 
			a.tlid = '$myid' and
			a.tldocno = '$mydocno' and
			a.tlsession = '$mysession' ";
		$result_id = mysql_query($query_id);
		echo mysql_error();				
		while ($row_id =  mysql_fetch_array ($result_id)) 
		{
			$tlid = $row_id[tlid];
			$tldate = $row_id[tldate];
			$tldocno = $row_id[tldocno];
			$tlsession = $row_id[tlsession];
			
			$tlname = $row_id[tlname];
			$tlemail = $row_id[tlemail];
			$tlphone = $row_id[tlphone];
			$tlmobile = $row_id[tlmobile];
			
			$tlroom = $row_id[tlroom];
			$tladdon = $row_id[tladdon];
			$tlpromo = $row_id[tlpromo];
			$tlamt = $row_id[tlamt];
			
			$tltype = $row_id[tltype];
			$tlpaid = $row_id[tlpaid];
			
			$tlactive = $row_id[tlactive];
			$tluser = $row_id[tluser];
			$tlstamp = $row_id[tlstamp];

			$_SESSION[tlid] = $tlid;
			$_SESSION[tldocno] = $tldocno;
			$_SESSION[tlsession] = $tlsession;
		}			
	} 
	//echo "<br>ssssssssssssssssssssssssssssssssssssssssssssssssssssssssss tlid " . $tlid;
	//echo "<br>ssssssssssssssssssssssssssssssssssssssssssssssssssssssssss tldate " . $tldate;
	//echo "<br>ssssssssssssssssssssssssssssssssssssssssssssssssssssssssss tldocno " . $tldocno;
	//echo "<br>ssssssssssssssssssssssssssssssssssssssssssssssssssssssssss tlsession " . $tlsession;


	if ($myadmin == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	if ($tlid == 0)
	{
		include('body_account_denied.php');
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
				
		$trid = 0;	
		if(isset($_GET['trid']))
		{
			if ($_GET['trid'])
			{
				$trid = $_GET['trid'];
			}
		}
		//echo '<br> trid : ' . $trid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$trid = '';
$trdate = $globaldate;
$trname = '';
$tradults = 0;
$trakids = 0;
$trdays = 0;
$trrate = 0;
$tramt = 0;
$tramt_old = 0;

$trfrom = $globaldate;
$trto = $globaldate;
$trtime = '';
$trstay = '';

//$tlid = '';

$rlid = '';
$rlname = '';

$tractive = '';
$truser = '';
$trstamp = '';

$tractive = 'Y';
$truser = $_SESSION["ulname"];
$trstamp = $globaldatetime;

$formtitle = 'ADD RECORD';		
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT 
								*
						   FROM 
						   		transaction_room a, room_list b
						   WHERE 
						   		a.rlid = b.rlid and 
								a.tlid = '$tlid' and
								a.trid='$trid' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$trid = $row[trid];
$trdate = $row[trdate];
$trname = $row[trname];
$tradults = $row[tradults];
$trakids = $row[trakids];
$trdays = $row[trdays];
$trrate = $row[trrate];
$tramt = $row[tramt];
$tramt_old = $row[tramt];

$trtime = $row[trtime];
$trstay = $row[trstay];

$trfrom = $row[trfrom];
$trto = $row[trto];

//$tlid = $row[tlid];

$rlid = $row[rlid];
$rlname = $row[rlname];

$tractive = $row[tractive];
$truser = $row[truser];
$trstamp = $row[trstamp];
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
                    <h1 class="page-header">Transaction Room - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=transaction_room_dbase">
Back to Transaction Room </a>	
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
<form role="form" method="post" action="index.php?body=transaction_room_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&trid=<?php print($trid); ?>">

	<div class="form-group">
		<label>Room Name</label>
<?php 
	echo "<select class=\"form-control\" name=\"rlid\" > ";	
	
	if ($rlname != '') 
	{
		echo "<option value='" . $rlid .  "'>" . $rlname . "</option>";
	}
	else
	{
		echo "<option></option>";
	}
	
	$query = "SELECT a.rlid, b.blname, a.rlname 
			  FROM room_list a, branch_list b
			  WHERE a.blid = b.blid and 
					a.rlactive = 'Y'  
			  ORDER BY blname, rlname"; //Populate Vendor Dropdown
	$result = mysql_query($query);                            
	while($row = mysql_fetch_row($result))
	{
		echo "<option value='$row[0]'>$row[1] - $row[2]</option>";
	} 
	echo "</select>";
	mysql_query($query) or die('Error, insert query failed');  
?>
	</div>	

	<div class="form-group">
		<label>Date</label>
		<?php echo "<br>" . $trdate; ?>
		<input class="form-control" type="hidden" name="trdate"  value="<?php print ("$trdate"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>No. of Adults</label>
		<input class="form-control" name="tradults"  value="<?php print ("$tradults"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>No. of Kids</label>
		<input class="form-control" name="trakids"  value="<?php print ("$trakids"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Date From</label>
		<input class="form-control" name="trfrom"  value="<?php print ("$trfrom"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Date To</label>
		<input class="form-control" name="trto"  value="<?php print ("$trto"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Time</label>
		<input class="form-control" name="trtime"  value="<?php print ("$trtime"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Hours Stay</label>
		<input class="form-control" name="trstay"  value="<?php print ("$trstay"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Days (If zero, the computer will compute)</label>
		<input class="form-control" name="trdays"  value="<?php print ("$trdays"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Rate (If zero, the computer will use the room rate in the database)</label>
		<input class="form-control" name="trrate"  value="<?php print ("$trrate"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Amount</label>
		<?php echo "<br>" . $tramt; ?>
		<input class="form-control" type="hidden" name="tramt"  value="<?php print ("$tramt"); ?>"  maxlength="50" >
		<input class="form-control" type="hidden" name="tramt_old"  value="<?php print ("$tramt_old"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='tractive'>
			<option><?php print ("$tractive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$truser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$trstamp"); ?>
	</div>
						
	<input type="hidden" name="trid" value="<?php print ("$trid"); ?>" />
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
<form role="form" method="post" action="index.php?body=transaction_room_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&trid=<?php print($trid); ?>">
	<div class="form-group">
		<label>Date</label>
		<br>
		<?php print ("$trdate"); ?>
	</div>
	<div class="form-group">
		<label>Room Name</label>
		<br>
		<?php print ("$rlname"); ?>
	</div>
	<input type="hidden" name="trid" value="<?php print ("$trid"); ?>" />
	<input type="hidden" name="rlname" value="<?php print ("$rlname"); ?>" />
	
	<input class="form-control" type="hidden" name="tramt"  value="<?php print ("$tramt"); ?>"  maxlength="50" >
	<input class="form-control" type="hidden" name="tramt_old"  value="<?php print ("$tramt_old"); ?>"  maxlength="50" >
	
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
$trid = $_POST['trid'];
$trdate = $_POST['trdate'];
$tradults = $_POST['tradults'];
$trakids = $_POST['trakids'];
$trtime = $_POST['trtime'];
$trstay = $_POST['trstay'];

$trfrom = $_POST['trfrom'];
$trto = $_POST['trto'];

//$tlid = $_POST['tlid'];

$rlid = $_POST['rlid'];
$rlname = $_POST['rlname'];
$rlname = htmlspecialchars($rlname, ENT_QUOTES);

$trname = '';
$trdays = $_POST['trdays'];
$trrate = $_POST['trrate'];
$tramt = 0;
if ($rlid != '')
{
	$query_room = " SELECT *
			   FROM room_list a, branch_list b, room_type c
			   WHERE a.blid = b.blid and 
					 a.rtid = c.rtid and 
					 a.rlid='$rlid' ";
	$result_room = mysql_query($query_room);
	echo mysql_error();				
	while ($row_room =  mysql_fetch_array ($result_room)) 
	{
		$rlid = $row_room[rlid];
		$trname = $row_room[rlname];
		$myrate = $row_room[rlrate];
	}
}
//echo "<br> trid " . $trid;

if ($trdays == 0)
{
	$trdays = strtotime($trto) - strtotime($trfrom);
	$trdays = $trdays / 3600 / 24;
	//echo "<br> trdays " . $trdays;
}

if ($trrate == 0) 
{
	$trrate = $myrate;
}

$tramt = $trdays * $trrate;
$tramt_old = $_POST['tramt_old'];

$tractive = $_POST['tractive'];
$truser = $_SESSION["ulname"];
$trstamp = $globaldatetime;


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
                    <h1 class="page-header">Transaction Room - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=transaction_room_dbase">
Back to Transaction Room 
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
			if ($trid == 0) 
			{
$query = 
"INSERT INTO transaction_room (
trid,
trdate,
trname,
tradults,
trakids,
trdays,
trrate,
tramt,
trtime,
trstay,

trfrom,
trto,

tlid,
rlid,

tractive,
truser,
trstamp
) 
VALUES 
(
'$trid',
'$trdate',
'$trname',
'$tradults',
'$trakids',
'$trdays',
'$trrate',
'$tramt',
'$trtime',
'$trstay',

'$trfrom',
'$trto',

'$tlid',
'$rlid',

'$tractive',
'$truser',
'$trstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
transaction_room 
SET 
trid = '$trid',
trdate = '$trdate',
trname = '$trname',
tradults = '$tradults',
trakids = '$trakids',
trdays = '$trdays',
trrate = '$trrate',
tramt = '$tramt',
trtime = '$trtime',
trstay = '$trstay',

trfrom = '$trfrom',
trto = '$trto',

tlid = '$tlid',
rlid = '$rlid',

tractive = '$tractive',
truser = '$truser',
trstamp = '$trstamp'
WHERE
trid = '$trid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
transaction_room 
WHERE
trid = '$trid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  



		if ($mybox == 'add')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tlroom = tlroom + '$tramt',
	    tlamt = tlamt + '$tramt'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}
		else
		if ($mybox == 'edit')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tlroom = tlroom - '$tramt_old' + '$tramt',
	    tlamt = tlamt - '$tramt_old' + '$tramt'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}
		else
		if ($mybox == 'del')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tlroom = tlroom - '$tramt_old',
	    tlamt = tlamt - '$tramt_old'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}

//once ok, we need to update the
//total rooom amount 


/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=transaction_room_dbase&tlid=<?php print($tlid); ?>">  
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