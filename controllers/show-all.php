<?php

$db = Core\App::resolve('Core\Database');
$user = $db->query("select * from users where email = :email", ["email" => $_SESSION['user']['email']])->getOne();
$_SESSION['user']['userId'] = $user['id'];
$statement = $db->query("select * from todos where userId = :userId", [":userId" => $user['id']]);
$todos = $statement->getAll();

require view("todos.view.php", ["heading" => "Your All Todos", "todos" => $todos]);
