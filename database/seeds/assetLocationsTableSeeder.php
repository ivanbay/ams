<?php

use Illuminate\Database\Seeder;

class assetLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_locations')->insert(['name' => 'Room #1']);
        DB::table('asset_locations')->insert(['name' => 'Room #2']);
    }
}
