<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/provincias.json");
        $data = json_decode($json);
        $arrayFinal = [];
        foreach ($data as $provincia)
        {
            $arrayFinal[] = array(
                'id'            => $provincia->id,
                'uuid'          => Webpatser\Uuid\Uuid::generate(),
                'name'          => $provincia->name,
                'created_at'    => \Carbon\Carbon::now()
            );
        }

        DB::table('provinces')->insert($arrayFinal);
    }
}