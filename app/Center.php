<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    public function center_type() {
		# Center belongs to CenterType
		return $this->belongsTo('App\CenterType');
	}

	public function products() {
		# Pivot table relationship for center_product
		# includes additional value fields
		return $this->belongsToMany('App\Product')
			->withPivot('balance','interest_income', 'interest_expense', 'non_interest_income', 'non_interest_expense', 'fee_income')
			->withTimestamps();
	}

	# return center_types in a list to display in views
    public static function getCentersForDropdown() {
        $centers = Center::orderBy('name', 'ASC')->get();
        $centersForDropdown = [];
        foreach($centers as $center) {
            $centersForDropdown[$center->id] = $center->name;
        }
        return $centersForDropdown;
    }

	# sum data for each center
	public static function getProfitAllCenters(){
		$centers = Center::with('products')->get();
		$center_profit = [];

		foreach($centers as $center){
			$balance = 0;
			$interest_income = 0;
			$interest_expense = 0;
			$non_interest_income = 0;
			$non_interest_expense = 0;
			$fee_income = 0;
			
			foreach($center['products'] as $product){
				$balance += $product['pivot']->balance;
				$interest_income += $product['pivot']->interest_income;
				$interest_expense += $product['pivot']->interest_expense;
				$non_interest_income += $product['pivot']->non_interest_income;
				$non_interest_expense += $product['pivot']->non_interest_expense;
				$fee_income += $product['pivot']->fee_income;
			}
			// if put inside the product for each, it excludes center without a row in the pivot
			$center_profit[$center['id']] = [
					'name' => $center['name'],
					'Balance' => $balance, 
					'IntInc' => $interest_income,
					'IntExp' => $interest_expense,
					'NII' => $non_interest_income,
					'NIE' => $non_interest_expense,
					'FeeInc' => $fee_income
					];
		}
		dump($center_profit);
		return $center_profit;	
	}

	# sum data for one product
    public static function getProfitOneCenter($id){
		$centers = Center::where('id', $id)->with('products')->get();
		$center_profit = [];
        dump($centers->toArray());
        $centerArray = $centers->toArray();
        $balance = 0;
        $interest_income = 0;
        $interest_expense = 0;
        $non_interest_income = 0;
        $non_interest_expense = 0;
        $fee_income = 0;
			
        foreach($centerArray[0]['products'] as $product){
            $balance += $product['pivot']['balance'];
            $interest_income += $product['pivot']['interest_income'];
            $interest_expense += $product['pivot']['interest_expense'];
            $non_interest_income += $product['pivot']['non_interest_income'];
            $non_interest_expense += $product['pivot']['non_interest_expense'];
            $fee_income += $product['pivot']['fee_income'];
        }

		$center_profit[$centerArray[0]['id']]= [
                'name' => $centerArray[0]['name'],
                'Balance' => $balance, 
                'IntInc' => $interest_income,
                'IntExp' => $interest_expense,
                'NII' => $non_interest_income,
                'NIE' => $non_interest_expense,
                'FeeInc' => $fee_income
                ];
		
		dump($center_profit);
		return $center_profit;	
	}
}