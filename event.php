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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($event['name']) ?> - Seat Selection</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #f0f4f8;
            --card-background: #ffffff;
            --header-gradient: linear-gradient(to right, #4a69bd, #6a89cc);
            --button-hover: #2980b9;
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: var(--background-color);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
        }

        header {
            width: 100%;
            background: var(--header-gradient);
            padding: 20px;
            color: #fff;
            text-align: center;
            font-size: 1.8em;
            font-weight: bold;
        }

        main {
            background-color: var(--card-background);
            width: 100%;
            max-width: 1200px; /* Limit the width on large screens */
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 20px 0;
            text-align: center;
        }

        h1 {
            font-size: 2em;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        h2 {
            font-size: 1.5em;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }

        label {
            display: block;
            margin: 10px 0;
            font-size: 1.1em;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        button {
            color: #fff;
            background-color: var(--primary-color);
            border: none;
            padding: 12px 20px;
            font-size: 1em;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            align-self: center;
        }

        button:hover {
            background-color: var(--button-hover);
        }

        footer {
            width: 100%;
            padding: 15px;
            text-align: center;
            background-color: var(--secondary-color);
            color: #fff;
            font-size: 1em;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <?= htmlspecialchars($event['name']) ?> - Seat Selection
    </header>

    <main>
        <h1>Select Your Seat</h1>
        <h2>Available Seats</h2>
        <form action="purchase.php" method="post">
            <input type="hidden" name="event_id" value="<?= $event_id ?>">
            <?php while ($seat = $seatStmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <label>
                    <input type="radio" name="seat_id" value="<?= $seat['seat_id'] ?>">
                    Seat <?= htmlspecialchars($seat['seat_number']) ?>
                </label>
            <?php endwhile; ?>
            <button type="submit">Purchase Ticket</button>
        </form>
    </main>

    <footer>
        &copy; <?= date("Y") ?> Online Ticketing Platform. All rights reserved.
    </footer>
</body>
</html>
