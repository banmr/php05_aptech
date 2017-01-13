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
        <li><a href="admin.php?controller=posts">Post</a></li>
    </ul>
    <div class="row-fluid">
        <div class="box">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Add New Post</h2>
            </div>
            <?php if(!empty($messages)) { echo $messages; }?>
            <div class="box-content">
                <form class="form-horizontal" method="post" action="admin.php?controller=posts&amp;action=add" enctype="multipart/form-data" role="form">
                  <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Title <span class="required">*</span></label>
                        <div class="controls">
                            <input type="text" name="post_name" value="<?php if(isset($_POST['post_name'])) {echo strip_tags($_POST['post_name']);} ?>" class="span6 typeahead" id="input">   
                            <?php 
                                if(isset($errors) && in_array('errors posts', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Please fill in the post.</span><span>" ;
                                }
                            ?>                 
                        </div>                        
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="post_cat">All Post Category <span class="required">*</span></label>
                        <div class="controls">
                            
                            <select id="selectpost" data-rel="chosen" name="post_cat">
                                <?php
                                    $q = "SELECT id, name FROM post_categories ORDER BY position ASC";
                                    $r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

                                    if(mysqli_num_rows($r) > 0) { // kiểm tra table có được tạo ra hay không (dành cho select)
                                        while ($post_cat_op = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

                                            echo "<option value='{$post_cat_op['id']}' ";
                                            if(isset($_POST['post_cat']) && ($_POST['post_cat'] == $post_cat_op['id'])) {
                                                echo "selected='selected'";
                                            }
                                            echo ">" . $post_cat_op['name'] . "</option>";

                                        }
                                    }
                                ?>
                            </select>
                            <?php 
                                if(isset($errors) && in_array('errors post cat', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Please fill in the post category.</span><span>" ;
                                }
                            ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="thumb_post">Thumb post</label>
                        <div class="controls">
                            <input name="thumb_post" class="input-file uniform_on" id="fileInput" type="file">+
                        </div>
                    </div>    
                    

                    <div class="control-group">
                        <label class="control-label" for="position">Position <span class="required">*</span></label>
                        <div class="controls">
                            <select id="selectposition" data-rel="chosen" name="position">
                            <?php
                                $q = "SELECT count(id) AS count FROM posts";
                                $r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

                                if(mysqli_num_rows($r) == 1) { // kiểm tra table có được tạo ra hay không (dành cho select)
                                    list($num) = mysqli_fetch_array($r, MYSQLI_NUM);
                                    for($i = 1; $i <= $num + 1; $i++){ // tạo vòng for để ra option và công thêm 1 giá trị cho option
                                        echo "<option selected='selected' value='{$i}'>{$i}</option>";
                                    }
                                }
                            ?>
                            </select>
                            <?php 
                                if(isset($errors) && in_array('errors post position', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Please fill in the position.</span><span>";
                                }
                            ?>
                        </div>                        
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="textarea2">Post Content <span class="required">*</span></label>
                        <div class="controls">
                            <textarea name="post_content" class="cleditor" id="textarea2" rows="3"></textarea>
                            <?php 
                                if(isset($errors) && in_array('errors posts content', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Please fill in the posts content.</span><span>";
                                }
                            ?>
                        </div>                        
                    </div>

                    <div class="form-actions">
                      <button type="submit" formaction="admin.php?controller=posts&amp;action=add" class="btn btn-primary">Add New Post</button>
                      <button type="reset" class="btn">Cancel</button>
                    </div>
                  </fieldset>
                </form>   

            </div>
        </div><!--/span-->
    </div><!--/row-->
</div>
<?php require('backend/views/common/footer.php'); ?>