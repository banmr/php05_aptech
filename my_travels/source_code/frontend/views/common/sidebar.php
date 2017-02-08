<div class="col-md-3 sidebar">
	<div class="title">
        <h4>Category</h4>
    </div>
    
	<div class="main-sidebar">
		<ul>
		<?php
        $q = "SELECT name, id FROM post_categories ORDER BY position DESC";
        $r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));
        if(mysqli_num_rows($r) > 0){
         
			while ($post_cat = mysqli_fetch_array($r, MYSQLI_ASSOC)) {   
				echo "<li><a href='index.php?controller=post_categories&amp;cid={$post_cat['id']}'>" . $post_cat['name'] . "</a></li>";
			}
        }
		?>
			
		</ul>
	</div>
</div>	   