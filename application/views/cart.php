	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $total=0;?>
						<?php foreach($cart as $cartItem):?>
						<?php $productId=$cartItem->P_Id;
							  $total+=$cartItem->Amount;
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url($products[$productId]->P_Img)?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $products[$productId]->P_Name;?></a></h4>
							</td>
							<td class="cart_price">
								<p>&#8377;<?php echo $products[$productId]->P_Price;?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<!--Use later:<a class="cart_quantity_up" href=""> + </a>-->
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $cartItem->Quantity;?>" autocomplete="off" size="2">
									<!-- use later:<a class="cart_quantity_down" href=""> - </a>-->
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $cartItem->Amount;?></p>
							</td>
							<!--TODO:<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>-->
						</tr>
						<?php endforeach;?>
						<tr>
							<td>
								<?php if(isset($noItem) && $noItem)
									echo "<p>No Items in Cart,Buy Some</p>"
								?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Proceed to checkout?</h3>
			</div>
			<div class="row">
				<!--Hide option for coupons<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>

							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>

							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>-->
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>&#8377;<?php echo $total;?></span></li>
							<li>Service Charge(10%) <span>&#8377;<?php echo 0.1*$total;?></span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>&#8377;<?php echo 1.1*$total;?></span></li>
						</ul>
							<!--Hide option to update cart<a class="btn btn-default update" href="">Update</a>-->
							<a class="btn btn-default check_out" href="<?php echo site_url('cart/checkout');?>">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
