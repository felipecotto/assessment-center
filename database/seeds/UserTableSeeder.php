<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Felipe Oliveira',
            'email'=>'felipeoliveira.contato@gmail.com',
            'password'=>bcrypt('mudar123'),
        ]);
    }
}
