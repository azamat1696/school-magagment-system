<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions for student crud
        Permission::create([
           'name' => 'Create Student'
        ]);
        Permission::create([
            'name' => 'Delete Student'
        ]);
        Permission::create([
            'name' => 'Update Student'
        ]);
        Permission::create([
            'name' => 'Read Student'
        ]);
    }
}
