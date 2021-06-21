<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class LoanApproved extends Model
{
    //insert 
	public static function InsertIntoLoanApproved($uid)
	{		
		$Id = DB::table('loanapproved')->insertOrIgnore(array(
			'id' => $uid,
			'confirmed' =>true,
		));
		return $Id;
	}
	public static function isLoanApproved($uid)
	{		
		///return $loanTrackerId;
		return DB::table('loanapproved')
				->where('id', '=', $uid)
				->pluck('confirmed')
				->first();
	}
	public static function AcceptPayment($uid,$amount,$date)
	{	
		/*	
		$Id = DB::table('loanapproved')->updateOrInsert([
		['id' => $uid, 'payment' => $amount],
		['id' => $uid, 'paymentdate' => $date],
			
		]);
		*/
		
		return DB::table('loanapproved')->where('id', $uid)
         ->update(['payment' => $amount,'paymentdate' => $date]);
		
	}
}
