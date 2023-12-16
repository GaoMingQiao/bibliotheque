<?php
include './partials/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $titre = $_GET['titre'];
    $auteur = $_GET['auteur'];
    $annee = $_GET['annee'];
    $category = $_GET['category'];
    $desc = $_GET['desc'];
    $prix = $_GET['prix'];
?>

    <h1>Merci de confirmer votre achat</h1>

    <table class="table my-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">titre</th>
                <th scope="col">auteur</th>
                <th scope="col">category</th>
                <th scope="col">description</th>
                <th scope="col">annee</th>
                <th scope="col">prix</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><?php echo $titre; ?></td>
                <td><?php echo $auteur; ?></td>
                <td><?php echo $category; ?></td>
                <td><?php echo $desc; ?></td>
                <td><?php echo $annee; ?></td>
                <td><?php echo $prix; ?></td>
            </tr>
        </tbody>
    </table>

<?php
}
include './partials/footer.php';
?>