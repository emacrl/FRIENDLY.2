<h1> TWEET</h1>

<ul>
    <li>
        <?= $_POST['tweet']?>
    </li>

</ul>

<?php 

require 'template/database.php';
$insert = $database->prepare("INSERT INTO tweets(tweet)VALUES (:thetweet)");

//Pour twitter il y aura qu'une seule valeur. 

$insert->execute (
    [
        "thetweet" => $_POST['tweet']
    ]
);
    
header ("Location: twitter.php" );