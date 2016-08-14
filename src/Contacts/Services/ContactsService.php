<?php

namespace NutShellAPI\Contacts\Services;

use NutShellAPI\Contacts\Models\Serializers\ContactsSerializer;

class ContactsService
{
    /**
     * @var ContactsSerializer
     */
    private $serializer;

    private $nutshellService;

    public function __construct($serializer, $nutshellService)
    {
        $this->serializer = $serializer;
        $this->nutshellService = $nutshellService;
    }

    public function getContact($id)
    {
        $params = array('contactId' => $id);
        $contactResponse = $this->nutshellService->call('getContact', $params);
        $contact = $this->serializer->deserialize($contactResponse);

        return $contact;
    }
}