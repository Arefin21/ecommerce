<?php

namespace App\Repositories;
use App\Interface\ICategoryRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements ICategoryRepository{

    public function __construct(Category $model){
        parent::__construct($model);
    }
    public function CreateCategory($request)
    {
       try {
        $category=$this->model;
        $category->name=$request->name;
        $category->parent_category_id=$request->parent_category_id?$request->parent_category_id:null;
        $category->save();
        flash('Successfully Save')->success();
        return true;
       } catch (\Throwable $th) {
        flash('Something Wrong')->error();
        return false;
       }
    }

    public function updateCategory($request, $id) {
        try {
            $category = $this->model->findOrFail($id);
            
            $category->name = $request->input('name');
            $category->parent_category_id = $request->input('parent_category_id', null);
            
            $category->save();
            
            flash('Successfully Updated')->success();
            return true;
        } catch (\Throwable $th) {
            flash('Something Went Wrong')->error();
            return false;
        }
    }
    

    
}