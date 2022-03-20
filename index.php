<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    <form  action="./thanks.php"  method="post">
        <div>
        <label  for="nom">Nom :</label>
        <input  type="text"  id="nom"  name="user_name">
        </div>
        <div>
        <label  for="prenom">prenom :</label>
        <input  type="text"  id="prenom"  name="user_firstname">
        </div>
        <div>
        <label  for="courriel">Courriel :</label>
            <input  type="email"  id="courriel"  name="user_email">
        </div>
        <div>
        <label  for="phone">Téléphone :</label>
            <input  type="tel"  id="tel"  name="user_tel">
        </div>
        <div>
        <label  for="subject">Sujet :</label>
        <select  id="text" name="user_subject">
            <option value="">--Please choose an option--</option>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
        </select>
        </div>
        <div>
        <label  for="messsage">Message :</label>
        <textarea  id="messsage"  name="user_messsage"></textarea>
        </div>
        <div  class="button">
        <button  type="submit">Envoyer votre message</button>
        </div>
    </form>
</body>
</html>