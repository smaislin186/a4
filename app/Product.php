<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
	public function centers() {
		# Pivot table relationship for center_product
		# includes additional value fields
		return $this->belongsToMany('App\Center')
			->withPivot('balance','interest_income', 'interest_expense', 'non_interest_income', 'non_interest_expense', 'fee_income')
			->withTimestamps();
	}

	# return center_types in a list to display in views
    public static function getProductsForDropdown() {
        $products = Product::orderBy('name', 'ASC')->get();
        $productsForDropdown = [];
        foreach($products as $product) {
            $productsForDropdown[$product->id] = $product->name;
        }
        return $productsForDropdown;
    }

    # sum data for each product
    public static function getProfitAllProducts(){
		$products = Product::with('centers')->get();
		$product_profit = [];

		foreach($products as $product){
			$balance = 0;
			$interest_income = 0;
			$interest_expense = 0;
			$non_interest_income = 0;
			$non_interest_expense = 0;
			$fee_income = 0;
			
			foreach($product['centers'] as $center){
				$balance += $center['pivot']->balance;
				$interest_income += $center['pivot']->interest_income;
				$interest_expense += $center['pivot']->interest_expense;
				$non_interest_income += $center['pivot']->non_interest_income;
				$non_interest_expense += $center['pivot']->non_interest_expense;
				$fee_income += $center['pivot']->fee_income;
			}
            // if put inside the product for each, it excludes center without a row in the pivot
            // add if statement to check if all balances are 0? Let user pick if want to return records with no data?
            $product_profit[$product['id']]= [
					'name' => $product['name'],
                    'Balance' => $balance, 
					'IntInc' => $interest_income,
					'IntExp' => $interest_expense,
					'NII' => $non_interest_income,
					'NIE' => $non_interest_expense,
					'FeeInc' => $fee_income
					];
		}
		dump($product_profit);

		return $product_profit;	
	}

    # sum data for one product
    public static function getProfitOneProduct($id){
		$products = Product::where('id', $id)->with('centers')->get();
		$product_profit = [];
        dump($products->toArray());
        $productArray = $products->toArray();
        $balance = 0;
        $interest_income = 0;
        $interest_expense = 0;
        $non_interest_income = 0;
        $non_interest_expense = 0;
        $fee_income = 0;
			
        foreach($productArray[0]['centers'] as $center){
            $balance += $center['pivot']['balance'];
            $interest_income += $center['pivot']['interest_income'];
            $interest_expense += $center['pivot']['interest_expense'];
            $non_interest_income += $center['pivot']['non_interest_income'];
            $non_interest_expense += $center['pivot']['non_interest_expense'];
            $fee_income += $center['pivot']['fee_income'];
        }
		
         $product_profit[$productArray[0]['id']]= [
                'name' => $productArray[0]['name'],
                'Balance' => $balance, 
                'IntInc' => $interest_income,
                'IntExp' => $interest_expense,
                'NII' => $non_interest_income,
                'NIE' => $non_interest_expense,
                'FeeInc' => $fee_income
                ];

		dump($product_profit);
		return $product_profit;	
	}
}
