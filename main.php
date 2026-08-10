<?php
require 'ContactManager.php';

while (true) {
    $line = readline("Entrez votre commande : ");
    $command = strtolower(trim($line));

    if ($command === "list") {

        echo "Commande '$command' tapée, affichage de la liste ci-dessous :\n";

        $contactManager = new ContactManager();
        $contacts = $contactManager->findAll();

        foreach ($contacts as $contact) {
            echo $contact->toString() . "\n";
        }  
    } elseif ($command === "exit") {
        echo "Fermeture du programme.\n";
        break;
    } else {
        echo "Commande inconnue : $line\n";
    }
}