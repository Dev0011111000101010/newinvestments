<?php
header('Content-type: application/json');

$lid = $_POST['lid'];

function sendMessage($token, $chatid, $message) {
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
$token = '1256392454:AAFhV5Nz8sOhGdbEGY3ZsQg8swMgKqaWhno';
$chatid = '335765864'; //Aristokrat
//$chatid = '454255748'; //Misha

if($_POST['tel']) {
    $message.="С сайта mentorsflow.com пришла новая заявка. \nНомер телефона: ".$_POST['tel'].".\nВремя: ".date('G:i').".";
}else {
    $message.="С сайта mentorsflow.com произошел переход по ссылке телеграмма. \nВремя: ".date('G:i').".";
}

$lid ? $message.="\nЛид: ".$lid.'.' : false;


if($_POST['country']) {
    $message.= "\nСтрана: ".$_POST['country'].'.';
}

if($_POST['city']) {
    $message.= "\nГород: ".$_POST['city'].'.';
}
$response;
// тепер, власне, виконання:
$result = json_decode(sendMessage($token, $chatid, $message));
if(isset($result->ok) && $result->ok) {
    $response['body'] = 'Ваше сообщение отправлено';
} elseif (!$result->ok) {
    $response['error'] = true;
    $response['body'] = $result->error_code . ': ' . $result->description;
} else {
    $response['error'] = true;
    $response['body'] = 'Неизвестная ошибка. Извините :(';
};

printf(json_encode($response));
?>