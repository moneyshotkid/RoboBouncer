
<?php
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;
$cid=$_REQUEST['cid'];

function cleanNumber($string){
	//eliminate every char except 0-9
	$justNums = preg_replace("/[^0-9]/", '', $string);
	//eliminate leading 1 if its there
	if (strlen($justNums) == 11) $justNums = preg_replace("/^1/", '',$justNums);
	return $justNums;
	}
	$PhoneOut=cleanNumber($_REQUEST['To']);

// Find your Account Sid and Auth Token at twilio.com/console
//$sid = "AC*******************";
//$token = "*************************";
$client = new Client($sid, $token);

//Name from Step2.xml
$confroom="{{Quene name}}";
 if($_POST['Digits']==1 || $_POST['SpeechResult']=="accept"){  
	header("Content-type: text/xml");
	echo '<?xml version="1.0" encoding="UTF-8"?><Response><Say>Connecting your call</Say><Dial><Queue>'.$confroom.'</Queue></Dial></Response>';
exit;
}else if($_POST['Digits']==2 || $_POST['SpeechResult']=="reject"){
$c=$client->calls($cid)->update(array("method" => "POST","url"=>"rejectcall.xml"));
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?><Response><Say>Okay Good bye</Say><Hangup/></Response>';
exit;
}else if($_GET['cb']==1){
$c=$client->calls($cid)->update(array("method" => "POST","url"=>"https://handler.twilio.com/twiml/EH1601ebfc1ddc746d3954bc1a94d5a1b4"));
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?><Response><Say>Okay Good bye</Say><Hangup/></Response>';
}


?>
