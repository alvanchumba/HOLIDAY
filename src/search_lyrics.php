<?php
header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "alvan";
$password = "@Akc15064";
$dbname = "lyrics_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$song_name = isset($_GET['song_name']) ? $_GET['song_name'] : '';

if (empty($song_name)) {
    echo "No song name provided.";
    exit;
}

$stmt = $conn->prepare("SELECT song_name, artist, lyrics FROM lyrics WHERE song_name LIKE ?");
$searchTerm = "%" . $song_name . "%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='result-item'>";
        echo "<h3>" . htmlspecialchars($row['song_name']) . " - " . htmlspecialchars($row['artist']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($row['lyrics'])) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No results found.</p>";
}

$stmt->close();
$conn->close();
?>

