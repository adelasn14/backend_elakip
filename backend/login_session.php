<?php 

require ('db_web.php');

session_start(); 

  $database = new Database();
  $conn = $database->connect();

if(empty($_POST["username"]) || empty($_POST["password"]))  
    {  
        $message = '<label>All fields are required</label>';  
    }  
    else  
    {  
        $query = "SELECT * FROM admin WHERE username = :username AND password = :password";  
        $statement = $conn->prepare($query);  
        $statement->execute(  
                array(  
                    'username'     =>     $_POST["username"],  
                    'password'     =>     $_POST["password"]  
                )  
        );  
        $count = $statement->rowCount();  
        if($count > 0)  
        {  
                $_SESSION["username"] = $_POST["username"];  
                $_SESSION['id'] = $_POST['id'];

                header("Location: /index");
        }  
        else  
        {  
                $message = '<label>Wrong Data</label>';  
        }  
    }