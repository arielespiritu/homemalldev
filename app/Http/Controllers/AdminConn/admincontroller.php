<?php

namespace App\Http\Controllers\AdminConn;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\adminmodel\indicator;
use App\adminmodel\storeowner;
class admincontroller extends Controller
{
public function showDashboard(Request $request)
{
	try
	{
		//return $this->checkUserLevel();
		if ($request->isMethod('GET')) {
				
			 if($this->checkUserLevel() == 'authFailed' )
			 {
				return redirect('/HMadmin/login');
				
			 }
			 else if($this->checkUserLevel() == 'authErr' )
			 {	 
				return redirect('/HMadmin/login');
			 }
			 else if($this->checkUserLevel() == 'empty' )
			 {
				return 'no indicator';
			 }
			 else
			 {
				
				 foreach($this->checkUserLevel() as $indicatorInfo)
				 {
					$indicator_id=$indicatorInfo->id;
					$indicator_name=$indicatorInfo->indicator_name;
					$indicator_for=$indicatorInfo->indicator_for;
				 }				
				
				 if($indicator_name == 'STORE ADMIN')
				 {
					$userLogin= Auth::user();
					$storeowner = storeowner::where('id','=',$userlogin->login_id)->get();
					return $storeowner;
					// return view('admin.main')
							// ->with('userLevel',$indicator_name);
							// ->with('userinfo',);
				 }
				 else
				 {
					 return $indicator_name;
				 }

			 }
		}
		else
		{
			//err method err
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
				// foreach($getIndicatorDescription as $indicatorInfo)
				// {
					// $indicator_id=$indicatorInfo->id;
					// $indicator_name=$indicatorInfo->indicator_name;
					// $indicator_for=$indicatorInfo->indicator_for;
							// //id-indicator name - indicator for
					// return $indicator_id.'-'.$indicator_name.'-'.$indicator_for;
				// }
				return $getIndicatorDescription;
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
public function showStoreProfile(Request $request)
{
	try
	{
		if ($request->isMethod('GET')) {
				
			 if(Auth::user())
			 {
				return view('admin.store.profile');
			 }
			 else
			 {	 
				return redirect('/HMadmin/login');
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



}
