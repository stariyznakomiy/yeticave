<?php

$is_auth = (bool) rand(0, 1);

// date_default_timezone_set("Europe/Moskow");

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$page_title = 'Главная';

require_once('categories.php');
require_once('ads.php');
require_once('functions.php');

$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);

if($url[0] === "/"){
    $template = include_template('templates/index.php', ['ads' => $ads ]);
} else if ($url[0] === "/lot.php") {
    $lot_id = null;
    $lot = null;
    if (isset($_GET['lot_id'])) {
        $lot_id = $_GET['lot_id'];
        if (isset($ads[$lot_id])){
            $lot = $ads[$lot_id];
        }
    }
    $template = include_template('templates/lot.php', ['lot' => $lot ]);
}

$layout = include_template('templates/layout.php', 
    [ 
        'content' => $template, 
        'is_auth' => $is_auth, 
        'user_name' => $user_name, 
        'user_avatar' => $user_avatar, 
        'page_title' => $page_title, 
        'categories' => $categories 
    ]
);

print($layout);