<?php
$db = Core\App::resolve('Core\Database');

$todo = $db->query("select * from todos where id = :id", [":id" => $_GET['id']])->fetchOrAbort();
authorize($todo['userId'] === $_SESSION['user']['userId']);
$db->query("delete from todos where id = :id", [":id" => $_GET['id']]);

header('location: /todos');
exit();
