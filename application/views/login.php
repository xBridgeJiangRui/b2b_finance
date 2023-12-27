<!DOCTYPE html>
<html lang="en">
<head>
  <title>B2B | Finance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
  <!-- <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap-drawer.min.css"); ?>"> -->
  <link rel="icon" type="image/png" href="<?php echo base_url('asset/dist/img/rexbridge.JPG');?>" >
<style>
      /* Set black background color, white text and some padding */
footer
{
clear:both;
text-align:center;
color:#9E9E9E;
position:bottom;
bottom:0;
width:100%;
}
.font-header {
  color:#455A64;
  font-size: 112px;
  font-weight: 300;
  letter-spacing: -.044em;
  line-height: 120px;
  }
.font-title {
  color:#455A64;
  font-size: 64px;
  font-weight: 300;
  letter-spacing: -.044em;
  line-height: 120px;
}
.font-display1 {
  color:#607D8B;
  font-size: 34px;
  font-weight: 400;
  letter-spacing: -.01em;
  line-height: 40px;
}
.font-caption {
  color:#607D8B;
  font-size:18px;
  font-weight: 400;
  letter-spacing: 0.011em;
  line-height: 20px;
}
.content {
margin-top:10%; 
height:230px;
}
.lt
{
  float:top;
  width:100%;
  height:10%;
  background:#455A64;
  box-shadow:0px 0px 12px gray;
}

.rt
{
  float:bottom;
  width:100%;
  height:10%;
  background:#455A64;
  box-shadow:0px 0px 12px gray;
}
.left
{
  float:left;
  margin-top:0%;
  margin-right:5%;
  margin-left:10%;
}
.right
{
  float:left;
  margin-top:1%;
}

</style>
    
    
</head>
    
<body>



<div class="container">
   <div class="content">
       <div class="lt">
    &nbsp;
    </div>
        <div class="left" id="left">
    <h1 class="font-header"><span  class="font-title">xBridge B2B<span class="glyphicon glyphicon-menu-right"></span></span><br>
    <p class="font-display1" style="margin-left:0%;margin-top:-5%;">Business-to-Business System<br>

    <span class="font-caption" style="margin-left:2%;"></span></p></h1>
    <div class="col-md-10">
      <a href="https://play.google.com/store/apps/details?id=com.panda.b2b_app" target="_blank"><img alt="Google Play Store" src="<?php echo base_url('assets/playstore-badge.png')?>" width="150" height="50" style="margin-left: 5px;"></a>
      <a href="https://apps.apple.com/my/app/xbridge-b2b/id1532628055" target="_blank"><img alt="App Store" src="<?php echo base_url('assets/appstore-badge.jpg') ?>" width="150" height="50" style="margin-left: 5px;"></a>
    </div>
          </div>

   
   <?php // echo form_open('Panda_verifylogin'); ?>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-0">
   
            <div class="account-wall">

<div class="right" id="right">
<br>
    <div class="jumbotron">
                <form class="form-horizontal" role="form" action="<?php echo site_url('login_c/validate_check')?>" method="post">
                <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                <input type="text" class="form-control" placeholder="Email" id="userid" name="userid" required autofocus autocomplete="off">
                </div>
                </div>
                <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                <span class="input-group-addon" id="view_pass" ><i class="glyphicon glyphicon-eye-open" style="cursor:pointer;"></i></span>
                </div>
                </div>
                <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </div>
                <div class="form-group">
                <span class="clearfix"></span><a href="<?php echo site_url('Email_controller')?>" class="pull-right need-help">Forgot Password? </a>
                <!-- <a href="<?php echo base_url('asset/Rexbridge B2B Guide.pdf')?>" target="_blank" class="pull-right need-help">Need help? </a> --><a href="https://www.xbridge.my/contact/" class="pull-left need-help">Contact Us</a><span class="clearfix"></span>
                <span class="clearfix"></span>
                </div>
                <p class="login-box-msg"><span style="font-size: 18px" class="label label-danger"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></span></p>
                <span class="label label-danger" style="font-size: 14px"><?php echo ''; ?></span>
                <?php // echo validation_errors(); ?>
                </form>
            </div>
            </div>

            </div>
        </div>
    </div>

    <div class="rt">
    &nbsp;
    </div>
</div>

<script src="<?php echo base_url('asset/jquery.min.js') ?>"></script>
<script type="text/javascript"> 
  $('#view_pass').click(function() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  });
</script>

