<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::findOrFail(1)->permissions()->sync([1]);
        Role::findOrFail(2)->permissions()->sync([2, 3]);
        Role::findOrFail(3)->permissions()->sync([4]);
    }
}
