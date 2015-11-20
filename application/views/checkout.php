	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<!--Hide this option<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-4">
						<!--Hide this for future use<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>-->
					</div>
					<div class="col-sm-6 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<?php if(isset($user)):?>
								<?php echo form_open('cart/complete')?>
									<input type="text" name="name" value="<?php echo $user->first_name." ".$user->last_name;?>" required>
									<input type="text" name="emailid" value="<?php echo $user->email_id;?>" required>
									<input type="text" name="address1" placeholder="Address 1" required>
									<input type="text" name="address2" placeholder="Address 2">
									<input type="text" name="mobile" value="<?php echo $user->mobile_no;?>" required>
									<input type="submit" value="Place Order">
								</form>
								<?php else:?>
								<?php echo form_open('cart/complete')?>
									<input type="text" name="name" placeholder="Your Name">
									<input type="text" name="emailid" placeholder="Your Email Id">
									<input type="text" name="address1" placeholder="Address 1">
									<input type="text" name="address2" placeholder="Address 2">
									<input type="text" name="mobile" placeholder="Mobile Number">
									<input type="submit" value="Place Order">
								</form>
								<?php endif;?>
							</div>
							<div class="form-two">
							</div>
						</div>
					</div>
					<div class="col-sm-2"></div>
					<!--Hide option for summary <div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>
					</div>-->
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
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
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td><?php echo $total;?></td>
									</tr>
									<tr>
										<td>Service Charge(10%)</td>
										<td><?php echo 0.1*$total;?></td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>
									</tr>
									<tr>
										<td>Total</td>
										<td><span><?php echo 1.1*$total;?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox" checked> Cash on Delivery</label>
					</span>
					<p>More Options Coming Soon!!</p>
			</div>
		</div>
	</section> <!--/#cart_items-->
