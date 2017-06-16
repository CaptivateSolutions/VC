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
				
		$tfid = 0;	
		if(isset($_GET['tfid']))
		{
			if ($_GET['tfid'])
			{
				$tfid = $_GET['tfid'];
			}
		}
		//echo '<br> tfid : ' . $tfid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$tfid = '';
$tfdate = $globaldate;
$tfqty = 0;
$tfrate = 0;
$tfamt = 0;
$tlamt_old = 0;

//$trid = '';
//$trname = '';

$flid = '';
$flname = '';

$tfactive = 'Y';
$tfuser = $_SESSION["ulname"];
$tfstamp = $globaldatetime;

$formtitle = 'ADD RECORD';		
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT 
				 a.trid, a.trname, 
				 d.blname rlname_blname, c.rlname,  
				 e.tfdate, g.blname flname_blname, 
				 f.flid, f.flname,
				 e.tfid, e.tfdate, e.tfname, e.tfqty, e.tfrate, e.tfamt,
				 e.tfactive, e.tfuser, e.tfstamp, e.tfamt
			   FROM 
				 transaction_room a, 
				 transaction_list b,
				 room_list c,
				 branch_list d,
				 
				 transaction_food e, 
				 food_list f,
				 branch_list g
			   WHERE
			   	 a.tlid = b.tlid and
				 a.rlid = c.rlid and
				 c.blid = d.blid and
				 
				 a.tlid = e.tlid and 
				 e.flid = f.flid and 
				 f.blid = g.blid and 
				 e.tfid='$tfid' 
			   ORDER BY 
				 d.blname, c.rlname, e.tfdate, g.blname, f.flname ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$tfid = $row[tfid];
$tfdate = $row[tfdate];
$tfname = $row[tfname];
$tfqty = $row[tfqty];
$tfrate = $row[tfrate];
$tfamt = $row[tfamt];
$tfamt_old = $row[tfamt];

//$trid = $row[trid];
//$trname = $row[trname];
//$rlname = $row[rlname];
//$rlname_blname = $row[rlname_blname];

$flid = $row[flid];
$flname = $row[flname];
$flname_blname = $row[flname_blname];

$tfactive = $row[tfactive];
$tfuser = $row[tfuser];
$tfstamp = $row[tfstamp];
				}
// echo "<br> tfname " . $tfname;
// echo "<br> tfname " . $tfname;
				 
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
                    <h1 class="page-header">Transaction Food - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=transaction_food_dbase">
Back to Transaction Food </a>	
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
<form role="form" method="post" action="index.php?body=transaction_food_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&tfid=<?php print($tfid); ?>">


	<div class="form-group">
		<label>Date</label>
		<?php echo "<br>" . $tfdate; ?>
		<input class="form-control" type="hidden" name="tfdate"  value="<?php print ("$tfdate"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Food Name</label>
<?php 
	echo "<select class=\"form-control\" name=\"flid\" > ";	
	
	if ($rlname != '') 
	{
		echo "<option value='" . $flid .  "'>" . $flname_blname . " - " . $flname . "</option>";
	}
	else
	{
		echo "<option></option>";
	}
	
	$query = "SELECT a.flid, b.blname, a.flname 
			  FROM food_list a, branch_list b
			  WHERE a.blid = b.blid and 			  
					a.flactive = 'Y'  
			  ORDER BY b.blname, a.flname"; //Populate Vendor Dropdown
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
		<label>Qty</label>
		<input class="form-control" name="tfqty"  value="<?php print ("$tfqty"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Rate (If zero, the computer will use the food rate in the database)</label>
		<input class="form-control" name="tfrate"  value="<?php print ("$tfrate"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Amount</label>
		<?php echo "<br>" . $tfamt; ?>
		<input class="form-control" type="hidden" name="tfamt"  value="<?php print ("$tfamt"); ?>"  maxlength="50" >
		<input class="form-control" type="hidden" name="tfamt_old"  value="<?php print ("$tfamt_old"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='tfactive'>
			<option><?php print ("$tfactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$tfuser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$tfstamp"); ?>
	</div>
						
	<input type="hidden" name="tfid" value="<?php print ("$tfid"); ?>" />
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
<form role="form" method="post" action="index.php?body=transaction_food_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&tfid=<?php print($tfid); ?>">
	<div class="form-group">
		<label>Date</label>
		<br>
		<?php print ("$tfdate"); ?>
	</div>
	<div class="form-group">
		<label>Food Name</label>
		<br>
		<?php print ("$flname"); ?>
	</div>
	<input type="hidden" name="tfid" value="<?php print ("$tfid"); ?>" />
	<input type="hidden" name="flname" value="<?php print ("$flname"); ?>" />
	
	<input class="form-control" type="hidden" name="tfamt"  value="<?php print ("$tfamt"); ?>"  maxlength="50" >
	<input class="form-control" type="hidden" name="tfamt_old"  value="<?php print ("$tfamt_old"); ?>"  maxlength="50" >
	
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
$tfid = $_POST['tfid'];
$tfdate = $_POST['tfdate'];
$tfname = $_POST['tfname'];
$tfname = htmlspecialchars($tfname, ENT_QUOTES);

