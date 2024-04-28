<?php


function verifyUserLoginPassword(PDO $pdo, string $email, string $password):bool|array
{
    $query = $pdo->prepare("SELECT * FROM client WHERE email = :email");
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();    


    //fetch va me permettre de recuperer une seule ligne 

    $client = $query->fetch(PDO::FETCH_ASSOC);

    if ($client && password_verify($password, $client['password'])) {
        //verifications
        return $client;
    } else {
         //mot de passe ou email incorrect: FALSE 
         return false;
    }
}

// Etape 1 => Faire le Hash du mot de passe avec password_hash($password, PASSWORD_DEFAULT)
// Etape 2 => Stocker le hash dans la DB



// Etape 3 => Se connecter avec le formulaire (sans oublie le <form action="ma page de connexion" method="POST"></form>)
// Etape 4 => Rechercher le user dans la DB (Si existe passer à l'étape 5 sinon le user est inconnu)
// Etape 5 => Comparer le password du formulaire avec le hash de la DB
// Etape 6 => Afficher le résultat en fonction du MDP