<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Home Property | Register</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

   
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body>   
  <section id="aa-signin">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-signin-area">
            <div class="aa-signin-form">
              <div class="aa-signin-form-title">
                <a class="aa-property-home" href="index.html">Property Home</a>
                <h4>Create your account and Stay with us</h4>
              </div>
              <form role="form" method="POST" action="register_complete.php" enctype="multipart/form-data" class="contactform">                                               
              <fieldset>
                  <div class="form-group">
                      <label>First name</label>
                      <input class="form-control" placeholder="First name" name="first_name" type="text" autofocus>
                  </div>
                  <div class="form-group">
                      <label>Last name</label>
                      <input class="form-control" placeholder="Last name" name="last_name" type="text" autofocus>
                  </div>
                  <div class="form-group">
                      <label>Username</label>
                      <input class="form-control" placeholder="User name" name="username" type="text" autofocus>
                  </div>
                  <div class="form-group">
                      <label>Password</label>
                      <input class="form-control" placeholder="Pass name" name="password" type="text" autofocus>
                  </div>
                   <div class="form-group">
                      <label>Avatar</label>
                          <input type="file" name="avatar">
                      </div>
                  <div class="form-group">
                      <label>Birthday</label>
                      <div class='input-group date' id='birthday'>
                          <input type='text' name="birthday" class="form-control" />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Gender</label>
                      <label class="radio-inline">
                          <input type="radio" name="gender" value="1"> Male
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="gender"  value="2">Female
                      </label>
                  </div>
                  <div class="form-group">
                      <label>Email</label>
                      <input class="form-control" placeholder="Email" name="email" type="text" autofocus>
                  </div>
                  <div class="form-group">
                      <label>Phone</label>
                      <input class="form-control" placeholder="phone" name="phone" type="text" autofocus>
                  </div>
                   <button type="submit" name = "register" class="btn btn-primary btn-lg">Register</button>
              </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- code PHP -->
    <?php 
        //Message error
        $errorFistName = "";
        //Check submit register
        if(isset($_POST["register"])) {
            //check validate
            $check = true;
            //Check input first_name
            $first_name = $_POST['first_name'];
            if($first_name == ""){
                $errorFistName = "Please input first name";
                $check = false;
            }
            
            //Check: if not error then insert database
            if($check){
                //insert data to users table
            }

        }
    ?>

  <!-- jQuery library -->
  <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <script src="js/jquery.min.js"></script>   
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>   
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  
  <!-- Custom js -->
  <script src="js/custom.js"></script> 

  <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
          $('#birthday').datepicker({ format: 'dd/mm/yyyy' });
      });
  </script>

  
  </body>
</html>