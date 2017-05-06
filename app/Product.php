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
}
