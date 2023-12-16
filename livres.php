<?php
include './partials/header.php';
?>

<div class="container">
    <h1>choisissez vos livres</h1>
    <form action="details.php" method="POST" class="form">
        titre:<input type="text" name="titre" required>
        auteur:<input type="text" name="auteur" required>
        gender:<select name="civilite" id="civilite">
            <option value="Mr">Mr</option>
            <option value="Mme">Mme</option>
            <option value="Mll">Mll</option>
        </select><br><br>
        année de publication:<input type="datetime-local" name="annee">
        nombre de pages:<input type="text" name="nbrPage">
        <h6>les categories</h6>
        <div>
            <label>
                <input type="radio" name="category" value="roman"> roman
            </label>

            <label>
                <input type="radio" name="category" value="poesie"> poesie
            </label>

            <label>
                <input type="radio" name="category" value="theatre"> theatre
            </label>
            <label>
                <input type="radio" name="category" value="essai"> essai
            </label>
            <label>
                <input type="radio" name="category" value="BD"> BD
            </label>
            <label>
                <input type="radio" name="category" value="jeunesse"> jeunesse
            </label>


        </div>
        prix:<input type="text" name="prix">
        description:<input type="text" name="desc">




        <input type="submit" value="achat">


    </form>
</div>


<?php
include './partials/footer.php';
?>