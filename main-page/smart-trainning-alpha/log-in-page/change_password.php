<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
    <style>
        body {
            background-color: rgb(255,215,0);
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php
    //$to = $_POST['email'];
    //$subject = "Verify email";
    //$message = "Hello! This is a simple email message.";
    //$from = "smart_trainning@120.25.228.122";
    //$headers = "From: $from";
    //mail($to,$subject,$message,$headers);
    //echo "Mail Sent,please check";
    
    //connect to database
    $db = mysqli_connect("localhost:3306", "www", "www", "www");
    if(!$db){
        die("Connection failed: " . mysqli_connect_error());
    }
    //select the user from table users
    $sql = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "';";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    //check if the email is correct
    if($row['email'] == $_POST['email']){
        //update the password
        $sql = "UPDATE users SET password = '" . $_POST['password'] . "' WHERE username = '" . $_POST['username'] . "';";
        $result = mysqli_query($db, $sql);
        echo "Password changed";
    }
    else{
        echo "Wrong email";
    }
    echo "<br>";
    echo "<p>click <a href='./log-in-page.html'>here</a> to go back</p>";
?>