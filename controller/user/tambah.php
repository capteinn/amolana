<?php

include '../../config.php';

include '../../equipment.php';

?>

<head>

  <link href="../../resource/css/sweetalert.css" rel="stylesheet">

  <link href="../../resource/css/theme/twitter.css" rel="stylesheet">

  <script src="../../resource/js/main/jquery.min.js"></script>

  <script src="../../resource/js/main/sweetalert.min.js"></script>

</head>



<?php 
$create = date('Y-m-d H:i:s');
$update = '';

?>

<?php 


if(isset($_POST['create_user'])){

      $name       = secure_val($_POST['name']);
      $username   = secure_val($_POST['username']);
      $password   = secure_val($_POST['psw']);
      $jabatan    = secure_val($_POST['jabatan']);
      $usergroup  = secure_val($_POST['usergroup']);
      $notelepon  = secure_val($_POST['notelepon']);
      $alamat     = secure_val($_POST['alamat']);

      echo $name." ".$alamat." ".$notelepon." ".$username." ".$password." ".$jabatan." ".$usergroup." ".$create." ".$update;
      
      echo ".";
      $cek_user=mysqli_num_rows(mysqli_query($link,"SELECT * FROM users WHERE username ='$username'"));
      if ($cek_user > 0) {

              echo '<script>

                      swal({title: "Error",text: "Username Sudah Di Pakai!",type: "error"}, 

                      function() {window.location = "../../view/user/tambah.php";

                      });

                    </script>';

                    die;

      }
      $query1 = mysqli_query($link, "INSERT INTO users (name,alamat,no_telp, username, password, jabatan, usergroup, created_at, updated_at) VALUES ('$name','$alamat','$notelepon', '$username', sha1('$password'), '$jabatan','$usergroup', '$create','$update')") or die(mysqli_error());

      echo ".";
         if ($query1) {
              echo ".";
              echo '<script>

                      swal({title: "Success",text: "Data Berhasil Ditambah!",type: "success"}, 

                      function() {window.location = "../../view/user/";

                      });

                    </script>';
          } else {
              
              echo ".";
              echo '<script>

              swal({title: "Error",text: "Gagal Tambah!",type: "error"}, 

              function() {window.location = "../../view/user/tambah.php";

              });

            </script>';
          }
    } 

    elseif (isset($_POST['create_user_client'])) {

      $name       = secure_val($_POST['name']);
      $username   = secure_val($_POST['username']);
      $password   = secure_val($_POST['psw']);
      $jabatan    = secure_val($_POST['jabatan']);
      $usergroup  = secure_val($_POST['usergroup']);
      $notelepon  = secure_val($_POST['notelepon']);
      $alamat     = secure_val($_POST['alamat']);
      
      echo ".";
      $cek_user=mysqli_num_rows(mysqli_query($link,"SELECT * FROM users WHERE username ='$username'"));

      if ($cek_user > 0) {

              echo '<script>

                      swal({title: "Error",text: "Username Sudah Di Pakai!",type: "error"}, 

                      function() {window.location = "../../front/daftar.php";

                      });

                    </script>';

                    die;

      }
      $query1 = mysqli_query($link, "INSERT INTO users (name,alamat,no_telp, username, password, jabatan, usergroup, created_at, updated_at) VALUES ('$name','$alamat','$notelepon', '$username', sha1('$password'), '$jabatan','$usergroup', '$create','$update')") or die(mysqli_error());

      echo ".";
         if ($query1) {
              echo ".";
              echo '<script>

                      swal({title: "Success",text: "Data Berhasil Ditambah!",type: "success"}, 

                      function() {window.location = "../../front/index_login.php";

                      });

                    </script>';
          } else {
              
              echo ".";
              echo '<script>

              swal({title: "Error",text: "Gagal Tambah!",type: "error"}, 

              function() {window.location = "../../front/daftar.php";

              });

            </script>';
          }

    }
