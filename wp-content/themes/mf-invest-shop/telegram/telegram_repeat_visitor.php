<?php
add_action( 'wp_ajax_repeat_visit', 'addvisitcount_all' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_repeat_visit', 'addvisitcount_all' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}

function sendMessageRepeat($message, $chatid = 335765864) {
//function sendMessageRepeat($message, $chatid = 454255748) {
	$token = '1683830902:AAEhgaJl5ocnNy7t-6tNoqcnyYKhZ79786Q';
	$url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatid}&text=";
	$url .= urlencode($message);
	$ch = curl_init();
	$options = [
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true
	];
	curl_setopt_array($ch, $options);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function addvisitcount_all() {
	$lidgenid = $_GET['lidgenid'] ? $_GET['lidgenid'] : 1;

	if ( $lidgenid ) {
		$user    = get_userdata( $lidgenid );
		$loggeduser = wp_get_current_user();
		$username = $user->display_name ? $user->display_name : 'Илья';
		$loggedusername = $loggeduser->display_name;
		$message = 'Благодаря вам на сайт investments.mentorsflow.com повторно зашел посетитель. Ambassador (id:'.$lidgenid.'): '.$username.'.';

		if($loggedusername) {
			$message .= "\nИмя пользователя: " . $loggedusername . '.';
		}

		if ( $_GET['country'] ) {
			$message .= "\nСтрана: " . $_GET['country'] . '.';
		}

		if ( $_GET['city'] ) {
			$message .= "\nГород: " . $_GET['city'] . '.';
		}

		if ( $_GET['link'] ) {
			$message .= "\nТочка входа: " . $_GET['link'] . '.';
		}
		sendMessageRepeat( $message );

		$message = 'Благодаря вам на сайт investments.mentorsflow.com повторно зашел посетитель.';

		if($loggedusername) {
			$message .= "\nИмя пользователя: " . $loggedusername . '.';
		}

		if ( $_GET['country'] ) {
			$message .= "\nСтрана: " . $_GET['country'] . '.';
		}

		if ( $_GET['city'] ) {
			$message .= "\nГород: " . $_GET['city'] . '.';
		}

		if ( $_GET['link'] ) {
			$message .= "\nТочка входа: " . $_GET['link'] . '.';
		}

		sendMessageRepeat( $message, wptelegram_login_user_id($_GET['lidgenid']));

	}
	wp_send_json_success();

	die; // даём понять, что обработчик закончил выполнение
}
?>