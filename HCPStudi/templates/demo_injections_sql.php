<?php

// ATTENTION: NE PAS UTILISER CE CODE EN PRODUCTION
// N'EST PAS SECURISE CONTRE LES INJECTIONS SQL

$pdo = new PDO('mysql:dbname=hcpstudi;host=localhost;charset=utf8mb4', 'root', '');
$id = $_GET['id'];

$query = $pdo->query("SELECT * FROM client WHERE id_client = 1");
$result = $query->fetch(PDO::FETCH_ASSOC);


?>