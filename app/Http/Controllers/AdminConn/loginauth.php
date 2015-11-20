<?php
namespace App\Http\Controllers\AdminConn;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\adminmodel\login;
class loginauth extends Controller
{
	public function showLogin(Request $request)
	{
		try
		{
			if ($request->isMethod('GET')) {
					
				 if(Auth::user())
				 {
					return redirect('/HMadmin');
				 }
				 else
				 {	 
					return view('admin.login');
				 }
			}
			else
			{
			}			
		}
		catch(\Exception $e)
		{
			
		}
	}
	public function validateLogin(Request $request)
	{
		try
		{
			$loginAuth = login::all();
			$username =strip_tags(htmlspecialchars($request->tempname));
			$password =strip_tags(htmlspecialchars($request->temppass));
			if ($request->isMethod('POST')) 
			{
				$attributes = [
							'tempname' => 'Username',
							'temppass' => 'Password'
						];
						$rules = [
							'tempname' => 'required|email',
							'temppass' => 'required',
						];

					$validator = Validator::make($request->all(),$rules,[],$attributes);
					if ($validator->fails()) {
				
						 //return json_encode($validator->errors()->all());
						return json_encode(array(['key' => '0','session' => csrf_token(),'success' => '0','message' => 'login','data' => $validator->errors()->all()]));
					}else{
						
						if (Auth::attempt(['email' => $username, 'password' => $password],'remember')) 
						{
							$user= Auth::user();
							return json_encode(array(['key' => '0','session' => csrf_token(),'success' => '1','message' => 'login success','data' => $user]));
						}
						else
						{
							return 'false';
						}
					}				
			}
			else
			{
				return '400';
			}
		}
		catch(\Exception $e)
		{
			return '400'.$e;
		}
	}
	public function getlogOut() {

		Auth::logout();
		if(Auth::check())
		{
			
		}
		else
		{
			return 'false';
		}

	}
	
}
