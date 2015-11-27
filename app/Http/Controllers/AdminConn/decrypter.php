<?php

namespace App\Http\Controllers\AdminConn;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
use Input;
class decrypter extends Controller
{

	// public function __construct()
	// {
		// $this->middleware('authadmin');
	// }		
	public function decrypt(Request $request)
	{
		try	
			{
				$input= Input::all();
				if ($request->isMethod('POST')) 
				{
					
					$decrypted = Crypt::decrypt($input['temp_value']);
					return $decrypted;
				}
				else
				{
					return '0';
				}
			}
		catch(\Exception $e)
		{
			return '0'.$e;
		}
	}



}
