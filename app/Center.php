<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    public function center_type() {
		# Book belongs to Author
		# Define an inverse one-to-many relationship.
		return $this->belongsTo('App\CenterType');
	}
}
