<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('variants')->insert([
            'name' => "Variant A",
            'description' => "Desc A",
            'processor' => "Proc A",
            'memory' => "mem A",
            'storage' => "Storage A",
            'product_id' => 2,
        ]);

        DB::table('variants')->insert([
            'name' => "Variant B",
            'description' => "Desc B",
            'processor' => "Proc B",
            'memory' => "mem B",
            'storage' => "Storage B",
            'product_id' => 2,
        ]);


        DB::table('variants')->insert([
            'name' => "Variant C",
            'description' => "Desc C",
            'processor' => "Proc C",
            'memory' => "mem C",
            'storage' => "Storage C",
            'product_id' => 3,
        ]);

        DB::table('variants')->insert([
            'name' => "Variant D",
            'description' => "Desc D",
            'processor' => "Proc D",
            'memory' => "mem D",
            'storage' => "Storage D",
            'product_id' => 4,
        ]);

    }
}
