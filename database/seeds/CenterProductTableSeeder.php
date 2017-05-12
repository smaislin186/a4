<?php

use Illuminate\Database\Seeder;
use App\Center;
use App\Product;

class CenterProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $center_product = [
            'South Boston' => [
                'Loans' => [
                    '800000', '60000', '15000', '10000', '1000', '5000'
                ],
                'Deposits' => [
                    '200000', '10000', '1000', '5000', '500', '100'
                ],      
            ],
            'East Boston' => [
                'Loans' => [
                    '500000', '30000', '5000', '10000', '15000', '3000'
                ],
                'Deposits' => [
                    '400000', '16000', '1000', '5500', '550', '100'
                ],      
            ]
        ];

        foreach($center_product as $centerName => $product){
            foreach($product as $productName => $data){
                $center = Center::where('name', 'like', $centerName)->first();
                $product = Product::where('name', 'like', $productName)->first();
                $balance = $data[0];
                $intInc = $data[1];
                $intExp = $data[2];
                $NII = $data[3];
                $NIE = $data[4];
                $feeInc = $data[5];

                $center->products()->save($product,
                    ['balance'=>$balance, 'interest_income'=>$intInc, 'interest_expense'=>$intExp, 'non_interest_income'=>$NII, 'non_interest_expense'=>$NIE, 'fee_income'=>$feeInc]);
            }
        }
    }
}
