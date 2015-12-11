<?php namespace App\Http\Controllers;
use Auth;
use DB;
use Input;
use App\User;
use App\Market;
use Response;
use Anam\Phpcart\Cart;
class CartController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
		
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function showCart()
	{
	$market_data = Market::with('category')->get();
		if (Auth::check())
		{
			$id = Auth::user()->login_id;
			$user = User::where('id', $id )->with('member')->get();
			return view('client.pages.cart')->with('user',$user)->with('market_data',$market_data);
		}else{
			return view('client.pages.cart')->with('market_data',$market_data);
		}
	}
	
	public function addCart()
	{
			$input = Input::all();
			$pid=$input['data1'];
			$name=$input['data2'];
			$price=$input['data3'];
			$quan=$input['data4'];
			
			$cart = new Cart();
			//$cart->clear();
			if($cart->has($pid)){
				$existingItem = $cart->get($pid);
				$existingQuantity = $existingItem->quantity;
				$newQuantity = $existingQuantity + $quan;
				$newTotal = $newQuantity * $price; 
				$cart->updateQty($pid, $newQuantity);
				$cart->updatePrice($pid, $price);
				$cart->update([
					'id'       => $pid,
					'price'     => $newTotal
				]);
			}else{
				$cart->add([
					'id'       => $pid,
					'name'     => $name,
					'quantity' => $quan,
					'price'    => $price,
					'unit_price'    => $price
		
				]);
			}
			
			$cart_data = array();
			$items = $cart->getItems();
			$itemsCount = $cart->count();
			$itemsQuantityCount = $cart->totalQuantity();
			$itemsTotalPrice = $cart->getTotal();

			$cart_data['datas1'] = $items;
			$cart_data['datas2'] = $itemsCount;
			$cart_data['datas3'] = $itemsQuantityCount;
			$cart_data['datas4'] = $itemsTotalPrice;
			
			return Response::json(array(
						'success' => true,
						'data'   => $cart_data
					)); 

	}
	public function getCart()
	{
	
	}
	public function getItemCartCount()
	{
		$cart = new Cart();
		$itemsCount = $cart->count();
		return Response::json(array(
						'success' => true,
						'data'   => $itemsCount
					)); 
	}
	public function removeCart()
	{
		$cart = new Cart();
		$cart->clear();
		return Response::json(array(
						'success' => true,
						'message' => 'All items in cart has been remove.'
					)); 
	}
	
}
