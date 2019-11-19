<?php

use Illuminate\Database\Seeder;
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
        $u = new User();
        $u->name = 'cuisinator';
        $u->email = 'cuisinator@cuisinator.net';
        $u->password = bcrypt('cuisinator');
        $u->role = "user";
        $u->save();
    }
}
