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
	$zzz_tlid = $_SESSION[tlid];
	if ($zzz_tlid != '')
	{
		$myid = $_SESSION[tlid];
		$mydocno = $_SESSION[tldocno];
		$mysession = $_SESSION[tlsession];
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
				
		$tpid = 0;	
		if(isset($_GET['tpid']))
		{
			if ($_GET['tpid'])
			{
				$tpid = $_GET['tpid'];
			}
		}
		//echo '<br> tpid : ' . $tpid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$tpid = '';
$tpdate = $globaldate;
$tpcode = '';
$tpname = '';

$tpamt = 0;
$tpamt_old = 0;

//$tlid = '';

$plid = '';
$plname = '';

$tpactive = 'Y';
$tpuser = $_SESSION["ulname"];
$tpstamp = $globaldatetime;

$formtitle = 'ADD RECORD';		
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT 
								*
						   FROM 
						   		transaction_promo a, room_list b
						   WHERE 
						   		a.plid = b.plid and 
								a.tpid='$tpid' ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$tpid = $row[tpid];
$tpdate = $row[tpdate];
$tpcode = $row[tpcode];
$tpname = $row[tpname];

$tpamt = $row[tpamt];
$tpamt_old = $row[tpamt];

//$tlid = $row[tlid];

$plid = $row[plid];
$plname = $row[plname];

$tpactive = $row[tpactive];
$tpuser = $row[tpuser];
$tpstamp = $row[tpstamp];
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
                    <h1 class="page-header">Transaction Promo - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=transaction_promo_dbase">
Back to Transaction Promo </a>	
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
<form role="form" method="post" action="index.php?body=transaction_promo_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&tpid=<?php print($tpid); ?>">

	<div class="form-group">
		<label>Promo Name</label>
<?php 
	echo "<select class=\"form-control\" name=\"plid\" > ";	
	
	if ($plname != '') 
	{
		echo "<option value='" . $plid .  "'>" . $plname . "</option>";
	}
	else
	{
		echo "<option></option>";
	}
	
	$query = "SELECT a.plid, b.blname, a.plname 
			  FROM promotion_list a, branch_list b
			  WHERE a.blid = b.blid and 
					a.plactive = 'Y'  
			  ORDER BY blname, plname"; //Populate Vendor Dropdown
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
		<?php echo "<br>" . $tpdate; ?>
		<input class="form-control" type="hidden" name="tpdate"  value="<?php print ("$tpdate"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Amount</label>
		<input class="form-control" type="text" name="tpamt"  value="<?php print ("$tpamt"); ?>"  maxlength="50" >
		<input class="form-control" type="hidden" name="tpamt_old"  value="<?php print ("$tpamt_old"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='tpactive'>
			<option><?php print ("$tpactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$tpuser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$tpstamp"); ?>
	</div>
						
	<input type="hidden" name="tpid" value="<?php print ("$tpid"); ?>" />
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
<form role="form" method="post" action="index.php?body=transaction_promo_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&tpid=<?php print($tpid); ?>">
	<div class="form-group">
		<label>Date</label>
		<br>
		<?php print ("$tpdate"); ?>
	</div>
	<div class="form-group">
		<label>Promo Name</label>
		<br>
		<?php print ("$tpname"); ?>
	</div>
	<input type="hidden" name="tpid" value="<?php print ("$tpid"); ?>" />
	<input type="hidden" name="tpname" value="<?php print ("$tpname"); ?>" />
	
	<input class="form-control" type="hidden" name="tpamt"  value="<?php print ("$tpamt"); ?>"  maxlength="50" >
	<input class="form-control" type="hidden" name="tpamt_old"  value="<?php print ("$tpamt_old"); ?>"  maxlength="50" >
	
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
$tpid = $_POST['tpid'];
$tpdate = $_POST['tpdate'];
$tpamt = $_POST['tpamt'];

//$tlid = $_POST['tlid'];

$plid = $_POST['plid'];

$plname = $_POST['plname'];
$plname = htmlspecialchars($plname, ENT_QUOTES);

$tpcode = '';
$tpname = '';
if ($plid != '')
{
	$query_room = " SELECT *
			   FROM promotion_list a, branch_list b
			   WHERE a.blid = b.blid and 
					 a.plid='$plid' ";
	$result_room = mysql_query($query_room);
	echo mysql_error();				
	while ($row_room =  mysql_fetch_array ($result_room)) 
	{
		$plid = $row_room[plid];
		$tpname = $row_room[plname];
	}
}
//echo "<br> tpid " . $tpid;
$tpamt_old = $_POST['tpamt_old'];

$tpactive = $_POST['tpactive'];
$tpuser = $_SESSION["ulname"];
$tpstamp = $globaldatetime;


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
                    <h1 class="page-header">Transaction Promo - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=transaction_promo_dbase">
Back to Transaction Promo 
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
			if ($tpid == 0) 
			{
$query = 
"INSERT INTO transaction_promo (
tpid,
tpdate,
tpname,
tpcode,
tpamt,

tlid,
plid,

tpactive,
tpuser,
tpstamp
) 
VALUES 
(
'$tpid',
'$tpdate',
'$tpname',
'$tpcode',
'$tpamt',

'$tlid',
'$plid',

'$tpactive',
'$tpuser',
'$tpstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
transaction_promo 
SET 
tpid = '$tpid',
tpdate = '$tpdate',
tpname = '$tpname',
tpcode = '$tpcode',
tpamt = '$tpamt',

tlid = '$tlid',
plid = '$plid',

tpactive = '$tpactive',
tpuser = '$tpuser',
tpstamp = '$tpstamp'
WHERE
tpid = '$tpid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
transaction_promo 
WHERE
tpid = '$tpid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  



		if ($mybox == 'add')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tlpromo = tlpromo + '$tpamt',
	    tlamt = tlamt - '$tpamt'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}
		else
		if ($mybox == 'edit')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tlpromo = tlpromo - '$tpamt_old' + '$tpamt',
	    tlamt = tlamt + '$tpamt_old' - '$tpamt'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}
		else
		if ($mybox == 'del')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tlpromo = tlpromo - '$tpamt_old',
	    tlamt = tlamt + '$tpamt_old'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}

//once ok, we need to update the
//total rooom amount 


/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=transaction_promo_dbase&tlid=<?php print($tlid); ?>">  
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