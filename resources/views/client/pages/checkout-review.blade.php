@extends('client.master.master')

@section('title', 'Cart')

@section('content')

			
			<div class="container" style="margin-top:-17px;">
		
				<div class="col-md-9 " style="padding:2px;" >
					<div class="col-md-12 box" style="padding:15px; background:white" >
						
						<form method="post" action="">
						{!! csrf_field() !!}
                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have 3 item(s) in your cart.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
												<a href="/Product/Details/sample" class=" category-products" >
													<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
												</a>
                                            </td>
                                            <td><a href="#">White Blouse Armani</a>
                                            </td>
                                            <td width="10%">
                                                <input type="number" value="2" class="form-control">
                                            </td>
                                            <td>$123.00</td>
                                            <td>$0.00</td>
                                            <td>$246.00</td>
                                            <td><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="/Product/Details/sample" class=" category-products" >
													<img class="img-responsive"  data-src="{{ URL::asset('assets/img/category/grocery/1.png') }}" data-src-retina="{{ URL::asset('assets/img/category/grocery/1.png') }}" src="{{ URL::asset('assets/img/loading.gif') }}" />
												</a>
                                            </td>
                                            <td><a href="#">Black Blouse Armani</a>
                                            </td>
                                            <td width="10%">
                                                <input type="number" value="1" class="form-control">
                                            </td>
                                            <td>$200.00</td>
                                            <td>$0.00</td>
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
                                    <a href="/Checkout/Address" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Address</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default">Place Order <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>


						
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
                                        <th>$446.00</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$10.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>$456.00</th>
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