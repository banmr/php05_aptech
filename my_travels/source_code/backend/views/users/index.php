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
        <li><a href="admin.php?controller=users">Users</a></li>
    </ul>
    <div class="row-fluid">
        <div class="box" ontablet="span6">
			<div class="box-header">
				<h2>
					<i class="halflings-icon white user"></i>
					<span class="break"></span>Users
				</h2>
			</div>
			<div class="box-content" style="display: block;">
				<ul class="dashboard-list metro">
					<?php foreach ($users as $user) { ?>
					<li class="green">
						<img width="70" height="70" class="avatar" alt="Dennis Ji" src="webroot/admin/img/avatar.jpg">

						<strong>Name:</strong> <?php if(isset($user['name'])) echo $user['name']; ?><br>
						<strong>Email:</strong> <?php if(isset($user['email'])) echo $user['email']; ?><br>
						<strong>Address:</strong> <?php if(isset($user['address'])) echo $user['address']; ?><br>
						<strong>Phone:</strong> <?php if(isset($user['phone'])) echo $user['phone']; ?>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<header class="header-db">
	        <button onclick="window.location.href='admin.php?controller=posts&amp;action=add'" class="btn btn-large btn-success"><i class="halflings-icon white edit"></i> Edit Users</button>

	        <button onclick="window.location.href='admin.php?controller=users&amp;action=change-password'" class="btn btn-large btn-success"><i class="halflings-icon white edit"></i> Change Password</button>   
	    </header>
    </div><!--/row-->
</div>
<?php require('backend/views/common/footer.php'); ?>