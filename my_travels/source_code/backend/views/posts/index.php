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
                      <th>title</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>   
              <tbody>
                <tr cl>
                    <td>1</td>
                    <td>Dennis Ji</td>
                    <td class="center">2012/01/01</td>
                    <td class="center">
                        <span class="label label-success">Active</span>
                    </td>
                    <td class="center">
                        <a class="btn btn-success" href="#">
                            <i class="halflings-icon white zoom-in"></i>  
                        </a>
                        <a class="btn btn-info" href="#">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger" href="#">
                            <i class="halflings-icon white trash"></i> 
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Dennis Ji</td>
                    <td class="center">2012/01/01</td>
                    <td class="center">
                        <span class="label label-success">Active</span>
                    </td>
                    <td class="center">
                        <a class="btn btn-success" href="#">
                            <i class="halflings-icon white zoom-in"></i>  
                        </a>
                        <a class="btn btn-info" href="#">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger" href="#">
                            <i class="halflings-icon white trash"></i> 
                        </a>
                    </td>
                </tr>
                
                </tr>
              </tbody>
          </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->
</div>
<?php require('backend/views/common/footer.php'); ?>