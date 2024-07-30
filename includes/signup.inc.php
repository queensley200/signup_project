<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once '../Class/Dbh.php';
    require_once '../Class/Signup.php';

    // Create an instance of the Signup class with the provided username and password
    $signup = new Signup($username, $password);
    
    // Call the method to sign up the user
    $signup->SignUpUser();
} else {
    // Redirect back to the signup page if accessed directly
    header("Location: /index.php");
    exit();
}

