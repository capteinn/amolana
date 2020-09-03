<?php

error_reporting(0);

session_start();

if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {

include '../../config.php';

$nama = $_SESSION['name'];

$name_user = $_SESSION['username'];

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

$username = secure_val($_GET['username']);



$query_user_change = mysqli_query($link, "SELECT * FROM users where md5(username)='$username'");

$cek_username = mysqli_fetch_array($query_user_change);





?>

<?php 

$reset_pass = '12345678';



///// jangan di hapus ////

echo ".";

//////////////////////////



    $querychange = mysqli_query($link, "UPDATE users SET password=sha1('$reset_pass') WHERE md5(username) = '$username'") or die(mysqli_error());



    if($querychange) {



                $aktifitas = 'Berhasil Reset Password '.$cek_username['name'].' oleh '.$name_user;


                echo ".";



                echo '<script>

                        swal({title: "Success",text: "Berhasil Reset Password!",type: "success"}, 

                        function() {window.location = "../../view/user/";

                        });

                      </script>';



     }else{



      $aktifitas = 'Gagal Reset Password '.$name_user;

    

      echo ".";



      echo '<script>

              swal({title: "Error",text: "Gagal Reset Password!",type: "error"}, 

              function() {window.location = "../../view/user/";

              });

            </script>';

     }

?>



<?php

}else{

  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";

}

?>