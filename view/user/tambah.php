<?php

error_reporting(0);

session_start(); 

if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';

?>
<div class="content-wrapper">
<section class="content-header">

      <h1>

        USER 

        <small>Parakerja</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="../main"><i class="fa fa-dashboard"></i>Home</a></li>

        <li><a href="index.php">User</a></li>

        <li><a href="tambah.php">Form Add User</a></li>

        <li class="active">Form</li>

      </ol>

</section>



<section class="content">

<div class="box box-primary">

  <div class="box-header with-border">

    <h3 class="box-title">Tambah Data User</h3>

  </div>

  <!-- /.box-header -->

  <!-- form start -->

  <form action="../../controller/user/tambah.php" role="form" method="POST">

    <div class="box-body">

      <div class="form-group">

        <label for="nama user">Nama User</label>

        <input type="text" autocomplete="off" required name="name" class="form-control" id="" placeholder="Inem">

      </div>

      <div class="form-group">

        <label for="alamat">Alamat</label>

        <input type="text" autocomplete="off" required name="alamat" class="form-control" id="" placeholder="Citra Batam Blok D No 76">

      </div>

      <div class="form-group">

        <label for="notelepon">No Telepon</label>

        <input type="text" autocomplete="off" required name="notelepon" class="form-control" id="" placeholder="0812121333" onkeyup="validAngka(this)"/>

      </div>

      <script language='javascript'>
        function validAngka(a)
        {
          if(!/^[0-9,+]+$/.test(a.value))
          {
          a.value = a.value.substring(0,a.value.length-1000);
          }
        }
      </script>

      <div class="form-group">

        <label for="username">Username</label>

        <input type="username" maxlength="15" autocomplete="off" required name="username" class="form-control" placeholder="Tes123(max 15 karakter)">

      </div>

      <div class="form-group">

        <label for="jaabatan">Jabatan</label>

        <input type="text" autocomplete="off" required name="jabatan" class="form-control" id="" placeholder="Staff">

      </div>

      <div class="form-group">

        <label for="usergroup">Usergroup</label>

        <select class="form-control" required name="usergroup">

          <?php

              $query_usergroup = mysqli_query($link,"SELECT id,nama FROM usergroup");

              while ($row_usergroup = mysqli_fetch_array($query_usergroup, MYSQLI_ASSOC)) {



                  if ($dapat->usergroup == $row_usergroup[id]) {

                      $pilih = " selected";

                  } else {

                      $pilih = "";

                  }

                  ?>

                  <option <?= $pilih; ?> value="<?= $row_usergroup[id]; ?>" ><?= $row_usergroup[nama]; ?></option>

                  <?php

              }

              ?>

        </select>

      </div>

      <div class="form-group">

        <label for="psw">Password</label>

        <input type="password" class="form-control"  id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

        <div id="message">

          <h3>Password Harus Memenuhi Syarat:</h3>

          <p id="letter" class="invalid">(a) <b>Huruf kecil (lowercase)</b> Dibutuhkan</p>

          <p id="capital" class="invalid">(A) <b>Huruh Besar (uppercase)</b> Dibutuhkan</p>

          <p id="number" class="invalid">(1) <b>Angka</b></p>

          <p id="length1" class="invalid">Minimum <b>8 Karakter</b></p>

      </div>

      </div>

     </div>

    <!-- /.box-body -->

    <div class="box-footer">

      <button type="submit" name="create_user" class="btn bg-olive btn-flat margin">Simpan</button>

    </div>

  </form>

</div>
</section>
</div>

<?php include "../footer.php";?> 

<script>

var myInput = document.getElementById("psw");

var letter = document.getElementById("letter");

var capital = document.getElementById("capital");

var number = document.getElementById("number");

var length1 = document.getElementById("length1");



// When the user clicks on the password field, show the message box

myInput.onfocus = function() {

    document.getElementById("message").style.display = "block";

}



// When the user clicks outside of the password field, hide the message box

myInput.onblur = function() {

    document.getElementById("message").style.display = "none";

}



// When the user starts to type something inside the password field

myInput.onkeyup = function() {

  // Validate lowercase letters

  var lowerCaseLetters = /[a-z]/g;

  if(myInput.value.match(lowerCaseLetters)) {  

    letter.classList.remove("invalid");

    letter.classList.add("valid");

  } else {

    letter.classList.remove("valid");

    letter.classList.add("invalid");

  }

  

  // Validate capital letters

  var upperCaseLetters = /[A-Z]/g;

  if(myInput.value.match(upperCaseLetters)) {  

    capital.classList.remove("invalid");

    capital.classList.add("valid");

  } else {

    capital.classList.remove("valid");

    capital.classList.add("invalid");

  }



  // Validate numbers

  var numbers = /[0-9]/g;

  if(myInput.value.match(numbers)) {  

    number.classList.remove("invalid");

    number.classList.add("valid");

  } else {

    number.classList.remove("valid");

    number.classList.add("invalid");

  }

  

  // Validate length

  if(myInput.value.length >= 8) {

    length1.classList.remove("invalid");

    length1.classList.add("valid");

  } else {

    length1.classList.remove("valid");

    length1.classList.add("invalid");

  }

}

</script>



<style>

/* Style all input fields */



/* Style the submit button */

input[type=submit] {

    background-color: #4CAF50;

    color: white;

}



/* Style the container for inputs */

.container {

    background-color: #f1f1f1;

    padding: 20px;

}



/* The message box is shown when the user clicks on the password field */

#message {

    display:none;

    background: #f1f1f1;

    color: #000;

    position: relative;

    padding: 20px;

    margin-top: 10px;

}



#message p {

    padding: 5px 35px;

    font-size: 100%;

}



/* Add a green text color and a checkmark when the requirements are right */

.valid {

    color: green;

}



.valid:before {

    position: relative;

    left: -35px;

    content: "✔";

}



/* Add a red text color and an "x" when the requirements are wrong */

.invalid {

    color: red;

}



.invalid:before {

    position: relative;

    left: -35px;

    content: "✖";

}

</style>



<?php

}else{

  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";

}