<?php


function getRdvsByUserId(PDO $pdo, int $id_client): array
{
    $query = $pdo->prepare("SELECT * FROM rendez_vous WHERE id_client = :id_client");
    $query->bindValue(':id_client', $id_client, PDO::PARAM_INT);
    $query->execute(); 
    $rdvs = $query->fetchAll(PDO::FETCH_ASSOC);

    return $rdvs;
}

