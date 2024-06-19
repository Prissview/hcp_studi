<?php
require_once __DIR__ . '/../lib/session.php';
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/../lib/hairstyles.php';
require_once __DIR__ . '/../lib/pdo.php';

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:dbname=hcpstudi;host=localhost;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des types de coiffures à partir de la base de données
try {
    $hairstyles = getAllHairstyles($pdo); 
    if (!$hairstyles) {
        echo "<p>Aucune coiffure trouvée.</p>";
    }
} catch (PDOException $e) {
    die("Erreur lors de la récupération des types de coiffures : " . $e->getMessage());
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Types de Coiffures</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($hairstyles as $hairstyle): ?>
            <?php 
            $imageName = strtolower(str_replace(' ', '_', $hairstyle['nom_type_coiffure'])) . ".jpg";
            $imagePath = __DIR__ . '/../asset/image/' . $imageName;
            $webImagePath = '/HCPStudi/asset/image/' . $imageName;
            ?>
            <div class="col">
                <div class="card h-100">
                    <div class="card-img-container">
                        <?php if (file_exists($imagePath)): ?>
                            <img src="<?= $webImagePath ?>" class="card-img-top" alt="<?= $hairstyle['nom_type_coiffure'] ?>">
                        <?php else: ?>
                            <img src="/HCPStudi/asset/image/default.png" class="card-img-top" alt="Image par défaut">
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $hairstyle['nom_type_coiffure'] ?></h5>
                        <p class="card-text"><?= $hairstyle['description'] ?></p>
                        <?php if ($hairstyle['temps_realisation'] !== '00:00:00'): ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Temps de réalisation : <?= $hairstyle['temps_realisation'] ?></li>
                            </ul>
                        <?php endif; ?>
                        <?php if ($hairstyle['prix'] !== '0'): ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Prix : <?= $hairstyle['prix'] ?> €</li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
