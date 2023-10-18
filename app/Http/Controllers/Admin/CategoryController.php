<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Interface\ICategoryRepository;


class CategoryController extends Controller
{

    protected $category_repo;
    
    public function __construct(ICategoryRepository $category_repo){ 

        $this->category_repo=$category_repo;
    }
    
    public function index()
    {
        //$data['categories']=Category::get();
        $data['categories']=$this->category_repo->get();
        return view('admin.category.index',$data);
    }

   
    public function create()
    {
        $data['categories']=$this->category_repo->get();
        return view('admin.category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
    //    $category=new Category();
    //    $category->name=$request->name;
    //    $category->parent_category_id=$request->parent_category_id?$request->parent_category_id:null;
    //    $category->save();
    //    flash('Successfully Save')->success();
        $this->category_repo->CreateCategory($request);
        return redirect('/admin/categories/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data['category']=$this->category_repo->myFind($id);
        $data['categories']=$this->category_repo->get();
        if($data['category']){
            return view('admin.category.edit',$data);
        }else{
            return redirect()->back();  
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request,$id)
    {
       $this->category_repo->UpdateCategory($request,$id);
       return redirect("/admin/categories");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->category_repo->myDelete($id);
        return redirect()->back();
    }
}
