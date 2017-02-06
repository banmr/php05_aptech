<?php require('frontend/views/common/header.php'); ?>

	<div class="page-top" id="templatemo_events">
    </div> <!-- /.page-header -->
    <div class="middle-content">
		<div class="container">
		    <div class="row"><!-- second row -->		    	
		    	<div class="col-md-9 main-content">
		    		<div class="row">
						<?php  while ($post = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {?>
							<div class="col-md-12"><!-- first column -->
				                <div class="widget-item row">
				                	<div class="sample-thumb col-md-4">
				                        <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" title="<?php echo $post['title']; ?>">
				                    </div> <!-- /.sample-thumb -->
				                    <div class="col-md-8 main-post">			                    
					                    <h4 class="consult-title"><a href="#"><?php echo $post['title']; ?></a></h4>
					                    <p><?php echo _substr(strip_tags( $post['content'] ), 350); ?></p>
				                    </div>
				                </div> <!-- /.widget-item -->
				            </div> <!-- /.col-md-4 -->
		    			<?php } ?>
		    			
			            
			        </div>
		    	</div>	
		    	<div class="col-md-3 sidebar">
    				<div class="title">
                        <h4>Category</h4>
                    </div>
                    
		    		<div class="main-sidebar">
		    			<ul>
		    			<?php 
		    				while ($post_cat = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		    					echo "<li><a href='#'>" . $post_cat['name'] . "</a></li>";
		    				}
		    			?>
		    				
		    			</ul>
		    		</div>
		    	</div>	    		
		    </div>
		</div> <!-- /.container -->
	</div>
<?php require('frontend/views/common/footer.php'); ?>