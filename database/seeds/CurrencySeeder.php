<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([[
            'name' => 'EUR',
            'ratio' => 1.0,
            'sign' => '€',
            'is_base' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'name' => 'USD',
            'ratio' => 1.09,
            'sign' => '$',
            'is_base' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]]);
    }
}
