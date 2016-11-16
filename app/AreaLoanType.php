<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaLoanType extends Model {

	protected $table = 'area_loan_type';

	public function loanType()
    {
        return $this->belongsTo('\App\LoanType');
    }

}
