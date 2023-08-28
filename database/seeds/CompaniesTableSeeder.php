<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('companies')->insert([
//            [
//                'uuid'          => Webpatser\Uuid\Uuid::generate(),
//                'name'          => 'Empresa Padrão',
//                'district_id'   => 1,
//                'nuit'          => 123,
//                'alvara'        => 123,
//                'created_at'    => \Carbon\Carbon::now()
//            ]
//        ]);


        DB::table('legal_situations')->insert([
            [
                'uuid'          => Webpatser\Uuid\Uuid::generate(),
                'name'          => 'Estatal',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'uuid'          => Webpatser\Uuid\Uuid::generate(),
                'name'          => 'Privada',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'uuid'          => Webpatser\Uuid\Uuid::generate(),
                'name'          => 'Mista',
                'created_at'    => \Carbon\Carbon::now()
            ],
            [
                'uuid'          => Webpatser\Uuid\Uuid::generate(),
                'name'          => 'Indefinido',
                'created_at'    => \Carbon\Carbon::now()
            ]
        ]);
    }
}
