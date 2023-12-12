<?php 


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentBaseRepository implements BaseRepository{

    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($data){
        return $this->model->create($data);
    }

    public function update($model , $data){
        return $model->update($data);
    }

    public function delete($model){
        $model->delete();
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function saveImage($file, $path)
    {
        $path = $file->store("public/$path");
        $path = str_replace('public','storage',$path);
        return $path;
    }

    public function all(){
        return $this->model->all();
    }
    
}