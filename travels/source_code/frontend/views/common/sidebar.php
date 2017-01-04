<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Danh mục
            <b class="glyphicon glyphicon-plus-sign visible-xs pull-right"></b>
        </h3>
    </div>
    <div class="list-group hidden-xs">
        <?php foreach ($categories as $category) {
            echo '<a href="index.php?controller=category&amp;cid='.$category['id'].'" class="list-group-item">'.$category['name'].'</a>';
        } ?>
    </div>
</div>