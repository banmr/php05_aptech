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
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Add New Category Post</h2>
            </div>
            <?php if(!empty($messages)) { echo $messages; }?>
            <div class="box-content">
                <form class="form-horizontal" method="post" action="admin.php?controller=post_categories&amp;action=add" enctype="multipart/form-data" role="form">
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
                            <input type="text" name="post_categories" value="<?php if(isset($_POST['post_categories'])){echo strip_tags($_POST['post_categories']);} ?>" class="span6 typeahead" id="typeahead">                        
                          </div>
                        </div>
                    <?php } ?>
                    

                    <div class="control-group">
                        <label class="control-label" for="position">Position <span class="required">*</span></label>
                        <div class="controls">
                            <select id="selectError" data-rel="chosen" name="position">
                            <?php
                                $q = "SELECT count(id) AS count FROM post_categories";
                                $r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

                                if(mysqli_num_rows($r) == 1) { // kiểm tra table có được tạo ra hay không (dành cho select)
                                    list($num) = mysqli_fetch_array($r, MYSQLI_NUM);
                                    for($i = 1; $i <= $num + 1; $i++){ // tạo vòng for để ra option và công thêm 1 giá trị cho option
                                        echo "<option selected='selected' value='{$i}'>{$i}</option>";
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
                      <button type="submit" formaction="admin.php?controller=post_categories&amp;action=add" class="btn btn-primary">Add New Category Post</button>
                      <button type="reset" class="btn">Cancel</button>
                    </div>
                  </fieldset>
                </form>   

            </div>
        </div><!--/span-->
    </div><!--/row-->
</div>
<?php require('backend/views/common/footer.php'); ?>
