<?php
$dsn = 'mysql:host=database;dbname=' . getenv('DB_DATABASE');
$user = getenv('DB_USER');
$password = getenv('DB_PASS');

try {
    $pdo = new PDO($dsn, $user, $password);

    $query = "SELECT * FROM article";
    $stmt = $pdo->query($query);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php if (getenv('APP_ENV') === 'development'): ?>
        <div class="bg-red-500 text-white p-4">
            Environnement de développement
        </div>
    <?php endif; ?>
    <table class="mt-10 mx-10">
        <thead>
            <tr>
                <th class="border p-2">Title</th>
                <th class="border p-2">Body</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td class="border p-2"><?= $article['title'] ?></td>
                    <td class="border p-2"><?= $article['body'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
