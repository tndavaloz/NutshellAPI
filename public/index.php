<?php

require_once '../nutshell-api-php/NutshellApi.php';
require_once '../vendor/autoload.php';

$username = 'jim@demo.nutshell.com';
$apiKey = '43c789d483fd76547b1f157e3cf5e580b95b9d8c';

$api = new NutshellApi($username, $apiKey);

$contactsController = new NutShellAPI\Contacts\ContactsController($api);

$contactsArray = [];

for ($x = 1; count($contactsArray) < 100; $x++) {
    /** @var NutShellAPI\Contacts\Models\Contact $nutshellContact */
    $nutshellContact = $contactsController->get($x);
    if ($nutshellContact->getName() !== '') {
        $contactsArray[] = $nutshellContact->getName();
    }
}

sort($contactsArray, SORT_STRING);
$contactsController->displayContacts($contactsArray);
