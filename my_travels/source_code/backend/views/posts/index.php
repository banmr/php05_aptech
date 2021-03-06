<?php require('backend/views/common/header.php'); ?>
<?php require('backend/views/common/nav_left.php'); ?>
<!-- start: Content -->
<div id="content" class="span10">


<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="admin.php?controller=posts">post</a></li>
</ul>
<div class="row-fluid">
    
    <header class="header-db">
        <button onclick="window.location.href='admin.php?controller=posts&action=add'" class="pull-right btn btn-large btn-success"><i class="halflings-icon white edit"></i> Add Post</button>   
    </header>     
    <div class="box">
        <div class="box-header" data-original-title>
            <h2><i class="icon-file-alt white"></i><span class="break"></span>Post</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Thumb</th>
                      <th>title</th>
                      <th>Date</th>
                      <th>Category Name</th>
                      <th>position</th>
                      <th>Actions</th>
                  </tr>
              </thead>  
              <tbody>
              <?php
                if (mysqli_num_rows($r) > 0) { 
                while ($post = mysqli_fetch_array($r, MYSQLI_ASSOC)) { 
              ?>

                <tr>
                    <td><?php echo $post['posts_id']?></td>
                    <td><img width="50px" src="<?php echo $post['image']?>" alt="<?php echo $post['p_name']?>"></td>
                    <td><?php echo $post['p_name']?></td>
                    <td class="center">2012/01/01</td>
                    <td class="center"><?php echo $post['cate_name']?></td>
                    <td class="center"><?php echo $post['position']?></td>
                    <td class="center">
                        <a class="btn btn-info" href="admin.php?controller=posts&amp;action=edit&amp;post_id=<?php echo $post['posts_id'];?>">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a onclick="return confirm('are you sure? delete <?php echo $post['p_name'];?>');" class="btn btn-danger" href="admin.php?controller=posts&amp;action=delete&amp;post_id=<?php echo $post['posts_id'];?>&amp;name=<?php echo $post['p_name'];?>">
                            <i class="halflings-icon white trash"></i> 
                        </a>
                    </td>
                </tr>
                <?php } } else{ ?>
                    <tr>
                        <td>no post</td>
                    </tr>
                <?php } ?> 
              </tbody>
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->
</div>
<?php require('backend/views/common/footer.php'); ?>