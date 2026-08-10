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

        var_dump($contacts);

        return $contacts;
    }
}