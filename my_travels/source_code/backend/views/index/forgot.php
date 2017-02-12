<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Forgot Password | Cpanel</title>
	<meta name="description" content="login">
	<meta name="author" content="tralvel">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
    <link id="bootstrap-style" href="webroot/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="webroot/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="webroot/admin/css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="webroot/admin/css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="webroot/admin/img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(webroot/admin/img/bg-login.jpg) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
			<div class="row-fluid">
				<div class="login-box">
					<?php if(!empty($message)){echo $message;}  ?>
					<h2>Forgot Password to your admin</h2>					
					<form class="form-horizontal" action="admin.php?controller=index&action=forgot" method="post">
						<fieldset>
							<div class="input-prepend" title="Username">								
								<span class="add-on"><i class="icon-envelope"></i></span>
								<input value="<?php if(isset($f_email)) {echo escape_strip_tags($dbc, $f_email);} ?>" class="input-large span10" name="email" id="email" type="email"/>							
							</div>
								<?php if(isset($errors) && in_array('email', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> Please fill in the email.</span><span>" ;
                                }?>
                                <?php if(isset($errors) && in_array('email could not', $errors)) {
                                   echo "<span class='error control-group'><span class='help-inline'><strong>Error!</strong> The email could not be found.</span><span>" ;
                                }?>
							<div class="button-login">	
								<button formaction="admin.php?controller=index&action=forgot" type="submit" class="btn btn-primary">Forgot Password</button>
							</div>
							<div class="clearfix"></div>
					</form>	
					<p>
						<a href="admin.php?controller=index&action=login">click here</a> Login.
					</p>
				</div><!--/span-->
			</div><!--/row-->
			
		</div><!--/.fluid-container-->
	
	</div><!--/fluid-row-->

    </div><!--/#content.span10-->
        </div><!--/fluid-row-->
  
    
    
    <div class="clearfix"></div>

    
    <!-- start: JavaScript-->

        <script src="webroot/admin/js/jquery-1.9.1.min.js"></script>
    <script src="webroot/admin/js/jquery-migrate-1.0.0.min.js"></script>
    
        <script src="webroot/admin/js/jquery-ui-1.10.0.custom.min.js"></script>
    
        <script src="webroot/admin/js/jquery.ui.touch-punch.js"></script>
    
        <script src="webroot/admin/js/modernizr.js"></script>
    
        <script src="webroot/admin/js/bootstrap.min.js"></script>
    
        <script src="webroot/admin/js/jquery.cookie.js"></script>
    
        <script src='webroot/admin/js/fullcalendar.min.js'></script>
    
        <script src='webroot/admin/js/jquery.dataTables.min.js'></script>

        <script src="webroot/admin/js/excanvas.js"></script>
    <script src="webroot/admin/js/jquery.flot.js"></script>
    <script src="webroot/admin/js/jquery.flot.pie.js"></script>
    <script src="webroot/admin/js/jquery.flot.stack.js"></script>
    <script src="webroot/admin/js/jquery.flot.resize.min.js"></script>
    
        <script src="webroot/admin/js/jquery.chosen.min.js"></script>
    
        <script src="webroot/admin/js/jquery.uniform.min.js"></script>
        
        <script src="webroot/admin/js/jquery.cleditor.min.js"></script>
    
        <script src="webroot/admin/js/jquery.noty.js"></script>
    
        <script src="webroot/admin/js/jquery.elfinder.min.js"></script>
    
        <script src="webroot/admin/js/jquery.raty.min.js"></script>
    
        <script src="webroot/admin/js/jquery.iphone.toggle.js"></script>
    
        <script src="webroot/admin/js/jquery.uploadify-3.1.min.js"></script>
    
        <script src="webroot/admin/js/jquery.gritter.min.js"></script>
    
        <script src="webroot/admin/js/jquery.imagesloaded.js"></script>
    
        <script src="webroot/admin/js/jquery.masonry.min.js"></script>
    
        <script src="webroot/admin/js/jquery.knob.modified.js"></script>
    
        <script src="webroot/admin/js/jquery.sparkline.min.js"></script>
    
        <script src="webroot/admin/js/counter.js"></script>
    
        <script src="webroot/admin/js/retina.js"></script>

        <script src="webroot/admin/js/custom.js"></script>
    <!-- end: JavaScript-->
    
</body>
</html>
