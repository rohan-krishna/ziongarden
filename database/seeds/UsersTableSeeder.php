<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = Role::create(['name' => 'Administrator']);
        $moderatorRole = Role::create(['name' => 'Moderator']);
        $normalRole = Role::create(['name' => 'Normal']);

        $me = User::create(['name' => 'Administrator', 'email' => 'rohan@bluehexagon.in', 'password' => bcrypt('Harry30993')]);
        $me->assignRole($adminRole);
    }
}
