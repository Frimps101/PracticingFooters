<?php

/*$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if(!empty($username)){
    if(!empty($password)){

        $host ="localhost";
        $dbusername= "root";
        $dbpassword= "";
        $dbname="connect";

        // Create Connection

        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }// If there is no connection error then...
        else{
            $sql = "INSERT INTO account(username, password) values($username, $password)";
            // We check if query is working or not
            if($conn -> query($sql)){
                echo "New record has been inserted successfully";
            }
            else{
                echo "Error: ",$sql."<br>".$conn->error;
            }
            // Close Connection
            $conn->close();
        }

    }else{
        echo "Password field should not be empty";
        die();
    }
}else{
    echo "Username should not be empty";
    die();
}
*/
$userName = $_POST["username"];
$password = $_POST["password"];

// Database Connection

 $conn = new mysqli("localhost", "root", "", "connect");
 if($conn->connect_error){
     die("Login failed: " .$conn->connect_error);
 }else{
     $statement = $conn->prepare("Insert into registration(username, password) values(?, ?)");
     $statement->bind_param("ss",$userName, $password);//ss because both are strings
     $statement->execute();
     echo "<alert>You have been added successfully....</alert>";
     $statement->close();
     $conn->close();
 }
?>