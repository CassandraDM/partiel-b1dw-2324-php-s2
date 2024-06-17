<?php
    require_once __DIR__ . '/parts/header.php'
?>


<div class="post-list-header">
    <h1>LISTES DES BILLETS</h1>
    <div class="add-post">
        <a href="create-post.php"><i class="fa-solid fa-plus"></i></a>
    </div>
</div>

<div class="post-list">
    <?php
        $connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
        $connectDatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare request
        $request = $connectDatabase->prepare("SELECT * FROM post ORDER BY date_heure DESC");
        
        // Execute request
        $request->execute();

        // Fetch all data from table posts
        $posts = $request->fetchAll(PDO::FETCH_ASSOC);

    ?>

        <?php
        foreach($posts as $index => $post):
    ?>

    <div class="post">
        <div class="post-header">
            <h2>Football</h2>
        </div>
            <h3><?= $post['categorie'] ?></h3>
            <h3><?= $post['groupe'] ?></h3>
            <p><?= $post['equipe1'] ?></p>
            <p><?= $post['equipe2'] ?></p>
            <p><?= $post['date_heure'] ?></p>
            <p><?= $post['lieu'] ?></p>
            <p><?= $post['prix'] ?></p>
            <p><?= $post['description'] ?></p>
            <div class="post-actions">
               
            </div>
        

    </div>
    <?php endforeach ?>
</div>

<?php
    require_once __DIR__ . '/parts/footer.php'
?>