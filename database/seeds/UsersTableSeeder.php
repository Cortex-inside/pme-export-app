<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'uuid'              => Webpatser\Uuid\Uuid::generate(),
                'name'              => 'Suporte',
                'status'            => 1,
                'company_id'        => null,
                'email'             => 'suporte@fsitecnologia.com.br',
                'password'          => bcrypt('123456'),
                'remember_token'    => str_random(10),
                'created_at'        => \Carbon\Carbon::now()
            ]
        ]);
        DB::table('users')->insert([
            [
                'uuid'              => Webpatser\Uuid\Uuid::generate(),
                'name'              => 'Admin',
                'status'            => 1,
                'company_id'        => null,
                'email'             => 'admin@pmeexporte.co.mz',
                'password'          => bcrypt('123456'),
                'remember_token'    => str_random(10),
                'created_at'        => \Carbon\Carbon::now()
            ]
        ]);


        DB::table('role_user')->insert(['user_id'=>1,'role_id'=>1]);
        DB::table('role_user')->insert(['user_id'=>2,'role_id'=>2]);

        DB::table('oauth_clients')->insert([
            'user_id'=>1,
            'name'=>'Laravel Password Grant Client',
            'secret'=>'v21wwzw8BqlYrjkceq3rN4ojUtzw6dO85QXX5agv',
            'redirect'=>'http://localhost',
            'personal_access_client'=>0,
            'password_client'=>1,
            'revoked'=>0,
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
