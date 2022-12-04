<?php

class User {
    private ?mysqli $conn;

    public int $id;
    public ?string $name;
    public ?string $surname;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "
        SELECT s.id, s.name, s.surname FROM users AS s
        ORDER BY s.id; 
        ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function create() {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->surname = htmlspecialchars(strip_tags($this->surname));

        $query = "INSERT INTO users(name, surname) VALUE ('".$this->name."', '".$this->surname."');";

        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }

    function update() {
        $query = "
            UPDATE users
            SET name = '".$this->name."', surname = '".$this->surname."' 
            WHERE id = ".$this->id.";
            ";
        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }

    function delete() {
        $query = "DELETE FROM users WHERE id = ".$this->id.";";
        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }
}