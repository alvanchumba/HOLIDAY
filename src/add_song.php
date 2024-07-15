<?php
// Database connection setup (make sure to replace with your actual credentials)
$servername = "localhost";
$username = "alvan";
$password = "@Akc15064";
$dbname = "lyrics_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $songName = $_POST["song_name"];
    $artist = $_POST["artist"];
    $lyrics = $_POST["lyrics"];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO lyrics (song_name, artist, lyrics) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $songName, $artist, $lyrics);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New song added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();
?>


