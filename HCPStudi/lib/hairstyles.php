<?php
require_once __DIR__ . '/../lib/pdo.php';

function getAllHairstyles($pdo) {
    $stmt = $pdo->query("SELECT nom_type_coiffure, description, temps_realisation, prix FROM type_de_coiffure");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
