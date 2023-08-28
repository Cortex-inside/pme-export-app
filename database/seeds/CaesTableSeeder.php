<?php

use Illuminate\Database\Seeder;

class CaesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/cae.json");
        $data = json_decode($json);
        $arrayFinal = [];
        foreach ($data as $cae)
        {
            $arrayFinal[] = array(
                'uuid'          => Webpatser\Uuid\Uuid::generate(),
                'code'          => $cae->codCae,
                'description'    => $cae->descriacao,
                'designation'    => $cae->desiganacao,
                'created_at'    => \Carbon\Carbon::now()
            );
        }

        DB::table('caes')->insert($arrayFinal);
    }
}