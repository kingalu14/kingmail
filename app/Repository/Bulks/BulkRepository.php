<?php
namespace App\Repository\Bulks;

interface BulkRepository
{
    public function getAll();
    public function getById($id);
    public function create(array $attributes);
    public function update($id,array $attributes);
    public function edit($id);
    public function delete($id);
}
