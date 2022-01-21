<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jefe;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        Jefe::create([
            'ci' =>'12345678',
            'nombres' =>'Hector Armando',
            'apellidos'=>'Quispe Menacho',
            'correo_electronico'=>'armandohector8@gmail.com',
        ]);
        User::create([
            'name' => 'Hector Armando',
            'email' => 'armandohector8@gmail.com',
            'password' => Hash::make('12345678'),
            'id_jefe'=> 1,
        ])->assignRole('admin');
        // \App\Models\User::factory(10)->create();
    }
}
