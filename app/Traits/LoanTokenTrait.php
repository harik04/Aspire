<?php
namespace App\Traits;
use Auth;
use Config;
use App\Libraries\API\TokenGeneration;

	trait LoanTokenTrait {

	    public function getToken($input) {

	   		/* Get The token only for Akamai Video */	   		
	   		$token    = null;
	   		
	   		if(is_array($input) && !empty($input))
	   		{	   			
				try{
						$TokenObj = new TokenGeneration($input);
						$token    = $TokenObj->getToken();
					}
				catch(Exception $e)
				{
					exit($e->getMessage());
				}	           
	   		}

	        return $token;
	    }
	}

?>