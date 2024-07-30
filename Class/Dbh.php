<?php

class Dbh
{
    private $host = 'localhost';
    private $db_name = 'sign_up';
    private $username = 'root';
    private $password = '';
    private $conn;

    // public function __construct()
    // {
    //     $this->conn = $this->getConnection();
    // }

    // Protected method to get the database connection
    protected function Connect()
    {
        $conn = null;

        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }

        return $conn;
    }


    // Public method to execute a query
    // public function executeQuery($query)
    // {
    //     $result = $this->conn->query($query);

    //     if ($result === FALSE) {
    //         echo "Error: " . $this->conn->error;
    //         return false;
    //     }

    //     return $result;
    // }

    // Public method to close the connection
//     public function closeConnection()
//     {
//         if ($this->conn !== null) {
//             $this->conn->close();
//         }
//     }
}

?>
