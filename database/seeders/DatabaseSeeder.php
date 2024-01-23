<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Admin;
use App\Models\Sidebar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        User::factory()->create([
            'name' => 'Master Admin',
            'email' => '2bD3k5bz3stw@admin.com',
            'role' => 1,
            'password' => Hash::make('y649M4CZ4PQm6DhwvwkJt')
        ]);

        Admin::create([
            'title' => 'Sample title',
            'link' => 'http://samplelink.com',
            'logo' => null,
            'webimage' => null,
            'info' => 'Put admin details here'
        ]);

        Sidebar::create([
            'name' => 'Banner',
            'status' => 0,
        ]);
        Sidebar::create([
            'name' => 'Links Management',
            'status' => 0,
        ]);
        Sidebar::create([
            'name' => 'Buttons',
            'status' => 0,
        ]);
    }
}
