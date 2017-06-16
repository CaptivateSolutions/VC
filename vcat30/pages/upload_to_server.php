<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Uploaded Data to Server</title>
</head>

<body>

<table width="100%" align="center">
	<tr>
		<td>					
		
			<h1> Uploaded Data to Server </h1>
			<p><strong>This module will upload the raffle codes to the central server!</strong></p>
		
			<?php
			include "config8292838292029.php";
			
			// Create connection
			$link_server = mysql_connect("$svhost", "$svuser", "$svpassword", true)or die("Cannot connect to remote server.");
			$db_selected = mysql_select_db("$svdatabase", $link_server)or die("Unable to select MYSQL database.");
			
			//mysql_query('select * from tablename', $dbh2);
			//If you do not pass a link identifier then the last connection created is used (in this case the one represented by $dbh2) e.g.:
			
			mysql_close($link_server);		
			echo "Connected to Remote successfully";
			
			//echo "<br> my_upload_now " . $my_upload_now;
			?>
					
			
			<table width="800px" border="1" align="center">
				<tr>
					<td align="center">Issue Date</td>
					<td align="center">Branch Issue</td>
					<td align="center">Raffle Code</td>
					<td align="center">Sales Invoice No.</td>
					<td align="center">Sales Invoice Amount</td>
				</tr>

                                 
								
	<?php
	// Create connection
	$link_local = mysql_connect("$dbhost", "$dbuser", "$dbpassword")or die("Cannot connect to remote server.");
	$db_local = mysql_select_db("$dbdatabase", $link_local)or die("Unable to select MYSQL database.");
	
	$link_server = mysql_connect("$svhost", "$svuser", "$svpassword", true)or die("Cannot connect to remote server.");
	$db_server = mysql_select_db("$svdatabase", $link_server)or die("Unable to select MYSQL database.");
	
	//mysql_query('select * from tablename', $dbh2);
	//If you do not pass a link identifier then the last connection created is used (in this case the one represented by $dbh2) e.g.:
	
	$filter_date = date('Y-m-d', strtotime('-3 days'));
	echo "<br> Ticket List From " . $filter_date;
	
	$querydb  = "SELECT 
				 * 
			   FROM 
				 ticket_list a
			   WHERE
			     a.tldate >= '$filter_date'
			   ORDER BY 
				 a.tlid desc ";
	$resultdb = mysql_query($querydb, $link_local);
			
	//fetch the results from the database
	$countdb = $countdb + 1;
	while ($rowdb =  mysql_fetch_array ($resultdb)) 
	{
		$tlticket = $rowdb['tlticket'];
		
		$search_tlid = 0;
		//if ticket already exists, exit now
		$querysv  = "SELECT 
					 * 
				   FROM 
					 ticket_list a
				   WHERE  
					 a.tlticket = '$tlticket' ";
		$resultsv = mysql_query($querysv, $link_server);
		while ($rowsv =  mysql_fetch_array ($resultsv)) 
		{
			$search_tlid = $rowsv[tlid];
		}
		
		//echo "<br> tlticket " . $tlticket;
		//echo "<br> search_tlid " . $search_tlid;
		
		if ($search_tlid == 0)
		{
			//if it does not exists, add to the table 
			//in the server
			$tlid = 0;
			$tlticket = $rowdb['tlticket'];
			$tldate = $rowdb['tldate'];
			$tlbatch = $rowdb['tlbatch'];
			$tlbranch = $rowdb['tlbranch'];
			
			$tlactive = $rowdb['tlactive'];
			$tluser = $rowdb['tluser'];
			$tlstamp = $rowdb['tlstamp'];
			
			$tlissue_date = $rowdb['tlissue_date'];
			$tlissue_batch = $rowdb['tlissue_batch'];
			$tlissue_branch = $rowdb['tlissue_branch'];
			$tlissue_invoice = $rowdb['tlissue_invoice'];
			$tlissue_amount = $rowdb['tlissue_amount'];
			$tlissue_name = $rowdb['tlissue_name'];
			$tlissue_stamp = $rowdb['tlissue_stamp'];
		
			$query_verify = 
			"INSERT INTO ticket_list (
				tlid,
				tlticket,
				tldate,
				tlbatch,
				tlbranch,
				
				tlactive,
				tluser,
				tlstamp,
				
				tlissue_date,
				tlissue_batch,
				tlissue_branch,
				tlissue_invoice,
				tlissue_amount,
				tlissue_name,
				tlissue_stamp )
				
			VALUES (
				'$tlid',
				'$tlticket',
				'$tldate',
				'$tlbatch',
				'$tlbranch',
				
				'$tlactive',
				'$tluser',
				'$tlstamp',
				
				'$tlissue_date',
				'$tlissue_batch',
				'$tlissue_branch',
				'$tlissue_invoice',
				'$tlissue_amount',
				'$tlissue_name',
				'$tlissue_stamp')
			  ";						
			mysql_query($query_verify, $link_server) or die(mysql_error());   	
			
			$tlticket = substr($tlticket, 0, -6) . '...';
			
			print("<tr>");
		
			print("<td align=\"left\" valign=\"middle\">" .date('m/d/Y', strtotime($tlissue_date)). "</td>\n");
			print("<td align=\"left\" valign=\"middle\">$tlissue_branch  </td>\n");
		
			print("<td align=\"left\" valign=\"middle\">$tlticket </td>\n");
		
			print("<td align=\"left\" valign=\"middle\">$tlissue_invoice  </td>\n");
			print("<td align=\"left\" valign=\"middle\">$tlissue_amount  </td>\n");
		
			print("</td>");
		
			print("</tr>");  
		}
		
		$countdb = $countdb + 1;
	}  
	
	mysql_close($link_local);
			
	mysql_close($link_server);		
?>
			
			</table>

		</td>
	</tr>
</table>

</body>
</html>
	