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
    <title>Perpustakaan Pinjam</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body>

  <table width="1300" border="1" align="center">
    <tr>
      <td colspan="2" align="center"><h1>Sistem Informasi Perpustakaan</h1></td>
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
        <a href="pinjam_buku.php" class="las la-file">Pinjam buku</a>
        <p style='color: #DD2F6E;'><b>Buku yang Sedang Dipinjam </b> </p>
        <table class="table table-bordered">
        <thead>   
          <tr>
            <th >Tanggal Pinjam Buku </th>
            <th >Jumlah Pinjam </th>
            <th >Tanggal Kembali </th>
            <th >Nama Peminjam</th>
            <th >Buku</th>
            <th >Aksi</th>
          </tr>
        </thead>
                                   
        <tbody>
          <?php
            $queryinfo = mysqli_query ($connect, "SELECT * FROM meminjam,buku,anggota WHERE meminjam.id_anggota = anggota.id_anggota and meminjam.id_buku = buku.id_buku and meminjam.kembali = 1 ORDER BY id_pinjam");
            /*$no = 1;*/
            while ($pinjam = mysqli_fetch_array($queryinfo)) {
          ?>           
            <tr>
              <!--td></*?php echo $no?>*/</td-->
              <td><?=$pinjam['tgl_pinjam']?></td>
              <td><?=$pinjam['jumlah_pinjam']?></td>
              <td><?=$pinjam['tgl_kembali']?></td>
              <td><?=$pinjam['nama_anggota']?></td>
              <td class="center"><?=$pinjam['judul_buku']?></td>
              <td class="center"><a href="editPinjam.php?id_pinjam=<?=$pinjam['id_pinjam']?>"><button type="button" class="btn btn-sm btn-info"><i class="las la-pen-fancy"></i> Edit</button></a> | <a href="kembali_buku.php?id=<?=$pinjam['id_pinjam']?>"><button type="button" class="btn btn-warning"><i class="las la-reply"></i> Kembali</button></a></td>
            </tr>
                                       
          <?php /*$no++;*/
            }
          ?>
        </tbody>
  </table><br>
    <p style='color: #DD2F6E;'><b>Buku yang Sudah Dikembalikan</b></p>
      <table class="table table-bordered">
       <thead>   

          <tr>
            <th >Tanggal Pinjam Buku </th>
            <th >Jumlah Pinjam </th>
            <th >tanggal kembali </th>
            <th >nama peminjam</th>
            <th >Buku</th>
            <th >Aksi</th>
          </tr>
        </thead>
          <tbody>
            <?php
              $queryinfo = mysqli_query ($connect, "SELECT * FROM meminjam,buku,anggota WHERE meminjam.id_anggota = anggota.id_anggota and meminjam.id_buku = buku.id_buku and meminjam.kembali = 2 ORDER BY id_pinjam");
              /*$no = 1;*/
              while ($pinjam=mysqli_fetch_array($queryinfo)){
            ?>           
              <tr>
                <!--td></*?php echo $no?>*/</td-->
                <td><?=$pinjam['tgl_pinjam']?></td>
                <td><?=$pinjam['jumlah_pinjam']?></td>
                <td><?=$pinjam['tgl_kembali']?></td>
                <td><?=$pinjam['nama_anggota']?></td>
                <td class="center"><?=$pinjam['judul_buku']?></td>
                                           
                <td class="center"><a href="pinjam.php?hapus=ok&id_pinjam=<?=$pinjam['id_pinjam']?>"><button type="button" class="btn btn-sm btn-danger"><i class="las la-trash-alt"></i> Hapus</button></a></td>
              </tr>
                                       
            <?php /*$no++;*/ 
              }
              if (isset($_GET['hapus'])){
                $id_pinjam = $_GET['id_pinjam'];
                $querydelete = mysqli_query($connect, "DELETE FROM meminjam WHERE id_pinjam='$id_pinjam'");
                if ($querydelete){
                ?>
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> Data Berhasil Dihapus.
                    </div>
                <?php
                }
                else{
                ?>
                    <div class="alert alert-ddanger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Failed!</strong> Data Gagal Dihapus.
                    </div>
                <?php
                }
              }
            ?>
          </tbody>
      </table>
    </td>
    </tr>
<tr>
<td colspan="2" align="center">perpustakaan<br><></script></td>
</tr>
</table>
</body>
</html>