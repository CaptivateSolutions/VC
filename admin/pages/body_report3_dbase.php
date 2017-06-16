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

		$mytag = '';	
		if(isset($_GET['mytag']))
		{
			if ($_GET['mytag'])
			{
				$mytag = $_GET['mytag'];
			}
		}	
		

		$search_datefrom = '';
		$search_datefrom = $_POST["search_datefrom"];	
		
		if(isset($_GET['search_datefrom']))
		{
			if ($_GET['search_datefrom'])
			{
				$search_datefrom = $_GET['search_datefrom'];
			}
		}	

		$search_dateto = '';
		$search_dateto = $_POST["search_dateto"];	
		
		if(isset($_GET['search_dateto']))
		{
			if ($_GET['search_dateto'])
			{
				$search_dateto = $_GET['search_dateto'];
			}
		}			
		
		$search_room = '';
		$search_room = $_POST["search_room"];	
		
		if(isset($_GET['search_room']))
		{
			if ($_GET['search_room'])
			{
				$search_room = $_GET['search_room'];
			}
		}	

		$search_branch = '';
		$search_branch = $_POST["search_branch"];	
		
		if(isset($_GET['search_branch']))
		{
			if ($_GET['search_branch'])
			{
				$search_branch = $_GET['search_branch'];
			}
		}	

		$search_name = '';
		$search_name = $_POST["search_name"];	
		
		if(isset($_GET['search_name']))
		{
			if ($_GET['search_name'])
			{
				$search_name = $_GET['search_name'];
			}
		}	
		
		$search_docno = '';
		$search_docno = $_POST["search_docno"];	
		
		if(isset($_GET['search_docno']))
		{
			if ($_GET['search_docno'])
			{
				$search_docno = $_GET['search_docno'];
			}
		}	
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Booking Details by Branch</h1>
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
<form method="post" action="index.php?body=report3_dbase&mytag=POST">
From (m/d/y)
<INPUT TYPE="TEXT" NAME="search_datefrom" VALUE="<?php print($search_datefrom); ?>" SIZE="7" MAXLENGTH="20">
&nbsp;
To (m/d/y)
<INPUT TYPE="TEXT" NAME="search_dateto" VALUE="<?php print($search_dateto); ?>" SIZE="7" MAXLENGTH="20">
&nbsp;
<input type="submit" value="Filter" />
</form>									
									</td>
								</tr>
							</table>	
                        </div>
                        <!-- /.panel-heading -->
						
						
						
                        <div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>Branch</th>
										<th>Date</th>
										<th>Confirmation</th>
										<th>Room</th>
										<th>Name</th>
										<th>Type</th>
										<th>Room</th>										
										<th>Food</th>										
										<th>Add-On</th>										
										<th>Promo</th>										
										<th>Total</th>										
                                    </tr>
                                </thead>
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

	//fetch the results from the database
	$querydb  = "
		 	   SELECT 
				 *
			   FROM 
				 transaction_list a, 
				 transaction_room b, 
				 room_list c,
				 branch_list d
			   WHERE
			   	 a.tlid = b.tlid and
                 b.rlid = c.rlid and 
				 c.blid = d.blid and
				 a.tlactive = 'Y' ";
				 
	if ($search_room != '') 
	{
		$querydb = $querydb . " and c.rlname LIKE '%$search_room%'  ";
	}			 

	if ($search_branch != '') 
	{
		$querydb = $querydb . " and d.blcode LIKE '%$search_branch%'  ";
	}			 
			  
	if ($search_name != '') 
	{
		$querydb = $querydb . " and a.tlname LIKE '%$search_name%'  ";
	}			 

	if ($search_docno != '') 
	{
		$querydb = $querydb . " and a.tlid LIKE '%$search_docno%'  ";
	}			 

	if ($search_datefrom != '')		   
	{
		$querydb = $querydb . " and a.tldate >= '$search_datefrom'  ";
	}		   
	if ($search_dateto != '')		   
	{
		$querydb = $querydb . " and a.tldate <= '$search_dateto'  ";
	}				
	
	$querydb = $querydb . "			     
		   ORDER BY 
			 d.blcode, a.tldate, a.tlid ";	
						
	$resultdb = mysql_query($querydb);
	echo mysql_error();
	//echo $querydb;
	$numedb = mysql_num_rows($resultdb);	
							 
	$countdb = 1;
	$room = 0;
	$addon = 0;
	$food = 0;
	$promo = 0;
	$total = 0;
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<tr>");

		print("<td align=\"left\" valign=\"middle\"> $rowdb[blcode] </td>\n");
		print("<td align=\"center\" valign=\"middle\">" . date('n/j/Y', strtotime($rowdb[tldate])) . "</td>\n");
		print("<td align=\"center\" valign=\"middle\"> $rowdb[tlid] </td>\n");
		print("<td align=\"left\" valign=\"middle\"> $rowdb[trname] </td>\n");
		print("<td align=\"left\" valign=\"middle\"> $rowdb[tlname] </td>\n");
		print("<td align=\"left\" valign=\"middle\"> $rowdb[tltype] </td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $rowdb[tlroom], 2) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $rowdb[tlfood], 2) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $rowdb[tladdon], 2) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $rowdb[tlpromo], 2) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $rowdb[tlamt], 2) . "</td>\n");
	
		print("</tr>");  

		$room = $room + $rowdb[tlroom];
		$addon = $addon + $rowdb[tladdon];
		$food = $food + $rowdb[tlfood];
		$promo = $promo + $rowdb[tlpromo];
		$total = $total + $rowdb[tlamt];

		$countdb = $countdb + 1;
	}  
?>		
										
								</tbody>			
							</table>		
							
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<td align="center"><strong> Room : <?php print( number_format($room, 2) ); ?></strong></td>										
										<td align="center"><strong> Food : <?php print( number_format($food, 2) ); ?></strong></td>										
										<td align="center"><strong> Add-On : <?php print( number_format($addon, 2) ); ?></strong></td>										
										<td align="center"><strong> Promo : <?php print( number_format($promo, 2) ); ?></strong></td>										
										<td align="center"><strong> Total : <?php print( number_format($total, 2) ); ?></strong></td>										
                                    </tr>									
                                </thead>
                            </table>
                            <!-- /.table-responsive -->
							
							
<?php
$mypage="&mysession=" . session_id() . "&search_datefrom=" . $search_datefrom . "&search_dateto=" . $search_dateto . "&search_room=" . $search_room . "&search_branch=" . $search_branch .  "&search_name=" . $search_name . "&search_docno=" . $search_docno . "&search_mystatus=sent";
?>
							<table>
								<tr>
									<td align="left">
<form method="post" action="body_report3_excel.php?myid=myid<?php print($mypage); ?>&ulexcel=EXCEL" target="_blank">
<input type="submit" value="Convert to Excel" />
</form>									
									</td>

									<td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</td>
									
									<td align="left">

<form method="post" action="body_report3_print.php?myid=myid<?php print($mypage); ?>&ulprint=PRINT" target="_blank">
<input type="submit" value="Preview Report" />
</form>									
									</td>
									
									<td align="left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</td>									
									
									<td align="left">

<form method="post" action="index.php?body=view_reports">
<input type="submit" value="Back to Reports Menu" />
</form>									
									</td>										
								</tr>
							</table>	
														
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