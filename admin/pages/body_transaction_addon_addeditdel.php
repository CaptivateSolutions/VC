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
				
		$taid = 0;	
		if(isset($_GET['taid']))
		{
			if ($_GET['taid'])
			{
				$taid = $_GET['taid'];
			}
		}
		//echo '<br> taid : ' . $taid;

		if ($mystatus != 'sent')
		{	
			if ($mybox == 'add') 
			{
$taid = '';
$tadate = $globaldate;
$taqty = 0;
$tarate = 0;
$taamt = 0;
$tlamt_old = 0;

//$trid = '';
//$trname = '';

$raid = '';
$raname = '';

$taactive = 'Y';
$tauser = $_SESSION["ulname"];
$tastamp = $globaldatetime;

$formtitle = 'ADD RECORD';		
			}
			else
			if (($mybox == 'edit') or ($mybox == 'del'))
			{
				$query = " SELECT 
				 a.trid, a.trname, 
				 d.blname rlname_blname, c.rlname,  
				 e.tadate, g.blname raname_blname, 
				 f.raid, f.raname,
				 e.taid, e.tadate, e.taname, e.taqty, e.tarate, e.taamt,
				 e.taactive, e.tauser, e.tastamp, e.taamt
			   FROM 
				 transaction_room a, 
				 transaction_list b,
				 room_list c,
				 branch_list d,
				 
				 transaction_addon e, 
				 room_addons f,
				 branch_list g
			   WHERE
			   	 a.tlid = b.tlid and
				 a.rlid = c.rlid and
				 c.blid = d.blid and
				 
				 a.tlid = e.tlid and 
				 e.raid = f.raid and 
				 f.blid = g.blid and 
				 e.taid='$taid' 
			   ORDER BY 
				 d.blname, c.rlname, e.tadate, g.blname, f.raname ";
				$result = mysql_query($query);
				echo mysql_error();				
				while ($row =  mysql_fetch_array ($result)) 
				{
$taid = $row[taid];
$tadate = $row[tadate];
$taname = $row[taname];
$taqty = $row[taqty];
$tarate = $row[tarate];
$taamt = $row[taamt];
$taamt_old = $row[taamt];

//$trid = $row[trid];
//$trname = $row[trname];
//$rlname = $row[rlname];
//$rlname_blname = $row[rlname_blname];

$raid = $row[raid];
$raname = $row[raname];
$raname_blname = $row[raname_blname];

$taactive = $row[taactive];
$tauser = $row[tauser];
$tastamp = $row[tastamp];
				}
// echo "<br> taname " . $taname;
// echo "<br> taname " . $taname;
				 
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
                    <h1 class="page-header">Room Add-On - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=transaction_addon_dbase">
Back to Room Add-On </a>	
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
<form role="form" method="post" action="index.php?body=transaction_addon_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&taid=<?php print($taid); ?>">


	<div class="form-group">
		<label>Date</label>
		<?php echo "<br>" . $tadate; ?>
		<input class="form-control" type="hidden" name="tadate"  value="<?php print ("$tadate"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Add-On Name</label>
<?php 
	echo "<select class=\"form-control\" name=\"raid\" > ";	
	
	if ($raname != '') 
	{
		echo "<option value='" . $raid .  "'>" . $raname_blname . " - " . $raname . "</option>";
	}
	else
	{
		echo "<option></option>";
	}
	
	$query = "SELECT a.raid, b.blname, a.raname 
			  FROM room_addons a, branch_list b
			  WHERE a.blid = b.blid and 			  
					a.raactive = 'Y'  
			  ORDER BY b.blname, a.raname"; //Populate Vendor Dropdown
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
		<input class="form-control" name="taqty"  value="<?php print ("$taqty"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Rate (If zero, the computer will use the food rate in the database)</label>
		<input class="form-control" name="tarate"  value="<?php print ("$tarate"); ?>"  maxlength="50" >
	</div>

	<div class="form-group">
		<label>Amount</label>
		<?php echo "<br>" . $taamt; ?>
		<input class="form-control" type="hidden" name="taamt"  value="<?php print ("$taamt"); ?>"  maxlength="50" >
		<input class="form-control" type="hidden" name="taamt_old"  value="<?php print ("$taamt_old"); ?>"  maxlength="50" >
	</div>
	
	<div class="form-group">
		<label>Active</label>
		<select class="form-control" name='taactive'>
			<option><?php print ("$taactive"); ?></option>	
			<option>Y</option>	
			<option>N</option>	
			<option></option>	
		</select>		
	</div>	
	
	<div class="form-group">
		<label>Last Updated By / On </label>
		<br>
		<?php print ("$tauser"); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php print ("$tastamp"); ?>
	</div>
						
	<input type="hidden" name="taid" value="<?php print ("$taid"); ?>" />
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
<form role="form" method="post" action="index.php?body=transaction_addon_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&taid=<?php print($taid); ?>">
	<div class="form-group">
		<label>Date</label>
		<br>
		<?php print ("$tadate"); ?>
	</div>
	<div class="form-group">
		<label>Add-On Name</label>
		<br>
		<?php print ("$raname"); ?>
	</div>
	<input type="hidden" name="taid" value="<?php print ("$taid"); ?>" />
	<input type="hidden" name="raname" value="<?php print ("$raname"); ?>" />
	
	<input class="form-control" type="hidden" name="taamt"  value="<?php print ("$taamt"); ?>"  maxlength="50" >
	<input class="form-control" type="hidden" name="taamt_old"  value="<?php print ("$taamt_old"); ?>"  maxlength="50" >
	
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
$taid = $_POST['taid'];
$tadate = $_POST['tadate'];

$taname = $_POST['taname'];
$taname = htmlspecialchars($taname, ENT_QUOTES);

$taqty = $_POST['taqty'];
$tarate = $_POST['tarate'];
$taamt = $_POST['taamt'];

//$tlid = $_POST['tlid'];
$raid = $_POST['raid'];

$taqty = $_POST['taqty'];
$tarate = $_POST['tarate'];
$taamt = 0;
if ($raid != '')
{
	$query_food = " SELECT *
			   FROM room_addons a
			   WHERE a.raid='$raid' ";
	$result_food = mysql_query($query_food);
	echo mysql_error();				
	while ($row_food =  mysql_fetch_array ($result_food)) 
	{
		$raid = $row_food[raid];
		$taname = $row_food[raname];
		$myrate = $row_food[rarate];
	}
}

if ($tarate == 0) 
{
	$tarate = $myrate;
}

$taamt = $taqty * $tarate;
$taamt_old = $_POST['taamt_old'];

$taactive = $_POST['taactive'];
$tauser = $_SESSION["ulname"];
$tastamp = $globaldatetime;


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
                    <h1 class="page-header">Room Add-On - <?php echo $formtitle; ?></h1>
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
<a href="index.php?body=transaction_addon_dbase">
Back to Room Add-On </a>	
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
			if ($taid == 0) 
			{
$query = 
"INSERT INTO transaction_addon (
taid,
tadate,
taname,
taqty,
tarate,
taamt,

tlid,
raid,

taactive,
tauser,
tastamp
) 
VALUES 
(
'$taid',
'$tadate',
'$taname',
'$taqty',
'$tarate',
'$taamt',

'$tlid',
'$raid',

'$taactive',
'$tauser',
'$tastamp'
)";

			}
			else
			{
				$query = 
"UPDATE 
transaction_addon 
SET 
taid = '$taid',
tadate = '$tadate',
taname = '$taname',
taqty = '$taqty',
tarate = '$tarate',
taamt = '$taamt',

tlid = '$tlid',
raid = '$raid',

taactive = '$taactive',
tauser = '$tauser',
tastamp = '$tastamp'
WHERE
taid = '$taid'";
			}
		}
		else
		if ($mybox == 'del')
		{
			$query = 
"DELETE FROM 
transaction_addon 
WHERE
taid = '$taid'";
		}
		

		mysql_query($query) or die(mysql_error());  

		//mysql_query($query) or die('The entry has links to other tables. Cannot continue to process...');  


		if ($mybox == 'add')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tladdon = tladdon + '$taamt',
	    tlamt = tlamt + '$taamt'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}
		else
		if ($mybox == 'edit')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tladdon = tladdon - '$taamt_old' + '$taamt',
	    tlamt = tlamt - '$taamt_old' + '$taamt'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}
		else
		if ($mybox == 'del')
		{
$query_total = 
	"UPDATE transaction_list 
	SET tladdon = tladdon - '$taamt_old',
	    tlamt = tlamt - '$taamt_old'
	WHERE tlid = '$tlid' ";
mysql_query($query_total) or die('Updating transaction master has encountered problems. Cannot continue to process...');  
		}

/*
echo "<br> SESSION tlid " . $tlid;
echo "<br> SESSION tldocno " . $tldocno;
echo "<br> SESSION tlsession " . $tlsession;

echo "<br> tlid " . $tlid;
echo "<br> taid " . $taid;
echo "<br> taqty " . $taqty;
echo "<br> tarate " . $tarate;
echo "<br> taamt " . $taamt;
echo "<br> taamt_old " . $taamt_old;
*/

//once ok, we need to update the
//total rooom amount 


/*
*/
		?>				
		<HTML> 		
		<meta http-equiv="refresh" content="0;URL=index.php?body=transaction_addon_dbase&tlid=<?php print($tlid); ?>">  
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