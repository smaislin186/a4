<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CenterType extends Model
{
    public function centers() {
        # CenterType is assigned to many centers
        return $this->hasMany('App\Center');
    }
    
    # return center_types in a list to display in views
    public static function getCenterTypesForDropdown() {
        $center_types = CenterType::orderBy('type', 'ASC')->get();
        $centerTypesForDropdown = [];
        foreach($center_types as $type) {
            $centerTypesForDropdown[$type->id] = $type->type;
        }
        return $centerTypesForDropdown;
    }
}