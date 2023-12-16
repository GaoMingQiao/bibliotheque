<?php
include './partials/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $civilite = $_POST['civilite'];
    $annee = $_POST['annee'];
    $nbrPage = $_POST['nbrPage'];
    $category = $_POST['category'];
    $prix = $_POST['prix'];
    $desc = $_POST['desc'];

    $erreur = [];

    if (isset($titre) && strlen($titre) < 2) {
        $erreur[] = 'Le titre doit contenir au moins 2 caractères<br>';
    }
    if (isset($titre) && strlen($titre) > 150) {
        $erreur[] = 'Le titre doit contenir moins de 150 caractères<br>';
    }

    if (isset($auteur) && strlen($auteur) < 2) {
        $erreur[] = 'Le nom d\'auteur doit contenir au moins 2 caractères<br>';
    }
    if (isset($auteur) && strlen($auteur) > 150) {
        $erreur[] = 'Le nom d\'auteur doit contenir moins de 150 caractères<br>';
    }
    if (isset($annee) && ($annee <= 2000 || $annee >= 2022)) {
        $erreur[] = 'L\'annee doit etre entre 2000 et 2022';
    }
    if (isset($nbrPage) && ($nbrPage <= 1 || $nbrPage >= 1000)) {
        $erreur[] = "Le nombre de pages doit être entre 1 et 1000";
    }
    if (!isset($category)) {
        $erreur[] = "Vous devez choisir une category";
    }
    if (isset($prix) && ($prix < 0 || $prix >= 299)) {
        $erreur[] = "Le prix doit être entre 0 et 299 euros";
    }
    if (empty($desc) || strlen($desc) > 500) {
        $erreur[] = "Veuillez entrer au moins 1 à 500 caractères";
    }

    if (!empty($erreur)) {
        foreach ($erreur as $err) {
            echo $err;
        }
    } else {
        $fichier = fopen('livres.txt', 'a');

        $data = [
            'titre' => $titre,
            'auteur' => $auteur,
            'civilite' => $civilite,
            'annee' => $annee,
            'nbrPage' => $nbrPage,
            'category' => $category,
            'prix' => $prix,
            'desc' => $desc
        ];

        fwrite($fichier, implode(',', $data) . PHP_EOL);


        fclose($fichier);
    }
}

$data = 'livres.txt';
$dataTab = file($data);


?>

<div class="container">

    <?php foreach ($dataTab as $row) :
        $dataArray = explode(",", $row);
        $dataAssociative = [
            'titre' => $dataArray[0],
            'auteur' => $dataArray[1],
            'civilite' => $dataArray[2],
            'annee' => $dataArray[3],
            'nbrPage' => $dataArray[4],
            'category' => $dataArray[5],
            'prix' => $dataArray[6],
            'desc' => $dataArray[7],
        ];
    ?>

        <div class="card mb-3 mt-3" style="max-width: 900px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="https://picsum.photos/600/400" class="img-fluid rounded-start" alt=".noel">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo "titre" . ' : ' . $dataAssociative['titre']; ?></h5>
                        <h5 class="card-title text-secondary"><?php echo "auteur" . ' : ' . $dataAssociative['auteur']; ?></h5>
                        <h5 class="card-title text-secondary"><?php echo "category" . ' : ' . $dataAssociative['category']; ?></h5>
                        <h5 class="card-title text-secondary"><?php echo "nombre de pages" . ' : ' . $dataAssociative['nbrPage']; ?></h5>

                        <p class="card-text"><?php echo "description" . ':' . $dataAssociative['desc']; ?></p>
                        <p class="card-text"><small class="text-body-secondary"><?php echo "année  de publication" . ':' . $dataAssociative['annee']; ?></small></p>
                        <h5 class="card-title text-danger"><?php echo "prix" . ' : ' . $dataAssociative['prix']; ?>€</h5>
                        <a href="./livres.php" class="btn btn-dark">retour</a>
                        <a href="./achat.php?titre=<?php echo urlencode($dataAssociative['titre']); ?>&auteur=<?php echo urlencode($dataAssociative['auteur']); ?>&annee=<?php echo urlencode($dataAssociative['annee']); ?>&desc=<?php echo urlencode($dataAssociative['desc']); ?>&prix=<?php echo urlencode($dataAssociative['prix']); ?>&category=<?php echo urlencode($dataAssociative['category']); ?>" class="btn btn-success">acheter</a>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<?php
include './partials/footer.php';
?>