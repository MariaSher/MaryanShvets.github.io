<?php 

include( $_SERVER['DOCUMENT_ROOT'].'/app/api/class.php');

API::connect();

$status = 'bad';

if (empty($_COOKIE['user_id'])) {
	
	$user = md5(time());
	$status = 'ok';

	setcookie('user_id', $user, time() + (86400 * 540), "/"); // 86400 = 1 day

}elseif(!empty($_COOKIE['user_id'])){

	$user = $_COOKIE['user_id'];
	$status = 'ok';

}else{

	die();
}


if (empty($_COOKIE['affilate'])) {

	$affilate_id = 0;

}elseif(!empty($_COOKIE['affilate'])){

	$affilate_id = $_COOKIE['affilate'];

}else{

	die();
}

if( $status == 'ok' ){

	$utm_medium='0';
	$utm_source='0';
	$utm_campaign='0';
	$utm_term='0';
	$utm_content='0';
	$af = '0';

	$agent = '0';
 	$country = '0';
 	$city = '0';
 	$device = '0';
 
	$referer = strtok($_SERVER['HTTP_REFERER'], '?');

	$parsed_url = parse_url($_SERVER['HTTP_REFERER']);
    if (!empty($parsed_url['query'])) {
       $str = $parsed_url['query'];
       parse_str($str);
    }

    if ($af !== '0') {

    	setcookie('affilate', $af, time() + (86400 * 14), "/", ".polza.com"); // 86400 = 1 day
		$affilate_id = $af;
    }

    $sql = "INSERT INTO `app_events`";
    $sql.= "( `user`, `agent`, `country`, `city`, `device`, `url`, `utm_source`, `utm_medium`, `utm_campaign`, `utm_content`, `utm_term`,  `affilate` ) ";
    $sql.= " VALUES ";
    $sql.= "('$user', '$agent', '$country', '$city', '$device', '$referer', '$utm_source', '$utm_medium', '$utm_campaign', '$utm_content', '$utm_term', '$affilate_id')";

    API::query($sql);
}

?>