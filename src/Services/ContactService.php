<?php
require_once __DIR__ . '/../Repositories/ContactRepository.php';

class ContactService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ContactRepository();
    }

    public function getContacts()
    {
        return $this->repository->getAll();
    }

    public function createContact($data)
    {
        $this->repository->save($data);
    }

    public function deleteContact($id)
    {
        $this->repository->delete($id);
    }
}