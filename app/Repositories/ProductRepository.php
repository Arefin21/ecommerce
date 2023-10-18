<?php

namespace App\Repositories;
use App\Interface\IProductRepository;
use App\Models\Product;
use App\Models\OtherImage;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository implements IProductRepository{

    protected $model;
    public function __construct(Product $model){
        parent::__construct($model);
    }
 public function CreateProduct($request){
    try {

        DB::beginTransaction();
     
        $image_path=null;

        if($request->hasFile("featured_image")){
            $image_path=$request->file('featured_image')->store('products','public');
        }
        
        $product=$this->model;
        $product->name=$request->name;
        $product->category_id=$request->category_id;
        $product->stock=$request->stock;
        $product->price=$request->price;
        $product->discounted_price=$request->discounted_price;
        $product->description=$request->description;
        $product->image_path=$image_path;
        $product->save();

        if($request->hasFile("others_image")){
            foreach($request->file('others_image') as $img){
                 $others=new OtherImage();
                 $others->product_id=$product->id;
                 $others->image_path=$img->store('products','public');
                 $others->save();
            }
           
        }

        foreach($request->product_size as $s){
            $ps=new Size();
            $ps->product_id=$product->id; 
            $ps->name=$s;
            $ps->save();    
        }
        DB::commit();
        flash('Successfully Save')->success();
        return true;
       } catch (\Throwable $th) {
        flash('Something Wrong')->error();
        return false;
        DB::rollBack();
       }
    }

    public function GetLatestProduct()

    {
        return $this->model->orderBy("created_at")->take(5)->get();
    }
    
    public function GetSpecialProduct()

    {
        return $this->model->where('discounted_price','>',0)->get();
    }

    public function GetRandomProduct()

    {

    }

 }
   
