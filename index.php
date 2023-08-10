<?php

session_start();

// date_default_timezone_set("Europe/Moskow");

$user_avatar = 'img/user.jpg';

$page_title = 'Главная';

require_once('data-categories.php');
require_once('data-lots.php');
require_once('functions.php');


$template = include_template('templates/index.php', ['lots' => $lots, ]);
$layout = include_template('templates/layout.php', 
    [ 
        'content' => $template, 
        'user_avatar' => $user_avatar, 
        'page_title' => $page_title, 
        'categories' => $categories 
    ]
);

print($layout);

