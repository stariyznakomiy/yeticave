<?php

$is_auth = (bool) rand(0, 1);

date_default_timezone_set("Europe/Moskow");

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$page_title = 'Главная';

$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];

$ads = [
    [
        "Название" => "2014 Rossignol District Snowboard",
        "Категория" => $categories[0],
        "Цена" => 10999,
        "url" => "img/lot-1.jpg"
    ],
    [
        "Название" => "DC Ply Mens 2016/2017 Snowboard",
        "Категория" => $categories[0],
        "Цена" => 159999,
        "url" => "img/lot-2.jpg"
    ],
    [
        "Название" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "Категория" => $categories[1],
        "Цена" => 8000,
        "url" => "img/lot-3.jpg"
    ],
    [
        "Название" => "Ботинки для сноуборда DC Mutiny Charocal",
        "Категория" => $categories[2],
        "Цена" => 10999,
        "url" => "img/lot-4.jpg"
    ],
    [
        "Название" => "Куртка для сноуборда DC Mutiny Charocal",
        "Категория" => $categories[3],
        "Цена" => 7500,
        "url" => "img/lot-5.jpg"
    ],
    [
        "Название" => "Маска Oakley Canopy",
        "Категория" => $categories[5],
        "Цена" => 5400,
        "url" => "img/lot-6.jpg"
    ]
];

require_once('functions.php');

$template = include_template('templates/index.php', ['ads' => $ads, ]);
$layout = include_template('templates/layout.php', 
    [ 
        'main_content' => $template, 
        'is_auth' => $is_auth, 
        'user_name' => $user_name, 
        'user_avatar' => $user_avatar, 
        'page_title' => $page_title, 
        'categories' => $categories 
    ]
);

print($layout);

