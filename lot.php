<?php

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$page_title = 'Лот';

require_once('data-categories.php');
require_once('data-lots.php');
require_once('functions.php');

$lot_id = null;
$lot = null;

if (isset($_GET['lot_id'])) {
	$lot_id = $_GET['lot_id'];

    if (isset($lots[$lot_id])){
        $lot = $lots[$lot_id];
    }
}

if (!$lot) {
	http_response_code(404);
}

$history_name = "history";
$history_values[] = $lot_id;
$expire = strtotime("+30 days");
$path = "/";

if($lot){

    if (isset($_COOKIE['history'])) {
        $history_values = json_decode($_COOKIE['history']);
        if (!in_array($lot_id, $history_values)) {
            $history_values[] = $lot_id;
        }
    }

    setcookie($history_name, json_encode($history_values), $expire, $path);
}

$template = include_template('templates/lot.php', ['lot' => $lot, ]);
$layout = include_template('templates/layout.php', 
    [ 
        'content' => $template,  
        'is_auth' => $is_auth, 
        'user_name' => $user_name, 
        'user_avatar' => $user_avatar, 
        'page_title' => $page_title, 
        'categories' => [] 
    ]
);

print($layout);

