<?php
add_action( 'wp_ajax_setlocalstorage', 'addvisitcount' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_setlocalstorage', 'addvisitcount' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
// первый хук для авторизованных, второй для не авторизованных пользователей

function addvisitcount(){
	$lidgenid = $_GET['lidgenid'];
	$unix = time();
	$ligdenobject = ['lidgenid'=>$lidgenid, 'unix'=>$unix];
	$wptelegram_user_id = wptelegram_login_user_id($lidgenid);
	if($ligdenobject) {
		setcookie( 'lidgen_data', serialize( $ligdenobject ), time() + ( 60 * 60 * 24 * 1200 ), '/', $_SERVER['HTTP_HOST'] );
		if ( ! get_user_meta( $ligdenobject['lidgenid'], 'visit_lids', true ) ) {
			update_user_meta( $ligdenobject['lidgenid'], 'visit_lids', 1 );
		} else {
			$newvalue = get_user_meta( $ligdenobject['lidgenid'], 'visit_lids', true ) + 1;
			update_user_meta( $ligdenobject['lidgenid'], 'visit_lids', $newvalue );

		}
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

	echo 'success';

	die; // даём понять, что обработчик закончил выполнение
}

function so_post_40744782( $new_status, $old_status, $post ) {
	if ( $new_status == 'publish' && $old_status != 'publish') {
		$author_id = $post->post_author;
		$userlidgen = get_user_meta($author_id, 'lid_of', true) || 1;
		if($userlidgen) {
			$usersquery = get_users(['meta_key', 'lid_of', 'meta_value'=>$userlidgen]);
			$countprojects = 0;
			foreach ($usersquery as $user) {
				$query = new WP_Query(array('author'=>$user->id, 'posts_per_page'=> -1));
				$countprojects+=$query->post_count;
			}
			$message = 'Благодаря вам опубликовано на сайте investments.mentorsflow.com: '.$countprojects.' проектов';
			$wptelegram_user_id = wptelegram_login_user_id($userlidgen);
			if($wptelegram_user_id) {
				sendMessage($message, $wptelegram_user_id);
			}
			$user = get_userdata($userlidgen);
			$message = 'На сайте investments.mentorsflow.com опубликован новый проект. Ссылка: '.get_permalink($post->ID).' Ambassador (id:'.$userlidgen.'): '.$user->display_name. '. Всего от ambassador: '.$countprojects.' постов.';
			sendMessage($message);
		}else {
			$usersquery = new WP_User_Query(
				[
					'meta_query' => [
						[
							'key'     => 'lid_of',
							'compare' => 'NOT EXISTS'
						]
					]
				]
			);
			$total = $usersquery->get_results();
			$countprojects = 0;
			foreach ($total as $user) {
				$query = new WP_Query(array('author'=>$user->id, 'posts_per_page'=> -1));
				$countprojects+=$query->post_count;
			}
			$message = 'Благодаря вам опубликовано на сайте investments.mentorsflow.com: '.$countprojects.' проектов. Ambassador: Илья';
			sendMessage($message);
		}
	}
}
add_action('transition_post_status', 'so_post_40744782', 10, 3 );


add_action( 'user_register', 'lid_of_add' );
function lid_of_add( $user_id ) {
	if(isset($_COOKIE['lidgen_data'])) {
		$getcookie = unserialize(stripslashes(urldecode($_COOKIE['lidgen_data'])));
		$lid_of = $getcookie['lidgenid'] || 7;
		$unix = $getcookie['unix'];
		$checknumber = time() - (3600*24*90);//90 days
		if((time() - $unix)<$checknumber) {
			update_user_meta($user_id, 'lid_of', $lid_of);
		}
		$wptelegram_user_id = wptelegram_login_user_id($lid_of);
		if($lid_of == 1) {
			$usersquery = new WP_User_Query(
				[
					'meta_query' => [
						[
							'key'     => 'lid_of',
							'compare' => 'NOT EXISTS'
						]
					]
				]
			);
			$total = $usersquery->get_total();
			$message = 'Благодаря вам на сайте investments.mentorsflow.com зарегистрировалось: '.$total.' человек. Ambassador: Илья';
			sendMessage($message);
		}else {
			$usersquery = get_users(['meta_key' => 'lid_of', 'meta_value'=>$lid_of]);
			if($wptelegram_user_id) {
				$message = 'Благодаря вам на сайте investments.mentorsflow.com зарегистрировалось: '.count($usersquery).' человек';
				sendMessage($message, $wptelegram_user_id);
			}
			$user = get_userdata($lid_of);
			$message = 'На сайте investments.mentorsflow.com зарегистрировался новый пользователь. Ambassador (id:'.$lid_of.'): '.$user->display_name. '. Всего от ambassador: '.count($usersquery).' человек.';
			sendMessage($message);
		}
	}
}