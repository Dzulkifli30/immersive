<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userObj = new User();
        $userObj->name = 'User';
        $userObj->email = 'user@gmail.com';
        $userObj->password = Hash::make('123456789');
        $userObj->role = 0;
        $userObj->save();

        $adminObj = new User();
        $adminObj->name = 'Admin';
        $adminObj->email = 'admin@gmail.com';
        $adminObj->password = Hash::make('123456789');
        $adminObj->role = 1;
        $adminObj->save();

        $superAdminObj = new User();
        $superAdminObj->name = 'Super Admin';
        $superAdminObj->email = 'superadmin@gmail.com';
        $superAdminObj->password = Hash::make('123456789');
        $superAdminObj->role = 2;
        $superAdminObj->save();

    }
}
