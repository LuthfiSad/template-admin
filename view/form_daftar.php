<?php
session_start();

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    echo "<script>alert('Login Dulu Ribet Amat dah !!!');</script>";
    echo "<script>location='index.php';</script>";
}

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
   <h1 style="text-align: center; font-family: times new roman;">FORM DAFTAR SISWA</h1>
   <!-- awal card form -->
   <form method="post" action="controller/tambah_siswa.php">
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            From Input Data Siswa
        </div>
        <div class="card-body">
            <table style="width: 100%">
                <div class="form-group">
                    <tr>
                        <td><label>Nama</label></td>
                        <td>:</td>
                        <td><input type="text" name="nama" class="form-control" placeholder="silahkan masukan nama" required></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label>Alamat</label></td>
                        <td>:</td>
                        <td><input type="textarea" name="alamat" class="form-control" placeholder="Silahkan Masukan Alamat" required></td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <td><label>Jenis Kelamin</label></td>
                        <td>:</td>
                        <td><select class="form-control" name="jenis_kelamin">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td><label>Agama</label></td>
                    <td>:</td>
                    <td><select class="form-control" name="agama">
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="budha">Budha</option>
                        <option value="konghucu">konghucu</option>
                        <option value="hindu">Hindu</option>
                    </select>
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td><label>Sekolah Asal</label></td>
                <td>:</td>
                <td><input type="text" name="sekolah_asal" class="form-control" placeholder="silahkan masukan Sekolah asal" required></td>
            </tr>
        </div>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" class="btn btn-success" value="Simpan">
                <a href="index.php"><button type="button" class="btn">Cancel</button></a>
                <input type="reset" name="breset" class="btn btn-danger" value="Reload"></td>
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