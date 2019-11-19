<?php
namespace App\Repository\Users;

interface UsersRepository
{
    public function getAll();
    public function getByUserId($id);
    public function getUserId();
    public function create(array $attributes);
    public function update($id,array $attributes);
    public function edit($id);
    public function delete($id);
}
