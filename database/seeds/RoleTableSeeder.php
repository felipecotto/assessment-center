<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Role::find(1)) {
            $role = new Role;
            $role->id = 1;
            $role->name = 'admin';
            $role->display_name = 'Administrador';
            $role->save();
        }

        if(!Role::find(2)) {
            $role = new Role;
            $role->id = 2;
            $role->name = 'instrutor';
            $role->display_name = 'Instrutor';
            $role->save();
        }
    }
}
