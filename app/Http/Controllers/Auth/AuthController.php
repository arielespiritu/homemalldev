<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Member;
use Validator;
use Input;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
	protected $loginPath = 'auth/login';
	protected $redirectPath = '/market';
	protected $redirectAfterLogout = 'auth/login';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
	   return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
			'lastname' => 'required|max:50',
			'firstname' => 'required|max:50',
			'birthday' => 'required',
			'gender' => 'required',
			'mobile' => 'required|min:9|max:9',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
	

		$member = new Member;
		$member->fname = $data['firstname'];
		$member->lname = $data['lastname'];
		$member->email = $data['email'];
		$member->bday = $data['birthday'];
		$member->gender = $data['gender'];
		$member->mobile = $data['mobile'];
		$member->save();
        $inserted_id = $member->id;
		
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
			'indicator_id' => '5',
			'login_id' => $inserted_id,
        ]);
    }
	public function postLogin(Request $request)
    {
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return redirect('auth/login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
			// create our user data for the authentication
			$userdata = array(
			    'indicator_id' => '5',
				'email'     => Input::get('email'),
				'password'  => Input::get('password')
			);
			// attempt to do the login
			if (Auth::attempt($userdata)) {
				return redirect()->intended('/market');
			} else {        
				// validation not successful, send back to form 
				return redirect()->back()->withInput()->withErrors('Wrong username/password combination.');
			}
		}
	}
	public function getLogout() {
        Auth::logout(); // logout user
        return redirect(\URL::previous());
	}
}
