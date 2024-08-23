<?php

use Core\App;
use Core\Validator;

require base_path("/core/Validator.php");
$todo = $_POST['todo'];
$status = intval($_POST['status']);

$db = App::container()->resolve('Core\Database');

$errors = [];
if (!Validator::string($todo, 1, 100)) {
   $errors['todo'] = "A Todo must have characters between 1 and 100";
}

if (!empty($errors)) {
   return view("form.view.php", [
      "heading" => "Create Note",
      "button"=>"Create",
      "errors" => $errors
   ]);
}

$user = $db->query("select * from users where email = :email", ["email" => $_SESSION['user']['email']])->getOne();
$db->query(
   "insert into todos (todo, status, userId) values (:todo,:status, :userId)",
   [":todo" => $todo,"status"=>$status, ":userId" => $user['id']]
);
header('location: /todos');
exit();
