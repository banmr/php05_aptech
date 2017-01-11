<?php require('frontend/views/common/header.php'); ?>

	<div class="page-top" id="templatemo_events">
    </div> <!-- /.page-header -->
    <div class="middle-content">
		<div class="container">
		    <div class="row"><!-- second row -->		    	
		    	<div class="col-md-9 main-content">
		    		<div class="row">
		    			<div class="col-md-12"><!-- first column -->
			                <div class="widget-item row">
			                	<div class="sample-thumb col-md-4">
			                        <img src="webroot/images/event_3.jpg" alt="New Event" title="New Event">
			                    </div> <!-- /.sample-thumb -->
			                    <div class="col-md-8 main-post">			                    
				                    <h4 class="consult-title"><a href="#">Donec auctor iaculis libero ut ullamcorper</a></h4>
				                    <p>Suspendisse id felis ac orci dignissim efficitur non eget elit. Maecenas lacinia sodales aliquet. Maecenas consequat orci et neque convallis volutpat.</p>
			                    </div>
			                </div> <!-- /.widget-item -->
			            </div> <!-- /.col-md-4 -->
			            
			            <div class="col-md-12"><!-- first column -->
			                <div class="widget-item row">
			                	<div class="sample-thumb col-md-4">
			                        <img src="webroot/images/event_3.jpg" alt="New Event" title="New Event">
			                    </div> <!-- /.sample-thumb -->
			                    <div class="col-md-8 main-post">			                    
				                    <h4 class="consult-title"><a href="#">Donec auctor iaculis libero ut ullamcorper</a></h4>
				                    <p>Suspendisse id felis ac orci dignissim efficitur non eget elit. Maecenas lacinia sodales aliquet. Maecenas consequat orci et neque convallis volutpat.</p>
			                    </div>
			                </div> <!-- /.widget-item -->
			            </div> <!-- /.col-md-4 -->

			            <div class="col-md-12"><!-- first column -->
			                <div class="widget-item row">
			                	<div class="sample-thumb col-md-4">
			                        <img src="webroot/images/event_3.jpg" alt="New Event" title="New Event">
			                    </div> <!-- /.sample-thumb -->
			                    <div class="col-md-8 main-post">			                    
				                    <h4 class="consult-title"><a href="#">Donec auctor iaculis libero ut ullamcorper</a></h4>
				                    <p>Suspendisse id felis ac orci dignissim efficitur non eget elit. Maecenas lacinia sodales aliquet. Maecenas consequat orci et neque convallis volutpat.</p>
			                    </div>
			                </div> <!-- /.widget-item -->
			            </div> <!-- /.col-md-4 -->
			        </div>
		    	</div>	
		    	<div class="col-md-3 sidebar">
		    		<div class="row">
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