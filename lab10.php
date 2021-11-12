<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phtos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// sql to create table
$sql = "CREATE TABLE Clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
sport VARCHAR(30) NOT NULL,
contract_duration INT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Clients created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

//Insert Data into table
$sql1 = "INSERT INTO Clients (firstname, lastname, email, sport, contract_duration)
VALUES ('Devaraj', 'N', 'd@mail.com', 'sport', 4)";

if ($conn->query($sql1) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}
// Select and Print data
$sql2 = "SELECT id, firstname, lastname FROM Clients";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}

//Update Data
$sql3 = "UPDATE Clients SET lastname='Narayanan' WHERE firstname='Devaraj' ";

if ($conn->query($sql3) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

// Delete data in table
$sql4 = "DELETE FROM Clients WHERE firstname='Devaraj' ";

if ($conn->query($sql4) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>
