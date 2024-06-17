<?php

    $post_categorie = $_POST['categorie'];
    $post_groupe = $_POST['groupe'];
    $post_equipe1 = $_POST['equipe1'];
    $post_equipe2 = $_POST['equipe2'];
    $post_date_heure = $_POST['date_heure'];
    $post_lieu = $_POST['lieu'];
    $post_prix = $_POST['prix'];
    $post_description = $_POST['description'];

    $connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");
    $request = $connectDatabase->prepare("UPDATE post SET categorie = :categorie, groupe = :groupe, equipe1 = :equipe1, equipe2 = :equipe2, date_heure = :date_heure, lieu = :lieu, prix = :prix, description = :description WHERE id = :id");
    $request->bindParam(':categorie', $post_categorie);
    $request->bindParam(':groupe', $post_groupe);
    $request->bindParam(':equipe1', $post_equipe1);
    $request->bindParam(':equipe2', $post_equipe2);
    $request->bindParam(':date_heure', $post_date_heure);
    $request->bindParam(':lieu', $post_lieu);
    $request->bindParam(':prix', $post_prix);
    $request->bindParam(':description', $post_description);
    $request->bindParam(':id', $_POST['id']);

    
    $request->execute();

    header('Location: ../post.php');

?>