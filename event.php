<?php
include 'db.php';
$event_id = $_GET['id'];
$eventStmt = $pdo->prepare("SELECT * FROM events WHERE event_id = ?");
$eventStmt->execute([$event_id]);
$event = $eventStmt->fetch();

$seatStmt = $pdo->prepare("SELECT * FROM seats WHERE event_id = ? AND is_available = 1");
$seatStmt->execute([$event_id]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= htmlspecialchars($event['name']) ?> - Seat Selection</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?= htmlspecialchars($event['name']) ?></h1>
    <h2>Available Seats</h2>
    <form action="purchase.php" method="post">
        <input type="hidden" name="event_id" value="<?= $event_id ?>">
        <?php while ($seat = $seatStmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <label>
                <input type="radio" name="seat_id" value="<?= $seat['seat_id'] ?>">
                Seat <?= htmlspecialchars($seat['seat_number']) ?>
            </label><br>
        <?php endwhile; ?>
        <button type="submit">Purchase Ticket</button>
    </form>
</body>
</html>
