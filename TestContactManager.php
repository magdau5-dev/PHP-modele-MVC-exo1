<?php
// C:\xampp\php\php.exe TestContactManager.php
require __DIR__ . '/ContactManager.php';

$contactManager = new ContactManager();

$contacts = $contactManager->findAll();