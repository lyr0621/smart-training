<?php
    //connect to database
    //username root, password lyr, database name phpDB
    //create user php indentified by php; grant all on phpDB.* to php@'%' identified by 'php' with grant option;flush privileges;
    $conn = new mysqli("localhost:3306", "php", "php", "phpDB"); //一定要加上端口号，否则会报错
    //check connection
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    //get the value of table Persons
    $sql = "SELECT * FROM Persons";
    //execute the query
    $result = $conn->query($sql);
    //print the result
    if($result->num_rows > 0){
        //output data of each row
        while($row = $result->fetch_assoc()){
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " -sex:" . $row["sex"]. "<br>";
        }
    }else{
        echo "0 results";
    }
    echo "\n";
?>