$tfqty = $_POST['tfqty'];
$tfrate = $_POST['tfrate'];
$tfamt = $_POST['tfamt'];

//$trid = $_POST['trid'];
$flid = $_POST['flid'];

$tfqty = $_POST['tfqty'];
$tfrate = $_POST['tfrate'];
$tfamt = 0;
if ($flid != '')
{
	$query_food = " SELECT *
			   FROM food_list a
			   WHERE a.flid='$flid' ";
	$result_food = mysql_query($query_food);
	echo mysql_error();				
	while ($row_food =  mysql_fetch_array ($result_food)) 
	{
		$flid = $row_food[flid];
		$tfname = $row_food[flname];
		$myrate = $row_food[flrate];
	}
}
//echo "<br> tfid " . $tfid;

if ($tfrate == 0) 
{
	$tfrate = $myrate;
}

$tfamt = $tfqty * $tfrate;
$tfamt_old = $_POST['tfamt_old'];

$tfactive = $_POST['tfactive'];
$tfuser = $_SESSION["ulname"];
$tfstamp = $globaldatetime;


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
                    <h1 class="page-header">Transaction Food - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=transaction_food_dbase">
Back to Transaction Food </a>	
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
			if ($tfid == 0) 
			{
$query = 
"INSERT INTO transaction_food (
tfid,
tfdate,
tfname,
tfqty,
tfrate,
tfamt,

tlid,
flid,

tfactive,
tfuser,
tfstamp
) 
VALUES 
(
'$tfid',
'$tfdate',
'$tfname',
'$tfqty',
'$tfrate',
'$tfamt',

'$tlid',
'$flid',

'$tfactive',
'$tfuser',
'$tfstamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
transaction_food 
SET 
tfid = '$tfid',
tfdate = '$tfdate',
tfname = '$tfname',
tfqty = '$tfqty',
tfrate = '$tfrate',
tfamt = '$tfamt',

tlid = '$tlid',
flid = '$flid',

tfactive = '$tfactive',
tfuser = '$tfuser',
tfstamp = '$tfstamp'
WHERE
tfid = '$tfid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
transaction_food 
WHERE
tfid = '$tfid'";
		}
		
		mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  



		if ($mybox == 'add')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tlfood = tlfood + '$tfamt',
	    tlamt = tlamt + '$tfamt'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}
		else
		if ($mybox == 'edit')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tlfood = tlfood - '$tfamt_old' + '$tfamt',
	    tlamt = tlamt - '$tfamt_old' + '$tfamt'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}
		else
		if ($mybox == 'del')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tlfood = tlfood - '$tfamt_old',
	    tlamt = tlamt - '$tfamt_old'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}

/*
echo "<br> SESSION tlid " . $tlid;
echo "<br> SESSION tldocno " . $tldocno;
echo "<br> SESSION tlsession " . $tlsession;

echo "<br> tlid " . $tlid;
echo "<br> tfid " . $tfid;
echo "<br> tfqty " . $tfqty;
echo "<br> tfrate " . $tfrate;
echo "<br> tfamt " . $tfamt;
echo "<br> tfamt_old " . $tfamt_old;
*/

//once ok, we need to update the
//total rooom amount 


/*
*/
		?>				

		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=transaction_food_dbase&tlid=<?php print($tlid); ?>">  
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