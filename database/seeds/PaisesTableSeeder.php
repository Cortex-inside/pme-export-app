<?php

use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder
{

    public function run()
    {

        $lista = listaPais();

        foreach($lista as $item) {
            \PMEexport\Models\Country::create([
                    "uuid" => \Webpatser\Uuid\Uuid::generate(),
                    "sigla" => $item->sigla,
                    "nome" => $item->nome_pais
                ]
            );
        }


    }
}