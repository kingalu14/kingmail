<?php
namespace App\Repository\Templates;

interface TemplatesRepository
{
    public function getAll();
    public function getByUserId($id);
    public function getById($id);
    public function create(array $attributes);
    public function update($id,array $attributes);
    public function edit($id);
    public function delete($id);
}
