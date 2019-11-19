<?php
namespace App\Repository\Sents;
use App\Sent;

class EloquentSent implements SentRepository
{
    protected $model;
    public function __construct(Sent $model){
            $this->model = $model;   
    }
    public function getAll(){
            return $this->model->all();
    }
    public function getByUserId($id){
            return   $this->model->where('user_id',$id)
            ->first();
    }
    public function getByBulkId($id){
        return   $this->model->where('bulk_id',$id)
        ->first();
    }
    public function getById($id){
        return  $this->model->where('id',$id)
        ->first();
    }

    public function create(array $attributes){
            return  $this->model->create($attributes);
    }

    public function delete($id){
        $report=$this->model->findOrFail($id);
        if($report){
            return $report->delete($id);
        }
    }

}
