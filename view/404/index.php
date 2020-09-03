
<?php
error_reporting(0);
session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="../../index.html">return to dashboard</a>
          </p>

        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
<?php include "../footer.php";?> 
<?php

}else{

  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";

}