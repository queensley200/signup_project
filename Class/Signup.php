<?php
require_once('Dbh.php');
class Signup extends Dbh
{
    private $username;
    private $passwd;

    public function __construct($username, $passwd){
        $this->username = $username;
        $this->passwd = $passwd;
    }

    public function insertUser(){
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($this->passwd, PASSWORD_DEFAULT);
        
        $query= "INSERT INTO users (username, password) VALUES (:username, :passwd)";
        $stmt= parent::connect()->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":passwd", $hashedPassword);
        
        // Execute the statement and check for errors
        if ($stmt->execute()) {
            return true;
        } else {
            // Log the error or handle it as needed
            return false;
        }
    }

    public function isEmptySubmit(){
        if (!empty($this->username) && !empty($this->passwd)){
            return false;
        } else {
            return true;
        }
    }

    public function SignUpUser(){
        // If Empty, Redirect Back to Home
        if ($this->isEmptySubmit()) {
            header("Location: /index.php");
            die();
        }
        
        // If no errors, sign up user
        if ($this->insertUser()) {
            // Redirect to a success page or login page
            header("Location: success.php");
        } else {
            // Handle the error, e.g., redirect back with an error message
            header("Location: /index.php?error=signupfailed");
        }
    }
}

