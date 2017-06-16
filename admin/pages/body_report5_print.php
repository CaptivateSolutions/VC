<?php session_start();

	if(isset($_SESSION['ulvalid']))
		$ulvalid = $_SESSION['ulvalid'];		
	else
		$ulvalid = 'N';		

	$ulprint = ''; 		
	if(isset($_GET['ulprint']))
	{
		if ($_GET['ulprint'])
		{
			$ulprint = $_GET['ulprint'];
		}
	}
	if(isset($_POST['ulprint']))
	{
		if ($_POST['ulprint'])
		{
			$ulprint = $_POST['ulprint'];
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
				

	if ($ulprint == '')
	{
		?>
			<h3><?php print($nodata_title); ?></h3>
			<p><?php print($nodata_desc); ?></p>
		<?php
	}
	else	
	{   
		include "config8298928293189.php"; 
		
		$link = mysql_connect("$dbhost", "$dbuser", "$dbpassword")or die("cannot connect to server ");
		@mysql_select_db("$dbdatabase")or die("Unable to select database.");
				
		$query_show = " 
			SELECT *
			FROM company_list a
			WHERE a.coactive = 'Y' ";
		$result_show = mysql_query($query_show) or die('Error : purchase_list Show Entry : ' . mysql_error());	
		while ($row_show =  mysql_fetch_array ($result_show)) 
		{
			$coname = $row_show[coname];
			$coaddr = $row_show[coaddr];
		}
	
		?>
        
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="cs" />
	<link href="./css/screen_print.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<title>.</title>
      <style type="text/css">
         table.one {
		 	font-family: 'Trebuchet MS', 'Geneva CE', lucida, sans-serif;
            border-collapse:separate;
            border-spacing:1px;
         }
      </style>	
</head>

<body onLoad="self.print()">

<table class="one" width="800px">
	<tr>
		<td>
    
		<font size="+2"><?php print($coname); ?></font>
		<br>
		<strong><?php print($coaddr); ?></strong>
		<br>
		<font size="+1">Booking Tally by Branch</font>

<?php
	//echo '<br> search_datefrom' . $search_datefrom;	
	//echo '<br> search_dateto' . $search_dateto;	
	//echo '<br> search_room' . $search_room;	
	//echo '<br> search_name' . $search_name;	
	//echo '<br> search_docno' . $search_docno;	
	//echo '<br> search_ulname_staff' . $search_ulname_staff;	
	//echo '<br> search_ulname_request' . $search_ulname_request;	
	
	$mystring = '';
	
	if ($search_datefrom != '') 
	{
		if ($mystring == '') 
			$mystring = $mystring . 'Date From : ' . $search_datefrom; 
		else
			$mystring = $mystring . "    " . 'Date From : ' . $search_datefrom; 
	}		
	
	
	if ($search_dateto != '') 
	{
		if ($mystring == '') 
			$mystring = $mystring . 'Date To : ' . $search_dateto; 
		else
			$mystring = $mystring . "    " . 'Date To : ' . $search_dateto; 
	}		
	
	if ($search_room != '') 
	{
		if ($mystring == '') 
			$mystring = $mystring . 'Room : ' . $search_room; 
		else
			$mystring = $mystring . "    " . 'Room : ' . $search_room; 
	}	
	
	if ($search_branch != '') 
	{
		if ($mystring == '') 
			$mystring = $mystring . 'Branch : ' . $search_branch; 
		else
			$mystring = $mystring . "    " . 'Branch : ' . $search_branch; 
	}			
	
	if ($search_name != '') 
	{
		if ($mystring == '') 
			$mystring = $mystring . 'Name : ' . $search_name; 
		else
			$mystring = $mystring . "    " . 'Name : ' . $search_name; 
	}		
	
	if ($search_docno != '') 
	{
		if ($mystring == '') 
			$mystring = $mystring . 'System # : ' . $search_docno; 
		else
			$mystring = $mystring . "   " . 'System # : ' . $search_docno; 
	}								

	if ($mystring == '') 
	{
		echo '<br><br><font size="+1">Information Grid</font>';
	}
	else
	{
		//echo '<br> search_text' . $search_text;	
		echo '<br><br><font size="+1">' . $mystring . '</font>';
	}

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
		   <font color='".$grid_fontcolor."'><strong>New Count</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>New Total</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Paid Count</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Paid Total</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Total Count</strong></font></TD>\n");
	print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
		   <font color='".$grid_fontcolor."'><strong>Total Amount</strong></font></TD>\n");
	print("</TR>\n");
					
	//fetch the results from the database
	$querydb  = "
		 	   SELECT 
			     count(a.tlid) tlcount,
				 sum(a.tlamt) tlamt,
				 d.blcode, a.tldate				 
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
			  GROUP BY
				d.blcode, a.tldate		     
			  ORDER BY 
				d.blcode, a.tldate ";	
	$resultdb=mysql_query($querydb);
	echo mysql_error();
	//echo $querydb;

					 
	$countdb = 1;

	$count2 = 0;
	$total2 = 0;

	$count_new2 = 0;
	$total_new2 = 0;

	$count_paid2 = 0;
	$total_paid2 = 0;
	
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		print("<tr>");

		print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
		print("<td align=\"left\" valign=\"middle\"> $rowdb[blcode] </td>\n");
		print("<td align=\"center\" valign=\"middle\">" . date('n/j/Y', strtotime($rowdb[tldate])) . "</td>\n");

		$blcode = $rowdb['blcode'];
		$tldate = $rowdb['tldate'];

		$count = $rowdb[tlcount];
		$total = $rowdb[tlamt];

		$count_new = 0;
		$total_new = 0;
	
		$count_paid = 0;
		$total_paid = 0;
	
		//fetch the results from the database
		$querynew  = "
				   SELECT 
					 count(a.tlid) tlcount,
					 sum(a.tlamt) tlamt,
					 a.tltype		 
				   FROM 
					 transaction_list a, 
					 transaction_room b, 
					 room_list c,
					 branch_list d
				   WHERE
					 a.tlid = b.tlid and
					 b.rlid = c.rlid and 
					 c.blid = d.blid and
					 a.tlactive = 'Y' and 
					 d.blcode = '$blcode' and
					 a.tldate = '$tldate' 
				  GROUP BY
					a.tltype		     
				  ORDER BY 
					d.blcode, a.tldate ";	
							
		$resultnew = mysql_query($querynew);
		echo mysql_error();
		//echo $querydb;
		$numenew = mysql_num_rows($resultnew);	
		while ($rownew =  mysql_fetch_array ($resultnew)) 
		{
			if ($rownew['tltype'] == 'NEW')
			{	
				$count_new = $rownew['tlcount'];
				$total_new = $rownew['tlamt'];
			}
			else
			{
				$count_paid = $rownew['tlcount'];
				$total_paid = $rownew['tlamt'];
			}
		}

		print("<td align=\"right\" valign=\"middle\">" . number_format( $count_new, 0) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $total_new, 2) . "</td>\n");

		print("<td align=\"right\" valign=\"middle\">" . number_format( $count_paid, 0) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $total_paid, 2) . "</td>\n");
		
		print("<td align=\"right\" valign=\"middle\">" . number_format( $count, 0) . "</td>\n");
		print("<td align=\"right\" valign=\"middle\">" . number_format( $total, 2) . "</td>\n");
	
		print("</tr>");  

		$count2 = $count2 + $count;
		$total2 = $total2 + $total;

		$count_new2 = $count_new2 + $count_new;
		$total_new2 = $total_new2 + $total_new;

		$count_paid2 = $count_paid2 + $count_paid;
		$total_paid2 = $total_paid2 + $total_paid;

		$countdb = $countdb + 1;		
	}  
?>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>Total</td>
										<td align="right"><?php print( number_format($count_new2, 0) ); ?></td>										
										<td align="right"><?php print( number_format($total_new2, 2) ); ?></td>										
										<td align="right"><?php print( number_format($count_paid2, 0) ); ?></td>										
										<td align="right"><?php print( number_format($total_paid2, 2) ); ?></td>										
										<td align="right"><?php print( number_format($count2, 0) ); ?></td>										
										<td align="right"><?php print( number_format($total2, 2) ); ?></td>											
                                    </tr>				
<?php
print("</table>\n");
   
		mysql_close($link);	
	}
?>

		<script type="text/javascript">setTimeout("window.close();", 50);
		</script>	
			
		</td>
	</tr>
</table>		
		
</body>

</html>	
