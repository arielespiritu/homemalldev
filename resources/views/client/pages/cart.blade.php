@extends('client.master.master')

@section('title', 'Cart')

@section('content')

			
			<div class="container" style="margin-top:-17px;">
		
				<div class="col-md-9 " style="padding:2px;" >
					<div class="col-md-12 box" style="padding:15px; background:white" >
					<h1>Shopping cart</h1>
					 <p class="text-muted">You currently have 3 item(s) in your cart.</p>
						<div class="col-md-12 " id="cart-div" >
						
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
                                    <a href="/Market" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Continue Shopping</a>
                                </div>
                                <div class="pull-right">
                                    <button class="btn btn-danger" onclick="removeAllCart()"> Clear Basket</button>
                                    <a href="/Checkout"  class="btn btn-primary">Proceed to Checkout <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                      
					  
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
function removeAllCart(){
		try{
			var response = $.ajax({
				type: "POST",
				url: "/cart/removecart",
				async: false
			}).responseText;
			alert(response);
			var datas = JSON.parse(response);
			if(datas.success==true){
				var elem1 = document.getElementsByClassName("badge-cart1");
				var elem2 = document.getElementById("badge-cart2");
				var elem3 = document.getElementById("badge-cart3");
				var elem4 = document.getElementById("badge-cart4");
				if ( elem1 ) {
				 elem1.innerHTML="0";
				}
				if ( elem2 ) {
				elem2.innerHTML="0";
				}
				if ( elem3 ) {
				elem3.innerHTML="0";
				}
				if ( elem4) {
				elem4.innerHTML="0";
				}
			}
		}catch(err){
			alert(err.message);
		}
}	
</script>	
	
@endsection