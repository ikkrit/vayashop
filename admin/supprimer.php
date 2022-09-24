<?php require_once('../config/commandes.php');?>

<?php $products = affiche_produit();?>

<?php 

    if(isset($_POST['valider'])) {
        if(isset($_POST['id_produit'])) {
            if(!empty($_POST['id_produit']) && is_numeric($_POST['id_produit'])) {
                $id_produit = htmlspecialchars(strip_tags($_POST['id_produit']));

                try {
                    delete_product($id_produit);
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
                

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Identifiant du produit</label>
                        <input type="number" class="form-control" name="id_produit" required>
                    </div>

                    <button type="submit" name="valider" class="btn btn-primary">Supprimer le produit</button>

                </form>

            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($products as $product): ?>

                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?=$product->image?>">
                            <h3><?=$product->id?></h3>

                            <div class="card-body">
                            
                            </div>

                        </div>
                    </div>

                <?php endforeach;?>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

