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
        <li><a href="admin.php?controller=users&amp;action=change-password">Change Password</a></li>
    </ul>
    <div class="row-fluid">
        <div class="box">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Change Password</h2>
            </div>
            <?php if(!empty($messages)) { echo $messages; }?>
            <div class="box-content">
                <form class="form-horizontal" method="post" action="admin.php?controller=users&amp;action=change-password" enctype="multipart/form-data" role="form">
                  <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Password <span class="required">*</span></label>
                        <div class="controls">
                            <input type="password" name="cur_password" value="" class="span6 typeahead">
                            <?php 
                                if(isset($errors) && in_array('errors input password', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Your password is either too short or missing.</span><span>" ;
                                }
                                if(isset($errors) && in_array('errors sql password', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Your current password is incorrect.</span><span>" ;
                                }
                            ?>  
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">New Password <span class="required">*</span></label>
                        <div class="controls">
                            <input type="password" name="password1" value="" class="span6 typeahead">
                            <?php 
                                if(isset($errors) && in_array('errors input password 1', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Your password is either too short or missing.</span><span>" ;
                                }
                            ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead">Confirm Password <span class="required">*</span></label>
                        <div class="controls">
                            <input type="password" name="password2" value="" class="span6 typeahead">
                            <?php 
                                if(isset($errors) && in_array('errors password 1 2', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Your password and confirm password do not match.</span><span>" ;
                                }
                            ?>
                        </div>
                    </div>

                    <div class="form-actions">
                      <button type="submit" formaction="admin.php?controller=users&amp;action=change-password" class="btn btn-primary">Update Password</button>
                      <button type="reset" class="btn">Cancel</button>
                    </div>
                  </fieldset>
                </form>   

            </div>
        </div><!--/span-->
    </div><!--/row-->
</div>
<?php require('backend/views/common/footer.php'); ?>
