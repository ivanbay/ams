<?php

use Illuminate\Database\Seeder;

class assetTypesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('asset_types')->insert(['name' => 'Land']);
        DB::table('asset_types')->insert(['name' => 'Building']);
        DB::table('asset_types')->insert(['name' => 'Plant']);
        DB::table('asset_types')->insert(['name' => 'Machinery']);
        DB::table('asset_types')->insert(['name' => 'Equipment']);
        DB::table('asset_types')->insert(['name' => 'Furniture']);
    }

}
