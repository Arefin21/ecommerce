<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user=new User();
        $user->name="admin";
        $user->email="admin@gmail.com";
        $user->password=Hash::make('admin');
        $user->is_admin=true;
        $user->save();
    }
}
