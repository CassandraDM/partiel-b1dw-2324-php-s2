<?php
    require_once __DIR__ . '/parts/header.php'
?>

<div class="container">
    <h1>AJOUTER UN BILLET</h1>

    <form action="scripts/create-post-script.php" method="POST" class="form-create-post">
        <div class="form-row">        
            <select name="categorie" id="categorie">
                <option value="Hommes">Hommes</option>
                <option value="Femmes">Femmes</option>
            </select>
            <input type="text" class="form-control" placeholder="Groupe" name="groupe">
        </div>
        <div class="form-row" >        
            <input type="text" class="form-control" placeholder="Equipe 1" name="equipe1"></input>
            <input type="text" class="form-control" placeholder="Equipe 2" name="equipe2"></input>
        </div>
        <div class="form-row" > 
            <input  type="datetime-local" class="form-control" placeholder="Date et Heure" name="date_heure"></input>
            <input type="text" class="form-control" placeholder="Lieu" name="lieu"></input>
        </div>
        <div class="form-row" >
            <input type="number" class="form-control" placeholder="Prix" name="prix"></input>
            <textarea type="text" class="form-control" placeholder="Description" name="description"></textarea>
        </div>
        <div >        
            <input type="submit" value="Ajouter" class="btn btn-primary w-100">
        </div>
    </form>

<?php
    require_once __DIR__ . '/parts/footer.php'
?>