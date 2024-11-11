<?php
include 'db.php';

$event_id = $_POST['event_id'];
$seat_id = $_POST['seat_id'];
$customer_name = 'John Doe'; // In a real app, you'd get this from the form input.

$stmt = $pdo->prepare("INSERT INTO tickets (event_id, seat_id, customer_name) VALUES (?, ?, ?)");
$stmt->execute([$event_id, $seat_id, $customer_name]);

$seatUpdate = $pdo->prepare("UPDATE seats SET is_available = 0 WHERE seat_id = ?");
$seatUpdate->execute([$seat_id]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Purchase Confirmation</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #f5f7fa;
            --card-background: #ffffff;
            --header-gradient: linear-gradient(to right, #4a69bd, #6a89cc);
            --button-hover: #2980b9;
            --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: var(--background-color);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .confirmation-box {
            background: var(--card-background);
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .confirmation-box h1 {
            color: var(--primary-color);
            font-size: 2em;
            margin-bottom: 20px;
        }

        .confirmation-box p {
            font-size: 1.2em;
            color: #555;
            margin: 15px 0;
        }

        .confirmation-box a {
            display: inline-block;
            background-color: var(--primary-color);
            color: #fff;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .confirmation-box a:hover {
            background-color: var(--button-hover);
        }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <h1>Ticket Purchased Successfully!</h1>
        <p>Thank you, <?= htmlspecialchars($customer_name) ?>, for your purchase.</p>
        <p>Event ID: <?= htmlspecialchars($event_id) ?> | Seat ID: <?= htmlspecialchars($seat_id) ?></p>
        <a href="index.php">Return to Home</a>
    </div>
</body>
</html>
