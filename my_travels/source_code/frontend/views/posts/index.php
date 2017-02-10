<?php require('frontend/views/common/header.php'); ?>

	<div class="page-top" id="templatemo_events">
    </div> <!-- /.page-header -->
    <div class="middle-content">
		<div class="container">
		    <div class="row"><!-- second row -->		    	
		    	<div class="col-md-9 main-content">
		    		<div class="row">
						<?php  
                        if(mysqli_num_rows($r1) > 0){
                        while ($post = mysqli_fetch_array($r1, MYSQLI_ASSOC)) {
                            if(!empty($post['image'])){
    							$img_file = explode("/", $post['image']);
                      			$img_name = explode(".", $img_file['2']);
                            }
						?>

							<div class="col-md-12"><!-- first column -->
				                <div class="widget-item row">
				                	<div class="sample-thumb col-md-4">
                                    <?php if(!empty($post['image'])){ ?>
				                        <img src="<?php echo $post['image']; ?>" alt="<?php echo $img_name[0]; ?>" title="<?php echo $post['title']; ?>">
                                    <?php } ?>
				                    </div> <!-- /.sample-thumb -->
				                    <div class="col-md-8 main-post">			                    
					                    <h4 class="consult-title"><a href="index.php?controller=posts&amp;action=view&amp;post_id=<?php echo $post['id'] ?>"><?php echo $post['title']; ?></a></h4>
					                    <p><?php echo _substr(strip_tags( $post['content'] ), 350); ?> <a href="index.php?controller=posts&amp;action=view&amp;post_id=<?php echo $post['id'] ?>">Red more</a></p>
				                    </div>
				                </div> <!-- /.widget-item -->
				            </div> <!-- /.col-md-4 -->
		    			<?php } echo pagination ('posts', $options); } else { ?>
                            <h3>not show post</h3>
                        <?php } ?>
		    			
			            
			        </div>
		    	</div>	
		    	<?php require('frontend/views/common/sidebar.php'); ?>  		
		    </div>
		</div> <!-- /.container -->
	</div>
<?php require('frontend/views/common/footer.php'); ?>