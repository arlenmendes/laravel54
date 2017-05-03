<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Arlen Mateus Mendes',
            'email' => 'arlen@compjunior.com.br',
            'password' => bcrypt('dilma')
        ]);
    }
}
