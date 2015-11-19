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
						</div><!--/category-products-->
					
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
						<h2 class="title text-center">Features Items</h2>
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
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div><!--features_items-->
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<?php foreach($categories as $category):?>
									<?php if($category==$categories[0]):?><!--If first category then give active class to it-->
										<li class="active"><a href="#<?php echo $category->id?>" data-toggle="tab"><?php echo $category->name?></a></li>
									<?php continue;?>
									<?php endif;?>
								<li><a href="#<?php echo $category->id?>" data-toggle="tab"><?php echo $category->name?></a></li>
								<?php endforeach;?>
							</ul>
						</div>
						<div class="tab-content">
							<?php foreach($categories as $category):?>
								<?php $categoryName=$category->name;?>
								<?php if($category==$categories[0]):?><!--If first category then give fade active in class to it-->
									<div class="tab-pane fade active in" id="<?php echo $category->id;?>" >
								<?php foreach($productsByCategory[$categoryName] as $product):?>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/gallery1.jpg" alt="" />
													<h2><?php echo $product->P_Price;?></h2>
													<p><?php echo $product->P_Name;?></p>
													<a href="<?php echo site_url('cart/addToCart/'.$product->P_Id);?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach;?>
									</div>
								<?php continue;?>
								<?php endif;?>
							<div class="tab-pane fade" id="<?php echo $category->id;?>" >
								<?php foreach($productsByCategory[$categoryName] as $product):?>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/gallery1.jpg" alt="" />
													<h2><?php echo $product->P_Price;?></h2>
													<p><?php echo $product->P_Name;?></p>
													<a href="<?php echo site_url('cart/addToCart/'.$product->P_Id);?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach;?>
							</div>
							<?php endforeach;?>
						</div>
</section>
<?php require_once('templates/footer.php');?>
