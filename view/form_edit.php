<?php
session_start();

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<script>alert('Gajelas Banget !!!');</script>";
    echo "<script>location='index.php';</script>";
}

include '../config.php';
include 'layout/header.php';
include 'layout/navbar.php';

if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_array($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?>
<div class="container pt-4">
 <div class="row">
  <div class="col-2">
   <?php include 'layout/menu.php' ?>
</div>
<!-- Content -->
<div class="col-10">
   <h1 style="text-align: center; font-family: times new roman;">FORM EDIT SISWA</h1>
   <!-- awal card form -->
   <form method="post" action="controller/edit.php">
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            From Input Data Siswa
        </div>
        <div class="card-body">
            <table style="width: 100%">
                <input type="hidden" name="id" value="<?php echo $siswa['id']?>">
                <div class="form-group">
                    <tr>
                        <td><label>Nama</label></td>
                        <td>:</td>
                        <td><input type="text" name="nama" class="form-control" placeholder="silahkan masukan nama" value="<?php echo $siswa['nama'] ?>" required></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label>Alamat</label></td>
                        <td>:</td>
                        <td><input type="textarea" name="alamat" class="form-control" placeholder="Silahkan Masukan Alamat" value="<?php echo $siswa['alamat'] ?>" required></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label>Jenis Kelamin</label></td>
                        <td>:</td>
                        <td><select class="form-control" name="jenis_kelamin">
                            <?php $jk = $siswa['jenis_kelamin']; ?>
                            <option value="Laki-Laki" <?php echo ($jk == 'Laki-Laki') ? "selected": "" ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php echo ($jk == 'Perempuan') ? "selected": "" ?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td><label>Agama</label></td>
                    <td>:</td>
                    <td><select class="form-control" name="agama">
                        <?php $agama = $siswa['agama']; ?>
                        <option value="islam" <?php echo ($agama == 'islam') ? "selected": "" ?>>Islam</option>
                        <option value="kristen" <?php echo ($agama == 'kristen') ? "selected": "" ?>>Kristen</option>
                        <option value="budha" <?php echo ($agama == 'budha') ? "selected": "" ?>>Budha</option>
                        <option value="konghucu" <?php echo ($agama == 'konghucu') ? "selected": "" ?>>konghucu</option>
                        <option value="hindu" <?php echo ($agama == 'hindu') ? "selected": "" ?>>Hindu</option>
                    </select>
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td><label>Sekolah Asal</label></td>
                <td>:</td>
                <td><input type="text" name="sekolah_asal" class="form-control" placeholder="silahkan masukan Sekolah asal" value="<?php echo $siswa['sekolah_asal'] ?>" required></td>
            </tr>
        </div>


        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="bsubmit" class="btn btn-success" value="Simpan">
                <a href="list_siswa.php"><button type="button" class="btn">Cancel</button></a>
                <td></td>
            </tr>
        </table>
    </div>
</div>
</form>
</div>
</div>
</div>

<?php include 'layout/footer.php'; ?>