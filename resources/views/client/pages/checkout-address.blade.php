@extends('client.master.master')

@section('title', 'Cart')

@section('content')

			
			<div class="container" style="margin-top:-17px;">
				<div class="col-md-9 " style="padding:2px;" >
					<div class="col-md-12 box" style="padding:15px; background:white" >
					<h1>Checkout</h1>
						<div class="col-md-5 " >
							<h3><span class="circle-num">1</span>Payment</h3>
							<p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
							<div class="bs-example">
							  <label class="radio-inline">
								<input name="group1" value="1" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" type="radio" checked="">
								Pick-up Payment
							  </label>
							  <label class="radio-inline">
								<input name="group1" value="2" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo" type="radio">
								COD
							  </label>
							  <div class="panel-group" id="accordion">
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h4 class="panel-title">
									  1. What is Pick-up Payment?
									</h4>
								  </div>
								  <div id="collapseOne" class="panel-collapse collapse in">
									<div class="panel-body">
									  <p>Payment for pick up will be collected when you pick up your orders in store.</p>
									</div>
								  </div>
								</div>
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h4 class="panel-title">
									  2. What is COD?
									</h4>
								  </div>
								  <div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
									  <p>Payment for COD(Cash on delivery) will be collected upon delivery.</p>
									</div>
								  </div>
								</div>
							  </div>
							</div>		
						</div>
						<div class="col-md-7 " >
							<h3><span class="circle-num">2</span>Delivery</h3>
							<p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
							<div class="bs-example">
							  <label class="radio-inline">
								<input name="group2" value="3" data-toggle="collapse" data-parent="#accordion2" data-target="#collapseThree" type="radio" checked="">
								I will Pick-up my Order
							  </label>
							  <label class="radio-inline">
								<input name="group2" value="4" data-toggle="collapse" data-parent="#accordion2" data-target="#collapseFour" type="radio">
								Please Deliver my Order
							  </label>
							  <div class="panel-group" id="accordion2">
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h4 class="panel-title">
									  1. I will Pick-up my Order.
									</h4>
								  </div>
								  <div id="collapseThree" class="panel-collapse collapse in">
									<div class="panel-body">
									  <p>You're the one who will pick up your orders from the store.</p>
									</div>
								  </div>
								</div>
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h4 class="panel-title">
									  2. Please Deliver my Order.
									</h4>
								  </div>
								  <div id="collapseFour" class="panel-collapse collapse">
									<div class="panel-body">
									  <p>We will deliver your orders by our own delivery methods.</p>
									</div>
								  </div>
								</div>
							  </div>
							</div>	
						</div>
						<div class="col-md-12 " >
							<h3><span class="circle-num">3</span>Shipping Address</h3>
							<p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
							<div class="bs-example">
							  <label class="radio-inline">
								<input name="group3" value="5" data-toggle="collapse" data-parent="#accordion4" data-target="#collapseFive" type="radio" checked="">
								Use Billing Address.
							  </label>
							  <label class="radio-inline">
								<input name="group3" value="6" data-toggle="collapse" data-parent="#accordion4" data-target="#collapseSix" type="radio">
								Input Shipping Address.
							  </label>
							  <div class="panel-group" id="accordion4">
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h4 class="panel-title">
									  1. Use Billing Address.
									</h4>
								  </div>
								  <div id="collapseFive" class="panel-collapse collapse in">
									<div class="panel-body">
											<div class="col-md-12" style="background:#fff; padding:0px;">					
												
											</div>
									</div>
								  </div>
								</div>
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h4 class="panel-title">
									  2. Set Shipping Address.
									</h4>
								  </div>
								  <div id="collapseSix" class="panel-collapse collapse ">
									<div class="panel-body">
										<div class="col-md-12" style="background:#fff; padding:0px;">					
												<form method="POST" action="/auth/register">
												<h4 >Billing Address</h4>
												{!! csrf_field() !!}
													</br>
													<div class="form-group col-md-6 col-md-12">
														Biller Firstname<input type="text" class="form-control input-md" placeholder="Shipper First Name" name="firstname" value="">
													</div>
													<div class="form-group col-md-6 col-md-12">
														Biller Lastname<input type="text" class="form-control input-md" placeholder="Shipper Last Name" name="lastname" value="">
													</div>
													<div class="form-group col-md-12 col-md-12">
														Biller Mobile<div class="input-group">
														  <span class="input-group-addon" id="sizing-addon2">+63</span>
														  <input type="text" class="form-control input-md" placeholder="Mobile" aria-describedby="sizing-addon2" id="mobile" value="" name="mobile">
														</div>
													</div>
													<div class="form-group col-md-6 col-md-12">
														Biller City<input type="text" class="form-control input-md" placeholder="" name="city" value="" disabled>
														<select class="form-control" id="gender" name="gender">
															<option>Quezon City</option>
															<option>Valenzuela City</option>
														</select>
													</div>
													<div class="form-group col-md-6 col-md-12">
														Biller Area<input type="text" class="form-control input-md" placeholder="" name="area" value="" disabled>
														<select class="form-control" id="gender" name="gender">
															<option>Area 1</option>
															<option>Area 2</option>
														</select>
													</div>
													<div class="form-group col-md-12">
														Biller Address<textarea class="form-control input-md" placeholder="Address" name="email" value=""></textarea>
													</div>
												</form>
											</div>
									</div>
								  </div>
								</div>
							  </div>
							</div>
						</div>
						<div class="col-md-12 " >
						<form method="post" action="">
						{!! csrf_field() !!}
                            <h3><span class="circle-num">4</span>Review Order</h3>
                            <p class="text-muted">You currently have 3 item(s) in your cart.</p>
							<h4>Order from <a href="" style="color:red">Sample Store</a></h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
												<a href="/product/details/sample" class=" category-products" >
													<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
												</a>
                                            </td>
                                            <td><a href="#">White Blouse Armani</a>
                                            </td>
                                            <td width="10%">
                                                <input type="number" value="2" class="form-control">
                                            </td>
                                            <td>$123.00</td>
                                            <td>$246.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="/product/details/sample" class=" category-products" >
													<img class="img-responsive"  data-src="{{ URL::asset('assets/img/category/grocery/1.png') }}" data-src-retina="{{ URL::asset('assets/img/category/grocery/1.png') }}" src="{{ URL::asset('assets/img/loading.gif') }}" />
												</a>
                                            </td>
                                            <td><a href="#">Black Blouse Armani</a>
                                            </td>
                                            <td width="10%">
                                                <input type="number" value="1" class="form-control">
                                            </td>
                                            <td>$200.00</td>
                                            <td>$200.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">$446.00</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
							
							<h4>Order from <a href="" style="color:red">Sample Store</a></h4>
							<div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
												<a href="/product/details/sample" class=" category-products" >
													<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
												</a>
                                            </td>
                                            <td><a href="#">White Blouse Armani</a>
                                            </td>
                                            <td width="10%">
                                                <input type="number" value="2" class="form-control">
                                            </td>
                                            <td>$123.00</td>
                                            <td>$246.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="/product/details/sample" class=" category-products" >
													<img class="img-responsive"  data-src="{{ URL::asset('assets/img/category/grocery/1.png') }}" data-src-retina="{{ URL::asset('assets/img/category/grocery/1.png') }}" src="{{ URL::asset('assets/img/loading.gif') }}" />
												</a>
                                            </td>
                                            <td><a href="#">Black Blouse Armani</a>
                                            </td>
                                            <td width="10%">
                                                <input type="number" value="1" class="form-control">
                                            </td>
                                            <td>$200.00</td>
                                            <td>$200.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">$446.00</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer" style="margin:0px;">
                                <div class="pull-left">
                                    <a href="/Market" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/Checkout"  class="btn btn-primary">Place Order <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 " style="padding:2px; "  >
					<div class="col-md-12 box" style="padding:15px; background:white;">
                        <h3>Order summary</h3>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>&#8369;&nbsp;&nbsp;446.00</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>&#8369;&nbsp;&nbsp;10.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>&#8369;&nbsp;&nbsp;0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>&#8369;&nbsp;&nbsp;456.00</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
					</div>
                </div> 
				

	
            </div>
			
 
						
@endsection


@section('page-script')
<script>

</script>	
	
@endsection