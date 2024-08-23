<?php

use Core\App;
use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$db = App::container()->resolve('Core\Database');

$errors = [];
if (!Validator::email($email)) {
   $errors['email'] = "Invalid email";
}
if (!Validator::string($password, 7, 50)) {
   $errors['password'] = "Password is not strong";
}

if (!empty($errors)) {

   return view("signup.view.php", [
      "heading" => "Register",
      "errors" => $errors
   ]);
}

$user = $db->query("select * from users where email = :email", [":email" => $email])->getOne();
if ($user) {
   header('location: /login');
   exit();
} else {
   $db->query("insert into users (name, email, password) values (:name, :email, :password)", [
      "name"=>$name,
      ":email" => $email,
      ":password" => $password
   ]);

   $_SESSION['user'] = [
      "email"=>$email,
      "name"=>$name
   ];

   header('location: /');
   exit();
}
