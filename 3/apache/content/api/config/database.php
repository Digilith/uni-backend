<?php

class Database {
    private string $host = "db";
    private string $db_name = "bookstore";
    private string $username = "user";
    private string $password = "password";
    public ?mysqli $conn;

    public function getConnection(): ?mysqli
    {
        $this->conn = null;

        $this->conn = new mysqli("db", "user", "password", "bookstore");
        $this->conn->query("set names utf8");

        return $this->conn;
    }
}