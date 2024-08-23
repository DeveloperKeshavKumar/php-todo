<?php

$db = Core\App::container()->resolve('Core\Database');
$email = $_POST['email'];
$password = $_POST['password'];

$user = $db->query("select * from users where email = :email",[":email"=>$email])->getOne();
if(empty($user)){
   return view("signup.view.php", [
      "heading"=>"Login",
      "errors" => ["email"=>"No Account with this email, <a href='/register' class='underline font-semibold'>Register Now</a>"],
   ]);
}else if($user['password'] !== $password){
   return view("signup.view.php", [
      "heading"=>"Login",
      "errors" => ["password"=>"Wrong password, Try Again!"],
   ]);
}else{
   $_SESSION['user'] = [
      "email"=> $user['email'],
      "name"=>$user['name'],
      "userId"=>$user['id']
   ];

   header('location: /todos');
   exit();
}