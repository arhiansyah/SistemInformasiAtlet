<?php

use App\Pelatih;
use Illuminate\Database\Seeder;

class PelatihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_pelatih = [];
        for ($i=1; $i<=100 ; $i++) 
        { 
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'nama' =>$faker->name,
                'instansi_id' =>$faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]),
                'lomba_id' =>$faker->randomElement([1,2,3,4,5]),
                'jenjang_id' =>$faker->randomElement([1,2,3]),
                'cabor_id' =>$faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
            ];
            array_push($data_pelatih, $data);    
        }
        Pelatih::insert($data_pelatih);
    }
}