<?php

namespace NutShellAPI\Contacts;

use NutShellAPI\Contacts\Services\ContactsService;
use NutShellAPI\Contacts\Models\Serializers\ContactsSerializer;
use NutShellAPI\Contacts\Models\Contact;

class ContactsController
{
    /**
     * @var ContactsService
     */
    private $service;

    /**
     * @var ContactsSerializer
     */
    private $serlializer;

    /**
     * @var
     */
    private $api;

    /**
     * @param $api
     */
    public function __construct($api)
    {
        $this->api = $api;
        $this->setSerializer();
        $this->setService();

    }

    private function setSerializer()
    {
        $this->serlializer = new ContactsSerializer();

        return;
    }

    private function setService()
    {
        $this->service = new ContactsService($this->serlializer, $this->api);

        return;
    }

    /**
     * @param int $id
     * @return Contact
     */
    public function get($id)
    {
       return $this->service->getContact($id);
    }

    /**
     * @param array $contacts
     */
    public function displayContacts(array $contacts)
    {
        foreach ($contacts as $contact) {
            echo "Name: " . $contact . "\n";
        }
    }

}