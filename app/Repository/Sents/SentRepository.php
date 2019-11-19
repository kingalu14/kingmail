<?php
namespace App\Repository\Sents;

interface SentRepository
{
    public function getAll();
    public function getByUserId($id);
    public function getByBulkId($id);
    public function create(array $attributes);
    public function delete($id);
}
