<?php
/**
 * Class CRUD
 * Fournit des opérations CRUD (Create, Read, Update, Delete) pour n'importe quelle table d'une base de données.
 */
class CRUD
{
    private $dbconnection;

    public function __construct($dbconnection)
    {
        $this->dbconnection = $dbconnection; 
    }

   
    public function createtable($create_table_sql)
    {
        
        $this->dbconnection->executeQuery($create_table_sql);
    }

    
    public function create($table, $data)
    {
       
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $this->dbconnection->executeQuery($sql, array_values($data));
    }

    
    public function read($table, $columns = '*', $conditions = null)
    {
        $sql = "SELECT $columns FROM $table";
        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->dbconnection->executeQuery($sql);
        return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    }


    public function update($table, $data, $conditions)
    {
        
        $set_clause = implode(", ", array_map(fn($key) => "$key = ?", array_keys($data)));
        $sql = "UPDATE $table SET $set_clause WHERE $conditions";
        
        $this->dbconnection->executeQuery($sql, array_values($data));
    }


    public function delete($table, $conditions)
    {
        
        $sql = "DELETE FROM $table WHERE $conditions";
       
        $this->dbconnection->executeQuery($sql);
    }

    public function count($table, $conditions = null)
    {
        $sql = "SELECT COUNT(*) as count FROM $table";
        if ($conditions) {
            $sql .= " WHERE $conditions";
        }

        $stmt = $this->dbconnection->executeQuery($sql);
        $result = $stmt ? $stmt->fetch(PDO::FETCH_ASSOC) : null;
        return $result['count'];
    }
}
?>