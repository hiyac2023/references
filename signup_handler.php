<?php
// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');

// Get the form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the username already exists
$sql = "SELECT * FROM login WHERE Name = '$username'";
$result = $db->query($sql);

// If the username already exists, display an error message
if ($result->rowCount() > 0) {
    echo 'Username already exists!';
} else {
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $sql = "INSERT INTO login (Name, Email) VALUES ('$username', '$email')";
    $db->exec($sql);

    // Get the new user's information
    $sql = "SELECT * FROM login WHERE Name = '$username'";
    $result = $db->query($sql);
    $user = $result->fetch(PDO::FETCH_ASSOC);

    // Return the user information as an associative array
    echo json_encode($user);
}
