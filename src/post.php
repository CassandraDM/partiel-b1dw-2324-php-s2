<?php
    require_once __DIR__ . '/parts/header.php'
?>


<div class="post-list-header">
    <h1>LISTES DES BILLETS</h1>
    <div class="add-post">
        <a href="create-post.php"><i class="fa-solid fa-plus"></i></a>
    </div>
</div>

<div class="post-list-content">
<form method="post" action="">
    <select name="sort" id="sort">
        <option value="asc">Sort by ascending (prix)</option>
        <option value="desc">Sort by descending (prix)</option>
    </select>
    <input type="submit" value="Sort">
    </form>

<div class="post-list">
    <?php
        $connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
        $connectDatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare request
        $sortOption = $_POST['sort'] ?? 'desc';

        if  ($sortOption === 'asc') {
            $request = $connectDatabase->prepare("SELECT * FROM post ORDER BY prix ASC");
        } else if ($sortOption === 'desc') {
            $request = $connectDatabase->prepare("SELECT * FROM post ORDER BY prix DESC");
        } else {
            $request = $connectDatabase->prepare("SELECT * FROM post ORDER BY prix DESC");
        }
        
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
            <div class="post-content">
                <div class="post-row">
                    <div class="post-element">            
                        <h3>Catégorie :</h3>
                        <p><?= $post['categorie'] ?></p>
                    </div>
                    <div class="post-element">            
                        <h3>Groupe :</h3>
                        <p><?= $post['groupe'] ?></p>
                    </div>
                </div>
                <p><?= $post['equipe1'] ?> / <?= $post['equipe2'] ?></p>
                <p><?= $post['date_heure'] ?> | <?= $post['lieu'] ?> | <?= $post['prix'] ?> €</p>
                <p><?= $post['description'] ?></p>
            </div>
            <div class="post-actions">
                <a href="scripts/delete-post-script.php?id=<?= $post['id'] ?>" class="action"><i class="fa-solid fa-trash"></i></a>
                <a href="edit-post.php?id=<?= $post['id'] ?>" class="action"><i class="fa-solid fa-edit"></i></a>
            </div>
        

    </div>
    <?php endforeach ?>
</div>
</div>
<?php
    require_once __DIR__ . '/parts/footer.php'
?>