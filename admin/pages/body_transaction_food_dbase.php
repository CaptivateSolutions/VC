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
	 	if ($_SESSION['ultransaction_food'] == '') 
		{
			$_SESSION['ultransaction_food'] = $_SESSION["ulname"];
			$modulename = 'transaction_food';
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
<h1 class="page-header">Ordered Food</h1>
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
	$query_food  = "SELECT 
				 a.trid, a.trname,
				 d.blname rlname_blname, c.rlname,  
				 e.tfdate, g.blname flname_blname, 
				 f.flid, f.flname,
				 e.tfid, e.tfdate, e.tfname, e.tfqty, e.tfrate, e.tfamt,
				 e.tfactive, e.tfuser, e.tfamt
			   FROM 
				 transaction_room a, 
				 transaction_list b,
				 room_list c,
				 branch_list d,
				 
				 transaction_food e, 
				 food_list f,
				 branch_list g
			   WHERE
			   	 a.tlid = b.tlid and
				 a.rlid = c.rlid and
				 c.blid = d.blid and
				 
				 a.tlid = e.tlid and 
				 e.flid = f.flid and 
				 f.blid = g.blid and 
				 b.tlid = '$tlid' 
			   ORDER BY 
				 d.blname, c.rlname, e.tfdate, g.blname, f.flname ";
	$result_food = mysql_query($query_food);
	//echo mysql_error();
	$num_count = mysql_num_rows($result_food);		
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
										<th>Food</th>
										<th>Qty </th>
										<th>Price</th>
										<th>Amount</th>
										<th>Updated By/On</th>
										<th colspan="2">
Status
&nbsp;&nbsp;&nbsp;
<a title="Add a new entry?" href="index.php?body=transaction_food_addeditdel&mybox=add">
Add Record
</a>											
										</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
								
<?php
//fetch the results from the database
$count_food = $count_food + 1;
while ($row_food =  mysql_fetch_array ($result_food)) 
{
	print("<tr>");

	print("<td align=\"center\" valign=\"middle\">$count_food </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_food[rlname_blname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_food[rlname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">" .date('m/d/Y', strtotime($row_food[tfdate])). "</td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_food[flname_blname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_food[flname] </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_food[tfqty]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_food[tfrate]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_food[tfamt]  </td>\n");
	print("<td align=\"left\" valign=\"middle\">$row_food[tfuser]  <br>" .date('m/d/Y h:i:s A', strtotime($row_food[tfstamp])). "</td>\n");

	print("<td align=\"CENTER\" valign=\"middle\">");
	print("[ <a title=\"Update entry?\" href=\"index.php?body=transaction_food_addeditdel&mybox=edit&tfid=$row_food[tfid]\"> Update </a> ]"); 
	print("</td>");

	print("<td align=\"CENTER\" valign=\"middle\">");
	print("[ <a title=\"Delete this entry?\" href=\"index.php?body=transaction_food_addeditdel&mybox=del&tfid=$row_food[tfid]\"> Delete </a> ]");
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