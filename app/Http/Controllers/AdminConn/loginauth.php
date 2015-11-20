<?php
namespace App\Http\Controllers\AdminConn;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\adminmodel\login;
use App\adminmodel\indicator;
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
public function checkUserLevel()
{
	try
	{
		 if(Auth::user())
		 {
			$usersinfo= Auth::user();
			$getIndicatorDescription=Indicator::where('id','=',$usersinfo->indicator_id)->where('indicator_for','=','STORE')->get();
			if(count($getIndicatorDescription) <= 0)
			{
				return 'empty';
			}
			else
			{
				foreach($getIndicatorDescription as $indicatorInfo)
				{
					$indicator_id=$indicatorInfo->id;
					$indicator_name=$indicatorInfo->indicator_name;
					$indicator_for=$indicatorInfo->indicator_for;
							//id-indicator name - indicator for
					//return $indicator_id.'-'.$indicator_name.'-'.$indicator_for;
				}
				return $indicator_for;
			}
		 }
		 else
		 {	 
			return 'authFailed';
		 }
	}
	catch(\Exception $e)
	{
		return 'authErr';
	}
}	
	public function validateLogin(Request $request)
	{
		try
		{
			$err=array("Login Failed");
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
							if($this->checkUserLevel() == 'STORE')
							{
								return json_encode(array(['key' => '0','session' => csrf_token(),'success' => '1','message' => 'login success','data' => $user]));
							}
							else
							{
								array_push($err,"Please Check you account");
								Auth::logout();
								return json_encode(array(['key' => '0','session' => csrf_token(),'success' => '0','message' => 'login','data' =>$err]));
							}
							
						}
						else
						{
							array_push($err,"Please Check you account");
							return json_encode(array(['key' => '0','session' => csrf_token(),'success' => '0','message' => 'login','data' =>$err]));
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
