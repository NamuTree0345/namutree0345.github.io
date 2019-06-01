<?php
if(isset($_POST['g-recaptcha-response'])){
  $captcha=$_POST['g-recaptcha-response'];
}

if(!$captcha) {
  echo '등록폼에 리캡챠를 확인하세요.';
}

$secretKey = "6LevnaYUAAAAADhT_6HZa3vypYE4U6Kk2L_w8C5R";
$ip = $_SERVER['REMOTE_ADDR'];

$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
$responseKeys = json_decode($response,true);

if(intval($responseKeys["success"]) !== 1) {
	echo '검증을 통과하지 못했습니다.';
} else {
	echo '검증을 통과 했습니다.';
}
?>
