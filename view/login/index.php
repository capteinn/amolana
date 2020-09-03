<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ecogreen Oleochemicals</title>

  <link href="../../dist/img/admin.png" rel="shortcut icon" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" oncontextmenu="return false;">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>ECOGREEN</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      <center>
      <img src="../../dist/img/admin.png" class="" alt="User Image" style="width: 250px">
      </center>
      <br>
    <p class="login-box-msg">Sign in to start your session</p>

     <script>
      function validateForm() {
        var x = document.forms["myForm"]["username"].value;
        var p = document.forms["myForm"]["password"].value;
        var c = document.forms["myForm"]["captcha"].value;
        if ((x == "") || (p == "") || (c == "")) {
          alert("Harap Isi Kolom");
          return false;
        }
      }

        document.onkeydown = function(e) {
        if(event.keyCode == 123) {
        return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
        return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
        return false;
        }
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
        return false;
        }
        }
    </script>
    <form action="../../controller/login/auth.php" name="myForm" method="post" onsubmit="return validateForm()">
      <div class="form-group has-feedback">
        <input type="username" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input name="captcha" type="text" class="form-control" placeholder="masukan captcha" style="width: 220px; height: 30px; float: right;">
        <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
        <img id='captcha' src='captcha.php' style="float: left; height: 30px; width: 95px;" border='0'>
          <a href='JavaScript: captcha();'><br><br>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="masok" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script type="text/javascript">
    function captcha()
    {
    var c_currentTime = new Date();
    var c_miliseconds = c_currentTime.getTime();
    
    document.getElementById('captcha').src = 'captcha.php?x='+ c_miliseconds;
    }
  </script>

 
</body>
</html>
