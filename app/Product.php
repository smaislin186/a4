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

    public static function getProfitAllProducts(){
		$products = Product::with('centers')->get();
		$product_profit = [];
		//dump($centers->toArray());
		foreach($products as $product){
			$product_profit += ['id' => $product['id']];
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
				$product_profit[$center['id']]= [
					'Balance' => $balance, 
					'IntInc' => $interest_income,
					'IntExp' => $interest_expense,
					'NII' => $non_interest_income,
					'NIE' => $non_interest_expense,
					'FeeInc' => $fee_income
					];
			}
		}
		dump($product_profit);

		return $product_profit;	
	}
}
