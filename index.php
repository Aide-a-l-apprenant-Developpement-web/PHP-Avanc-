<?php
require_once 'Friend.php';

if($_REQUEST){
    $friend = new Friend();

    $errorsAddFriend = $friend->addFriend($_REQUEST);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <h2>Liste des amis :</h2>
    <ul class="list-group">
        <?php
        $friend = new Friend();
        foreach ($friend->getFriends() as $f) {
            echo "<li class='list-group-item d-flex justify-content-center'>" . $f['firstname'] . " " . $f['lastname'] . "</li>";
        }
        ?>
    </ul>
    <form method="post" action="" class="border p-3 mt-5">
        <h2 class="text-center">Créer un amis</h2>
        <input name="prenom" class="form-control mt-3 mb-3" type="text" placeholder="Prénom"
               aria-label="default input example">
        <input name="nom" class="form-control mt-3 mb-3" type="text" placeholder="Nom"
               aria-label="default input example">

        <p id="error" class="text-danger" hidden>Le formulaire a mal été rempli !</p>
        <p id="sended" class="text-success" hidden>L'amis a été ajouté !</p>
        <?php
            if($errorsAddFriend){
                foreach ($errorsAddFriend as $error){
                    echo "<p class='text-danger'>".$error."</p>";
                }
            } else {
                echo "<p class='text-success'>L'amis a bien été ajouté !</p>";
            }
        ?>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        </fieldset>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
