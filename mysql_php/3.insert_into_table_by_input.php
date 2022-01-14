<?php
    // Create connection
    $conn = new mysqli("localhost:3306", "php", "php", "phpDB");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // echo a checkbox to enter the data
    echo "<form action='3.insert_into_table_by_input.php' method='post'>";
    //input the data
    echo "Enter the data: <br>";
    echo "<input type='text' name='data'><br>";
    echo "<input type='submit' value='submit'>";
    echo "</form>";
    $data = $_POST['data'];
    //insert the data into the table
    $sql = "INSERT INTO Persons (name, sex) VALUES ('" . $data . "',1)";
    //execute the sql
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>