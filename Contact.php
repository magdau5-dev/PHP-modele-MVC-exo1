<?php

class Contact
{
    //private : on ne peut pas accéder directement à $id depuis l’extérieur de la classe ;
    //?int / ?string : la valeur peut être un entier ou null / une chaîne de caractères ou null ;
    //$id : nom de la propriété ;
    //= null : au départ, aucune valeur n’est définie.

    private ?int $id = null;
    private ?string $name = null;
    private ?string $email = null;
    private ?string $phoneNumber = null;


    // ID
    function getId(): ?int
    {
        return $this->id;
    }

    function setId(?int $id): void // void : la fonction ne retourne rien. Pourquoi dire qu'elle ne retourne rien ? Parce que la fonction setId() modifie simplement l'état de l'objet en mettant à jour la propriété $id avec la nouvelle valeur fournie en argument. 
    {
        $this->id = $id;
    }

    // NAME
    function getName(): ?string
    {
        return $this->name;
    }

    function setName(?string $name): void
    {
        $this->name = $name;
    }

    // EMAIL
    function getEmail(): ?string
    {
        return $this->email;
    }

    function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    // PHONE NUMBER
    function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    // COMBINED
    function toString(): string
    {
        return "$this->id - $this->name - $this->email - $this->phoneNumber";
    }
}