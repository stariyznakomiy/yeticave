<?php

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];

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

$template = include_template('templates/lot.php', ['lot' => $lot, ]);
$layout = include_template('templates/layout.php', 
    [ 
        'content' => $template,  
        'is_auth' => $is_auth, 
        'user_name' => $user_name, 
        'user_avatar' => $user_avatar, 
        'page_title' => 'Yeticave - просмотр лота', 
        'categories' => [] 
    ]
);

print($layout);

