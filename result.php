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
            $requete = "INSERT INTO article (title, content, creation_date) VALUES (:title, :content, :creation_date)";
            $stmt = $bdd->prepare($requete);
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":content", $content, PDO::PARAM_STR);
            $stmt->bindParam(":creation_date", $creation_date, PDO::PARAM_STR);
            $stmt->execute();
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

    