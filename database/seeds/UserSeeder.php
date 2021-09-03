<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = User::create([
            'nombre' => "Nuevo",
            'email' =>"nuevo@gmail.com",
            'password' => "1234",
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        
        $u->assingRole('Admin');
    }
}
