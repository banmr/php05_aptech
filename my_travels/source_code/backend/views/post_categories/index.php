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
    <li><a href="admin.php?controller=post_categories">Category Post</a></li>
</ul>
<div class="row-fluid">
    
    <header class="header-db">
        <button onclick="window.location.href='admin.php?controller=post_categories&action=add'" class="pull-right btn btn-large btn-success"><i class="halflings-icon white edit"></i> Add Category Post</button>   
    </header>     
    <div class="box">
        <div class="box-header" data-original-title>
            <h2><i class="icon-file-alt white"></i><span class="break"></span>Category Post</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>ID</th>                      
                      <th><a href="admin.php?controller=post_categories&sort=title">title</a></th>
                      <th><a href="admin.php?controller=post_categories&sort=date">Date</a></th>
                      <th><a href="admin.php?controller=post_categories&sort=position">Position</a></th>
                      <th>Actions</th>
                  </tr>
              </thead>   
              <tbody>
                <?php
                while ($post_cat = mysqli_fetch_array($r, MYSQLI_ASSOC)) { ?>
                <?php
                    $date = date('Y-m-d h:i:s', $post_cat['created']);
                    $datefm = new DateTime($date);
                ?>
                <tr>
                    <td><?php echo $post_cat['id']; ?></td>
                    <td><?php echo $post_cat['name']; ?></td>
                    <td class="center">
                        <?php                            
                            echo $datefm->format('d/m/Y');
                        ?>
                    </td>
                    <td><?php echo $post_cat['position']; ?></td>
                    <td class="center">
                        <a class="btn btn-info" href="admin.php?controller=post_categories&amp;action=edit&amp;cid=<?php echo $post_cat['id'];?>">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a onclick="return confirm('are you sure?');" class="btn btn-danger" href="admin.php?controller=post_categories&amp;action=delete&amp;cid=<?php echo $post_cat['id'];?>&amp;name=<?php echo $post_cat['name'];?>">
                            <i class="halflings-icon white trash"></i> 
                        </a>
                    </td>
                </tr>
                
                <?php } ?>

              </tbody>
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->
</div>
<?php require('backend/views/common/footer.php'); ?>