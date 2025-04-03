<?php
$host = "localhost";
$user = "root";
$pass = "";  // Leave blank if no password
$dbname = "piggery_system";  // Ensure this matches your actual database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Success message (for testing)
echo "✅ Connected to the database successfully!";
?>