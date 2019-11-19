<?php
namespace App\Repository\Profiles;

interface ProfileRepository
{
   // public function getProfile();
    public function getProfileId($id);
    //public function create(array $attributes);
    public function update($id,array $attributes);
    public function edit($id);
    public function delete($id);
}
