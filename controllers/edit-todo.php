<?php

use Core\App;

$db = App::container()->resolve('Core\Database');
$todo = $db->query("select * from todos where id = :id", [":id" => $_GET['id']])->fetchOrAbort();

authorize($todo['userId'] === $_SESSION['user']['userId']);
view("form.view.php", [
   "heading" => "Edit Todo",
   "button" => "Update",
   "todo" => $todo,
   "errors" => []
]);
