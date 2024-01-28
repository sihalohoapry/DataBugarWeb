<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Admin Data Bugar";
        $user->role = "ADMIN";
        $user->user = "ADN001";
        $user->password = Hash::make('DATABGR2024'); 
        $user->save();
    }
}
