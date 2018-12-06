<?php


class database
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $database = 'Steam';
    private $table = 'accounts';

    public function _construct()
    {
        if (isset($this->db)) {
            $conn = new mysqli($this->host, $this->user, $this->pass, $this->database);
            if ($conn->connect_error) {
                die("Failed to Connect with MYSQL: " . $conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
    }
}