<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model {

	public function microfinanceInstitutionSavingsType()
    {
        return $this->belongsTo('\App\MicrofinanceInstitutionSavingsType');
    }

}
