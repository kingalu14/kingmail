<?php
namespace App\Repository\Users;
use App\User;
use Illuminate\Support\Facades\Auth;

class EloquentUsers implements UsersRepository
{
    protected $model;

    public function __construct(User $model){
            $this->model=User;   
    }
    public function getAll(){
            return $this->model->all();
    }

    public function getByUserId($id){
            return   $this->model->where('user_id',$id)
            ->first();
    }

    public function getUserId(){
         return Auth::user()->id;
    }
    public function create(array $attributes){
            return  $this->model->create($attributes);
    }
    public function update($id,array $attributes){
        $template=$this->model->findOrFail($id);
        if($template){
            $template->update($attributes);
            return  $template;
            }
    }
    public function delete($id){
        $template=$this->model->findOrFail($id);
        if($template){
            return $template->delete($id);
        }
    }
    public function edit($id){
        $template=$this->model->findOrFail($id);
        if($template){
            return $template;
        }
    }
}
