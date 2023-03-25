<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
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
//        Role::create([
//            'name' => 'Super-Admin',
//        ]);
//        Role::create([
//            'name' => 'Operator'
//        ]);
//        Role::create([
//            'name' => 'Internal-Audit'
//        ]);
//        Role::create([
//            'name' => 'Teacher'
//        ]);
//        $user = \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//             'password' =>  Hash::make('12121212'),
//             'country_id' => 1,
//         ]);

//
//      $super_admin =  Role::create([
//            'name' => 'Super-Admin',
//        ]);
//        Role::create([
//            'name' => 'Operator'
//        ]);
//        Role::create([
//            'name' => 'Internal-Audit'
//        ]);
//        Role::create([
//            'name' => 'Teacher'
//        ]);
//        //Permissions for student crud
//        Permission::create([
//            'name' => 'Create Student'
//        ]);
//        Permission::create([
//            'name' => 'Delete Student'
//        ]);
//        Permission::create([
//            'name' => 'Update Student'
//        ]);
//        Permission::create([
//            'name' => 'Read Student'
//        ]);
        $user = User::find(2);
        $user->assignRole('Super-Admin');
    }
}
