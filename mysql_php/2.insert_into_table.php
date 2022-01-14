
<?php
    // Create connection
    //user name php, password php, database name phpDB, server name localhost
    $conn = new mysqli("localhost:3306", "php", "php", "phpDB");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // echo a checkbox to enter the data
    echo "<form action='2.insert_into_table.php' method='post'>";
    echo "<input type='checkbox' name='checkbox' value='checkbox' checked='checked'>";
    echo "<input type='submit' value='submit'>";
    echo "</form>";
    // if the checkbox is checked, insert the data into the table
    if (isset($_POST['checkbox'])) {
        $sql = "INSERT INTO Persons (name, sex)
        VALUES ('John Doe', 1)";
    }
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

?>