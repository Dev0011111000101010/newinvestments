<?php
function sendMessageAll($message, $chatid = 335765864) {
//function sendMessageAll($message, $chatid = 454255748) {
	$token = '1683830902:AAEhgaJl5ocnNy7t-6tNoqcnyYKhZ79786Q';
	$url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatid}&text=";
	$url .= urlencode($message);
	$ch = curl_init();
	$options = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true
	);
	curl_setopt_array($ch, $options);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function addvisitcount_all() {
	$lidgenid = $_GET['lidgenid'];
	$unix = time();
	$ligdenobject = ['lidgenid'=>$lidgenid, 'unix'=>$unix];
	$newvalue = '';
//	$wptelegram_user_id = 233034127;
	$wptelegram_user_id = get_user_meta($lidgenid, 'wptelegram_user_id', true);
	if($ligdenobject) {
		if($lidgenid==1) {
			$message = "Благодаря вам на сайт investments.mentorsflow.com зашло: " . get_user_meta( $ligdenobject['lidgenid'], 'visit_lids', true ) . " человек. Ambassador: Илья";

			if($_GET['country']) {
				$message.= "\nСтрана: ".$_GET['country'].'.';
			}
			if($_GET['city']) {
				$message.= "\nГород: ".$_GET['city'].'.';
			}
			if($_GET['link']) {
				$message.= "\nТочка входа: ".$_GET['link'].'.';
			}
			sendMessage( $message );
		}else {
			$message = "Благодаря вам на сайт investments.mentorsflow.com зашло: " . get_user_meta( $ligdenobject['lidgenid'], 'visit_lids', true ) . " человек. \nВремя: ".date('G:i');

			if($_GET['country']) {
				$message.= "\nСтрана: ".$_GET['country'].'.';
			}
			if($_GET['city']) {
				$message.= "\nГород: ".$_GET['city'].'.';
			}
			if($_GET['link']) {
				$message.= "\nТочка входа: ".$_GET['link'].'.';
			}
			if ( $wptelegram_user_id ) {
				sendMessage( $message, $wptelegram_user_id );
			}
			$user = get_userdata( $lidgenid);
			$message = 'На сайт investments.mentorsflow.com зашел новый пользователь. Ambassador (id:'.$lidgenid.'): '.$user->display_name . '. Всего от ambassador: '. get_user_meta( $ligdenobject['lidgenid'], 'visit_lids', true ) .' человек';
			if($_GET['country']) {
				$message.= "\nСтрана: ".$_GET['country'].'.';
			}
			if($_GET['city']) {
				$message.= "\nГород: ".$_GET['city'].'.';
			}
			if($_GET['link']) {
				$message.= "\nТочка входа: ".$_GET['link'].'.';
			}
			sendMessage($message);
		}
	}
//	wp_send_json_success();
//
//	die; // даём понять, что обработчик закончил выполнение
}
?>