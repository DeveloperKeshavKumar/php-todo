<?php

$router->get("/", "controllers/home.php");

$router->get("/todos", "controllers/show-all.php");
$router->get("/todos/create", "controllers/add-todo.php");
$router->post("/todos/create", "controllers/create.php");

$router->get("/todo", "controllers/show.php");
$router->get("/todo/edit", "controllers/edit-todo.php");
$router->get("/todo/delete", "controllers/remove-todo.php");
$router->patch("/todo/edit", "controllers/update.php");
$router->delete("/todo/delete", "controllers/delete.php");

$router->get("/register", "controllers/signup.php");
$router->get("/login", "controllers/signin.php");

$router->post("/register", "controllers/register.php");
$router->post("/login", "controllers/login.php");
$router->get("/logout", "controllers/logout.php");
