<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/distritos.json");
        $data = json_decode($json);
        $arrayFinal = [];
        foreach ($data as $district)
        {
            $arrayFinal[] = array(
                'id'          => $district->id,
                'uuid'          => Webpatser\Uuid\Uuid::generate(),
                'name'          => $district->name,
                'province_id'          => $district->provinciaId,
                'created_at'    => \Carbon\Carbon::now()
            );
        }

        DB::table('districts')->insert($arrayFinal);
    }
}