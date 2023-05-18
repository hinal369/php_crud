<?php
    include 'connection.php';
    $url = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $url);
    $id = end($parts);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM students WHERE id=".$id;

        if ($conn->query($sql) === TRUE) {
            $_SESSION["success"] = "Student Successfully Deleted!";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION["error"] = "Something is Wrong, Please Try Again!";
            header("Location: index.php");
            exit();  
        }
    } else {
        $_SESSION["error"] = "Something is Wrong, Please Try Again!";
        header("Location: index.php");
        exit();  
    }
   
    
?>