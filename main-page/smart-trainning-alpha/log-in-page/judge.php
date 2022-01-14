<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>skiping...</title>
    <style>
        body {
            background-color: rgb(255, 215, 0);
        }
    </style>
</head>
<body>
    <?php
        //用于检查登陆的用户名和密码是否正确
        //connect to database
        $db = mysqli_connect("localhost:3306", "www", "www", "www");
        if(!$db){
            die("Connection failed: " . mysqli_connect_error());
        }
        //get the user's input
        $user_name = $_POST['username'];
        $user_password = $_POST['password'];
        //query the database
        $sql = "SELECT * FROM users WHERE username = '" . $user_name . "' AND password = '" . $user_password . "';";
        $result = mysqli_query($db, $sql);
        //judge the result
        if(mysqli_num_rows($result) > 0){    //如果有该用户，且密码正确
            echo "Welcome, " . $user_name . "!<br>";
            echo "success: user found<br>";
            $row = mysqli_fetch_array($result);
            echo "user id: " . $row['id'] . "<br>";
            echo "user name: " . $row['username'] . "<br>";
            echo "email: " . $row['email'] . "<br>";
            echo "<script>setTimeout(function () {window.location.href = '../mainpage.html';}, 4000);</script>"; //设置自动跳转
            //输出一些基本信息
        }else{   //否则报错
            echo "fail to login, please check your password";
            echo "<p>click <a href='./log-in-page.html'>here</a> to go back</p>";
        }
    ?>
</body>
</html>
