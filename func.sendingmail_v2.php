<?php
function gethttp_value($url){
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function sendingmail($subject,$address,$body,$replyto = "sidik@corphr.com|CHR Dashboard System") {
	require_once("phpmailer/class.phpmailer.php");
	include_once("phpmailer/class.smtp.php");
	$domain = explode("@",$address);

	$_server = 1;
	$config[1]["secure"] = "ssl";
        $config[1]["host"] = "webmail.corphr.com";
        $config[1]["port"] = 465;
        $config[1]["username"] = "admin@indottech.corphr.com";
        $config[1]["password"] = "admin123";

	$mail             = new PHPMailer();
	$mail->IsSMTP(); 
	$mail->SMTPDebug  = 0;
	$mail->SMTPAuth   = true;
	$mail->SMTPSecure = $config[$_server]["secure"];
	$mail->Host       = $config[$_server]["host"];
	$mail->Port       = $config[$_server]["port"];
	$mail->Username   = $config[$_server]["username"];
	$mail->Password   = $config[$_server]["password"];

	$mail->SMTPKeepAlive = true;  
	$mail->Mailer = "smtp"; 
	$mail->CharSet = 'utf-8';  
	$arr_replyto = explode("|",$replyto);
	$mail->SetFrom('sidik@corphr.com', 'CHR Dashboard System');
	$mail->AddReplyTo($arr_replyto[0],$arr_replyto[1]);
	$mail->Subject    = $subject;

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";

	$mail->MsgHTML($body);

	$mail->AddAddress($address);

	if(!$mail->Send()) { return "0"; } else { return "1"; }
}
?>
