<?php
namespace App\Repository\Profiles;
use App\User;

class EloquentProfile implements ProfileRepository
{
    protected $model;
    public function __construct(User $model){
            $this->model = $model;   
    }
    public function getAll(){
            return $this->model->all();
    }
    public function getProfileId($id){
            return   $this->model->where('id',$id)
            ->first();
    }

    public function update($id,array $attributes){
        $profile=$this->model->findOrFail($id);
        if($profile){
            $profile->update($attributes);
            return  $template;
            }
    }
    public function delete($id){
        $profile=$this->model->findOrFail($id);
        if($profile){
            return $profile->delete($id);
        }
    }
    public function edit($id){
        $profile=$this->model->findOrFail($id);
        if($profile){
            return $profile;
        }
    }
}
