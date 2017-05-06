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
}