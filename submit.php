<?php
// Database connection parameters
$servername = "localhost";
$username = "root";       // Change if you have different user
$password = "Ar@290104";           // Change if you have password
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from POST
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$updates = isset($_POST['updates']) ? 1 : 0; // Checkbox handling

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO submissions (name, email, feedback, updates) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $name, $email, $feedback, $updates);

// Execute
if ($stmt->execute()) {
    echo "<h3>Thank you! Your response has been submitted successfully.</h3>";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
