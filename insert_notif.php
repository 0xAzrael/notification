<?php

include 'connection/conn.php';

$message = "New data inserted by a user!";
$stmt = $conn->prepare("INSERT INTO notifications (message) VALUES (?)");
$stmt->bind_param("s", $message);

if ($stmt->execute()) {
    echo "Notification inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
