<nav class="navbar custom-navbar fixed-top">
        <div class="container">
        	<?php include "navigation.php" ?>
        </div>
    </nav>
    <main class="menu-page menu-catalog">
        <div class="fixed-bg-pattern"></div>
        <div class="wrapper">
            <section class="menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                    <div class="food-selection-sidebar menu-catalog-sidebar sticky-sidebar">
										<form id="food-selection" name="food-selection" action="index.php?body=menu-catalog" method="post">		
                                        <div class="food-choices">
                                            <img src="assets/images/Chef_Victoria.png" />
											
<?php

	$menu_count1 = ''; if(isset($_POST['menu_count1'])) { $menu_count1 = $_POST['menu_count1']; }
	$menu_count2 = ''; if(isset($_POST['menu_count2'])) { $menu_count2 = $_POST['menu_count2']; }
	$menu_count3 = ''; if(isset($_POST['menu_count3'])) { $menu_count3 = $_POST['menu_count3']; }
	$menu_count4 = ''; if(isset($_POST['menu_count4'])) { $menu_count4 = $_POST['menu_count4']; }
	$menu_count5 = ''; if(isset($_POST['menu_count5'])) { $menu_count5 = $_POST['menu_count5']; }
	$menu_count6 = ''; if(isset($_POST['menu_count6'])) { $menu_count6 = $_POST['menu_count6']; }
	$menu_count7 = ''; if(isset($_POST['menu_count7'])) { $menu_count7 = $_POST['menu_count7']; }
	$menu_count8 = ''; if(isset($_POST['menu_count8'])) { $menu_count8 = $_POST['menu_count8']; }
	$menu_count9 = ''; if(isset($_POST['menu_count9'])) { $menu_count9 = $_POST['menu_count9']; }
	$menu_count10 = ''; if(isset($_POST['menu_count10'])) { $menu_count10 = $_POST['menu_count10']; }

	$menu_count11 = ''; if(isset($_POST['menu_count11'])) { $menu_count11 = $_POST['menu_count11']; }
	$menu_count12 = ''; if(isset($_POST['menu_count12'])) { $menu_count12 = $_POST['menu_count12']; }
	$menu_count13 = ''; if(isset($_POST['menu_count13'])) { $menu_count13 = $_POST['menu_count13']; }
	$menu_count14 = ''; if(isset($_POST['menu_count14'])) { $menu_count14 = $_POST['menu_count14']; }
	$menu_count15 = ''; if(isset($_POST['menu_count15'])) { $menu_count15 = $_POST['menu_count15']; }
	$menu_count16 = ''; if(isset($_POST['menu_count16'])) { $menu_count16 = $_POST['menu_count16']; }
	$menu_count17 = ''; if(isset($_POST['menu_count17'])) { $menu_count17 = $_POST['menu_count17']; }
	$menu_count18 = ''; if(isset($_POST['menu_count18'])) { $menu_count18 = $_POST['menu_count18']; }
	$menu_count19 = ''; if(isset($_POST['menu_count19'])) { $menu_count19 = $_POST['menu_count19']; }
	$menu_count20 = ''; if(isset($_POST['menu_count20'])) { $menu_count20 = $_POST['menu_count20']; }

	$menu_count21 = ''; if(isset($_POST['menu_count21'])) { $menu_count21 = $_POST['menu_count21']; }
	$menu_count22 = ''; if(isset($_POST['menu_count22'])) { $menu_count22 = $_POST['menu_count22']; }
	$menu_count23 = ''; if(isset($_POST['menu_count23'])) { $menu_count23 = $_POST['menu_count23']; }
	$menu_count24 = ''; if(isset($_POST['menu_count24'])) { $menu_count24 = $_POST['menu_count24']; }
	$menu_count25 = ''; if(isset($_POST['menu_count25'])) { $menu_count25 = $_POST['menu_count25']; }
	$menu_count26 = ''; if(isset($_POST['menu_count26'])) { $menu_count26 = $_POST['menu_count26']; }
	$menu_count27 = ''; if(isset($_POST['menu_count27'])) { $menu_count27 = $_POST['menu_count27']; }
	$menu_count28 = ''; if(isset($_POST['menu_count28'])) { $menu_count28 = $_POST['menu_count28']; }
	$menu_count29 = ''; if(isset($_POST['menu_count29'])) { $menu_count29 = $_POST['menu_count29']; }
	$menu_count30 = ''; if(isset($_POST['menu_count30'])) { $menu_count30 = $_POST['menu_count30']; }

