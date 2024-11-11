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
       
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #eaeef1, #ffffff);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #2980b9;
            padding: 15px 20px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            font-size: 2em;
        }
        nav a {
            color: #ffffff;
            margin-left: 15px;
            text-decoration: none;
            font-size: 1.1em;
        }
        nav a:hover {
            color: #d1e9ff;
            transition: color 0.3s;
        }
        main {
            padding: 20px;
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .event-card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            flex-basis: calc(30% - 30px);
            position: relative;
            overflow: hidden;
        }
        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .event-card h3 {
            margin: 0 0 10px;
            color: #2980b9;
        }
        .event-card p {
            margin: 5px 0;
            color: #555;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #2980b9;
            color: #fff;
            margin-top: auto;
        }
        @media (max-width: 768px) {
            .event-card {
                flex-basis: calc(45% - 30px);
            }
        }
        @media (max-width: 480px) {
            .event-card {
                flex-basis: calc(100% - 30px);
            }
            header h1 {
                font-size: 1.5em;
            }
            nav a {
                font-size: 0.9em;
                margin-left: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Online Ticketing Platform</h1>
        <nav>
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="signin.php">Sign In</a>
                <a href="signup.php">Sign Up</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <h2>Upcoming Events</h2>
        <div class="event-list">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="event-card">
                    <h3><?= htmlspecialchars($row['name']) ?></h3>
                    <p>Date: <?= htmlspecialchars($row['date']) ?></p>
                    <p>Location: <?= htmlspecialchars($row['location']) ?></p>
                    <p>Description: <?= htmlspecialchars($row['details']) ?></p> <!-- Update 'description' to a valid column -->
                    <a href="event.php?id=<?= $row['event_id'] ?>" style="color: #2980b9; text-decoration: none; font-weight: bold;">View Details</a>
                </div>
            <?php endwhile; ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> Online Ticketing Platform. All rights reserved.</p>
    </footer>
</body>
</html>
