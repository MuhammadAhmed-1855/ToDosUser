<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin_role = Role::create(['name' => 'admin']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'Admin@internet.com',
            'password' => bcrypt('AdminPassword'),
        ]);

        $admin->assignRole($admin_role);

        $user_role = Role::create(['name' => 'user']);

        $user = User::create([
            'name' => 'SDF',
            'email' => 'SDF@nu.edu.pk',
            'password' => bcrypt('234567890'),
        ]);

        $admin->assignRole($user_role);


        // $permission = Permission::create(['name' => 'delete users']);
    }
}