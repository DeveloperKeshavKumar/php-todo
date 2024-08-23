<?php

namespace Core;

use PDO;

class Database
{
   protected $connection;
   protected $statement;

   public function __construct($config, $username = "root", $password = "Keshavx")
   {
      $dsn = "mysql:" . http_build_query($config, "", ";");
      $this->connection = new PDO(
         $dsn,
         $username,
         $password,
         [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
         ]
      );
   }

   public function query($query, $params = [])
   {
      $this->statement = $this->connection->prepare($query);
      $this->statement->execute($params);
      return $this;
   }

   public function getOne()
   {
      return $this->statement->fetch();
   }

   public function getAll()
   {
      return $this->statement->fetchAll();
   }

   public function fetchOrAbort()
   {
      $result = $this->getOne();
      if (!$result) {
         abort();
      }

      return $result;
   }
}
