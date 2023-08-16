<?php
session_start();

include 'layout/header.php';
include 'layout/navbar.php';
?>
<div class="container pt-4">
   <div class="row">
      <div class="col-2">
         <?php include 'layout/menu.php' ?>
      </div>
      <!-- Content -->
      <div class="col-10">
         <div class="card">
            <div class="card-body">
               <?php 
               if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
                  echo "<h5 style='color:red;'>Untuk mengakses halaman adminstrator, Anda harus login!</h5 style='color:red;'>
                  <p><a href=../index.php>Login</a></p>";
               } else {
                  $_SESSION['username'];
                  if ($_SESSION['level']=='Administrator'){
                     $level = 'Administrator, Saya Kangen Kamu';
                  } else {
                     $level = 'Orang Asing Silahkan Log Out Kalo Tidak Ada Keperluan';
                  } ?>
                  <h5><b>Selamat Datang <?php echo $level ?></b></h5>
               <?php
                  
               }
               ?>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include 'layout/footer.php'; ?>