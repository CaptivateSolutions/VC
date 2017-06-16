    <nav class="navbar custom-navbar fixed-top">
        <div class="container">
        	<?php include "navigation.php" ?>
        </div>
    </nav>
    <main class="promotions-page">
        <div class="fixed-bg-pattern"></div>
        <div class="wrapper">
            <section class="promotions-content">
                <div class="container">
                    <div class="row">
                        <div class="promotion-list">
                            <div class="col-xs-12">
                                <div class="accordion" id="mainAcc">

                                    <div class="panel acc_main_holder">
									
									
<?php
	$promolist_count = 1;
	$query_promolist = " 
		SELECT 
			count(c.plid) plcount, 
			b.blid , b.blcode, b.blname
		FROM 
			branch_list b, promotion_list c
		WHERE 
		    b.blid = c.blid and 
		 	b.blactive = 'Y' and
			b.blcode <> '' and
			c.plfrom <= '$globaldate' and 
			c.plto >= '$globaldate' and 
		    c.plcode <> '' and
			c.plactive = 'Y' 
		GROUP BY
		    b.blid , b.blcode, b.blname
		ORDER BY 
			b.blcode ";
	$result_promolist = mysql_query($query_promolist);
	echo mysql_error();				
	while ($row_promolist =  mysql_fetch_array ($result_promolist)) 
	{
		$promo_blid = $row_promolist['blid'];
		$promo_blcode = $row_promolist['blcode'];
		$promo_blname = $row_promolist['blname'];

		//echo " <br> promo_blcode " . $promo_blcode;
		$promo_blcode_hash = str_replace(' ', '_', $promo_blcode);		
		?> 				
		<div class="panel acc_main_holder">
			<div class="acc_list_head">
				<h3 class="" data-parent="#mainAcc" data-toggle="collapse" data-target="#<?php print($promo_blcode_hash); ?>">
				<span class="cr_loc"><?php print($promo_blcode); ?></span>
				</h3>
			</div>
			<div class="acc_list_body collapse accordion" id="<?php print($promo_blcode_hash); ?>">
			
			<?php                                            
			$branchlist_count = 1;
			$query_branchlist = " 
				SELECT 
					*
				FROM 
					promotion_list c
				WHERE 
					c.blid = '$promo_blid' and 
					c.plfrom <= '$globaldate' and 
					c.plto >= '$globaldate' and 
					c.plcode <> '' and
					c.plactive = 'Y' 
				ORDER BY 
					c.plcode ";
			$result_branchlist = mysql_query($query_branchlist);
			echo mysql_error();				
			while ($row_branchlist =  mysql_fetch_array ($result_branchlist)) 
			{
				$branch_blid = $row_branchlist['plid'];
				$branch_blcode = $row_branchlist['plcode'];
				$branch_blname = $row_branchlist['plname'];
				?> 													
				<div class="panel sub_acc_holder">
					<div class="sub_acc_list_head">
						<h4 class="" data-parent="#<?php print($row_promolist['blcode']); ?>" data-toggle="collapse" data-target="#promo<?php print($branch_blid); ?>">
						<span class="promo_title"><?php print($row_branchlist['plname']); ?></span>
						<span class="promo_posted">Posted: <?php print($row_branchlist['plstamp']); ?></span>
						</h4>
					</div>
					<div class="sub_acc_list_body collapse" id="promo<?php print($branch_blid); ?>">
						<div class="col-xs-12 col-sm-6 col-md-8">
							<div class="promo_image">
								<img src="admin/pages/promo/<?php print($row_branchlist['plpicture']); ?>" />
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="promo_desc">
								<?php print($row_branchlist['pldesc']); ?>
							</div>
						</div>
					</div>
				</div>
				<?php
				$branchlist_count = $branchlist_count + 1;
			}
			?>	
															
                                        </div>
                                    </div>
	<?php
		$promolist_count = $promolist_count + 1;
	}
	?>						
									
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
