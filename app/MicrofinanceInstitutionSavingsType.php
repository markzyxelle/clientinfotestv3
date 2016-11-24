<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MicrofinanceInstitutionSavingsType extends Model {

	public function savingsType()
    {
        return $this->belongsTo('\App\SavingsType');
    }

}
