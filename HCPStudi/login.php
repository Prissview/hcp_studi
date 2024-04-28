<?php 
  require_once __DIR__ . "/lib/session.php";
  require_once __DIR__ . "/templates/header.php";
  require_once __DIR__ . "/lib/pdo.php";
  require_once __DIR__ . "/lib/user.php";
  
   
  $errors = [];

  if (isset($_POST['loginClient'])) {

    $client = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);

   
   
    if ($client) {
        //ON VA LE CONNECTER A LA SESSION
        $_SESSION['client'] = $client;
        header('location: index.php');
        
    } else {
        //MESSAGE D'ERREUR A AFFICHER
        $errors[] = "Email ou mot de passe incorrect";
    }
   
  }
?>

<div class="container col-xxl-8 px-4 py-5">
 <h1>Se connecter</h1>

 <?php
  foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
   
   <?php echo $error; ?>
 
   </div>

  <?php }
?>

 
  <form action="login.php" method="post">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" name="password" id="password" class="form-control">
    </div>
    
    <input type="submit" name="loginClient" value="Connexion" class="btn btn-primary">

 </form>
</div>

<?php require_once __DIR__. "/templates/footer.php" ?>