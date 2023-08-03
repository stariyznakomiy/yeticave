<?php

$is_auth = (bool) rand(0, 1);

// date_default_timezone_set("Europe/Moskow");

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$page_title = 'История просмотров';

require_once('data-categories.php');
require_once('data-lots.php');
require_once('functions.php');

$history_values = [];

if (isset($_COOKIE['history'])) {
    $history_values = json_decode($_COOKIE['history']);
}

$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];


$template = include_template('templates/history.php', ['lots' => $lots, 'history_values' => $history_values]);
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