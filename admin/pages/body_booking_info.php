<?php
	$ulname = '';
	if(isset($_SESSION['ulname']))
		$ulname = $_SESSION['ulname'];	

	if ($ulname == '')
	{
		include('body_account_not_found.php');
	}
	else
	{		
		$tlid = '';	
		if(isset($_GET['tlid']))
		{
			if ($_GET['tlid'])
			{
				$tlid = $_GET['tlid'];
			}
		}
		
		if ($tlid != '') 
		{
			$tlid = $tlid;
			
			$query_id = " SELECT 
							*
					   FROM 
							transaction_list a, transaction_room b, 
							room_list c, branch_list d
					   WHERE 
							a.tlid = b.tlid and 
							b.rlid = c.rlid and 
							c.blid = d.blid and 
							a.tlid='$tlid' ";
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
				$tlfood = $row_id[tlfood];
				$tladdon = $row_id[tladdon];
				$tlpromo = $row_id[tlpromo];
				$tlamt = $row_id[tlamt];
				
				$tltype = $row_id[tltype];
				$tlpaid = $row_id[tlpaid];
				
				$tlactive = $row_id[tlactive];
				$tluser = $row_id[tluser];
				$tlstamp = $row_id[tlstamp];
						
				$trid = $row_id[trid];
				$trdate = $row_id[trdate];
				$trname = $row_id[trname];
				$tradults = $row_id[tradults];
				$trakids = $row_id[trakids];
				$trdays = $row_id[trdays];
				$trrate = $row_id[trrate];
				$tramt = $row_id[tramt];
				$trtime = $row_id[trtime];
				$tramt_old = $row_id[tramt];
				$trstay = $row_id[trstay];
				
				$trfrom = $row_id[trfrom];
				$trto = $row_id[trto];
				
				//$tlid = $row[tlid];
				
				$rlid = $row_id[rlid];
				$rlname = $row_id[rlname];
				$rlkey = $row_id[rlkey];
				$rlpicture = $row_id[rlpicture];
		
				$blid = $row_id[blid];
				$blcode = $row_id[blcode];
				$blkey = $row_id[blkey];
				$blname = $row_id[blname];
				$blemail = $row_id[blemail];
				$blmobile = $row_id[blmobile];
				$bladdr = $row_id[bladdr];
				$blphone = $row_id[blphone];
				
				$tractive = $row_id[tractive];
				$truser = $row_id[truser];
				$trstamp = $row_id[trstamp];			
			}	
		
			$id = '';
			$rscode = '';
			$query = " SELECT *
					   FROM rooms a
					   WHERE a.locale = '$blkey' and a.roomno = '$rlkey' ";
			$result = mysql_query($query);
			echo mysql_error();				
			while ($row =  mysql_fetch_array ($result)) 
			{
				$id = $row[id];
				$rscode = $row[rscode];
			}			
		
			$tldate = date('m/d/Y', strtotime($tldate));
			$trfrom = date('m/d/Y', strtotime($trfrom));
			$trto = date('m/d/Y', strtotime($trto));
		}
		
			
		if ($tlid != 0)
		{
			$query = " SELECT 
							*
					   FROM 
							transaction_list a, transaction_food b
					   WHERE 
							a.tlid = b.tlid and 
							a.tlid='$tlid'";
			$result = mysql_query($query);
			echo mysql_error();		
			$food_ordered = 1;	
			$food_string = '';	
			while ($row =  mysql_fetch_array ($result)) 
			{
				$tfqty = $row[tfqty];
				$tfname = $row[tfname];
				if ($food_string == '')
				{
					$food_string = $food_string . '(' . number_format($tfqty,0) . ') ' . $tfname;
				}
				else
				{
					$food_string = $food_string . ' , ' . '(' . number_format($tfqty,0) . ') ' .  $tfname;
				}
				$food_ordered = $food_ordered + 1;
			}	
			$food_string = $food_string . '&nbsp;';
		}
		
		
		if ($tlid != 0)
		{
			$query = " SELECT 
							*
					   FROM 
							transaction_list a, transaction_addon b
					   WHERE 
							a.tlid = b.tlid and 
							a.tlid='$tlid'";
			$result = mysql_query($query);
			echo mysql_error();		
			$addon_ordered = 1;		
			$addon_string = '';		
			while ($row =  mysql_fetch_array ($result)) 
			{
				$taqty = $row[taqty];
				$taname = $row[taname];
				if ($addon_string == '')
				{
					$addon_string = $addon_string . '(' . number_format($taqty,0) . ') ' . $taname;
				}
				else
				{
					$addon_string = $addon_string . ' , ' . '(' . number_format($taqty,0) . ') ' . $taname;
				}	
				$addon_ordered = $addon_ordered + 1;
			}	
			$addon_string = $addon_string . '&nbsp;';
		}
				
			
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Booking Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<table width="100%">
								<tr>
									<td align="left" width="25%">
