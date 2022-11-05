<?php

class Student {
    private ?mysqli $conn;
    private string $table_name = "group";

    public int $id;
    public ?string $name;
    public ?string $surname;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "
        SELECT s.id, s.name, s.surname FROM user AS s
        ORDER BY s.id; 
        ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function create() {
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->surname = htmlspecialchars(strip_tags($this->surname));

        $query = "INSERT INTO user(name, surname) VALUE ('".$this->name."', '".$this->surname."');";

        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }

    function readOne() {
        $query = "SELECT s.id, s.name, s.surname FROM user AS s WHERE s.id = ".$this->id.";";
        $result = $this->conn->query($query)->fetch_row();
        return $result;
    }

    function update() {
        $query = "
            UPDATE user 
            SET name = '".$this->name."', surname = '".$this->surname."' 
            WHERE id = ".$this->id.";
            ";
        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }

    function delete() {
        $query = "DELETE FROM user WHERE id = ".$this->id.";";
        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }
}