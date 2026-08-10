<?php

require __DIR__ . '/ContactManager.php';

class Command
{
    function help(): void
    {
        echo "Commandes disponibles :\n";
        echo "'list' : affiche tous les contacts\n";
        echo "'detail ID' : affiche un contact\n";
        echo "'create Nom,email,téléphone' : renseignez les informations du contact à créer\n";
        echo "'delete ID' : supprime un contact\n";
        echo "'help' : affiche toute les commandes disponibles\n";
        echo "'exit' : ferme le programme\n";
    }

    function list(): void
    {
        echo "Commande 'list' tapée, affichage de la liste des contacts ci-dessous :\n";

        $contactManager = new ContactManager();

        $contacts = $contactManager->findAll();

        foreach ($contacts as $contact) {
            echo $contact->toString() . "\n";
        }
    }

    function detail(int $id): void
    {
        $contactManager = new ContactManager();

        $contact = $contactManager->findById($id);

        if ($contact === null) {
            echo "Contact introuvable.\n";
        } else {
            echo $contact->toString() . "\n";
        }
    }


    function create(string $name, string $email, string $phoneNumber): void
    {
        $contactManager = new ContactManager();

        $contactManager->create($name, $email, $phoneNumber);

        echo "Contact créé.\n";
    }


    function delete(int $id): void
    {
        $contactManager = new ContactManager();

        $deleted = $contactManager->delete($id);

        if ($deleted) {
            echo "Contact supprimé.\n";
        } else {
            echo "Aucun contact trouvé avec l'ID $id.\n";
        }
    }
}