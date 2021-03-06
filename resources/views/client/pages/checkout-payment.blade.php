@extends('client.master.master')

@section('title', 'Cart')

@section('content')

			
			<div class="container" style="margin-top:-17px;">
				<div class="col-md-9 " style="padding:2px;" >
					<div class="col-md-12 box" style="padding:15px; background:white" >
						 <form method="post" action="/Checkout/Review-Order">
						 {!! csrf_field() !!}
                            <h1>Checkout</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>
                            <div class="content" style="margin-top:20px;">
                                <div class="row">
                                    
                                </div>
                            </div>
                            <div class="box-footer"  style="margin:0px;">
                                 <div class="pull-left">
                                    <a href="/checkout/address" class="btn btn-default"><i class="fa fa-chevron-left"></i>Reset</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default">Review Order<i class="fa fa-chevron-right"></i>
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