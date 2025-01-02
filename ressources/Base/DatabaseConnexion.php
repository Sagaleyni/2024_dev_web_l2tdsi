<?php

class DatabaseConnexion
{
    private $host = 'localhost';
    private $dbname = 'db_dev_web_l2tdsi'; 
    private $username = 'root'; 
    private $password = ''; 
    private $conn;
    
    public function __construct()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
        } catch (PDOException $e) {
            echo "Erreur de connexion: " . $e->getMessage();
        }
    }
    
    public function executeQuery($query, $params = [])
    {
        try {
            $request = $this->conn->prepare($query);
            $request->execute($params);
            return $request;
        } catch (PDOException $e) {
            echo "Erreur de connexion: " . $e->getMessage();
            return null;
        }
    }
}