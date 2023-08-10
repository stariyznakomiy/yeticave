<?php

require_once('data-categories.php');
require_once('functions.php');
require_once('userdata.php');


session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$form = $_POST;

	$required = ['email', 'password'];
	$errors = [];
	foreach ($required as $field) {
	    if (empty($form[$field])) {
	        $errors[$field] = 'Это поле надо заполнить';
        }
    }

	if (!count($errors) and $user = searchUserByEmail($form['email'], $users)) {
		if (password_verify($form['password'], $user['password'])) {
			$_SESSION['user'] = $user;
		}
		else {
			$errors['password'] = 'Неверный пароль';
		}
	}
	else {
		$errors['email'] = 'Введите e-mail';
	}

	if (count($errors)) {
		$page_content = include_template('templates/login.php', ['form' => $form, 'errors' => $errors]);
	}
	else {
		header("Location: /index.php");
		exit();
	}
}
else {
    if (isset($_SESSION['user'])) {
        $page_content = include_template('templates/welcome.php', ['username' => $_SESSION['user']['name']]);
    }
    else {
        $page_content = include_template('templates/login.php', []);
    }
}

$layout = include_template('templates/layout.php', [
	'content'    => $page_content,
	'categories' => [],
	'page_title'      => 'Вход'
]);

print($layout);