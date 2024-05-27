<?php

namespace Handmade\Utils;

class Database extends \PDO
{
  private function __construct($dsn, $username = null, $password = null, $options = null)
  {
    parent::__construct($dsn, $username, $password, $options);
  }

  static function connect()
  {
    $dsn = 'mysql:host=' . "localhost:3306" . ';dbname=' . "handmade" . ';charset=utf8mb4';
    $username = "root";
    $password = null;
    $options = [
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
      \PDO::ATTR_EMULATE_PREPARES => false,
    ];
    return new self($dsn, $username, $password, $options);
  }

  function run($sql, $args = null)
  {
    if (!$args) {
      return $this->query($sql);
    }
    $stmt = $this->prepare($sql);
    $stmt->execute($args);
    return $stmt;
  }

  function select($sql, $args = null)
  {
    return $this->run($sql, $args)->fetchAll();
  }

  function selectOne($sql, $args = null)
  {
    return $this->run($sql, $args)->fetch();
  }

  function insert($sql, $args = null)
  {
    $this->run($sql, $args);
    return $this->lastInsertId();
  }

  function update($sql, $args = null)
  {
    return $this->run($sql, $args)->rowCount();
  }

  function delete($sql, $args = null)
  {
    return $this->update($sql, $args);
  }
}
