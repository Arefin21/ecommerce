<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interface\IProductRepository;

class HomeController extends Controller
{

    protected $productReop;
    public function __construct(IProductRepository $productReop){
        $this->productReop=$productReop;
    }

    public function index(){
        $data['latest_product']=$this->productReop->GetLatestProduct();
        $data['special_product']=$this->productReop->GetSpecialProduct();
        return view("site.welcome",$data);
    }

}
