<?php
	$query_foot = " 
		SELECT *
		FROM page_list
		WHERE plid = '$plid' ";
	$result_foot = mysql_query($query_foot);
	echo mysql_error();				
	while ($row_foot =  mysql_fetch_array ($result_foot)) 
	{
		$plid = $row_foot[plid];
		$plname = $row_foot[plname];
		$pltype = $row_foot[pltype];
		
		$pltext1 = $row_foot[pltext1];
		$pltext2 = $row_foot[pltext2];
		$pltext3 = $row_foot[pltext3];

		$plactive = $row_foot[plactive];
		$pluser = $row_foot[pluser];
		$plstamp = $row_foot[plstamp];
	}
?>	
  
    <nav class="navbar custom-navbar fixed-top">
        <div class="container">
        	<?php include "navigation.php" ?>
        </div>
    </nav>
    <main class="about">
        <div class="fixed-bg-pattern"></div>
        <div class="wrapper">
            <section class="about-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="company-background">
                                <p class="title"><?php print($plname); ?></p>
                                <div class="bg-text">
                                    <div class="bg_coln wide">
                                        <p>
									 	<?php print($pltext1); ?>
										</p>
                                    </div>
                                    <div class="bg_coln">
                                        <p>
									 	<?php print($pltext2); ?>
										</p>
                                    </div>
                                    <div class="bg_coln">
                                        <p>
									 	<?php print($pltext3); ?>
										</p>
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