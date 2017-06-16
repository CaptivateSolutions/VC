<?php ?>


<script>
var _datePicker = function () {
        $(document).ready(function () {
            $('#homepage_checkin, #homepage_checkout').datetimepicker({
                format: 'LL',
                icons: {
                    time: 'fa fa-time',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
                minDate: moment()
            });
            $('#homepage_checkintime').datetimepicker({
                format: 'LT',
                icons: {
                    time: 'fa fa-time',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },
            });

        });
    };
</script>


    <div class="fixed-bg-pattern"></div>
    <main class="home">
	
<?php
	if ($comarketing == 'Y')
	{
?>	
        <section class="full-banner">
            <a href="#thisLink" class="goToLink"><span style="color: #000000" class="fa fa-chevron-down"></span><span style="color: #000000" class="text">Go to website</span></a>
          <!--  <a href="#booking-now" class="btn default-bttn bookNowLink">Book Now</a> -->
        </section>
<?php
	}
?>	

        <div class="wrapper" id="thisLink">
            <nav class="navbar custom-navbar">
                <div class="container">
                    <?php include "navigation.php" ?>
                </div>
            </nav>
            <section class="hero">
                <div id="hero-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
					
<?php
	//b.blcode LIKE '%$select_branch%' and 
	$banner_count = 1;
	$query_banner = " 
		SELECT 
			*
		FROM 
			branch_list b, banner_list c
		WHERE 
			b.blid = c.blid and 
			b.blactive = 'Y' and
			b.blcode <> '' and		
			c.baactive = 'Y' and
			c.baname <> '' 
		ORDER BY 
			c.baorder, b.blcode, c.baname ";
	$result_banner = mysql_query($query_banner);
	echo mysql_error();				
	while ($row_banner =  mysql_fetch_array ($result_banner)) 
	{
	
		if ($banner_count == 1) 
		{
			$item_active = 'item active';
		}
		else
		{
			$item_active = 'item';
		}

?>						
		<div class="<?php print($item_active); ?>">
			<img src="./admin/pages/banner/<?php print($row_banner['bapicture']); ?>">
		</div>
<?php 
		$banner_count = 	$banner_count + 1;
	}
?>								    
                    </div>
                </div>
                <section class="form-branch-selection" id="booking-now">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="heading">
                                    <div class="bttn-home-Up visible-xs">Book Now</div>
                                    <div class="close-booking visible-xs"><img src="assets/images/icon-close-black.png" /></div>
                                </div>
                                <div class="form-inline">
<?php	
/*							
	echo '<br> nearest_branch : ' . $nearest_branch;
	echo '<br> select_branch : ' . $select_branch;
	echo '<br> check_in : ' . $check_in;
	echo '<br> check_out : ' . $check_out;
	echo '<br> check_in_time : ' . $check_in_time;
	echo '<br> hours_of_stay : ' . $hours_of_stay;
	echo '<br> view_rooms : ' . $view_rooms;
*/
?>
                                    <form name="room-selection" action="index.php?body=room-selection" method="post">
<?php 
/*
                                    <div class="form-group">
                                        <input type="submit" value="SELECT NEAREST" name="nearest_branch" class="form-control sel-nearest input-style-bttn" />
                                    </div>
*/
?>
                                    <div class="form-group">
                                        <select class="form-control custom-style select-branch" name="select_branch" required>
											<option value=''>Select Branch</option>
<?php
	$branch_count = 0;
	$query_branch = " 
		SELECT 
			*
		FROM 
			branch_list b
		WHERE 
		 	b.blactive = 'Y' and
			b.blcode <> ''
		ORDER BY 
			b.blcode ";
	$result_branch = mysql_query($query_branch);
	echo mysql_error();				
	while ($row_branch =  mysql_fetch_array ($result_branch)) 
	{
		echo '<option value="'. $row_branch['blcode'] . '">' .	$row_branch['blcode'] . '</option>';
		$branch_count = $branch_count + 1;
	}
?>											
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="check_in" class="form-control custom-style datepick js-checkindate-home" placeholder="Check-in Date" id="datepicker" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="check_out" class="form-control custom-style datepick js-checkoutdate-home" placeholder="Check-out Date" id="datepicker4" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="check_in_time" class="form-control custom-style datepick js-checkintime-home" placeholder="Check-in Time" id="timepicker" required />
                                    </div>
                                    <div class="form-group">
										<select class="form-control custom-style select-branch js-hours-stay" name="hours_of_stay" required>
											<option value="">Hours of Stay?</option>
											<option value="3 Hours">3 Hours</option>
											<option value="4 Hours">4 Hours</option>
											<option value="5 Hours">5 Hours</option>
											<option value="6 Hours">6 Hours</option>
											<option value="8 Hours">8 Hours</option>
											<option value="12 Hours">12 Hours</option>
											<option value="24 Hours">24 Hours</option>
										</select>	
                                    </div>									
                                    <div class="form-group">
                                         <input type="submit" name="view_rooms" class="form-control input-style-bttn view-rooms" value="VIEW" />
                                         <!--<a class="form-control input-style-bttn view-rooms" href="index.php?body=room-selection">VIEW ROOMS</a>-->
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
           
			<section class="featured-food">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-xs-12 food-banner">
                            <div class="food-holder">
                                <div class="img-holder">
                                    <img src="assets/images/featured-prod.jpg" />
                                </div>
                                <div class="content">
                                    <h2 class="name">Victoria Court Hamburger</h2>
                                    <h2 class="price">250.00 PHP</h2>
                                    <p class="desc">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                        anim id est laborum.
                                    </p>
                                </div>
                            </div>
                            <div class="nav-control navi-left"><span class="fa fa-chevron-left"></span></div>
                            <div class="nav-control navi-right"><span class="fa fa-chevron-right"></span></div>
                        </div> -->

                        <div id="foodCarousel" class="carousel slide food-carousel" data-ride="carousel">
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner carousel-wrap" role="listbox">
                            
<?php
	//b.blcode LIKE '%$select_branch%' and 
	$food_count = 1;
	$query_food = " 
		SELECT 
			*
		FROM 
			branch_list b, food_list c
		WHERE 
			b.blid = c.blid and 
			b.blactive = 'Y' and
			b.blcode <> '' and
			c.flactive = 'Y' and
			c.flname <> '' and
			c.flrate > 0 and
			c.flfeatured = 'Y'
		ORDER BY 
			b.blcode, c.flname 
		LIMIT 
			5 ";
	$result_food = mysql_query($query_food);
	echo mysql_error();				
	while ($row_food =  mysql_fetch_array ($result_food)) 
	{
		if ($food_count == 3)
			$current = 'active';
		else
			$current = '';
?>						
		<div class="food-holder item <?php print($current);?>">
		  <div class="img-holder">
			  <img src="admin/pages/food/<?php print($row_food['flpicture']); ?>" />
		  </div>
		  <div class="content">
			  <h2 class="name"><?php print($row_food['flname']); ?></h2>
			  <h2 class="price"><?php print(number_format($row_food['flrate'],2)); ?> PHP</h2>
			  <p class="desc">
				<?php print($row_food['fldesc']); ?>
			  </p>
		  </div>
		</div>
<?php
		$food_count = $food_count + 1;
	}
?>									
						</div>

                          <!-- Left and right controls -->
                          <a class="left carousel-control custom-control" href="#foodCarousel" role="button" data-slide="prev">
                            <span class="icon icon-left fa fa-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control custom-control" href="#foodCarousel" role="button" data-slide="next">
                            <span class="icon icon-right fa fa-chevron-right"></span>
                            <span class="sr-only">Next</span>
                          </a>
                      </div>
                    </div>
                </div>
            </section>

        </div>

        <button class="show-form-menu" id="showFormMenu"><span class="book-now-text">BOOK NOW</span></button>
    </main>
    <footer>
        <section class="testimonial-sec">
            <div class="testi-gallery-holder">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
							<?php include "testimonial.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="instagram-feeds">
            <div id="instafeed">
                <div id="instagram-carousel"></div>
            </div>
        </section>
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <?php include "footer_menu.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>