<?php

namespace System\Database;

class Blueprint {
    protected $table;
    protected $columns = [];

    public function __construct($table) {
        $this->table = $table;
    }

    public function increments($column) {
        $this->columns[] = "{$column} INT AUTO_INCREMENT PRIMARY KEY";
        return $this;
    }

    public function string($column, $length = 255) {
        $this->columns[] = "{$column} VARCHAR({$length})";
        return $this;
    }

    public function timestamp($column) {
        $this->columns[] = "{$column} TIMESTAMP";
        return $this;
    }

    public function unique($column) {
        $this->columns[count($this->columns) - 1] .= " UNIQUE";
        return $this;
    }

    public function toSql() {
        $columnsSql = implode(", ", $this->columns);
        return "CREATE TABLE IF NOT EXISTS {$this->table} ({$columnsSql})";
    }
}
