<?php while ($posts = mysqli_fetch_array($r, MYSQLI_ASSOC)) {?>
<h2>ID: <?php echo $posts['id']; ?></h2>
<h3>Title: <?php echo $posts['title']; ?></h3>
<p>DES: <?php echo $posts['des']; ?></p>
<?php } ?>