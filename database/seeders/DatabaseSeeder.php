<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::create(
            [
                'name' => 'Administrador',
                'email' => 'support@sumburero.org',
                'email_verified_at' => now(),
                'password' => Hash::make('#sumburero@2021@'),
                'remember_token' => Hash::make('password')
            ]
        );
       // app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $admin =  Role::create([
            'name' => 'admin',
        ]);
        $publisher =    Role::create([
            'name' => 'publisher',
        ]);
        $roles = Role::where('name', 'admin')->get();
        $user->syncRoles([$roles]);
    }
}
