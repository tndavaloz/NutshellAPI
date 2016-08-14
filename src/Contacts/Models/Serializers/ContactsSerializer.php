<?php

namespace NutShellAPI\Contacts\Models\Serializers;

use NutShellAPI\Contacts\Models\Contact;
use StdClass;

class ContactsSerializer
{
    /**
     * @param StdClass $contactStdClass
     * @return Contact
     */
    public function deserialize(StdClass $contactStdClass)
    {
        $contact = new Contact();

        if (isset($contactStdClass->email)) {
            $contact->setName($contactStdClass->name->displayName);
        }

        return $contact;
    }
}
