<?php 
require_once __DIR__ . "/lib/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .image-container {
            height: 700px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            border-radius: 10px;
        }
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<?php require_once __DIR__ . "/templates/header.php"; ?>

<div class="px-4 pt-5 my-5 text-center border-bottom">
    <img src="asset/image/logo.jpg" class="d-block mx-lg-auto img-fluid" alt="Logo CheckIt" width="500" loading="lazy">
    <h1 class="display-4 fw-bold text-body-emphasis">HAIRANDCAREPARIS</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Experience the best, one hair at a time, while feeling beautiful</p>
    </div>
</div>  

<div class="container px-4 py-5">
    <h2 class="pb-2 fw-bold border-bottom">OUR WORK</h2>

    <div class="row g-4 py-5">
        <div class="col-12 col-md-4">
            <div class="image-container">
                <img src="asset/image/index_img_2.jpg" alt="Coiffure 1">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="image-container">
                <img src="asset/image/index_img_3.jpg" alt="Coiffure 2">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="image-container">
                <img src="asset/image/index_img_1.jpg" alt="Coiffure 3">
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . "/templates/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
