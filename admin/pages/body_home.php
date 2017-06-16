<?php   
	$search_datefrom = date('m/d/Y', strtotime(date('Y-m-1')));
	if(isset($_POST['search_datefrom']))
	{
		if ($_POST['search_datefrom'])
		{
			$search_datefrom = $_POST['search_datefrom'];
		}
	}	
	if(isset($_GET['search_datefrom']))
	{
		if ($_GET['search_datefrom'])
		{
			$search_datefrom = $_GET['search_datefrom'];
		}
	}	

	$search_dateto = date('m/d/Y', strtotime($globaldate));
	if(isset($_POST['search_dateto']))
	{
		if ($_POST['search_dateto'])
		{
			$search_dateto = $_POST['search_dateto'];
		}
	}			
	if(isset($_GET['search_dateto']))
	{
		if ($_GET['search_dateto'])
		{
			$search_dateto = $_GET['search_dateto'];
		}
	}			
	
	//echo "<br> search_datefrom " . $search_datefrom . "  search_dateto " . $search_dateto . " search_datefrom " . $search_datefrom . "  search_dateto " . $search_dateto;
	
	$search_datefrom2 = date('Y-m-d', strtotime($search_datefrom));
	$search_dateto2 = date('Y-m-d', strtotime($search_dateto));

	
	//count total message for today and
	//total not yet done
	$myblid = $_SESSION['myblid'];
	//echo "<br> myblid " . $myblid .  " myblid " . $myblid . " myblid " . $myblid . " myblid " . $myblid;
	
	
	$booking_pending = 0;	
	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 transaction_list a, 
				 transaction_room b, 
				 room_list c
			   WHERE
			   	 a.tlid = b.tlid and
                 b.rlid = c.rlid and 
			   	 a.tldate >= '$search_datefrom2' and
			   	 a.tldate <= '$search_dateto2' and ";

	if ($myblid != '') 
	{
		$querydb  = $querydb . " c.blid = '$myblid' and ";
	}
	
	$querydb  = $querydb . " 				 
			 a.tltype <> 'PAID'  and
			 a.tlactive = 'Y' ";
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$booking_pending = mysql_num_rows($resultdb);		
	//echo "<br> booking_pending " . $booking_pending;	
	
	
	
	$room_pending = 0;
	$vstring = '';	
	$querydb  = "SELECT 
				 * 
			   FROM 
				 room_list b, branch_list c
			   WHERE
				 b.rlactive = 'Y' and
				 c.blactive = 'Y' and
				 b.blid = c.blid and
				 b.rlname LIKE '%$search_text%' ";

	if ($myblid != '') 
	{
		$querydb  = $querydb . "and c.blid = '$myblid' ";
	}
		
	$querydb  = $querydb . " 
			   ORDER BY 
				 c.blname, b.rlname ";
	$resultdb = mysql_query($querydb);
	echo mysql_error();
	//echo $querydb . $querydb;
	$countdb = $countdb + 1;
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		$rlname = $rowdb['rlname'];
		$rlavailable = $rowdb['rlavailable'];
		
		$id = '';
		$rscode = '';
		$query = " SELECT *
				   FROM rooms a
				   WHERE a.locale = '$rowdb[blkey]' and a.roomno = '$rowdb[rlkey]' ";
		$result = mysql_query($query);
		echo mysql_error();				
		while ($row =  mysql_fetch_array ($result)) 
		{
			$id = $row[id];
			$rscode = $row[rscode];
		}	
	
		if ($rscode == '')
		{
			if ($rlavailable == 'Y') 
			{
				$room_pending = $room_pending + 1;
			}
		}
		else
		if ($rscode == '1') 
		{
			$room_pending = $room_pending + 1;
		}	

		//$vstring = $vstring .  "<br> rlname " . $rlname . " rscode " . $rscode . " rlavailable " . $rlavailable;
		
		$countdb = $countdb + 1;
	}  
		
	
	
	$checkin_pending = 0;	
	$querydb  = "SELECT 
				 a.* 
			   FROM 
				 transaction_list a, transaction_room b, room_list c
			   WHERE
			   	 a.tlid = b.tlid and
				 b.rlid = c.rlid and 
			   	 b.trfrom = '$globaldate' and ";

	if ($myblid != '') 
	{
		$querydb  = $querydb . " c.blid = '$myblid' and ";
	}
		
	$querydb  = $querydb . " 
				 a.tltype = 'PAID'  and
				 a.tlactive = 'Y' ";
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$checkin_pending = mysql_num_rows($resultdb);		
	//echo "<br> checkin_pending " . $checkin_pending;	
	
	
	
	$sales_pending = 0;	
	$querydb  = "SELECT 
				 count(a.tlid) tlid 
			   FROM 
				 transaction_list a, 
				 transaction_room b,
				 room_list c
			   WHERE
			   	 a.tlid = b.tlid and
				 b.rlid = c.rlid and 
			   	 a.tldate >= '$search_datefrom2' and
			   	 a.tldate <= '$search_dateto2' and ";

		if ($myblid != '') 
		{
			$querydb  = $querydb . " c.blid = '$myblid' and ";
		}
		
		$querydb  = $querydb . " 	
				 a.tltype = 'PAID'  and
				 a.tlactive = 'Y' ";
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		$sales_pending = $rowdb[tlid];
	}
	//echo "<br> sales_pending " . $sales_pending;			


?> 

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quickview for <?php  echo date("m/d/Y", strtotime($globaldate)); ?>
<?php
	//echo "<br>myblid " . $myblid;
	//echo $vstring;
	//echo "<br> room_pending " . $room_pending;
