<?php
    include 'connection.php';

    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name     = $_POST["name"];
        $email    = $_POST["email"];
        $gender   = $_POST["gender"];
        $phone    = $_POST["phone"];
        $password = $_POST["password"];
        
        if (!$name || !$email || !$gender  || !$phone || !$password) {
            $_SESSION["error"] = "Something is missing in the form, Please fill the form properly!";
            header("Location: index.php");
            exit();
            echo $_SESSION["error"];
        } 
    }
    $sql = "INSERT INTO students (name, email, gender, phone, password, profile) VALUES ('$name', '$email', $gender,  '$phone', '$password', 'profile')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["success"] = "Student Successfully Register!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION["error"] = "Something is Wrong, Please Try Again!";
        header("Location: index.php");
        exit();
    }
?>