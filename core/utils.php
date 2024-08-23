<?php

function dumpAndDie($value)
{
   echo "<pre>";
   var_dump($value);
   echo "</pre>";
   die();
}

function setActiveClass($value)
{
   return ($_SERVER['REQUEST_URI'] === $value) ? "bg-gray-900 text-white" : "text-gray-300";
}

function abort($code = 404)
{
   http_response_code($code);
   require view("errors/{$code}.php");

   die();
}

function base_path($path)
{
   return BASE_PATH . ltrim($path, "/");
}

function view($path, $args = [])
{
   extract($args);
   require base_path('views/' . $path);
}

function authorize($condition, $statusCode = 403)
{
   if (! $condition) {
      abort($statusCode);
   }
}
