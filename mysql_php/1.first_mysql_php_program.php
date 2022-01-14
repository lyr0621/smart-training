<?php
	//connect to mysql database
	$conn = mysqli_connect("localhost", "root", "lyr", "phpDB");
	//select all the items from table Persons
	$sql = "SELECT * FROM Persons";
	//execute the query
	$result = mysqli_query($conn, $sql);
	//print the result into the paragraph with id p
	while($row = mysqli_fetch_array($result)){
		//echo the id, name and sex of the table
		$sex = $row['sex'];
		if ($sex == 1) {
			$sex = "boy";
		} else {
			$sex = "girl";
		}
		echo "<p>".$row['id']." ".$row['name']." ".$sex."</p>";
	}
	//the mysql database is:
	//create table Persons( id int(4) not null primary key auto_increment, name char(20) not null, sex int(4) not null default '0' );
	//insert into Person values(1,'Tom',1);
?>
