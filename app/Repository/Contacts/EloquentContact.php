<?php
namespace App\Repository\Contacts;
use App\Contact;

class EloquentContact implements ContactRepository
{
    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;   
    }
    public function getAll(){
        return $this->model->all();
    }

    public function getByUserId($id){
        return   $this->model->where('user_id',$id)
        ->get();
    }
    public function getByBulkId($id){
        return   $this->model->where('bulk_id',$id)
        ->get();
    }
    public function getByUserBulkId($userId,$bulkId){
        return   $this->model->where('bulk_id',$bulkId)
                 ->where('user_id',$userId)
                 ->get();
    }
    public function getByEmail($email){
        return   $this->model->where('email',$email)
        ->first();
    }
    public function create(array $attributes){
        return  $this->model->create($attributes);
    }
    public function update($id,array $attributes){
        $contact=$this->model->findOrFail($id);
        if($contact){
            $contact->update($attributes);
            return  $contact;
        }
    }
 public function delete($id){
    $contact=$this->model->findOrFail($id);
    if($contact){
        return $contact->delete($id);
    }
 }

 public function edit($id){
    $contact=$this->model->findOrFail($id);
    if($contact){
        return $contact;
    }
 }
}
