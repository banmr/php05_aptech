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
        <div class="box">
            <?php
                // select database lay du lieu cu chen vao input
                $q = "SELECT name, position FROM post_categories WHERE id = {$cid} LIMIT 1";
                $r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

                if(mysqli_affected_rows($dbc) == 1){ // neu co 1 ban (ton tai) category_post trong database, dua vao cid xuat du lieu ra ngoai
                    $edit_cat_post = mysqli_fetch_array($r, MYSQLI_ASSOC);                    
                } else {
                    $messages = "<div class='alert alert-error'><strong>Error!</strong> the category dose not exit.</div>";                    
                }
            ?>
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Category: <?php if(isset($edit_cat_post)) echo $edit_cat_post['name']; ?></h2>
            </div>
            <?php if(!empty($messages)) { echo $messages; }?>
            <div class="box-content">
                <form class="form-horizontal" method="post" action="admin.php?controller=post_categories&amp;action=edit&amp;cid=<?php echo $cid ?>" enctype="multipart/form-data" role="form">
                  <fieldset>
                    <?php 
                        if(isset($errors) && in_array('errors post category', $errors)) { ?>
                            <div class="control-group error">
                                <label class="control-label" for="typeahead">Title <span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="post_categories" value="" class="span6 typeahead" id="inputError">
                                    <span class='help-inline'><strong>Error!</strong> Please fill in the category name.</span>                    
                                </div>
                            </div>
                    <?php } else { ?>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Title <span class="required">*</span></label>
                            <div class="controls">
                            <input type="text" name="post_categories" value="<?php if(isset($edit_cat_post)) echo $edit_cat_post['name']; ?>" class="span6 typeahead" id="typeahead">                        
                          </div>
                        </div>
                    <?php } ?>
                    

                    <div class="control-group">
                        <label class="control-label" for="position">Position <span class="required">*</span></label>
                        <div class="controls">
                            <select id="selectError" data-rel="chosen" name="position">
                            <?php
                                $q = "SELECT count(id) AS count FROM post_categories";
                                $r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));

                                if(mysqli_num_rows($r) == 1) { // kiểm tra table có được tạo ra hay không (dành cho select)
                                    list($num) = mysqli_fetch_array($r, MYSQLI_NUM);

                                    for($i = 1; $i <= $num + 1; $i++){ // tạo vòng for để ra option và công thêm 1 giá trị cho option
                                        echo "<option value='{$i}'";
                                        if(isset($edit_cat_post['position']) && ($edit_cat_post['position'] == $i)){ echo "selected='selected'";}
                                        echo ">" . $i . "</option>";
                                        var_dump($edit_cat_post['position']);
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <?php 
                            if(isset($errors) && in_array('errors post position', $errors)) {
                               echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Please fill in the position.</span><span>" ;
                            }
                        ?>
                    </div>

                    <div class="form-actions">
                      <button type="submit" formaction="admin.php?controller=post_categories&amp;action=edit&amp;cid=<?php echo $cid ?>" class="btn btn-primary">Edit Category Post</button>
                      <button type="reset" class="btn">Cancel</button>
                    </div>
                  </fieldset>
                </form>   

            </div>
        </div><!--/span-->
    </div><!--/row-->
</div>
<?php require('backend/views/common/footer.php'); ?>
