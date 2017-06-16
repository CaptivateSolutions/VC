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
			
			$tlfood = $row_id[tlfood];
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
		

		$myball = '';	
		if(isset($_GET['myball']))
		{
			if ($_GET['myball'])
			{
				$myball = $_GET['myball'];
			}
		}
		if(isset($_POST['myball']))
		{
			if ($_POST['myball'])
			{
				$myball = $_POST['myball'];
			}
		}		
		//echo '<br> myball : ' . $myball;
					
	
		/*LOG-IN FORM*/
	 	if ($_SESSION['ultransaction_addon'] == '') 
		{
			$_SESSION['ultransaction_addon'] = $_SESSION["ulname"];
			$modulename = 'transaction_addon';
			$updatedby = $_SESSION["ulname"];
			$logdate = $globaldate;
			$logstamp = $globaldatetime;
			$logtype = 'LOG-IN';
			$query = "INSERT INTO user_log (logdate, logform, logtype, loguser, logstamp) 
					  VALUES ('$logdate', '$modulename', '$logtype', '$updatedby', '$logstamp')";
			mysql_query($query) or die(mysql_error());   	
		}
		/*LOG-IN FORM*/	
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
							<table width="100%">
								<tr>
									<td align="left">
<h1 class="page-header">Room Add-On</h1>
									</td>
									<td align="right">
							
									</td>
								</tr>
							</table>				
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
Date : <strong><?php echo $tldate; ?> </strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Confirm No. :<strong> <?php echo $tlid; ?> </strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Session : <strong><?php echo $tlsession; ?> </strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Name : <strong><?php echo $tlname; ?> </strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
									</td>
									<td>
<a title="Back to transaction record?" href="index.php?body=transaction_list_addeditdel&mybox=edit&tlid=<?php print($tlid); ?>">
Back to Transaction Record
</a>								
									</td>
								</tr>
							</table>	
                        </div>
                        <!-- /.panel-heading -->

<?php
	$query_addon  = "SELECT 
				 a.trid, a.trname,
				 d.blname rlname_blname, c.rlname,  
				 e.tadate, g.blname raname_blname, 
				 f.raid, f.raname,
				 e.taid, e.tadate, e.taname, e.taqty, e.tarate, e.taamt,
				 e.taactive, e.tauser, e.taamt
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
				 b.tlid = '$tlid' 
			   ORDER BY 
				 d.blname, c.rlname, e.tadate, g.blname, f.raname ";
	$result_addon = mysql_query($query_addon);
	//echo mysql_error();
	$num_count = mysql_num_rows($result_addon);		
	//echo "<br> num_count " . $num_count;
?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>#</th>
										<th>Branch</th>
										<th>Room</th>
										<th>Date</th>
										<th>Branch</th>
										<th>Add-On</th>
										<th>Qty </th>
										<th>Price</th>
										<th>Amount</th>
										<th>Updated By/On</th>
										<th colspan="2">
Status
&nbsp;&nbsp;&nbsp;
<a title="Add a new entry?" href="index.php?body=transaction_addon_addeditdel&mybox=add">
Add Record
</a>											
										</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
								
<?php
//fetch the results from the database
$count_addon = $count_addon + 1;
while ($row_addon =  mysql_fetch_array ($result_addon)) 
{
	print("<tr>");

	print("<td align=\"center\" valign=\"middle\">$count_addon </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_addon[raname_blname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_addon[raname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">" .date('m/d/Y', strtotime($row_addon[tadate])). "</td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_addon[raname_blname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_addon[raname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_addon[taqty]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_addon[tarate]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_addon[taamt]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_addon[tauser]  <br>" .date('m/d/Y h:i:s A', strtotime($row_addon[tastamp])). "</td>\n");

	print("<td align=\"CENTER\" valign=\"middle\">");
	print("[ <a title=\"Update entry?\" href=\"index.php?body=transaction_addon_addeditdel&mybox=edit&taid=$row_addon[taid]\"> Update </a> ]"); 
	print("</td>");

	print("<td align=\"CENTER\" valign=\"middle\">");
	print("[ <a title=\"Delete this entry?\" href=\"index.php?body=transaction_addon_addeditdel&mybox=del&taid=$row_addon[taid]\"> Delete </a> ]");
	print("</td>");

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