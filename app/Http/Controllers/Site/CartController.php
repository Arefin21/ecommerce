<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interface\IProductRepository;
use App\Repositories\ProductRepository;
use Darryldecode\Cart\Cart;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Api;

class CartController extends Controller
{
    protected $productRepo;
    public function __construct(IProductRepository $productRepo) 
    {
    
        $this->productRepo=$productRepo;
    }
    public function get(){
        $items=\Cart::getContent();
        return view('site.checkout',compact('items'));
    }
    public function add($id){
        $product=$this->productRepo->myFind($id);
        if($product){
           \Cart::add(array(
                'id' => $id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(
                'image_path'=>$product->image_path,
                'discounted_price'=>$product->discounted_price,

                )
            ));
        }
       
    }

    public function add_with_ajax($id){
        
        try {
            $product=$this->productRepo->myFind($id); 
            if($product){
                \Cart::add(array(
                     'id' => $id,
                     'name' => $product->name,
                     'price' => $product->price,
                     'quantity' => 1,
                     'attributes' => array(
                     'image_path'=>$product->image_path,
                     'discounted_price'=>$product->discounted_price,
     
                     )
                 ));
             }
             return response()->json([
                'message'=>'Successfully Added',
                'state'=>'CA',
             ],200);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message'=>$th->getMessage(),
                'state'=>'CA',
            ],404);
        }
            
    }

    public function remove($id){
        \Cart::remove($id);
        return redirect()->back();
    }
}
  