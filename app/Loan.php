<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model {

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['area_loan_type_id', 'client_id', 'cc_code', 'created_at', 'updated_at'];

	public function areaLoanType()
    {
        return $this->belongsTo('\App\AreaLoanType');
    }

}
