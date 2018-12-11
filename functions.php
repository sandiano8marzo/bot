<?php
function sendFoto($chatID, $img, $rmf = false, $cap = '',$api)
{
		//$api="487428045:AAFHYEqqftrK7xJvW8_9anPiodBw0HHuWkE";
		
		


		$rm = array('inline_keyboard' => $rmf,
		);
		$rm = json_encode($rm);


		if(strpos($img, "."))
		{
		$img = $_SERVER['SCRIPT_URI'].$img;
		}
		echo $img;
		$actual_link = str_replace("execute.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		$img = $actual_link.$img;
		echo $actual_link;
		$args = array(
		'chat_id' => $chatID,
		'photo' => $img,
		'caption' => $cap
		);
		if($rmf) $args['reply_markup'] = $rm;
		$r = new HttpRequest("post", "https://api.telegram.org/bot$api/sendPhoto", $args);




		$rr = $r->getResponse();
		$ar = json_decode($rr, true);
		$ok = $ar["ok"]; //false
		$e403 = $ar["error_code"];
		echo $e403;
		if($e403 == "403")
		{
		return false;
		}elseif($e403){
		return false;
		}else{
		return true;
		}
}
function sendAudio($chatID, $img, $rmf = false, $cap = '',$api)
{
		//$api="487428045:AAFHYEqqftrK7xJvW8_9anPiodBw0HHuWkE";
		



		$rm = array('inline_keyboard' => $rmf,
		);
		$rm = json_encode($rm);


		if(strpos($img, "."))
		{
		$actual_link = str_replace("execute.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		$img = $actual_link.$img;
		}
		else{
		$actual_link = str_replace("execute.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		$img = $actual_link.$img;
		}
		echo $img;
		$args = array(
		'chat_id' => $chatID,
		'audio' => $img,
		'caption' => $cap
		);
		if($rmf) $args['reply_markup'] = $rm;
		$r = new HttpRequest("post", "https://api.telegram.org/bot$api/sendAudio", $args);

		//echo"\n https://api.telegram.org/bot$api/sendAudio?chat_id=$chatID&audio=$img";


		$rr = $r->getResponse();
		$ar = json_decode($rr, true);
		$ok = $ar["ok"]; //false
		$e403 = $ar["error_code"];
		echo $e403;
		if($e403 == "403")
		{
		return false;
		}elseif($e403){
		return false;
		}else{
		return true;
		}
}
function sendDocument($chatID, $img, $rmf = false, $cap = '',$api)
{
		//$api="487428045:AAFHYEqqftrK7xJvW8_9anPiodBw0HHuWkE";
		



		$rm = array('inline_keyboard' => $rmf,
		);
		$rm = json_encode($rm);


		if(strpos($img, "."))
		{
		$actual_link = str_replace("execute.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		$img = $actual_link.$img;
		}
		else{
		$actual_link = str_replace("execute.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
		$img = $actual_link.$img;
		}
		echo $img;
		$args = array(
		'chat_id' => $chatID,
		'document' => $img,
		'caption' => $cap
		);
		if($rmf) $args['reply_markup'] = $rm;
		$r = new HttpRequest("post", "https://api.telegram.org/bot$api/sendDocument", $args);

		//echo"\n https://api.telegram.org/bot$api/sendAudio?chat_id=$chatID&audio=$img";


		$rr = $r->getResponse();
		$ar = json_decode($rr, true);
		$ok = $ar["ok"]; //false
		$e403 = $ar["error_code"];
		echo $e403;
		if($e403 == "403")
		{
		return false;
		}elseif($e403){
		return false;
		}else{
		return true;
		}
}

?>
