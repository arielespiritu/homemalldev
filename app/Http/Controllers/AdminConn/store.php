<?php

namespace App\Http\Controllers\AdminConn;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
class store extends Controller
{
	public function validateUpdate(Request $request)
	{
		$input=Input::all();
		//return $request
		return json_encode($input);
	}

}
