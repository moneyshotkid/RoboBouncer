
<?php
//Load Twilio SDK
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;


$RecordingUrl=$_REQUEST['RecordingUrl']; 
$cid=$_REQUEST["cid"];

// Find your Account Sid and Auth Token at twilio.com/console
$sid = "AC*******************";
$token = "**********************";

$twilio1 = new Client($sid, $token);
$twilio2 = new Client($sid, $token);

$call1 = $twilio1->calls($cid)->fetch();

//Replace with phone numbers
$call2 = $twilio2->calls->create("{{Target Phone Number +17145551234}}", // to
                        "{{Twilio Phone Number +17145551212}}", // from
                        array("url" => "playrecording.php?RecordingUrl=".$RecordingUrl."&cid=".$cid, , "StatusCallbackEvent"=>"completed","StatusCallback"=>"screener4_2.php?cb=1&cid=".$cid)
               );

?>
