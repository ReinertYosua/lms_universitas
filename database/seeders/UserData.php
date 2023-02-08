<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=[
            [
                'name' => 'Administrator',
                'email' => 'admin@lms.com',
                'usertype' => 1,
                'password' => bcrypt('123456')
            ], 
            [
                'name' => 'Reinert Yosua Rumagit',
                'email' => 'dosen@lms.com',
                'usertype' => 2,
                'password' => bcrypt('123456')
            ], 
            [
                'name' => 'Agung Sucipto Wiranata',
                'email' => 'awiranata@lms.com',
                'usertype' => 3,
                'password' => bcrypt('123456')
            ],
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
