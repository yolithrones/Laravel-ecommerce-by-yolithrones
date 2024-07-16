<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencyRecords =[
            ['id'=>1 , 'currency_code' => 'USD' , 'exchange_rate' => 750 , 'status' =>1],
            ['id'=>2 , 'currency_code' => 'GBP' , 'exchange_rate' => 1010 , 'status' =>1],
            ['id'=>3 , 'currency_code' => 'EUR' , 'exchange_rate' => 900 , 'status' =>1],
            ['id'=>4 , 'currency_code' => 'AUD' , 'exchange_rate' => 500 , 'status' =>1],
            ['id'=>5 , 'currency_code' => 'CAD' , 'exchange_rate' => 630 , 'status' =>1],
        ];

        Currency::insert($currencyRecords);
    }
}
