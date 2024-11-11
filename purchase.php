<?php
include 'db.php';

$event_id = $_POST['event_id'];
$seat_id = $_POST['seat_id'];
$customer_name = 'John Doe'; // In a real app, you'd get this from the form input.

$stmt = $pdo->prepare("INSERT INTO tickets (event_id, seat_id, customer_name) VALUES (?, ?, ?)");
$stmt->execute([$event_id, $seat_id, $customer_name]);

$seatUpdate = $pdo->prepare("UPDATE seats SET is_available = 0 WHERE seat_id = ?");
$seatUpdate->execute([$seat_id]);

echo "Ticket purchased successfully!";
?>
