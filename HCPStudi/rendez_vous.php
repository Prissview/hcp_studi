<?php 
  require_once __DIR__ . "/templates/header.php";
  require_once __DIR__ . "/lib/pdo.php";
  require_once __DIR__ . "/lib/rdvs.php";

  if (isset($_SESSION['client'])) {
    $rdvs = getRdvsByUserId($pdo, $_SESSION['client']['id_client']);

}
?>


  


  <div class=container>
    <h1>Rendez-vous</h1>
    <?php if (isset($_SESSION['client'])) { ?>
    <?= 'connecté' ?>


    <?php } else { ?>
    <p>Pour consulter votre rendez-vous, vous devez vous connecter</p>
    <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
  <?php } ?>
 
</div>



<?php  require_once __DIR__ . "/templates/footer.php"
?>