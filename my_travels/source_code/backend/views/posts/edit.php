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
            <?php
                // select database lay du lieu cu chen vao input
                $q2 = "SELECT * FROM posts WHERE id = {$post_id} LIMIT 1";
                $r2 = mysqli_query($dbc, $q2) or die ("Query {$q2} \n<br> MYSQL error: " . mysqli_errno($dbc));

                if(mysqli_affected_rows($dbc) == 1){ // neu co 1 ban (ton tai) category_post trong database, dua vao cid xuat du lieu ra ngoai
                    $edit_posts = mysqli_fetch_array($r2, MYSQLI_ASSOC);                    
                } else {
                    $messages = "<div class='alert alert-error'><strong>Error!</strong> the category dose not exit.</div>";                    
                }
            ?>
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Posts: <b><?php if(isset($edit_posts)) {echo $edit_posts['title']; }?></b></h2>
            </div>
            <?php if(!empty($messages)) { echo $messages; }?>
            <div class="box-content">
                <form class="form-horizontal" method="post" action="admin.php?controller=posts&amp;action=edit&amp;post_id=<?php echo $post_id ?>" enctype="multipart/form-data" role="form">
                  <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Title <span class="required">*</span></label>
                        <div class="controls">
                            <input type="text" name="post_name" value="<?php if(isset($edit_posts['title'])) {echo strip_tags($edit_posts['title']);} ?>" class="span6 typeahead" id="input">   
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
                                    $q1 = "SELECT id, name FROM post_categories ORDER BY position ASC";
                                    $r1 = mysqli_query($dbc, $q1) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

                                    if(mysqli_num_rows($r1) > 0) { // kiểm tra table có được tạo ra hay không (dành cho select)
                                        while ($post_cat_op = mysqli_fetch_array($r1, MYSQLI_ASSOC)) { 
                                            echo "<option value='{$post_cat_op['id']}' ";
                                            if(isset($edit_posts['post_category_id']) && ($edit_posts['post_category_id'] == $post_cat_op['id'])) {
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
                            <?php if(isset($edit_posts['image'])) { ?>

                                <img width="200" src="<?php echo $edit_posts['image']?>" alt="<?php echo $edit_posts['title']?>"><br>
                            <?php }?>
                            
                            <input name="thumb_post" class="input-file uniform_on" id="fileInput" type="file">
                            
                        </div>
                        <?php
                            if(isset($errors) && in_array('Files no larger than 1mb', $errors)) {
                               echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Files no larger than 1mb</span><span>" ;
                            }
                            if(isset($errors) && in_array('File type not valid', $errors)) {
                               echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> File type not valid</span><span>" ;
                            }
                        ?>
                    </div>    
                    

                    <div class="control-group">
                        <label class="control-label" for="position">Position <span class="required">*</span></label>
                        <div class="controls">
                            <select id="selectError" data-rel="chosen" name="position">
                            <?php
                                $q3 = "SELECT count(id) AS count FROM posts";
                                $r3 = mysqli_query($dbc, $q3) or die ("Query {$q3} \n<br> MYSQL error: " . mysqli_error($dbc));

                                if(mysqli_num_rows($r3) == 1) { // kiểm tra table có được tạo ra hay không (dành cho select)
                                    list($num) = mysqli_fetch_array($r3, MYSQLI_NUM);

                                    for($i = 1; $i <= $num + 1; $i++){ // tạo vòng for để ra option và công thêm 1 giá trị cho option
                                        echo "<option value='{$i}'";
                                        if(isset($edit_posts['position']) && ($edit_posts['position'] == $i)){ echo "selected='selected'";}
                                        echo ">" . $i . "</option>";
                                        var_dump($edit_cat_post['position']);
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
                            <textarea name="post_content" class="cleditor" id="textarea2" rows="3">
                                <?php if(isset($edit_posts['content'])){
                                    echo $edit_posts['content'];
                                }?>
                            </textarea>
                            <?php 
                                if(isset($errors) && in_array('errors posts content', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Please fill in the posts content.</span><span>";
                                }
                            ?>
                        </div>                        
                    </div>

                    <div class="form-actions">
                      <button type="submit" formaction="admin.php?controller=posts&amp;action=edit&amp;post_id=<?php echo $post_id ?>" class="btn btn-primary">Edit Post</button>
                      <button type="reset" class="btn">Cancel</button>
                    </div>
                  </fieldset>
                </form>   

            </div>

            </div>
        </div><!--/span-->
    </div><!--/row-->
</div>
<?php require('backend/views/common/footer.php'); ?>
