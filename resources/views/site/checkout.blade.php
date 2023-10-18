@extends('site.layouts.app')

@section('content')

<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Price</th>
					</tr>
				</thead>

                @forelse ($items  as $item)

                <tr class="rem1">
                    <td class="invert-closeb">
                        <div class="rem">
                           <a href="{{url("/cart/remove/$item->id",[] )}}"> <div class="close1"> </div></a>
                        </div>
                        {{-- <script>$(document).ready(function(c) {
                            $('.close1').on('click', function(c){
                                $('.rem1').fadeOut('slow', function(c){
                                    $('.rem1').remove();
                                });
                                });	  
                            });
                       </script> --}}
                    </td>
                    <td class="invert-image"><a href="single.html"><img src="{{asset("/storage/$item->attributes->image_path")}}" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                         <div class="quantity"> 
                            <div class="quantity-select">                           
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>{{$item->quantity}}</span></div>
                                <div class="entry value-plus active" id="cart_add_{{$item->id}}" onclick="addItemInCart({{$item->id}})">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">{{$item->name}}</td>
                    <td class="invert">{{$item->price}}</td>
                </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Item Found</td>
                    </tr>
                @endforelse
					
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
			</table>
		</div>
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="mens.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Shopping basket</h4>
					<ul>
						<li>Hand Bag <i>-</i> <span>$45.99</span></li>
						
						<li>Total <i>-</i> <span>$183.96</span></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div>
</div>	

@endsection
@push('scripts')
<script>
    function addItemInCart(id){
        $.ajax({
            url: "/api/cart/add/" + id,
            success: function(result) {
                // The success callback is properly closed here.
                // console.log(result);
                alert(result.message);
            } 
        });
    }
</script>

@endpush