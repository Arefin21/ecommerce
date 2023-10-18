<?php

namespace App\Interface;
use App\Interface\IBaseRepository;

interface IProductRepository extends IBaseRepository {

    public function CreateProduct($request);
    public function GetLatestProduct();
    public function GetSpecialProduct();
    public function GetRandomProduct();
}


?>