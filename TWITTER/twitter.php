<?php
require "template/database.php";

// ETAPE 1 - PREPARATION (écrire code SQL)

$requete = $database->prepare("SELECT * FROM tweets");
$requete_2 = $database->prepare("SELECT * FROM utilisateur");

// ETAPE 2 - EXECUTION 

$requete->execute();
$requete_2->execute();


// ETAPE 3 - ON EN FAIT QLQ CHOSE 
// Toutes les données sous forme de tableau
// (PDO::FETCH_ASSOC) = tableau associatif donc associe une clé à une valeur

$allCourses = $requete->fetchALL(PDO::FETCH_ASSOC);
$allCourses_2 = $requete_2->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Poller+One&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="style.css">
        </head>
</html>

    <body>

        <script src="https://kit.fontawesome.com/d2d67c29ee.js" crossorigin="anonymous"></script>
    
            <nav>
                <ul>
                    <li><a href=""><i class="fa-light fa-house"></i></a></li>

                    <li><a href=""><i class="fa-regular fa-magnifying-glass"></i></a></li>

                    <li><a href=""><i class="fa-regular fa-bell fa-shake"></i></a></li>

                    <li><a href=""><i class="fa-light fa-message"></i></a></li>
  
                    <li><a href=""><i class="fa-regular fa-user"></i></a></li>
                </ul>

            </nav>

        <div class="Site">
                <h1> FRIENDLY <h1>
        </div>

        <form class="form" method="POST" action="insert_tweet.php"> 
            <input type="text" name="tweet" placeholder="Friendzone ici" required>
            <div class="boutton-2">
                <button type="submit">FRIENDZONE</button>
            </div>
        </form>

        <?php foreach($allCourses as $tweet) { ?>
            <ul class="tweet">
                <li><?= $tweet['tweet'] ?></li>
                <form action="delete.php" method="POST">
                    <input type="hidden" name="supp" value="<?=$tweet['id']?>"/>
                        <div class="boutton-3"> 
                            <button type="submit">SUPPRIMER</button>
                        </div>
                    </input>
                </form>
            </ul>
        <?php } ?>



    </body>

</html>