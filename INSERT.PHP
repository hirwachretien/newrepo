<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Database connection parameters
$servername = 'localhost'; // Change to your server name if different
$username = 'root';        // Change to your MySQL username
$password = '';            // Change to your MySQL password
$database = 'test';        // Change to your database name

// Create a new connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO your_table_name (name, email, subject, message) VALUES (?, ?, ?, ?)");

if ($stmt === false) {
    die('Prepare failed: ' . $conn->error);
}

// Bind parameters
$stmt->bind_param("ssss", $name, $email, $subject, $message);

// Execute the statement
if ($stmt->execute()) {
    echo "Record successfully inserted.";
} else {
    echo "Error executing query: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
