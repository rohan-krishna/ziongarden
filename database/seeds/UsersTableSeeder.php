<?php

use App\User;
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
        //
        $me = User::create(['name' => 'Administrator', 'email' => 'rohan@bluehexagon.in', 'password' => bcrypt('Harry30993')]);
    }
}
