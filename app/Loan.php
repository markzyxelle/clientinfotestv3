<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model {

	public function microfinanceInstitutionLoanType()
    {
        return $this->belongsTo('\App\MicrofinanceInstitutionLoanType');
    }

    public function microfinanceInstitutionSavingsType()
    {
    	return $this->belongsToMany('App\MicrofinanceInstitutionSavingsType');
    }

}
