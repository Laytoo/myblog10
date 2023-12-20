<?php
namespace Database\Seeders;
use App\Models\User ;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'), // password
                'role'=>'admin',
                'remember_token' => null,

            ],[
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('password'), // password
                'role'=>'user',
                'remember_token' => null,
            ],
        ]);
    }


}
