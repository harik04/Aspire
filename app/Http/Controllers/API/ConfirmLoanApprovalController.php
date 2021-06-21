<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;

class ConfirmLoanApprovalController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	 public function getLoanApproval(Request $request){
        $data = $request->user();
        return response()->json($data,200);
    }

    public function getUserList(){
        $data = App\model\User::all();
        return response()->json($data,200);
    }
	
}


<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function getProfile(Request $request){
        $data = $request->user();
        return response()->json($data,200);
    }

    public function getUserList(){
        $data = App\User::all();
        return response()->json($data,200);
    }
} 