Booking Date : <strong><?php print($tldate); ?></strong>  							
									</td>
									<td align="center" width="25%">
 Booking Status : <strong><?php print($tltype); ?></strong>
									</td>
									<td align="right" width="25%">
 Confirmation No. : <strong><?php print($tlid); ?></strong>
									</td>
									<td align="right" width="25%">
<a href="index.php">
<strong>Back to Dashboard</strong>
</a>	
									</td>
								</tr>
							</table>	
                        </div>
                        <!-- /.panel-heading -->
						

					    <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<tr>
									<th>Field</th>
									<th>Value</th>

									<th>Field</th>
									<th>Value</th>

									<th>Field</th>
									<th>Value</th>
								</tr>

								<tr>
									<td>Booking Date </td>
									<td><?php print(date('m/d/Y', strtotime($tldate))); ?></td>

									<td>Branch</td>
									<td><?php print($blkey . "/" . $blcode); ?></td>

									<td>Room Total</td>
									<td align="right"><?php print(number_format($tlamt,2)); ?></td>
								</tr>
								<tr>
									<td>Check-In</td>
									<td><?php print(date('m/d/Y', strtotime($trfrom))); ?></td>

									<td>Room Name</td>
									<td><?php print($rlname); ?></td>

									<td>Add-On</td>
									<td align="right"><?php print(number_format($tladdon,2)); ?></td>
								</tr>								
								<tr>
									<td>Check-In Time</td>
									<td><?php print($trtime); ?></td>

									<td>Guest Name</td>
									<td><?php print($tlname); ?></td>

									<td>Food Total</td>
									<td align="right"><?php print(number_format($tlfood,2)); ?></td>
								</tr>
								<tr>
									<td>Check-Out</td>
									<td><?php print(date('m/d/Y', strtotime($trto))); ?></td>

									<td>Email</td>
									<td><?php print($tlemail); ?></td>

									<td>Promo Total</td>
									<td align="right"><?php print(number_format($tlpromo,2)); ?></td>
								</tr>
								<tr>
									<td>Food Serving Time</td>
									<td><?php print($trserve_time); ?></td>

									<td>Mobile No.</td>
									<td><?php print($tlmobile); ?></td>

									<td>Total Amount</td>
									<td align="right"><?php print(number_format($tlamt,2)); ?></td>
								</tr>								
								<tr>
									<td>No. of Hours Stay</td>
									<td><?php print($trstay); ?></td>

									<td>&nbsp;</td>
									<td>&nbsp;</td>

									<td>&nbsp;</td>
									<td align="right">&nbsp;</td>
								</tr>									
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
						
						
						

					    <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th colspan="5">Room Add-On</th>
                                    </tr>
                                    <tr>
										<th>#</th>
										<th>Add-On</th>
										<th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
								
<?php
$querydb = " SELECT 
				*
		   FROM 
				transaction_list a, transaction_addon b
		   WHERE 
				a.tlid = b.tlid and 
				a.tlid='$tlid'";
$resultdb = mysql_query($querydb);
echo mysql_error();		
$countdb = 1;	
while ($rowdb =  mysql_fetch_array ($resultdb)) 
{
	print("<tr>");

	print("<td align=\"center\" valign=\"middle\"> $countdb </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[taname] </td>\n");
	print("<td align=\"right\" valign=\"middle\">" . number_format($rowdb[taamt],2) . "</td>\n");
			
	print("</tr>");  
	$countdb = $countdb + 1;
}  
?>		
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
												
						
						
 
					    <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th colspan="5">Food</th>
                                    </tr>
                                    <tr>
										<th>#</th>
										<th>Qty</th>
										<th>Food</th>
										<th>Rate</th>
										<th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
								
<?php
$querydb = " SELECT 
				*
		   FROM 
				transaction_list a, transaction_food b
		   WHERE 
				a.tlid = b.tlid and 
				a.tlid='$tlid'";
$resultdb = mysql_query($querydb);
echo mysql_error();		
$countdb = 1;	
while ($rowdb =  mysql_fetch_array ($resultdb)) 
{
	print("<tr>");

	print("<td align=\"center\" valign=\"middle\"> $countdb </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[tfqty] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$rowdb[tfname] </td>\n");
	print("<td align=\"right\" valign=\"middle\">" . number_format($rowdb[tfrate],2) . "</td>\n");
	print("<td align=\"right\" valign=\"middle\">" . number_format($rowdb[tfamt],2) . "</td>\n");
			
	print("</tr>");  
	$countdb = $countdb + 1;
}  
?>		
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
												
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>						
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
	}
?>		