/*
echo "<br> menu_count1 " . $menu_count1;  
echo "<br> menu_count2 " . $menu_count2;  
echo "<br> menu_count3 " . $menu_count3;  
*/

	$menu_count = 1;
	$query_menu = " 
		SELECT 
			*
		FROM 
			food_type a
		WHERE 
			a.ftactive = 'Y' and
			a.ftname <> '' 
		ORDER BY 
			a.ftname ";
	$result_menu = mysql_query($query_menu);
	echo mysql_error();				
	while ($row_menu =  mysql_fetch_array ($result_menu)) 
	{
?>															
		<div class="radio-selector">
			<input type="checkbox" name="menu_count<?php print($menu_count); ?>" id="menu_count<?php print($menu_count); ?>" value="<?php print($row_menu['ftname']); ?>">
			<label class="" for="menu_count<?php print($menu_count); ?>"><?php print($row_menu['ftname']); ?></label>
		</div>	
 <?php 
		$menu_count = 	$menu_count + 1;
	}
	/*
?>												
											
											<div class="radio-selector">
                                                <input type="checkbox" name="food_appetizers" id="appetizers">
                                                <label class="" for="appetizers">Appetizers</label>
                                            </div>
                                            <div class="radio-selector">
                                                <input type="checkbox" name="food_breakfast" id="breakfast">
                                                <label class="" for="breakfast">Breakfast</label>
                                            </div>
                                            <div class="radio-selector">
                                                <input type="checkbox" name="food_maindish" id="main_dish">
                                                <label class="" for="main_dish">Main Dish</label>
                                            </div>
                                            <div class="radio-selector">
                                                <input type="checkbox" name="food_soup" id="soup">
                                                <label class="" for="soup">Soup</label>
                                            </div>
<?php
	*/
?>											
                                            <div class="order-bttn-holder">
<br /><input form="food-selection" type="submit" name="proceed_to_confirmation" class="form-control btn order-now-bttn" value="View Menu" />
                                            </div>											
                                        </div>
										</form>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-9">
                                    <div class="menu-items">
                                         <div class="grid">

<?php
	$mycount = 1;
	$mystring = '';
	$mymenu = '';
	$query_food = " 
		SELECT 
			*
		FROM 
			branch_list b, food_list c, food_type d
		WHERE 
			b.blid = c.blid and 
			c.ftid = d.ftid and 
			b.blactive = 'Y' and
			b.blcode <> '' and
			c.flactive = 'Y' and
			c.flname <> '' and
			c.flrate > 0 and ( ";
	
	while ($mycount <= 30)
	{		
		if ($mycount == 1) $mymenu = $menu_count1;
		if ($mycount == 2) $mymenu = $menu_count2;
		if ($mycount == 3) $mymenu = $menu_count3;
		if ($mycount == 4) $mymenu = $menu_count4;
		if ($mycount == 5) $mymenu = $menu_count5;
		if ($mycount == 6) $mymenu = $menu_count6;
		if ($mycount == 7) $mymenu = $menu_count7;
		if ($mycount == 8) $mymenu = $menu_count8;
		if ($mycount == 9) $mymenu = $menu_count9;
		if ($mycount == 10) $mymenu = $menu_count10;

		if ($mymenu != '') 
		{
			if ($mystring != '') 
			  $mystring = $mystring . " or ";
			  
			$mystring = $mystring .  " ( d.ftname = '$mymenu' ) "; 
		}
		
		$mycount = $mycount + 1; 
	}
	  	
	if ($mystring == '') 
		$mystring = 'd.ftid = d.ftid';	
		
	$query_food = $query_food . $mystring ;
			
	$query_food = $query_food . " )
		ORDER BY 
			b.blcode, c.flname ";
	$result_food = mysql_query($query_food);
	echo mysql_error();	
	
//echo "<br> query_food " . $query_food;	
				
	while ($row_food =  mysql_fetch_array ($result_food)) 
	{
?>									
                                            <div class="grid-item">
                                                <div class="img-holder">
                                                    <img class="plus-order" src="admin/pages/food/<?php print($row_food['flpicture']); ?>" />
                                                </div>
                                                <div class="info">
                                                    <div class="np-holder">
                                                        <div class="item-name"><?php print($row_food['flname']); ?></div>
                                                        <div class="item-price"><?php print(number_format($row_food['flrate'],2)); ?> PHP</div>
                                                    </div>
                                                    <div class="desc">
                                                        <p>
                                                            <?php print($row_food['fldesc']); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
<?php 
		$food_count = 	$food_count + 1;
	}
?>												
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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