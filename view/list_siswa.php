<?php
session_start();

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<script>alert('Login Dulu Atuh !!!');</script>";
    echo "<script>location='index.php';</script>";
}

include '../config.php';
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
         <div class="card mt-3">
          <div class="card-header bg-primary text-white" style="font-size: 30pt; text-align: center;">
            Daftar siswa
        </div>
        <div class="card-body">
            <table style="width: 100%;" class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Tindakan</th>
                </tr>

                <?php
                $no=1;
                $sql = "SELECT * FROM calon_siswa";
                $query = mysqli_query($db, $sql);
                while($siswa = mysqli_fetch_array($query)){
                    echo "<tr>";

                    echo "<td>".$no++;"</td>";
                    echo "<td>".$siswa['nama']."</td>";
                    echo "<td>".$siswa['alamat']."</td>";
                    echo "<td>".$siswa['jenis_kelamin']."</td>";
                    echo "<td>".$siswa['agama']."</td>";
                    echo "<td>".$siswa['sekolah_asal']."</td>";

                    echo "<td>";
                    echo "<a href='form_edit.php?id=".$siswa['id']."'><button>Edit</button></a> | ";
                    ?>
                    <button onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){
                      location.href='controller/hapus.php?id=<?php echo $siswa['id']; ?>' }" 
                      >Hapus</button>
                      <?php
                      echo "</td>";

                      echo "</tr>";
                  }
                  ?>
                  <p>Total: <?php echo mysqli_num_rows($query) ?></p>
                  <p><?php if (isset($_GET['status'])) : ?>
                  <p>
                    <?php
                    if ($_GET['status'] == 'tambahsukses') {
                        echo "Pendaftaran siswa baru berhasil!";
                    } else if ($_GET['status'] == 'editsukses'){
                        echo "Edit Data siswa berhasil!";
                    } else if ($_GET['status'] == 'hapussukses'){
                        echo "Hapus Data siswa berhasil!";
                    }else {
                        echo "Pendaftaran gagal!";
                    }
                    ?>
                </p>
                <?php endif; ?></p>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<?php include 'layout/footer.php'; ?>