<?php
    include 'connection.php';

    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name     = $_POST["name"];
        $email    = $_POST["email"];
        $gender   = $_POST["gender"];
        $phone    = $_POST["phone"];
        $password = $_POST["password"];
        $id       = $_POST["id"];
        
        if (!$name || !$email || !$gender  || !$phone || !$password) {
            $_SESSION["error"] = "Something is missing in the form, Please fill the form properly!";
            header("Location: index.php");
            exit();
            echo $_SESSION["error"];
        } 
    }
    $sql = "UPDATE students SET name = '$name', email = '$email', gender = $gender, phone = '$phone', password='$password' WHERE id=".$id;

    if ($conn->query($sql) === TRUE) {
        $_SESSION["success"] = "Student Successfully Updated!";
        header("location: index.php");
        exit();
    } else {
        $_SESSION["error"] = "Something is Wrong, Please Try Again!";
        header("location: index.php");
        exit();
    }
?>