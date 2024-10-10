<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::where('email', 'admin@admin.com')->delete();

        $admin = Admin::create([
            'name' => 'Admin',
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => bcrypt("password"), // password
            'remember_token' => Str::random(10),
        ]);

    }
}
