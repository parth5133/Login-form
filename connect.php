<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "riyu";

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
    $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);
    $Number = mysqli_real_escape_string($conn, $_POST['Number']);
    
    // Remove the trailing comma in your query after '$Password'
    $query = "INSERT INTO riyup (FirstName, LastName, Gender, Email, Password,Number) VALUES ('$FirstName', '$LastName', '$Gender', '$Email', '$Password','$Number')";

    if (mysqli_query($conn, $query)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
