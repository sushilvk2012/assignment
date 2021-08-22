<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>Admin Login</title>


    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/vendors.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/icon_fonts/css/all_icons.min.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/js/sweetalert/sweetalert.css');?>" rel="stylesheet">
  
    <style>
    a.btn_1.full-width, .btn_1.full-width {
        display: block;
        width: 100px;
        text-align: center;
        margin-bottom: 5px;
        margin: 0 auto;
    }
    #login{margin: 0 auto;text-align: center;display: table;}
    </style>
</head>

<body id="login_bg">
    
    <nav id="menu" class="fake_menu"></nav>
    
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>
    <!-- End Preload -->
    
    <div id="login">
        <aside>
            <figure>
                <a href="login"><img src="<?php echo base_url('assets/logo.jpg');?>" width="180"  data-retina="true" alt=""></a>
            </figure>
              <form id="customer-login" action="login" method="post" enctype="multipart/form-data">
                <!-- <div class="access_social"> -->
                    <!-- <a href="#0" class="social_bt facebook">Login with Facebook</a> -->
                    <!-- <a href="#0" class="social_bt google">Login with Google</a> -->
                    <!-- <a href="#0" class="social_bt linkedin">Login with Linkedin</a> -->
                <!-- </div> -->
                <div class="divider"><span>Admin login details.</span></div>
                <div class="form-group">
                    <span class="input">
                    <input class="input_field" type="email" autocomplete="off" name="email" title="Email" data-required="email">
                        <label class="input_label">
                        <span class="input__label-content">Username</span>
                    </label>
                    </span>

                    <span class="input">
                    <input class="input_field" type="password" autocomplete="new-password" name="password" title="Password" data-required="password">
                        <label class="input_label">
                        <span class="input__label-content">Password</span>
                    </label>
                    </span>
                    <!-- <small><a href="#0">Forgot password?</a></small> -->
                </div>
                <button type="submit" name="forward" class="btn_1 rounded full-width add_top_60 submitBtn" frm-id="customer-login">Login</button>
                <!-- <a href="#0" class="">Login to Inspire</a> -->
                <!-- <div class="text-center add_top_10">New to Inspire? <strong><a href="register">Sign up!</a></strong></div> -->
            </form>
            <div class="copy">© 2020 Admin</div>
        </aside>
    </div>
    <!-- /login -->
        
    <!-- COMMON SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery-2.2.4.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/common_scripts.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert/sweetalert.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/js_class.js');?>"></script>
    <?php 
     $message = $this->session->flashdata('message');
    if(count($message) > 0 ){
    ?>
    <script>
     swal("<?php echo $message['title'] ?>", "<?php echo $message['msg'] ?>", "<?php echo $message['type'] ?>");
    </script>
    <?php } ?>
</body>
</html>