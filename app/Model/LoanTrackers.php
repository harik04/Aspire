<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class LoanTrackers extends Model
{
    //
	public static function createLoanLead($data)
	{
		//$loanTrackerId = loantrackers::uniqueId();
		$time = date("Y-m-d H:i:s");
		$loanTrackerId = DB::table('loantrackers')->insertOrIgnore(array(
			'uid' => $data['uid'],
			'customername' =>$data['username'],
			'amountrequired' => $data['amountrequired'],
			'loanterm' => $data['loanTerm'],
			'created_at' => $time
		));
		return $loanTrackerId;
	}
	
	public static function LoanApproval($data)
	{
		$loanTrackerId = DB::table('loantrackers')->insertOrIgnore(array(
			'uid' => $data['uid'],
			'customername' =>$data['username'],
			'amountrequired' => $data['amountrequired'],
			'loanterm' => $data['loanTerm'],
			'created_at' => $time
		));
		
		$finaldata = array(
            'recordsTotal' => 1,
            'recordsFiltered' => 1,
            'data' => [],
        );
		
		// create another model - ifLoanApproved
		//and pass that data from here or from ifLoanApproved model..
		
        return response()->json($finaldata);
	}
	
}
