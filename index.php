<?php
include 'db.php';
$stmt = $pdo->query("SELECT * FROM events");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Ticketing Platform</title>
    <link rel="stylesheet" href="style.css">
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
        flex-direction: column;
        min-height: 100vh;
    }

    header {
        background: var(--header-gradient);
        padding: 20px 0;
        color: #fff;
        text-align: center;
        font-size: 2em;
        font-weight: bold;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    main {
        width: 100%;
        padding: 60px 20px;
        flex-grow: 1;
        text-align: center;
    }

    h2 {
        font-size: 2.2em;
        color: var(--secondary-color);
        margin-bottom: 40px;
        font-weight: 600;
    }

    .event-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .event-card {
        background: var(--card-background);
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        padding: 30px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .event-card h3 {
        color: var(--primary-color);
        font-size: 1.8em;
        font-weight: 600;
        margin-bottom: 10px;
        text-align: center;
    }

    .event-card p {
        color: #555;
        font-size: 1.1em;
        margin: 5px 0;
        text-align: center;
    }

    .event-card a {
        color: #fff;
        background-color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        padding: 12px 25px;
        border-radius: 5px;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    .event-card a:hover {
        background-color: var(--button-hover);
    }

    footer {
        text-align: center;
        padding: 20px;
        background-color: var(--secondary-color);
        color: #fff;
        font-size: 1em;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        header {
            padding: 15px 10px;
        }
        
        main {
            padding: 30px 10px;
        }
        
        h2 {
            font-size: 1.8em;
            margin-bottom: 30px;
        }

        .event-card {
            padding: 20px;
        }
    }
</style>

</head>
<body>
    <header>
        Online Ticketing Platform
    </header>

    <main>
        <h2>Upcoming Events</h2>
        <div class="event-list">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="event-card">
                    <h3><?= htmlspecialchars($row['name']) ?></h3>
                    <p>Date: <?= htmlspecialchars($row['date']) ?></p>
                    <p>Location: <?= htmlspecialchars($row['location']) ?></p>
                    <a href="event.php?id=<?= $row['event_id'] ?>">View Details</a>
                </div>
            <?php endwhile; ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> Online Ticketing Platform. All rights reserved.</p>
    </footer>
</body>
</html>
