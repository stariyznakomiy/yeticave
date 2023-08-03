<?php

$is_auth = (bool) rand(0, 1);

// date_default_timezone_set("Europe/Moskow");

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$page_title = 'Главная';

require_once('data-categories.php');
require_once('data-lots.php');
require_once('functions.php');


$template = include_template('templates/index.php', ['lots' => $lots, ]);
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

