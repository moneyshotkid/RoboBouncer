<?php 
//Function that removes the +1 from the phone number and formats it so the text-speech can read the phone number properly 
function cleanNumber($string){
	//eliminate every char except 0-9
	$justNums = preg_replace("/[^0-9]/", '', $string);
	//eliminate leading 1 if its there
	if (strlen($justNums) == 11) $justNums = preg_replace("/^1/", '',$justNums);
	return  trim(chunk_split($justNums, 1, ' '));
	}
	
$RecordingUrl=$_REQUEST['RecordingUrl'];
$cid=$_REQUEST['cid'];
$number=cleanNumber($_REQUEST['From']);

header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>
<Response>
  <Gather action="handleinput.php?cid='.$cid.'" numDigits="1" hints="accept,reject" input="speech dtmf" timeout="10"> <Say>You have a call from </Say><Say>'.$number.'</Say>
  <Play>'.$RecordingUrl.'.mp3 </Play>
    <Play>Press one or say accept to connect to the call, or press two or say reject to disconnect from the call</Play>
  </Gather>
</Response>'; ?>
