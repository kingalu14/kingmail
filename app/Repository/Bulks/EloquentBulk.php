<?php
namespace App\Repository\Bulks;
use App\Bulk;

class EloquentBulk implements BulkRepository
{
    protected $model;

    public function __construct(Bulk $model)
    {
        $this->model = $model;   
    }
    public function getAll(){
        return $this->model->all();
    }

    public function  getById($id){
        return $this->model->find($id);
    }

    public function getByUserId($id){
        return   $this->model->where('user_id',$id)
        ->get();
    }

    public function create(array $attributes){
        return  $this->model->create($attributes);
    }
    public function update($id,array $attributes){
        $bulk=$this->model->findOrFail($id);
        if($bulk){
            $bulk->update($attributes);
            return  $bulk;
        }
    }
 public function delete($id){
    $bulk=$this->model->findOrFail($id);
    if($bulk){
        return $bulk->delete($id);
    }
    
 }

 public function edit($id){
    $bulk=$this->model->findOrFail($id);
    if($bulk){
        return $bulk;
    }
 }

}
