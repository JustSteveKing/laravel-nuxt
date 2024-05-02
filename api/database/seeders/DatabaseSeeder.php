<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Steve McDougall',
            'email' => 'juststevemcd@gmail.com',
        ]);

        $member = Role::query()->create([
            'name' => 'Member',
            'label' => 'member',
        ]);

        $admin = Role::query()->create([
            'name' => 'admin',
            'label' => 'Admin',
        ]);

        $createUser = Permission::query()->create([
            'name' => 'users.create',
            'label' => 'Create Users',
        ]);
        $deleteUser = Permission::query()->create([
            'name' => 'users.delete',
            'label' => 'Delete Users',
        ]);

        $listUser = Permission::query()->create([
            'name' => 'users.list',
            'label' => 'List Users',
        ]);

        $admin->permissions()->save($createUser);
        $admin->permissions()->save($deleteUser);
        $admin->permissions()->save($listUser);
        $member->permissions()->save($listUser);

        $user->roles()->save($admin);
    }
}
