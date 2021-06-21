<?php
namespace App\Libraries\API;
use Auth;


class TokenGeneration
{
    protected $algo = '';
	protected $ip = '';
	protected $start_time = 0;
	protected $window;
	protected $acl = '';
	protected $url = '';
	protected $session_id = '';
	protected $data = '';
	protected $salt = '';
	protected $key = '';
	protected $field_delimiter = '~';
	protected $early_url_encoding = false;
	protected $opts; // array;

	
	public function __CONSTRUCT($inputArr)
	{
		$this->opts =  array(
                    'start-time='   =>  "now",
                    'algo='         =>  'sha256',
					'ip'            =>  $_SERVER['REMOTE_ADDR'],
                   
                    'key'           => 'ABCDEFGH',
                   	'uid'           =>  session('userid'),
                   	'username'        =>  session('username'),
                   	'salt'  	=>  'HOWAREYOUTODAY',
                   	'secret'  	=>  'INDIAISGREAT',
                );
				$this->set_algo('sha256');
    }


	protected function encode($val) {
		if ($this->early_url_encoding === true) {
			return rawurlencode($val);
		}
		return $val;
	}

	public function set_algo($algo) {
		if (in_array($algo, array('sha256','sha1','md5'))) {
			$this->algo = $algo;
		} else {
			throw new Exception("Invalid algorithm, must be one of 'sha256', 'sha1' or 'md5'");
		}
	}
	public function get_algo() {
		return $this->algo;
	}
	
	public function getToken() {
		// ASSUMES:($algo='sha256', $ip='', $start_time=null, $session_id="", $payload="", $salt="", $key="000000000000", $field_delimiter="~")
		try{
		$m_token = $this->opts['uid'];
		$m_token .= $this->opts['username'];
		$m_token .= $this->opts['key'];
		$m_token .= $this->opts['uid'];
		
		
		$m_token_digest = (string)$m_token;
		$m_token_digest .= $this->opts['key'];
		$m_token_digest .= $this->opts['salt'];
		
		// produce the signature and append to the tokenized string
		$signature = hash_hmac($this->get_algo(), rtrim($m_token_digest, $this->field_delimiter), $this->opts['secret']);
		return $signature;
		
		}
		catch(Exception $e)
		{
			$this->throwError($e->getMessage());
		}
		
	}
	
}
