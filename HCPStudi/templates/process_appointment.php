<?php
require_once __DIR__ . "/../lib/session.php";
require_once __DIR__ . "/../lib/pdo.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $date = $_POST['date'];
    $id_typedecoiffure = $_POST['hairstyle']; // Assurez-vous que le nom du champ correspond au formulaire
    $client_id = $_SESSION['client']['id_client']; 

    // Insertion du rendez-vous dans la base de données
    $stmt = $pdo->prepare("INSERT INTO rendez_vous (date, id_typedecoiffure, id_client, id_coiffeur) VALUES (:date, :id_typedecoiffure, :id_client, :id_coiffeur)");
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    $stmt->bindValue(':id_typedecoiffure', $id_typedecoiffure, PDO::PARAM_INT); // Assurez-vous que id_typedecoiffure est un entier
    $stmt->bindValue(':id_client', $client_id, PDO::PARAM_INT);
    $stmt->bindValue(':id_coiffeur', 1, PDO::PARAM_INT); // Remplacez par l'id du coiffeur approprié si nécessaire

    if ($stmt->execute()) {
        header('Location: confirmation.php'); // Redirection vers la page de confirmation après succès
        exit();
    } else {
        // Message pour les erreurs
        echo "Une erreur est survenue lors de la prise de rendez-vous.";
    }
} else {
    // Redirection si la méthode de requête n'est pas POST
    header('Location: appointment.php');
    exit();
}
?>
