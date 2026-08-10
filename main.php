<?php
require 'bdd/Connexion.php';

$dbConnect = new DBConnect();
$pdo = $dbConnect->getPDO();

var_dump($pdo);

while (true) {
    $line = readline("Entrez votre commande : ");
    $command = strtolower(trim($line));

    if ($command === "list") {
        echo "$command tapé, affichage de la liste\n";
    } elseif ($command === "exit") {
        echo "Fermeture du programme.\n";
        break;
    } else {
        echo "Commande inconnue : $line\n";
    }
}