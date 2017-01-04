<nav class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="."><i class="glyphicon glyphicon-plane"></i> PHP 05 (test)</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="index.php?controller=home"><i class="glyphicon glyphicon-home"></i> Home</a>
				</li>
				<li>
					<a href="index.php?controller=news"><i class="glyphicon glyphicon-globe"></i> News</a>
				</li>
				<li>
					<a href="index.php?controller=tour"><i class="glyphicon glyphicon glyphicon-tasks"></i> Tour</a>
				</li>
				<li>
					<a href="index.php?controller=product"><i class="glyphicon glyphicon-gift"></i> Shop</a>
				</li>
				<li>
					<a href="index.php?controller=contact"><i class="glyphicon  glyphicon-copyright-mark"></i> Contact</a>
				</li>
				<li>
					<a href="index.php?controller=cart"><i class="glyphicon glyphicon-shopping-cart"></i> Giỏ hàng : <?php echo cart_number(); ?> sản phẩm</a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>