<?php
namespace App\Http\Controllers;
use DB;

use Validator;
use Redirect;
use View;
use Route;
use Auth;
use Session;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

// model
use App\Model\LoanTrackers;
use App\Model\LoanApproved;

use App\Traits\LoanTokenTrait;

class LoanApprovalController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	use LoanTokenTrait;
	
	public function __CONSTRUCT(Request $request)
	{
		// use this function to set class variables..
	}
	public function approve(Request $request)
	{		
		// use trait and get token
		sleep(3);
		//echo "Processing....";
		$requestToken = $this->getToken($request->all()); // call trait method
		// pass the Input to trait method..
		//dd( $request->all());
		
		$data = [];
		
		$data = array_merge(['requestToken'=>$requestToken,'uid'=>session('userid'),'username'=>session('username')],
		$request->all());
		
		$trackerID = LoanTrackers::createLoanLead($data);
		// now call the view and tell user that system is processing the request
		
		$data = array_merge(['trackerID'=>$trackerID],$data);
		
		//dd($data);
		// insert into loantracker table - save every loan request into this table
		
		// call CURL and post it to API for Approval of the loan
		//call api for isLoanApproval model and see if the uid is approved or not
		
		// add the userid in loan approved table...
		LoanApproved::InsertIntoLoanApproved($data['uid']);
		//dd($data);
		$apiJsonData = json_encode($data);
		
		
		return view('waiting',compact('data'));
		//return view('waiting')->with($data);
		
	}
	
	/* API END POINT....*/
	public function isLoanApproved (Request $request)
	{
		 try
            {
               // if (!Auth::check())
				  // dd($request->all());
				if (strtolower(base64_decode($request->username)==''))
                {
                    $res['status']      =   401;
                    $res['authorized']  =   false;
                    $res['error']       =   true;
                    $res['msg']         =   'Unauthorized';
                }
                else
                {
                    $asset   = array();
                    $asset   = LoanApproved::isLoanApproved($request->uid);
                    $res['status']      = 200;
                    $res['authorized']  = true;
                    $res['isApproved']  = true;
                    $res['amountrequired']  = $request->amountrequired;
                }
            }
            catch(Exception $e)
            {
                $res['error']      =   true;
                $res['msg']        =   "Exception::".$e->getMessage();
                $res['status']     =   201;
            }
            finally
            {
                return response()->json($res)
                  ->header('X-Frame-Options', 'deny')
                  ->header('X-XSS-Protection', '1');
            }
	}
	
	/* API END POINT....*/
	public function confirmPayment(Request $request)
	{
		try
            {
				
			 $isAccepted = LoanApproved::AcceptPayment($request->uid,$request->weeklyamountpayment,$request->paymentdate);
				if($isAccepted)
				{
					return view('payment');
				}					
					
				else
				{
					return view('error')->with(['msg'=>'Payment Acceptance Failed..']);
				}
            }
            catch(Exception $e)
            {
                // return view('error')->with(['msg'=>'Payment Acceptance Failed..']);
            }
			
           
	}
	
}
