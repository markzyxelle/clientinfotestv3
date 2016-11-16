<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

	public function microfinanceInstitution()
    {
        return $this->hasOne('\App\MicrofinanceInstitution');
    }

}
