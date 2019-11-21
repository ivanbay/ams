<?php

use Illuminate\Database\Seeder;

class assetCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_categories')->insert(['name' => 'Land']);
        DB::table('asset_categories')->insert(['name' => 'Building']);
        DB::table('asset_categories')->insert(['name' => 'Plant']);
        DB::table('asset_categories')->insert(['name' => 'Machinery']);
        DB::table('asset_categories')->insert(['name' => 'Equipment']);
        DB::table('asset_categories')->insert(['name' => 'Furniture']);
    }
}
