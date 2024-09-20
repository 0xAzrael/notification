<?php

$servername = "localhost";
$username = "root"; 
$password = "";      
$dbname = "notification_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, message, created_at FROM notifications WHERE is_read = 0 ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['message'] . " - " . $row['created_at'] . "</li>";
        $stmt = $conn->prepare("UPDATE notifications SET is_read = 1 WHERE id = ?");
        $stmt->bind_param("i", $row['id']);
        $stmt->execute();
    }
    echo "</ul>";
} else {
    echo "No new notifications.";
}

$conn->close();
?>
