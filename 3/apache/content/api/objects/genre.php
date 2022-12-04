<?php

class Genre {
    private ?mysqli $conn;

    public int $id;
    public ?string $name;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "
        SELECT s.id, s.name FROM genre AS s
        ORDER BY s.id; 
        ";

        $stmt = $this->conn->query($query);
        return $stmt;
    }

    function create() {
        $this->name = htmlspecialchars(strip_tags($this->name));

        $query = "INSERT INTO genre(name) VALUE ('".$this->name."');";

        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }

    function update() {
        $query = "
            UPDATE genre 
            SET name = '".$this->name."',
            WHERE id = ".$this->id.";
            ";
        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }

    function delete() {
        $query = "DELETE FROM genre WHERE id = ".$this->id.";";
        $stmt = $this->conn->query($query);
        $this->conn->commit();
        return $stmt;
    }
}