<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $photographerRole = Role::where('name', 'photographer')->first();
        $userRole = Role::where('name', 'user')->first();
        
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'country' => 'Pakistan',
            'password' => Hash::make('password')
        ]);

        $photographer = User::create([
            'name' => 'Photographer',
            'company_name' => 'Photographer',
            'email' => 'photographer@gmail.com',
            'country' => 'Pakistan',
            'type_of_shoot' => 'Weddings',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'country' => 'Pakistan',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $photographer->roles()->attach($photographerRole);
        $user->roles()->attach($userRole);

    }
}
