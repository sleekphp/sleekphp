<?php

namespace System\Core;

use PDO;

class Model {
    protected static $table;
    protected $connection;

    public function __construct() {
        $this->connection = $this->connect();
    }

    private function connect() {
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_NAME');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASS');
        
        try {
            return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        } catch (\PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    public static function create($attributes) {
        $model = new static;
        $columns = implode(', ', array_keys($attributes));
        $values = ':' . implode(', :', array_keys($attributes));
        $sql = "INSERT INTO " . static::$table . " ($columns) VALUES ($values)";

        $stmt = $model->connection->prepare($sql);
        foreach ($attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public static function find($id) {
        $model = new static;
        $stmt = $model->connection->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function all() {
        $model = new static;
        $stmt = $model->connection->query("SELECT * FROM " . static::$table);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function update($id, $attributes) {
        $model = new static;
        $setClause = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($attributes)));
        $sql = "UPDATE " . static::$table . " SET $setClause WHERE id = :id";
        
        $stmt = $model->connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        foreach ($attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public static function delete($id) {
        $model = new static;
        $stmt = $model->connection->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public static function where($column, $operator, $value) {
        $model = new static;
        $model->query = "SELECT * FROM " . static::$table . " WHERE $column $operator :value";
        $model->params = [':value' => $value];
        return $model;
    }

    public function get() {
        $stmt = $this->connection->prepare($this->query);
        foreach ($this->params as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function first() {
        $this->query .= " LIMIT 1";
        $stmt = $this->connection->prepare($this->query);
        foreach ($this->params as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
