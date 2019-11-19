<?php
namespace App\Repository\Contacts;

interface ContactRepository
{
    public function getAll();
    public function getByEmail($email);
    public function getByBulkId($id);
    public function getByUserBulkId($userId,$bulkId);
    public function create(array $attributes);
    public function update($id,array $attributes);
    public function edit($id);
    public function delete($id);
}
