<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MicrofinanceInstitutionLoanType extends Model {

	public function loanType()
    {
        return $this->belongsTo('\App\LoanType');
    }

}
