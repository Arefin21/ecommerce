<?php

namespace App\Repositories;
use App\Interface\IBaseRepository;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository{

    protected $model;
    
    public function __construct(Model $model){  

        $this->model=$model;
    }

    public function get(){
        return $this->model->get();
    }

    public function myFind($id){

        $data= $this->model->find($id);
        if($data){
            return $data;
        }else{
            flash('No Item Found')->error();
            return null;
        }
    }

    public function myDelete($id){
        try {
            $data= $this->model->find($id);
            if($data){
                $data->delete();
                flash('Data is successfully deleted')->success();
                return true;
            } else {
                flash('No Item Found')->error();
                return false;
            }
        } catch (\Throwable $th) {
            flash('Something is wrong')->error();
            return false;
        }
    }
    


}

?>