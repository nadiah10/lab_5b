<?php
class Database {
    private $host = "localhost";
    private $username = "root"; // Default XAMPP username
    private $password = ""; // Default XAMPP password is empty
    private $database = "lab_5b"; // Your database name
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            die("Connection error: " . $e->getMessage());
        }

        return $this->conn;
    }
}
?>
