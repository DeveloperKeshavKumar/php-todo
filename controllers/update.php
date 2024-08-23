
<?php

use Core\App;
use Core\Database;
use Core\Validator;

$todo = $_POST['todo'];
$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($todo, 1, 100)) {
   $errors['todo'] = "A todo must have characters between 1 and 100";
}

$todo = $db->query("select * from todos where id = :id", [":id" => $_GET['id']])->fetchOrAbort();

if (!empty($errors)) {
   return view("form.view.php", [
      "heading" => "Edit Todo",
      "errors" => $errors,
      "todo" => $todo,
   ]);
}

authorize($todo['userId'] === $_SESSION['user']['userId']);
$db->query(
   "update todos set todo = :todo, status = :status where id = :id",
   [":todo" => $_POST['todo'],":status"=>$_POST['status'], ":id" => $_GET['id']]
);
header('location: /todos');
exit();
