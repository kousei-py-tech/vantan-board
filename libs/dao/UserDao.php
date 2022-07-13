<?php


require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/../entity/BoardEntity.php';

class UserDao extends Database
{
    public function  insert($mail, $password, $name)
  {
    $sql = 'INSERT INTO `users` (name, mail, password, created, modified)';
    $sql .= ' VALUES (:name, :mail, :password, NOW(), NOW())';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
    $stmt->bindValue(':mail', $mail, \PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, \PDO::PARAM_STR);
    $result = $stmt->execute();
    if ($result) {
      return $this->pdo->lastInsertId();
  } else {
      return false;
  }
  }

    public function  findByEmail($mail)
    {
      $sql = 'SELECT * FROM `users` WHERE email = :email';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $mail, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
    }
} 