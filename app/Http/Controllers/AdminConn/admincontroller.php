<?php

namespace App\Http\Controllers\AdminConn;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\adminmodel\indicator;
use App\adminmodel\storeowner;
use App\adminmodel\city;
class admincontroller extends Controller
{
	
public function __construct()
{
	$this->middleware('authadmin');
}	
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
					$storeowner = storeowner::where('store_id','=',$userLogin->login_id)->with('showStoreInfo')->get();
					return view('admin.main')
							->with('userLevel',$indicator_name)
							->with('userinfo',$storeowner);
				 }
				 else
				 {
					$userLogin= Auth::user();
					$storeowner = storeowner::where('store_id','=',$userLogin->login_id)->with('showStoreInfo')->get();
					return view('admin.main')
							->with('userLevel',$indicator_name)
							->with('userinfo',$storeowner);
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
				return redirect('/HMadmin/login');
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
					$city =city::with('viewAllLocations')->get();
					$userLogin= Auth::user();
					$storeowner = storeowner::where('store_id','=',$userLogin->login_id)->with('showStoreInfo')->get();
					return view('admin.store.profile')
							->with('userLevel',$indicator_name)
							->with('userinfo',$storeowner)
							->with('cities',$city);
				 }
				 else
				 {
					$city =city::with('viewAllLocations')->get();
					$userLogin= Auth::user();
					$storeowner = storeowner::where('store_id','=',$userLogin->login_id)->with('showStoreInfo')->get();
					return view('admin.store.profile')
							->with('userLevel',$indicator_name)
							->with('userinfo',$storeowner)
							->with('cities',$city);
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



}
