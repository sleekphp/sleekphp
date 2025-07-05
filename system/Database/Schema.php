<?php

namespace System\Database;

use PDO;
use System\Database\Blueprint;

class Schema {
    protected static function connection() {
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_NAME');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASS');

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    public static function create($table, $callback) {
        $blueprint = new Blueprint($table);
        $callback($blueprint);

        $sql = $blueprint->toSql();
        $pdo = self::connection();

        try {
            $pdo->exec($sql);
            echo "[✔] Table '{$table}' created successfully.\n";
        } catch (\PDOException $e) {
            echo "[✘] Error creating table '{$table}': " . $e->getMessage() . "\n";
        }
    }

    public static function dropIfExists($table) {
        $sql = "DROP TABLE IF EXISTS {$table}";
        $pdo = self::connection();

        try {
            $pdo->exec($sql);
            echo "[✔] Table '{$table}' dropped successfully.\n";
        } catch (\PDOException $e) {
            echo "[✘] Error dropping table '{$table}': " . $e->getMessage() . "\n";
        }
    }
}
