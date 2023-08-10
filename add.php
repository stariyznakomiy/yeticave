<?php

session_start();

// date_default_timezone_set("Europe/Moskow");

if(!isset($_SESSION["user"])){
	http_response_code(403);
}

$user_avatar = 'img/user.jpg';
$page_title = 'Добавление лота';
require_once('data-categories.php');
require_once('data-lots.php');
require_once('functions.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $lot = $_POST;

  $required = ['Название', 'Категория', 'Описание', 'Цена', 'Шаг_ставки', 'Дата_окончания'];
	$errors = [];

  foreach ($required as $key) {
		if (empty($_POST[$key])) {
            $errors[$key] = 'Это поле надо заполнить';
		}
	}

  if (isset($_FILES['Изображение']['name']) && !empty($_FILES['Изображение']['name'])) {
		$tmp_name = $_FILES['Изображение']['tmp_name'];
		$path = $_FILES['Изображение']['name'];

		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$file_type = finfo_file($finfo, $tmp_name);
		if ($file_type !== "image/jpeg") {
			$errors['file'] = 'Загрузите картинку в формате JPEG';
		}
		else {
			move_uploaded_file($tmp_name, 'img/' . $path);
			$lot['path'] = $path;
			$lot['Изображение'] = 'img/' . $path;
		}
	}
	else {
		$errors['file'] = 'Вы не загрузили файл';
	}

  if (count($errors)) {
		$template = include_template('templates/add.php', ['lot' => $lot, 'errors' => $errors]);
	}
  else {
		$template = include_template('templates/lot.php', ['lot' => $lot]);
	}
}
else {
	$template = include_template('templates/add.php', []);
}

$layout = include_template('templates/layout.php', 
    [ 
        'content' => $template, 
        'user_avatar' => $user_avatar, 
        'page_title' => $page_title, 
        'categories' => $categories 
    ]
);

print($layout);