<?php

use Illuminate\Database\Seeder;

class assetStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_status')->insert(['name' => 'Pending']);
        DB::table('asset_status')->insert(['name' => 'Ready to Deploy']);
        DB::table('asset_status')->insert(['name' => 'Archive']);
        DB::table('asset_status')->insert(['name' => 'Broken/Not Fixable']);
        DB::table('asset_status')->insert(['name' => 'Lost/Stolen']);
        DB::table('asset_status')->insert(['name' => 'Out of Repair']);
    }
}
