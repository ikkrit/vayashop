<?php

    function add_product($image, $nom, $prix, $desc) {
        if(require("connexion.php")) {
            $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES ($image, $nom, $prix, $desc)");

            $req->execute(array($image, $nom, $prix, $desc));

            $req->closeCursor();        
        }
    }

    function affiche_produit() {
        if(require("connexion.php")) {
            $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");

            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_OBJ);

            return $data;

            $req->closeCursor(); 
        }
    }

    function delete_product($id) {
        if(require("connexion.php")) {
            $req = $access->prepare("DELETE * FROM produits WHERE id=?");
            
            $req->execute(array($id));
        }
    }

?>