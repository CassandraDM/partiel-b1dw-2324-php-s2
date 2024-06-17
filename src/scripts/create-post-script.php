<?php

    $post_categorie = $_POST['categorie'];
    $post_groupe = $_POST['groupe'];
    $post_equipe1 = $_POST['equipe1'];
    $post_equipe2 = $_POST['equipe2'];
    $post_date_heure = $_POST['date_heure'];
    $post_lieu = $_POST['lieu'];
    $post_prix = $_POST['prix'];
    $post_description = $_POST['description'];

    if(empty($post_categorie)) {
        header("Location: ../create-post.php");
        die(); 
    }

    if(empty($post_groupe)) {
        header("Location: ../create-post.php");
        die(); 
    }

    if(empty($post_equipe1)) {
        header("Location: ../create-post.php");
        die(); 
    }

    if(empty($post_equipe2)) {
        header("Location: ../create-post.php");
        die(); 
    }

    if(empty($post_date_heure)) {
        header("Location: ../create-post.php");
        die(); 
    }

    if(empty($post_lieu)) {
        header("Location: ../create-post.php");
        die(); 
    }

    if(empty($post_prix)) {
        header("Location: ../create-post.php");
        die(); 
    }

    if(empty($post_description)) {
        header("Location: ../create-post.php");
        die(); 
    }

    if(!empty($post_categorie) && !empty($post_groupe) && !empty($post_equipe1) && !empty($post_equipe2) && !empty($post_date_heure) && !empty($post_lieu) && !empty($post_prix) && !empty($post_description)){
        $connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");
        $request = $connectDatabase->prepare("INSERT INTO post (categorie, groupe, equipe1, equipe2, date_heure, lieu, prix, description) VALUES (:categorie, :groupe, :equipe1, :equipe2, :date_heure, :lieu, :prix, :description)");
        $request->bindParam(':categorie', $post_categorie);
        $request->bindParam(':groupe', $post_groupe);
        $request->bindParam(':equipe1', $post_equipe1);
        $request->bindParam(':equipe2', $post_equipe2);
        $request->bindParam(':date_heure', $post_date_heure);
        $request->bindParam(':lieu', $post_lieu);
        $request->bindParam(':prix', $post_prix);
        $request->bindParam(':description', $post_description);
        $request->execute();
        
        header('Location: ../post.php');
    }


?>