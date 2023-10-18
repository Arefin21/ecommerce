<?php

namespace App\Interface;
use App\Interface\IBaseRepository;

interface ICategoryRepository extends IBaseRepository {

    public function CreateCategory($request);
    public function UpdateCategory($request,$id);
}

?>