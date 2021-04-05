<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Role
        $super_admin = User::create([
            'name' => 'YofanSuperAdmin', 
            'email' => 'yofansuperadmin.ixe@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $super_admin_role = Role::findById(1);
        $super_admin->assignRole($super_admin_role);

        // Dokter
        $dokter = User::create([
            'name' => 'YofanDokter', 
            'email' => 'yofandokter.ixe@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $dokter_role = Role::findById(2);
        $dokter->assignRole($dokter_role);

        // Admin
        $admin = User::create([
            'name' => 'YofanAdmin', 
            'email' => 'yofanadmin.ixe@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $admin_role = Role::findById(3);
        $admin->assignRole($admin_role);

    }
}
