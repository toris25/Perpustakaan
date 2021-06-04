<?php
    error_reporting(E_ALL ^ E_NOTICE);
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Pinjam_Buku</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body>
  <table width="1300" border="1" align="center"">
    <tr>
      <td colspan="2" align="center"><h1>Selamat Datang Peminjaman Perpustakaan</h1></td>
    </tr>
    <tr>
      <td width = "200">
      <ul>
        <li><a href="anggota.php" class="las la-users">Anggota</a></li>
        <li><a href="buku.php" class="las la-book">Buku</a></li>
        <li><a href="pinjam.php" class="las la-clipboard-list">Pinjam</a></li>
      <ul>
      </td>
      <td width="500">
        <form method="post" action="pinjam_buku.php" >
          <table class="table table-bordered">
          <div class="form-group row">
            <label class="control-label col-sm-2" for="np">Nama Peminjam :</label>
              <div class="col-sm-4">
              <?php

                $sql_anggota = mysqli_query($connect, "SELECT * FROM anggota ORDER BY id_anggota");
                $kueri_anggota = ($sql_anggota) or die(mysqli_error());
              ?>
              
                <select name="anggota">
              <?php
                  while (list($kode,$nama_status)=mysqli_fetch_array($kueri_anggota)){
              ?>
                  <option  value="<?=$kode ?>"><?=$nama_status?></option>
              <?php
                  }
              ?>
                </select>
              </div>
          </div>
          
          <div class="form-group row">
            <label class="control-label col-sm-2" for="jb">Judul Buku :</label>
              <div class="col-sm-4">
              <?php
                $sql_buku = mysqli_query($connect, "SELECT * FROM buku ORDER BY id_buku");
                $kueri_buku = ($sql_buku) or die(mysqli_error());
              ?>
                <select name="buku">
              <?php
                while (list($kode,$nama_status)=mysqli_fetch_array($kueri_buku)){
              ?>
                  <option  value="<?= $kode ?>"><?= $nama_status ?></option>
              <?php
                }
              ?>
                </select>                      
              </div>
            </div>  

            <div class="row">
          <div class="col-25">
            <label for="tgl">Tanggal Pengembalian:</label>
          </div>  
            <div class="col-75">
            <input type="date" id="tgl_kembali" placeholder="Masukkan Tanggal" name="tgl_kembali">
            </div>
        </div>
		

            <div class="form-group">
              <div class="col-sm-12">
                <button type="submit" name="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                <!--button type="reset" name="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Hapus</button>
                <a href="logout.php" class="btn btn-dark"><i class="fas fa-sign-out-alt"></i> Logout</a-->
              </div>
            </div><br><br>
          </table>
        </form>

        <?php
          if (isset($_POST['submit'])){
            $anggota = $_POST['anggota'];
            $buku  = $_POST['buku'];
			$tgl_kembali  = $_POST['tgl_kembali'];

            $queryinsert = mysqli_query($connect, 'INSERT INTO meminjam(tgl_pinjam,jumlah_pinjam,tgl_kembali,id_anggota,id_buku,kembali) VALUES ("'.date('Y-m-d').'",1,"'.$tgl_kembali.'","'.$anggota.'","'.$buku.'",1)');
            echo mysqli_error($connect);

            if ($queryinsert){
        ?>
            <br>
            <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Data Anggota Berhasil Diinput.
            </div>
        <?php
            }
            else{
        ?>
            <div class="alert alert-ddanger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Failed!</strong> Data Anggota Gagal Diinput.
            </div>
        <?php
            }
           }
        ?>

      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">perpustakaan<br><></script></td>
    </tr>
  </table>
</body>
</html>