<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php foreach($categories as $category):?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="<?php echo site_url('display/category/'.$category->id);?>"><?php echo $category->name;?></a></h4>
									</div>
								</div>
								<?php endforeach;?>
						</div><!--/category-productsr-->

						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php foreach($brands as $brand):?>
									<li><a href="<?php echo site_url('display/brand/'.$brand->id);?>"><?php echo $brand->name;?></a></li>
									<?php endforeach;?>
								</ul>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo $itemsClass; ?></h2>
						<?php foreach($products as $product):?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="<?php echo site_url('display/product/'.$product->P_Id);?>">
											<img src="images/shop/product12.jpg" alt="" />
											<h2>&#8377;<?php echo $product->P_Price;?></h2>
											<p><?php echo $product->P_Name;?></p></a>
										<a href="<?php echo site_url('cart/addToCart/'.$product->P_Id);?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<!--<div class="product-overlay">
										<div class="overlay-content">
											<h2>&#8377;<?php echo $product->P_Price;?></h2>
											<p><?php echo $product->P_Name;?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>-->
								</div>
								<!--Hide this,can be used in future <div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>-->
							</div>
						</div>
						<?php endforeach;?>
						<!-- Hide pagignation<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>-->
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
<?php require_once('templates/footer.php');?>