?>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php  echo $checkin_pending; ?> 
									</div>
                                    <div>Check-In Today</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Guest Arriving</span>
                                <span class="pull-right">&nbsp;</span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php  echo $room_pending; ?> 
									</div>
                                    <div>Rooms Available</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Guest Can Occupy</span>
                                <span class="pull-right">&nbsp;</span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php  echo $booking_pending; ?> 
									</div>
                                    <div>Booking Count</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Guest Booking</span>
                                <span class="pull-right">&nbsp;</span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php  echo $sales_pending; ?> 
									</div>
                                    <div>Paid Bookings</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Total Income</span>
                                <span class="pull-right">&nbsp;</span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
		
            <div class="row">
                <div class="col-lg-12">
					<div class="panel panel-default">
                        <div class="panel-heading">
						
<form method="post" action="index.php?body=home&mytag=POST">
&nbsp; From (m/d/y)
&nbsp; &nbsp; <INPUT TYPE="text" NAME="search_datefrom" id="date1" alt="date" class="IP_calendar" title="m/d/Y" VALUE="<?php print($search_datefrom); ?>" >
&nbsp; To (m/d/y)
&nbsp; &nbsp; <INPUT TYPE="text" NAME="search_dateto"  id="date2" alt="date" class="IP_calendar" title="m/d/Y" VALUE="<?php print($search_dateto); ?>" >
&nbsp; &nbsp;<input type="submit" value="Filter" />
</form>								
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
		
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Booking Date</th>
                <th>Confirm No</th>
                <th>Branch</th>
                <th>Checkin Date</th>
                <th>Arrival Time</th>
                <th>Checkout Date</th>
                <th>Hours Stay</th>
                <th width="10%">Guest</th>
                <th>Room Name</th>
               
                <th>Food Orders</th>
                <th>Food Serving Time</th>
                <th>Payment Status</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Booking Date</th>
                <th>Confirm No</th>
                <th>Branch</th>
                <th>Checkin Date</th>
                <th>Arrival Time</th>
                <th>Checkout Date</th>
                <th>Hours Stay</th>
                <th width="10%">Guest</th>
                <th>Room Name</th>
                
                <th>Food Orders</th>
                <th>Food Serve Time</th>
                <th>Payment Status</th>
                <th>Amount</th>
            </tr>
        </tfoot>
        <tbody>

<?php
	//20160904
	if ($search_datefrom != '')
	{
		$search_datefrom = date("Y-m-d", strtotime($search_datefrom));
	}
	
	if ($search_dateto != '')
	{
		$search_dateto = date("Y-m-d", strtotime($search_dateto));	
	}
	
	$querydb  = "
		   SELECT 
			 * 
		   FROM 
			 transaction_list a, 
			 transaction_room b,
			 room_list c,
			 room_type d,
			 branch_list e
		   WHERE
			 a.tlid = b.tlid and
			 b.rlid = c.rlid and 
			 c.rtid = d.rtid and 
			 c.blid = e.blid and 
			 a.tlactive = 'Y' ";

	if ($myblid != '') 
	{
		$querydb  = $querydb . "and c.blid = '$myblid' ";
	}

	if ($search_datefrom != '')		   
	{
		$querydb = $querydb . " and a.tldate >= '$search_datefrom'  ";
	}		   
	
	if ($search_dateto != '')		   
	{
		$querydb = $querydb . " and a.tldate <= '$search_dateto'  ";
	}	
		
	$querydb  = $querydb . " 
			 
		   ORDER BY 
			 a.tldate desc, a.tlid desc, a.tltype ";			 
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$num_count = mysql_num_rows($resultdb);		
	//echo "<br> num_count " . $num_count;
	//echo "<br> search_datefrom " . $search_datefrom . " search_dateto " . $search_dateto;
	
	//fetch the results from the database
	$countdb = 1;
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
        print("<tr class=\"odd gradeX\">");
print("<td align=\"center\" valign=\"middle\">" . date('m/d/Y', strtotime($rowdb[tldate])). "</td>\n");
print("<td> <a href='index.php?body=booking_info&tlid=" . $rowdb[tlid] . "' >" . $rowdb[tlid] . "</a></td>\n");
print("<td> $rowdb[blcode] </td>\n");		
print("<td align=\"center\" valign=\"middle\">" . date('m/d/Y', strtotime($rowdb[trfrom])).  "</td>\n");
print("<td align=\"center\" valign=\"middle\">" . $rowdb[trtime] . "</td>\n");
print("<td align=\"center\" valign=\"middle\">" . date('m/d/Y', strtotime($rowdb[trto])) . "</td>\n");
print("<td align=\"center\" valign=\"middle\">" . $rowdb[trstay] . "</td>\n");
print("<td align=\"left\" valign=\"middle\"> $rowdb[tlname] </td>\n");
print("<td align=\"center\" valign=\"middle\"> $rowdb[rlname] </td>\n");       
	if ($rowdb[tlfood] > 0) 
		{
			print("<td align=\"center\" valign=\"middle\"><a href='index.php?body=booking_info&tlid=" . $rowdb[tlid] . "' > VIEW ORDERS </a></td>\n");
		}
		else
		{
			print("<td align=\"center\" valign=\"middle\">&nbsp;</td>\n");
		}	
		
print("<td align=\"center\" valign=\"middle\">$rowdb[trserve_time] </td>\n");
		
		
		
		
		
		
				
		
		print("<td align=\"center\" valign=\"middle\">$rowdb[tltype] </td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format($rowdb[tlamt],2) . "</td>\n");
	
		print("</tr>");  
		$countdb = $countdb + 1;
	}  
?>		

        </tbody>
    </table>

                           
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->                    
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
