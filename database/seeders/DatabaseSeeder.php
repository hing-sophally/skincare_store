<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles first
        $this->call([
            RolesTableSeeder::class,
        ]);

        // Then create users
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super_admin@example.com',
            'password' =>'super_admin2003',
            'role_id' => 1, // Replace with the appropriate role_id from the roles table
            'terms_and_conditions' => true,
        ]);
    }
}