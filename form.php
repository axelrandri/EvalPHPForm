<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <h1>Ajouter un article</h1>
    <form method="POST" action="">
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title"><br><br>
        
        <label for="content">Contenu :</label>
        <textarea name="content" id="content"></textarea><br><br>
        
        <label for="creation_date">Date :</label>
        <input type="date" name="creation_date" id="creation_date"><br><br>
        
        <input type="submit" value="Ajouter" name="submit">
    </form>
    <div id="centre">
        <p id="error"><?php if($error){echo $error;} echo $donnees ?></p>
    </div>
</body>
</html>