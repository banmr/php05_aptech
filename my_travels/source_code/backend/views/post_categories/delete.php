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
                <h2><i class="halflings-icon white edit"></i><span class="break"></span>Delete Category: <?php  echo $name; ?></h2>
            </div>
            <?php if(!empty($messages)) { echo $messages; }?>
            <div class="box-content">
            <form class="form-horizontal" method="post" action="admin.php?controller=post_categories&amp;action=delete&amp;cid=<?php echo $cid;?>&amp;name=<?php echo $name;?>" enctype="multipart/form-data" role="form">
                <fieldset>
                    <div class="control-group">
                        <div class="controls">
                            <label class="control-label">Are You Sure ?</label>
                            <label class="radio">
                                <input type="radio" name="delete" id="optionsRadios1" value="no" checked="checked">
                            No
                            </label>
                            <label class="radio">
                                <input type="radio" name="delete" id="optionsRadios2" value="yes">
                            Yes
                            </label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button onclick="return confirm('are you sure?');" type="submit" formaction="admin.php?controller=post_categories&amp;action=delete&amp;cid=<?php echo $cid;?>&amp;name=<?php echo $name;?>" class="btn btn-primary">Submit</button>
                    </div>
                </fieldset>
            </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
</div>
<?php require('backend/views/common/footer.php'); ?>

