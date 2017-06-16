<?php
	$myadmin = 'N';
	if(isset($_SESSION['myadmin']))
		$myadmin = $_SESSION['myadmin'];	

	if ($myadmin == 'N')
	{
		include('body_account_not_found.php');
	}
	else
	{
		$mystatus = '';	
		if(isset($_GET['mystatus']))
		{
			if ($_GET['mystatus'])
			{
				$mystatus = $_GET['mystatus'];
			}
		}
		//echo '<br> mystatus : ' . $mystatus;
		
		$mybox = '';	
		if(isset($_GET['mybox']))
		{
			if ($_GET['mybox'])
			{
				$mybox = $_GET['mybox'];
			}
		}
		//echo '<br> mybox : ' . $mybox;
				
		$baid = 0;	
		if(isset($_GET['baid']))
		{
			if ($_GET['baid'])
			{
				$baid = $_GET['baid'];
			}
		}
		//echo '<br> baid : ' . $baid;

		if ($mystatus != 'sent')
		{	
$baid = 0;
$baorder = 0;
$baname = '';
$bafile = '';
$baurl = '';
$bapicture = '';

$blid = '';
$blname = '';

$baactive = 'Y';
$bauser = $_SESSION["ulname"];
$bastamp = $globaldatetime;

$formtitle = 'ADD RECORD';			

?>	
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Replace Campaign Banner Ad</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<table width="100%">
								<tr>
									<td align="left">
Basic Information
									</td>
									<td align="right">
<a href="index.php?body=banner_list_dbase">
Back to Banner List
</a>	
									</td>
								</tr>
							</table>
                        </div>
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<form role="form" method="post" action="index.php?body=banner_ad_addeditdel&mystatus=sent&mybox=<?php print($mybox); ?>&baid=<?php print($baid); ?>" enctype="multipart/form-data">

	<div class="form-group">
		<label>Please note that this will replace the banner ad in the front page of the website</label>
		<input type="file" name="fileToUpload" id="fileToUpload">		
	</div>		
	
	<input type="hidden" name="baid" value="<?php print ("$baid"); ?>" />
	<button type="submit" class="btn btn-default">Save</button>
	<button type="reset" class="btn btn-default">Reset</button>
</form>		
                                </div>		
                                <!-- /.col-lg-6 (nested) -->																								
							</div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
						
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
<?php
		}
		else
		{
$baid = $_POST['baid'];
$baorder = $_POST['baorder'];
$baname = $_POST['baname'];
$baname = htmlspecialchars($baname, ENT_QUOTES);

$bafile = $_POST['bafile'];
$baurl = $_POST['baurl'];
$bapicture = $_POST['bapicture'];

$blid = $_POST['blid'];
$blname = $_POST['blname'];
$blname = htmlspecialchars($blname, ENT_QUOTES);

$baactive = $_POST['baactive'];
$bauser = $_SESSION["ulname"];
$bastamp = $globaldatetime;

//echo "<br> baid " . $baid;

if ($mybox == 'add') 
{
	$formtitle = 'ADD RECORD';			
}
else
if ($mybox == 'edit') 
{
	$formtitle = 'MODIFY RECORD';			
}

if ($mybox == 'del')
{
	$formtitle = 'REMOVE RECORD';			
}
?>	

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Replace Campaign Banner Ad</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<table width="100%">
								<tr>
									<td align="left">
Basic Information
									</td>
									<td align="right">
<a href="index.php?body=banner_list_dbase">
Back to Banner List
</a>	
									</td>
								</tr>
							</table>
                        </div>
										
						
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
	
	<div class="form-group">
		<label>Picture</label>
		<br />
<?php	
//if they DID upload a file...
if($_FILES['fileToUpload']['name'])
{
	$bapicture = $_FILES['fileToUpload']['name'];	
	
	//if no errors...
	if(!$_FILES['fileToUpload']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$valid_file = true;
		$new_file_name = strtolower($_FILES['fileToUpload']['tmp_name']); //rename file
		if($_FILES['fileToUpload']['size'] > (1024000)) //can't be larger than 1 MB
		{
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}

		//if the file has passed the test
		if($valid_file)
		{
			//move it to where we want it to be
			$currentdir = getcwd();
			$target = '../.././assets/images/demoAD.jpg';
			move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
			$message = 'Congratulations!  Your file was accepted.';
		}
	}
	else
	{
   	    //if there is an error...
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['fileToUpload']['error'];
	}
}

//you get the following information for each file:
//echo "<br> name : " . $_FILES['fileToUpload']['name'];
//echo "<br> size : " . $_FILES['fileToUpload']['size'];
//echo "<br> type : " . $_FILES['fileToUpload']['type'];
//echo "<br> tmp_name : " . $_FILES['fileToUpload']['tmp_name'];
//echo "<br> Image Name : " . $bapicture;
//echo "<br> new_file_name : " . $new_file_name;
//echo "<br> currentdir : " . $currentdir;
//echo "<br> target : " . $target;

echo "<br> " . $message;

/*
	<HTML> 		
	<meta http-equiv="refresh" content="0;URL=index.php?body=banner_list_dbase">  
	</HTML>
*/
?>		
	</div>

                                </div>		
                                <!-- /.col-lg-6 (nested) -->																								
							</div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->						
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php	
		}
	}
?>			