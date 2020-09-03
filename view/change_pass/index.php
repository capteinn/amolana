<?php 
error_reporting(0); session_start();
if ($_SESSION['status'] == 'login' and $_SESSION['username'] <> "") {
include "../header.php";
include '../../equipment.php';
$username = $_SESSION['username'];
?>
<div class="content-wrapper">

<section class="content-header">
<div class="pull-left">
  <a href="#myModal1" data-toggle='modal' class="btn btn-default btn-flat" data-id="$username">Change Password</a>
</div>
</section>
    <!-------------------------------- Modal Change Password---------------------------->

  <form action="../../controller/login/change_password.php" method="POST">
  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" style="position: fixed; left: 13%">
   <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 70%">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Change Password</h4>
        </div>
        <div class="modal-body">
          <div class="fetched-data">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="username" readonly autocomplete="off" required name="username" class="form-control"
                value="<?= $username ?>">
              </div>
              <div class="form-group">
                <label for="password">Masukan Password Lama</label>
                <input type="password"  autocomplete="new-password" required name="password1" class="form-control"
                value="" >
              </div>
              <div class="form-group">
                <label for="psw">Masukan Password Baru</label>
                <input type="password"  id="psw1" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control">

                <div id="message1">
                  <h3>Password Harus Memenuhi Syarat:</h3>
                  <p id="letter1" class="invalid1">(a) <b>Huruf kecil (lowercase)</b> Dibutuhkan</p>
                  <p id="capital1" class="invalid1">(A) <b>Huruh Besar (uppercase)</b> Dibutuhkan</p>
                  <p id="number1" class="invalid1">(1) <b>Angka</b></p>
                  <p id="length" class="invalid1">Minimum <b>8 Karakter</b></p>
              </div>
              </div>

              <script>
              var myInput1 = document.getElementById("psw1");
              var letter1 = document.getElementById("letter1");
              var capital1 = document.getElementById("capital1");
              var number1 = document.getElementById("number1");
              var length = document.getElementById("length");



              // When the user clicks on the password field, show the message box

              myInput1.onfocus = function() {
                  document.getElementById("message1").style.display = "block";
              }



              // When the user clicks outside of the password field, hide the message box

              myInput1.onblur = function() {
                  document.getElementById("message1").style.display = "none";
              }



              // When the user starts to type something inside the password field

              myInput1.onkeyup = function() {
                // Validate lowercase letters

                var lowerCaseLetters1 = /[a-z]/g;

                if(myInput1.value.match(lowerCaseLetters1)) {  
                  letter1.classList.remove("invalid1");
                  letter1.classList.add("valid1");

                } else {

                  letter1.classList.remove("valid1");
                  letter1.classList.add("invalid1");

                }
                // Validate capital letters

                var upperCaseLetters1 = /[A-Z]/g;
                if(myInput1.value.match(upperCaseLetters1)) {  
                  capital1.classList.remove("invalid1");
                  capital1.classList.add("valid1");
                } else {
                  capital1.classList.remove("valid1");
                  capital1.classList.add("invalid1");
                }

                // Validate numbers

                var numbers1 = /[0-9]/g;
                if(myInput1.value.match(numbers1)) {  
                  number1.classList.remove("invalid1");
                  number1.classList.add("valid1");
                } else {
                  number1.classList.remove("valid1");
                  number1.classList.add("invalid1");
                }

                

                // Validate length

                if(myInput1.value.length >= 8) {
                  length.classList.remove("invalid1");
                  length.classList.add("valid1");
                } else {
                  length.classList.remove("valid1");
                  length.classList.add("invalid1");
                }
              }

              </script>

              <style>

              /* Style all input fields */

              input {

                  width: 100%;
                  padding: 12px;
                  border: 1px solid #ccc;
                  border-radius: 4px;
                  box-sizing: border-box;
                  margin-top: 6px;
                  margin-bottom: 16px;
              }


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

              #message1 {
                  display:none;
                  background: #f1f1f1;
                  color: #000;
                  position: relative;
                  padding: 20px;
                  margin-top: 10px;
              }

              #message1 p {
                  padding: 10px 35px;
                  font-size: 15px;
              }

              /* Add a green text color and a checkmark when the requirements are right */
              .valid1 {
                  color: green;
              }
              .valid1:before {
                  position: relative;
                  left: -35px;
                  content: "✔";
              }

              /* Add a red text color and an "x" when the requirements are wrong */
              .invalid1 {
                  color: red;
              }
              .invalid1:before {
                  position: relative;
                  left: -35px;
                  content: "✖";
              }
              </style>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="update_password" class="btn btn-primary">Update Data</button>
        </div>
        </div>
      </div>
    </div>
  </form>
</div>
<?php include "../footer.php";?> 
  <!-------------------------------- Modal Change Password----------------------------->
<?php
}else{
  echo "<script>alert('Anda tidak memiliki hak akses!!'); window.location='../../index.php'</script>";
}
?>