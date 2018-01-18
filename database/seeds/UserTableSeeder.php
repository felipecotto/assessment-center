<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::find(1)) {
            $user = new User;
            $user->id = 1;
            $user->name = 'Felipe Oliveira';
            $user->email = 'felipeoliveira.contato@gmail.com';
            $user->password = bcrypt('mudar123');
            $user->save();
            $user->roles()->attach(1);
        }
    }
}
