<?php 
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/user.php";
require_once __DIR__ . "/templates/header.php";


$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $birth_date = $_POST['birth_date'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email est invalide.";
    }

    if (empty($errors)) {
        $query = $pdo->prepare("INSERT INTO client (name, email, phone_number, birth_date, password) VALUES (:name, :email, :phone_number, :birth_date, :password)");
        $query->bindValue(':name', $name);
        $query->bindValue(':email', $email);
        $query->bindValue(':phone_number', $phone_number);
        $query->bindValue(':birth_date', $birth_date);
        $query->bindValue(':password', $password);
        $query->execute();
        header('Location: login.php');
    }
}
?>

<div class="container col-xxl-8 px-4 py-5">
    <h1>S'inscrire</h1>
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form action="/HCPStudi/signup.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Numéro de téléphone</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control">
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">Date de naissance</label>
            <input type="date" name="birth_date" id="birth_date" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>

<?php require_once __DIR__. "/templates/footer.php"; ?>
