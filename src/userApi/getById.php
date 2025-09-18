<?php       
require("../db.php")

$id = $_GET['id'];

$userQuery = "SELECT name, last_name, email FROM user WHERE id ="."$id";
if ($conn->query($userQuery) -> num_rows <= 0) {
    die("User not found");
}

$user = $conn->query($userQuery);
if ($user -> num_rows > 0){
    while ($row = $user->fetch_assoc()){
        echo "Name: " . $row["name"]. " - Last Name: " . $row["last_name"]. " - Email: " . $row["email"]. "<br>";
    }
}

$conn->close();
?>