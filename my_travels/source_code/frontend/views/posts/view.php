<?php require('frontend/views/common/header.php'); ?>

	<div class="page-top" id="templatemo_events">
    </div> <!-- /.page-header -->
    <div class="middle-content">
		<div class="container">
		    <div class="row"><!-- second row -->
                <div class="col-md-12"><!-- first column -->
                    <?php
                        if (mysqli_num_rows($r) == 1) { 
                        while ($post_view = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    ?>
                    <div class="widget-item">
                        <h3 class="widget-title"><?php echo $post_view['title'] ?></h3>
                        <div class="main-content-post">
                            <?php echo $post_view['content'] ?>
                        </div>
                    </div> <!-- /.widget-item -->
                    <?php } } else {?>
                        <h3 class="widget-title">This Posts does not exist</h3>
                    <?php } ?>
                </div>		    	 		
		    </div>
		</div> <!-- /.container -->
	</div>
<?php require('frontend/views/common/footer.php'); ?>