<?php
require_once __DIR__ . "/../lib/session.php";
require_once __DIR__ . "/header.php";
require_once __DIR__ . "/../lib/hairstyles.php";
require_once __DIR__ . "/../lib/pdo.php";

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:dbname=hcpstudi;host=localhost;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

try {
    $hairstyles = getAllHairstyles($pdo); // Appel de la fonction avec la connexion PDO $pdo
    if (!$hairstyles) {
        echo "<p>Aucune coiffure trouvée.</p>";
    }
} catch (PDOException $e) {
    die("Erreur lors de la récupération des types de coiffures : " . $e->getMessage());
}
?>

<div class="container col-xxl-8 px-4 py-5">
    <h1 class="mb-4">Prendre un rendez-vous</h1>
    
    <div class="row align-items-center">
        <div class="col-md-4">
            <div class="text-center mb-4">
                <img src="/HCPStudi/asset/image/appointment_header.jpg" class="img-fluid rounded image-appointment" alt="Image de rendez-vous">
            </div>
        </div>
        
        <div class="col-md-1 separator-line"></div>
        
        <div class="col-md-7">
            <form action="process_appointment.php" method="post">
                <div class="mb-3">
                    <label for="date" class="form-label">Date du rendez-vous</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="hairstyle" class="form-label">Type de coiffure</label>
                    <select name="hairstyle" id="hairstyle" class="form-select" required>
                        <?php
                        // Affichage des types de coiffure depuis la base de données
                        foreach ($hairstyles as $hairstyle) {
                            echo "<option value=\"" . htmlspecialchars($hairstyle['id_typedecoiffure']) . "\">" . htmlspecialchars($hairstyle['nom_type_coiffure']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Prendre rendez-vous</button>
            </form>
        </div>
    </div>
</div>


<?php require_once __DIR__ . "/footer.php"; ?>
