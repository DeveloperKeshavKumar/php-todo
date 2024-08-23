<?php
$name = $_SESSION['user']['name'] ?? "Guest";
$name = strtoupper($name);
view("index.view.php", [
   "heading" => "Welcome, $name"
]);
