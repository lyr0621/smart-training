<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new_account</title>
    <style>
        body {
            background-color: rgb(255,215,0);
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
</body>
</html>
<?php
    // connect to database
    $conn = mysqli_connect("localhost:3306", "www", "www", "www");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // get data from form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    // check if username already exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Username already exists</h1>";
        echo "faild: Username already exists";
        echo "<br>";
        echo "<a href='new_account.html'>try again</a>";
    } else {
        // insert new user into database
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo "<h1>successful!</h1>";
            echo "New record created successfully";
            echo "<br>";
            echo "username: " . $username;
            echo "<br>";
            echo "password: " . $password;
            echo "<br>";
            echo "email: " . $email;
            echo "<br>";
            echo "<a href='log_in.php'>log in</a>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    //TODO: 发送邮件，验证邮箱
    // close connection
    mysqli_close($conn);
    // to delete an account: delete from users where username='student1';

?>