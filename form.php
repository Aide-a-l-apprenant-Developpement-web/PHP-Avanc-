<?php

// Je vérifie si le formulaire est soumis comme d'habitude
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $uploadDir = 'public/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

    $uploadFile = $uploadDir . md5(uniqid()) . "." . $extension;

    $authorizedExtensions = ['jpg', 'png', 'gif', 'webp'];
    $maxFileSize = 1000000;

    $errors = [];
    if ((!in_array($extension, $authorizedExtensions))) {
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
    }

    if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
        $errors[] = "Votre fichier doit faire moins de 1M !";
    }

    if (!$errors) {
        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <h1>Laisse pas traîner ton File</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="imageUpload" class="form-label">Upload an profile image</label>
            <input type="file" class="form-control" name="avatar" id="imageUpload">
        </div>
        <?php
        if ($errors) {
            foreach ($errors as $error) {
                echo "<p class='text-danger'>" . $error . "</p>";
            }
        }
        ?>
        <button name="send" class="btn btn-primary">Envoyer</button>
    </form>
    <div class="container d-flex flex-wrap justify-content-around mt-5">
        <?php
            foreach (scandir($uploadDir) as $image){
                if('.' !== $image && '..' !== $image) {
                ?>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $uploadDir.$image; ?>" class="card-img-top mh-50" alt="...">
                </div>
            <?php }}
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>