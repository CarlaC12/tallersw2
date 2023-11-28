<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = New User();
        $user-> name = 'javier';
        $user->password = bcrypt('aaaa');
        $user->save();
        $user->assignRole('administrador');
        
        $user = new User();
        $user->name = 'admin';
        $user->password = bcrypt('admin');
        $user->save();
        $user->assignRole('administrador');

        $user = new User();
        $user->name = 'martin';
        $user->password = bcrypt('aaaa');
        $user->save();
        $user->assignRole('cliente');

        $user = new User();
        $user->name = 'luis';
        $user->password = bcrypt('aaaa');
        $user->save();
        $user->assignRole('cliente');
        
    }
}
