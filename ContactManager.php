<?php

require __DIR__ . '/bdd/Connexion.php';
require __DIR__ . '/Contact.php';

class ContactManager
{
    function findAll(): array
    {
        $dbConnect = new DBConnect();
        $pdo = $dbConnect->getPDO();

        $requete = $pdo->query("SELECT * FROM contact");

        $contacts = [];

        while ($row = $requete->fetch()) {

            $contact = new Contact();

            $contact->setId($row['id']);
            $contact->setName($row['name']);
            $contact->setEmail($row['email']);
            $contact->setPhoneNumber($row['phone_number']);

            $contacts[] = $contact;
        }

        // var_dump($contacts);

        return $contacts;
    }

    function findById(int $id): ?Contact // ?Contact : la fonction peut retourner un objet de type Contact ou null si aucun contact n'est trouvé avec l'ID spécifié. Donc on se réfère à la table "contact" de la base de données pour récupérer les informations du contact correspondant à l'ID fourni.
    {
        $dbConnect = new DBConnect();
        $pdo = $dbConnect->getPDO();

        $requete = $pdo->prepare(
            "SELECT * FROM contact WHERE id = ?"
        );

        $requete->execute([$id]);

        $row = $requete->fetch();

        if (!$row) {
            return null;
        }

        $contact = new Contact();

        $contact->setId($row['id']);
        $contact->setName($row['name']);
        $contact->setEmail($row['email']);
        $contact->setPhoneNumber($row['phone_number']);

        return $contact;
    }


    function create(string $name, string $email, string $phoneNumber): void
    {
        $dbConnect = new DBConnect();
        $pdo = $dbConnect->getPDO();

        $requete = $pdo->prepare(
            "INSERT INTO contact (name, email, phone_number)
             VALUES (?, ?, ?)"
        );

        $requete->execute([
            $name,
            $email,
            $phoneNumber
        ]);
    }


    function delete(int $id): bool
    {
        $dbConnect = new DBConnect();
        $pdo = $dbConnect->getPDO();

        $requete = $pdo->prepare("DELETE FROM contact WHERE id = ?");
        $requete->execute([$id]);

        return $requete->rowCount() > 0;
    }
}