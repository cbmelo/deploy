<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $franchiseeRole = Role::where('name', 'franchisee')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123')
        ]);

        $franchisee = User::create([
            'name' => 'franchisee User',
            'email' => 'franchisee@franchisee.com',
            'password' => Hash::make('123')
        ]);

        $author = User::create([
            'name' => 'author User',
            'email' => 'author@author.com',
            'password' => Hash::make('123')
        ]);

        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('123')
        ]);

        $admin->roles()->attach($adminRole);
        $franchisee->roles()->attach($franchiseeRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
