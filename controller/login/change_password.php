<?php

error_reporting(0);

session_start();

if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {

include '../../config.php';

$nama = $_SESSION['name'];

?>

<head>

  <link href="../../resource/css/sweetalert.css" rel="stylesheet">

  <link href="../../resource/css/theme/twitter.css" rel="stylesheet">

  <script src="../../resource/js/main/jquery.min.js"></script>

  <script src="../../resource/js/main/sweetalert.min.js"></script>

</head>

<?php



include_once "../../config.php";

include '../../equipment.php';

?>

<?php 

if(isset($_POST['update_password'])){

$username           = secure_val($_POST['username']);

$password2          = sha1(secure_val($_POST['password1']));

$password1          = secure_val($_POST['psw']);



$query_username = mysqli_query($link, "SELECT password from users WHERE username='$username'");

$cek_username = mysqli_fetch_array($query_username);



$tampil_password = $cek_username['password'];



///// jangan di hapus ////

echo ".";

//////////////////////////





if ($tampil_password == $password2) {



    $querychange = mysqli_query($link, "UPDATE users SET username='$username', password=sha1('$password1') WHERE username = '$username'") or die(mysqli_error());



    if($querychange) {




                unset($_SESSION['username']);

                session_destroy();

                echo ".";



                echo '<script>

                        swal({title: "Success",text: "Berhasil Merubah Password!",type: "success"}, 

                        function() {window.location = "../../view/main/";

                        });

                      </script>';



     }else{




      $logging = mysqli_query($link, "INSERT INTO logging (nama_user, tanggal, ip, aktifitas, hostname) VALUES ('$nama', '$tanggal', '$ip', '$aktifitas','$hostname')")or die(mysqli_error());

    

      echo ".";



      echo '<script>

              swal({title: "Error",text: "Gagal Merubah Password!",type: "error"}, 

              function() {window.location = "../../view/main/";

              });

            </script>';

     }



}else{




  $logging = mysqli_query($link, "INSERT INTO logging (nama_user, tanggal, ip, aktifitas, hostname) VALUES ('$nama', '$tanggal', '$ip', '$aktifitas','$hostname')")or die(mysqli_error());



  echo ".";



  echo '<script>

          swal({title: "Error",text: "Masukan Password Lama Salah!",type: "error"}, 

          function() {window.location = "../../view/index.php?link=home.php";

          });

        </script>';

}



}

?>





<?php

}else{

  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";

}

?>