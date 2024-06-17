<?php
    require_once __DIR__ . '/parts/header.php';

     // Connect to the database
     $connectDatabase = new PDO("mysql:host=db;dbname=wordpress","root", "admin");

     // Get the ID of the recipe from the URL or any other source
     $post_id = $_GET['id'];
 
     // Prepare the SQL query
     $request = $connectDatabase->prepare("SELECT * FROM post WHERE id = :id");
     $request->bindParam(':id', $post_id);
 
     // Execute the query
     $request->execute();
 
     // Fetch the recipe data
     $post = $request->fetch(PDO::FETCH_ASSOC);
?>


<div class="container">
    <h1>MODIFIER LE BILLET</h1>

    <form action="scripts/edit-post-script.php" method="POST" class="form-create-post">
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        <div class="form-row">        
            <select name="categorie" id="categorie" value="<?php echo $post['categorie']; ?>">
                <option value="Hommes">Hommes</option>
                <option value="Femmes">Femmes</option>
            </select>
            <input type="text" class="form-control" placeholder="Groupe" name="groupe" value="<?php echo $post['groupe']; ?>">
        </div>
        <div class="form-row" >        
            <input type="text" class="form-control" placeholder="Equipe 1" name="equipe1" value="<?php echo $post['equipe1']; ?>"></input>
            <input type="text" class="form-control" placeholder="Equipe 2" name="equipe2" value="<?php echo $post['equipe2']; ?>"></input>
        </div>
        <div class="form-row" > 
            <input  type="datetime-local" class="form-control" placeholder="Date et Heure" name="date_heure" value="<?php echo $post['date_heure']; ?>"></input>
            <input type="text" class="form-control" placeholder="Lieu" name="lieu" value="<?php echo $post['lieu']; ?>"></input>
        </div>
        <div class="form-row" >
            <input type="number" class="form-control" placeholder="Prix" name="prix" value="<?php echo $post['prix']; ?>"></input>
            <textarea class="form-control" placeholder="Description" name="description" ><?php echo $post['description']; ?></textarea>
        </div>
        <div >        
            <input type="submit" value="Modifier" class="btn btn-primary w-100">
        </div>
    </form>

<?php
    require_once __DIR__ . '/parts/footer.php'
?>