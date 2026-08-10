<?php

require __DIR__ . '/Command.php';

$commandManager = new Command();

while (true) {

    $line = trim(readline("Entrez votre commande : "));
    $command = strtolower($line);


    if ($command === "list") { 
        $commandManager->list();// Call de la méthode list() de la classe Command si la commande tapée est "list"

    } elseif ($command === "detail") {
        echo "Veuillez préciser un ID. Exemple : detail 2\n";

    } elseif (preg_match('/^detail\s+(\d+)$/i', $line, $matches)) {
        // Récupération de l'ID du contact à partir de la commande tapée
        $id = (int) $matches[1];
        $commandManager->detail($id);// Call de la méthode detail() de la classe Command

    } elseif ($command === "create") {
        echo "Veuillez préciser les informations du contact.\n";
        echo "Exemple : create Nom,email,numéro de téléphone\n";

    } elseif (preg_match('/^create\s+([^,]+),([^,]+),([^,]+)$/i', $line, $matches)) {
        // Récupération du nom, de l'email et du numéro de téléphone à partir de la commande tapée
        $name = trim($matches[1]);
        $email = trim($matches[2]);
        $phoneNumber = trim($matches[3]);
       
        $commandManager->create($name, $email, $phoneNumber); // Call de la méthode create() de la classe Command si la commande tapée est "create"

    } elseif ($command === "delete") {
        echo "Veuillez préciser un ID. Exemple : delete 2\n";
    
    } elseif (preg_match('/^delete\s+(\d+)$/i', $line, $matches)) {
        // Récupération de l'ID du contact à supprimer à partir de la commande tapée
        $id = (int) $matches[1];  
        $commandManager->delete($id);// Call de la méthode delete() de la classe Command si la commande tapée est "delete"

    } elseif ($command === "exit") {
        echo "Fermeture du programme.\n";
        break;

    } else {
        echo "Commande inconnue : $line\n";
    }
}