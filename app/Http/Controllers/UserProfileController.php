<?php
namespace App\Http\Controllers;
use DB;

use Validator;
use Redirect;
use View;
use Route;
use Auth;
use Input;
use Session;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class UserProfileController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function __CONSTRUCT(Request $request)
	{
		$this->InputArr = $request->all();
		//dd( Request::all());
	}
	
	public function show(Request $request)
	{
		
		if ($request->isMethod('post') && $request->has(['username', 'pwd']))
		{
			$validation = Validator::make($this->InputArr, [
			'username' => 'required|string|regex:/^[a-zA-Z]+$/u|max:255',
			'pwd' => 'required',
			]);
			
			if($validation->fails())
			{				
				 return Redirect::back()->withInput()->withErrors($validation);
			}		
				
			$users = DB::table('users')
				->where('name', '=', $this->InputArr['username'])
				->where('password', '=', $this->InputArr['pwd'])
				->first();
			
			if(count((array)$users)>0)
			{
				// set the session userid, name
				$request->session()->put('userid', $users->id);
				$request->session()->put('username', $users->name);
				return view('loan');
			}
			else
			{
				$autoID = DB::table('users')->insertGetId([
				'name' => $this->InputArr['username'],
				'password' => $this->InputArr['pwd'],
				'email' => $this->InputArr['username'].'@gmail.com',
				]);				
				
				$request->session()->put('userid', $autoID);
				$request->session()->put('username', $this->InputArr['username']);
				// create the record continue with 
			 // return view('error')->with(['msg'=>'Username or password is incorrect']);
			 return view('loan');
			}
		}
	}
	
	public function LoanApproved($authorized,$isapproved,$amountrequired)
	{
			
		if(!$authorized || !$isapproved)
		{
			return view('error')->with(['msg'=>'Not Authorized']);
		}
		if($authorized === 'true' && $isapproved === 'true' )
		{
			session(['sanctionAmount' => $amountrequired]);
			return view('loanapproved')
			->with(
			[
				'authorized'=>$authorized,
				'isapproved'=>$isapproved
			]);			
		}
		else
		{
			//dd("failed");
		}
		//return view('loanaproved')
		//->with[$request->all()];
	}
}
