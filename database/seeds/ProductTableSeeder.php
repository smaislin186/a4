<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'N/A',
        'name' => 'NotApplicable',
        'parent_id' => 0,
        ]);

        Product::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'Loans',
        'name' => 'Loans',
        'parent_id' => 0,
        ]);

        Product::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'Deposits',
        'name' => 'Deposits',
        'parent_id' => 0,
        ]);

        Product::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'DD',
        'name' => 'Demand Deposit',
        'parent_id' => 0,
        ]);

        Product::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'Sav',
        'name' => 'Savings',
        'parent_id' => 0,
        ]);

        Product::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'TD',
        'name' => 'Time Deposits',
        'parent_id' => 0,
        ]);

        Product::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'Mtg',
        'name' => 'Mortgages',
        'parent_id' => 0,
        ]);

        Product::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'CNLoan',
        'name' => 'Consumer Loans',
        'parent_id' => 0,
        ]);

        Product::insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'code' => 'CMLoan',
        'name' => 'Commercial Loans',
        'parent_id' => 0,
        ]);
    }
}
