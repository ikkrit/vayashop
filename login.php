<?php include 'config/commandes.php'?>
<?php session_start()?>

<?php
    if(isset($_POST['envoyer'])) {
        if(!empty($_POST['email']) && !empty($_POST['motdepasse'])) {
            $email = htmlspecialchars($_POST['email']);
            $motdepasse = htmlspecialchars($_POST['motdepasse']);

            $admin = getAdmin($email, $motdepasse);

            if($admin) {
                $_SESSION['zW45ertfaa'] = $admin;
                header("Location: admin/");
            } else {
                echo "Il y a un problème";
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
    <title>Login - Vayashop</title>
</head>
<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form method="post">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="motdepasse" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="motdepasse">
                    </div>

                    <input type="submit" class="btn btn-danger" name="envoyer" value="Se connecter">

                </form>
            </div>
            <div class="col-md-3"></div>

        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>