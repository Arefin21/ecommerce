<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Interface\IProductRepository;
use App\Interface\ICategoryRepository;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    protected $productRepo;
    protected $category_repo;

    public function __construct(IProductRepository $productRepo,ICategoryRepository $category_repo)

    {
        $this->productRepo=$productRepo;
        $this->category_repo=$category_repo;
    }

    public function index()
    {
        $data['products']=$this->productRepo->GetLatestProduct();
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $data['categories']=$this->category_repo->get();
        return view('admin.product.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $this->productRepo->CreateProduct($request);
        return redirect()->back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
