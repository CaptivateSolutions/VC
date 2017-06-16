<?php
	// The function header by sending raw excel
	header("Content-type: application/vnd-ms-excel");
	 
	// Defines the name of the export file "codelution-export.xls"
	header("Content-Disposition: attachment; filename=revenue_summary_by_branch.xls");

	$ulexcel = ''; 		
	if(isset($_GET['ulexcel']))
	{
		if ($_GET['ulexcel'])
		{
			$ulexcel = $_GET['ulexcel'];
		}
	}
	if(isset($_POST['ulexcel']))
	{
		if ($_POST['ulexcel'])
		{
			$ulexcel = $_POST['ulexcel'];
		}
	}
	
	$search_datefrom = ''; 		
	if(isset($_GET['search_datefrom']))
	{
		if ($_GET['search_datefrom'])
		{
			$search_datefrom = $_GET['search_datefrom'];
		}
	}
	if(isset($_POST['search_datefrom']))
	{
		if ($_POST['search_datefrom'])
		{
			$search_datefrom = $_POST['search_datefrom'];
		}
	}

	$search_dateto = '';
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
	
	$search_room = '';
	if(isset($_POST['search_room']))
	{
		if ($_POST['search_room'])
		{
			$search_room = $_POST['search_room'];
		}
	}		
	if(isset($_GET['search_room']))
	{
		if ($_GET['search_room'])
		{
			$search_room = $_GET['search_room'];
		}
	}	
	
	$search_branch = '';
	if(isset($_POST['search_branch']))
	{
		if ($_POST['search_branch'])
		{
			$search_branch = $_POST['search_branch'];
		}
	}		
	if(isset($_GET['search_branch']))
	{
		if ($_GET['search_branch'])
		{
			$search_branch = $_GET['search_branch'];
		}
	}			
	
	$search_name = '';
	if(isset($_POST['search_name']))
	{
		if ($_POST['search_name'])
		{
			$search_name = $_POST['search_name'];
		}
	}	
	if(isset($_GET['search_name']))
	{
		if ($_GET['search_name'])
		{
			$search_name = $_GET['search_name'];
		}
	}
	
	$search_docno = '';
	if(isset($_POST['search_docno']))
	{
		if ($_POST['search_docno'])
		{
			$search_docno = $_POST['search_docno'];
		}
	}	
	if(isset($_GET['search_docno']))
	{
		if ($_GET['search_docno'])
		{
			$search_docno = $_GET['search_docno'];
		}
	}		
	
	include "config8298928293189.php"; 	
		
	$link = mysql_connect("$dbhost", "$dbuser", "$dbpassword")or die("cannot connect to server ");
	@mysql_select_db("$dbdatabase")or die("Unable to select database.");
				
	//echo '<br> search_room' . $search_room;	
	//echo '<br> search_branch' . $search_branch;	
	//echo '<br> search_name' . $search_name;	
	//echo '<br> search_dlname' . $search_dlname;	
	//echo '<br> search_ulname_staff' . $search_ulname_staff;	
	//echo '<br> search_docno' . $search_docno;	
		
	if ($search_datefrom != '')
	{
		$search_datefrom = date("Y-m-d", strtotime($search_datefrom));
	}
	
	if ($search_dateto != '')
	{
		$search_dateto = date("Y-m-d", strtotime($search_dateto));	
	}
	

	print("<table border='1' width='100%'>");
	
print("<TR>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='5%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>#</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='15%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Branch</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='15%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Date</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Type</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Room</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Food</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Add-On</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Promo</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Total</strong></font></TD>\n");
	print("</TR>\n");
		
	
				
	//fetch the results from the database
	$querydb  = "
		 	   SELECT 
				 sum(a.tlroom) tlroom,
				 sum(a.tlfood) tlfood,
				 sum(a.tladdon) tladdon,
				 sum(a.tlpromo) tlpromo,
				 sum(a.tlamt) tlamt,
				 d.blcode, a.tldate, a.tltype	
			   FROM 
				 transaction_list a, 
				 transaction_room b, 
				 room_list c,
				 branch_list d
			   WHERE
			   	 a.tlid = b.tlid and
                 b.rlid = c.rlid and 
				 c.blid = d.blid and
				 a.tltype = 'PAID'  and
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
			GROUP BY
			  d.blcode, a.tldate, a.tltype		
		   ORDER BY 
			 d.blcode, a.tldate, a.tlid ";	
	$resultdb=mysql_query($querydb);
	echo mysql_error();
	//echo $querydb;

	$countdb=1;
	$room = 0;
	$addon = 0;
	$food = 0;
	$promo = 0;
	$total = 0;	
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<TR>\n");
	
		//echo "<br> SESSION uladmin " . $_SESSION['uladmin'];
		print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
		print("<td align=\"left\" valign=\"middle\"> $rowdb[blcode] </td>\n");
		print("<td align=\"center\" valign=\"middle\">" . date('n/j/Y', strtotime($rowdb[tldate])) . "</td>\n");
		print("<td align=\"left\" valign=\"middle\"> $rowdb[tltype] </td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $rowdb[tlroom], 2) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $rowdb[tlfood], 2) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $rowdb[tladdon], 2) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $rowdb[tlpromo], 2) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $rowdb[tlamt], 2) . "</td>\n");
		
		print("</TR>\n");
		$countdb = $countdb + 1;   
		
		$room = $room + $rowdb[tlroom];
		$addon = $addon + $rowdb[tladdon];
		$food = $food + $rowdb[tlfood];
		$promo = $promo + $rowdb[tlpromo];
		$total = $total + $rowdb[tlamt];
	}  
?>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>Total</td>
										<td align="right"><?php print( number_format($room, 2) ); ?></td>										
										<td align="right"><?php print( number_format($food, 2) ); ?></td>										
										<td align="right"><?php print( number_format($addon, 2) ); ?></td>										
										<td align="right"><?php print( number_format($promo, 2) ); ?></td>										
										<td align="right"><?php print( number_format($total, 2) ); ?></td>										
                                    </tr>				
<?php	
	print("</table>\n");		

	mysql_close($link);	
?>
