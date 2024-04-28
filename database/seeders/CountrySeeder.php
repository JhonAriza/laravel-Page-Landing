<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['id' => '1', 'name' => 'Argentina', 'prefix' => 'AR', 'number' => '+54'],
            ['id' => '2', 'name' => 'Bolivia', 'prefix' => 'BO', 'number' => '+591'],
            ['id' => '3', 'name' => 'Chile', 'prefix' => 'CL', 'number' => '+56'],
            ['id' => '4', 'name' => 'Colombia', 'prefix' => 'CO', 'number' => '+57'],
            ['id' => '5', 'name' => 'Costa Rica', 'prefix' => 'CR', 'number' => '+506'],
            ['id' => '6', 'name' => 'Cuba', 'prefix' => 'CU', 'number' => '+53'],
            ['id' => '7', 'name' => 'Ecuador', 'prefix' => 'EC', 'number' => '+593'],
            ['id' => '8', 'name' => 'El Salvador', 'prefix' => 'SV', 'number' => '+503'],
            ['id' => '9', 'name' => 'España', 'prefix' => 'ES', 'number' => '+34'],
         ];

        foreach ($countries as $key => $value) {
            $country = new Country();
            $country->id = $value['id'];
            $country->name = $value['name'];
            $country->prefix = $value['prefix'];
            $country->number = $value['number'];
            $country->save();
        }
    }
}
