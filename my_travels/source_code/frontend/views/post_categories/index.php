<?php require('frontend/views/common/header.php'); ?>

	<div class="page-top" id="templatemo_events">
    </div> <!-- /.page-header -->
    <div class="middle-content">
		<div class="container">
		    <div class="row"><!-- second row -->		    	
		    	<div class="col-md-9 main-content">
		    		<div class="row">
						<?php  
                        if(mysqli_num_rows($r) > 0){
                            while ($post_categories = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

						?>

							<div class="col-md-12"><!-- first column -->
				                <div class="widget-item row">
				                	<div class="sample-thumb col-md-4">
				                        <img src="<?php echo $post_categories['image']; ?>" alt="<?php echo $img_name[0]; ?>" title="<?php echo $post_categories['name']; ?>">
				                    </div> <!-- /.sample-thumb -->
				                    <div class="col-md-8 main-post">			                    
					                    <h4 class="consult-title"><a href="#"><?php echo $post_categories['title']; ?></a></h4>
					                    <p><?php echo _substr(strip_tags( $post_categories['content'] ), 350); ?></p>
				                    </div>
				                </div> <!-- /.widget-item -->
				            </div> <!-- /.col-md-4 -->
		    			<?php } } else { ?>
                            <p><b>No posts in this category</b></p>
                        <?php } ?>
		    			
			            
			        </div>
		    	</div>	
		    	<?php require('frontend/views/common/sidebar.php'); ?>  		
		    </div>
		</div> <!-- /.container -->
	</div>
<?php require('frontend/views/common/footer.php'); ?>