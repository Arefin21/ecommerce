<?php

namespace App\Interface;

interface IBaseRepository{
    public function get();
    public function myFind($id);
    public function myDelete($id);
}

?>