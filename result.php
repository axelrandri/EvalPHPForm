<?php
    $error = "";
    $donnees = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])){
        $title = $_POST["title"];
        $content = $_POST["content"];
        $creation_date = $_POST["creation_date"];
        try {
            addArticle($bdd, $title, $content, $creation_date);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    
    function addArticle($bdd, $title, $content, $creation_date) {
        global $error;
        global $donnees;
        if(!empty($title) && !empty($content) && !empty($creation_date)){
            $requete = "INSERT INTO article (title, content, creation_date) VALUES (?, ?, ?)";
            $stmt = $bdd->prepare($requete);
            $stmt->execute([$title, $content, $creation_date]);
            $donnees = "Données de l'article : <br>";
            $donnees .= "Titre : " . $title . "<br>";
            $donnees .=  "Contenu : " . $content . "<br>";
            $donnees .=  "Date : " . $creation_date . "<br>";
        } else {
            if(empty($title)){
                $error = 'Le champs "titre" est vide.';
            } 
            elseif(empty($content)){
                $error = 'Le champs "content" est vide.';

            } 
            elseif(empty($creation_date)){
                $error = 'Le champs "date" est vide.';

            }
        }
    }

?>

    