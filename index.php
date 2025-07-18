<?php
include 'db.php';  // Include database connection

// Handle search functionality
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM creatures WHERE name LIKE :search OR description LIKE :search";
$stmt = $pdo->prepare($sql);
$stmt->execute(['search' => '%' . $searchQuery . '%']);
$creatures = $stmt->fetchAll();

if ($creatures === false) {
    echo "No results found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mythological Creatures</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Mythological Creatures</h1>
        <form action="index.php" method="GET">
            <input type="text" name="search" placeholder="Search for a creature" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
            <button type="submit">Search</button>
        </form>
    </header>

    <section class="creatures">
        <?php foreach ($creatures as $creature): ?>
            <div class="creature">
                <img src="<?= $creature['image_path'] ?>" alt="<?= $creature['name'] ?>">
                <h2><?= $creature['name'] ?></h2>
                <p><?= $creature['description'] ?></p>
                <p><strong>Origin:</strong> <?= $creature['origin'] ?></p>
            </div>
        <?php endforeach; ?>
    </section>
</body>
</html>
