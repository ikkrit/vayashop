<?php 
    session_start();

    if(!isset($_SESSION['zW45ertfaa'])) {
        header("Location: ../login.php");
    }

    if(!empty($_SESSION['zW45ertfaa'])) {
        header("Location: ../login.php");
    }
?>

<?php require_once('../config/commandes.php');?>

<?php 

    if(isset($_POST['valider'])) {
        if(isset($_POST['image']) 
        && isset($_POST['nom']) 
        && isset($_POST['prix']) 
        && isset($_POST['desc'])) {
            if(!empty($_POST['image']) 
            && !empty($_POST['nom']) 
            && !empty($_POST['prix']) 
            && !empty($_POST['desc'])) {
                $image = htmlspecialchars(strip_tags($_POST['image']));
                $nom = htmlspecialchars(strip_tags($_POST['nom']));
                $prix = intval(htmlspecialchars(strip_tags($_POST['prix'])));
                $desc = htmlspecialchars(strip_tags($_POST['desc']));

                try {
                    add_product($image, $nom, $prix, $desc);
                } 
                catch(Exception $e) {
                    $e->getMessage();
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    
                <form method="post">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titre de l'image</label>
                        <input type="name" class="form-control" name="image" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Prix</label>
                        <input type="number" class="form-control" name="prix" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea class="form-control" name="desc" required></textarea>
                    </div>

                    <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>

                </form>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
