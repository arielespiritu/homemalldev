@extends('client.master.master')

@section('title', 'Register')

@section('content')

			
			<div class="container" style="margin-top:-17px;">
				<div class="col-md-12 " style="padding:2px; "  >
					<div class="col-md-12 box " style="padding:15px; background:white;">
                        <h1>My-Account</h1>
						<div class="col-md-12" style="padding:10px; "  >
						
					
						  <ul class="nav nav-tabs">
							@if($type=='Info')
								<li class="active"><a data-toggle="tab" href="#menu">Information</a></li>
							@else
								<li ><a data-toggle="tab" href="#menu">Information</a></li>
							@endif
							
							@if($type=='Favorites')
								<li class="active"><a data-toggle="tab" href="#menu1">Favorites</a></li>
							@else
								<li><a data-toggle="tab" href="#menu1">Favorites</a></li>
							@endif
							
							@if($type=='Wishlist')
								<li class="active"><a data-toggle="tab" href="#menu2">Wishlist</a></li>
							@else
								<li><a data-toggle="tab" href="#menu2">Wishlist</a></li>
							@endif
							<li><a data-toggle="tab" href="#menu3">Login Security</a></li>
						  </ul>

							  <div class="tab-content">
							  @if($type=='Info')
							  	<div id="menu" class="tab-pane fade in active">
							  @else
							  	<div id="menu" class="tab-pane fade in">
							  @endif
										<h3 class="blue">Personal Information</h3>
										<p class="text-danger">Note: Please complete your information.</p>
											@foreach($user as $users)
												<div class="col-md-7" style="background:#fff; padding:0px">
													<h4 >Basic Info</h4>												
													<form method="POST" action="/auth/register">
													{!! csrf_field() !!}
														</br>
														<div class="form-group col-md-6 col-md-12">
															Firstname<input type="text" class="form-control input-md" placeholder="First Name" name="firstname" value="{{$users->member->fname}}">
														</div>
														<div class="form-group col-md-6 col-md-12">
															Lastname<input type="text" class="form-control input-md" placeholder="Last Name" name="lastname" value="{{$users->member->lname}}">
														</div>
														<div class="form-group col-md-6 col-md-12">
															Birthday<input class="form-control" id="date" type="date" placeholder="Birthday" max="2030-01-01" min="2015-01-01" name="birthday" value="{{$users->member->bday}}" />
														</div>
														<div class="form-group col-md-6 col-md-12">
															Gender<select class="form-control" id="gender" name="gender">
																@if($users->member->gender=='Male')
																	<option selected>Male</option>
																	<option >Female</option>
																	@else
																	<option>Male</option>
																	<option selected >Female</option>
																@endif
															 </select>
														</div>
														<div class="form-group col-md-12 col-md-12">
															Mobile<div class="input-group">
															  <span class="input-group-addon" id="sizing-addon2">+63</span>
															  <input type="text" class="form-control input-md" placeholder="Mobile" aria-describedby="sizing-addon2" id="mobile" value="{{$users->member->mobile}}" name="mobile">
															</div>
														</div>
														<div class="form-group col-md-6 col-md-12">
															City<input type="text" class="form-control input-md" placeholder="" id="city-personal" value="{{$users->member->city}}" disabled>
															<select class="form-control" id="city" >
															@foreach($city as $city)
																<option value="{{$city->id}}">{{$city->city_name}}</option>
															@endforeach
															</select>
														</div>
														<div class="form-group col-md-6 col-md-12">
															Area<input type="text" class="form-control input-md" placeholder="" id="area-personal" value="{{$users->member->area}}" disabled>
															<select class="form-control" id="area" >
																<option>Area 1</option>
																<option>Area 2</option>
															</select>
														</div>
														<div class="form-group col-md-12">
															Address<textarea class="form-control input-md" placeholder="Address" name="address" >{{$users->member->address}}</textarea>
														</div>
														<div class="form-group col-md-6 col-md-12">
															<button class="form-control btn btn-primary" type="submit" >Update Info</button>
														</div>
													</form>
												</div>	
											@endforeach
											
											<div class="col-md-5" style="background:#fff; padding:0px;">					
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
													<div class="form-group col-md-6 col-md-12">
														<button class="form-control btn btn-primary" type="submit" >Update Billing Info</button>
													</div>	
												</form>
											</div>												

									  
									  
								</div>
								@if($type=='Favorites')
									<div id="menu1" class="tab-pane fade in active">
								@else
									<div id="menu1" class="tab-pane fade in">
								@endif
									<h3>Favorites</h3>
									<div class="col-md-12" style="padding:10px; "  >
										<form >
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th colspan="2">Product</th>
														<th>Unit price</th>
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
														<td>$123.00</td>
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
														<td>$200.00</td>
														<td><a href="#"><i class="fa fa-trash-o"></i></a>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								@if($type=='Wishlist')
									<div id="menu2" class="tab-pane fade in active">
								@else
									<div id="menu2" class="tab-pane fade in">
								@endif
									<h3>Wishlist</h3>
									<div class="col-md-12 " >
										<form >
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th colspan="2">Product</th>
															<th>Unit price</th>
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
															<td>$123.00</td>
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
															<td>$200.00</td>
															<td><a href="#"><i class="fa fa-trash-o"></i></a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
								</div>
								<div id="menu3" class="tab-pane fade">
									<h3>Login Security</h3>
									<div class="col-md-5" style="background:#fff; padding:0px;">										
										<form method="POST" action="/auth/register">
										{!! csrf_field() !!}
											</br>
											<div class="form-group col-md-12">
												Email<input type="email" class="form-control input-md" placeholder="Email" name="email" value="" disabled>
											</div>
											<div class="form-group col-md-12">
												Password<input type="password" class="form-control input-md" placeholder="Password" name="password" disabled>
											</div>
											<div class="form-group col-md-6 col-md-12">
												<button class="form-control input-md btn btn-primary" type="submit">Change Password</button>
											</div>
										</form>
									</div>
								</div>
							  </div>
						</div>

					</div>
                </div> 
				<div class="col-md-9 " style="padding:2px; margin-top:-30px;" >
					<div class="col-md-12 box" style="padding:15px; background:white" >
						<div class="col-md-12 " >
						<form method="post" action="">
						{!! csrf_field() !!}
                            <h3>Pending Order</h3>
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
											<th colspan="2">Status</th>
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
                                                <input type="number" value="1" class="form-control" disabled>
                                            </td>
                                            <td>$123.00</td>
                                            <td>$246.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
											<td>pending</td>
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
                                                <input type="number" value="1" class="form-control" disabled>
                                            </td>
                                            <td>$200.00</td>
                                            <td>$200.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
											<td>pending</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6">Total</th>
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
											<th colspan="2">Status</th>
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
                                                <input type="number" value="1" class="form-control" disabled>
                                            </td>
                                            <td>$123.00</td>
                                            <td>$246.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
											<td>pending</td>
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
                                                <input type="number" value="1" class="form-control" disabled>
                                            </td>
                                            <td>$200.00</td>
                                            <td>$200.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
											<td>pending</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6">Total</th>
                                            <th colspan="2">$446.00</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
                        </form>
						</div>
					</div>
				</div>
				
				<div class="col-md-3 " style="padding:2px; margin-top:-30px;"  >
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
$('#city').on('change', function() {
	//alert( this.value ); // or $(this).val()
	var id = this.value; 
	var city = $("#city option:selected").text();
	$('#city-personal').val(city);
	$('#area-personal').val('');
	$.post("/References/Lgu/Delete",{id : id}, function(result){	
				
	});
});


			
</script>	
	
@endsection