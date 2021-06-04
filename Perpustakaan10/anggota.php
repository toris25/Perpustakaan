<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Informasi Perpustakaan</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main.css">

</head>
<body>

<?php
include "koneksi.php";
	$uname = $_COOKIE['username'];
	$pass = $_COOKIE['password'];
	
	if (!isset($uname))
	{
		?>
		<script>
			alert('Cookie Habis');
			document.location='login.php';
		</script>
		<?php
		exit;
	}
?>
Cookie anda : <?=$uname?>

<div class="header">
  <h1>Selamat Datang di Sistem Informasi Perpustakaan</h1>
  <h3>Universitas Atma Jaya Makassar</h3>
</div>

<div class="navbar">
  <a href="index.php">Beranda</a>
  <a href="anggota.php"  class="active">Anggota</a>
  <a href="buku.php">Buku</a>
  <a href="pinjam.php">Peminjaman</a>
  <a href="logout.php">Logout</a>
</div>

<div class="row">
  <div class="main">
    
  <?php
include "koneksi.php";
?>

<div class="container">
    <div class="center">
    <h2><b>Input Anggota</b></h2>
    </div>

<div class="col">
<div class="main">
    <form class="form-horizontal" method="post" action="anggota.php">

        <div class="row">
          <div class="col-25">
            <label for="nama">Nama Anggota:</label>
          </div>
          <div class="col-75">
            <input type="text" id="nama" placeholder="Masukkan Nama Anggota" name="nama">
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="alamat">Alamat:</label>
          </div>
            <div class="col-75">
            <input type="text" id="alamat" placeholder="Masukkan Alamat" name="alamat">
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="tempat">Tempat Lahir:</label>
          </div>
            <div class="col-75">
            <input type="text" id="tempat" placeholder="Masukkan Tempat Lahir" name="tempat">
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="lahir">Tanggal Lahir:</label>
          </div>  
            <div class="col-75">
            <input type="date" id="lahir" placeholder="Masukkan Tanggal Lahir" name="lahir">
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="jk">Jenis Kelamin:</label>
          </div>
            <div class="col-75"> 
            <label class="radio-inline" ><input type="radio" id="jk" name="jk" value="Pria"> Pria</label>
            <label class="radio-inline"><input type="radio" id="jk" name="jk" value="Wanita"> Wanita</label>
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="telepon">Nomor Telepon:</label>
          </div>
            <div class="col-75"> 
            <input type="tel" id="telepon" placeholder="Masukkan Nomor Telepon" name="telepon">
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="fakultas">Fakultas:</label>
          </div>
            <div class="col-75"> 
            <select id="fakultas" name="fakultas">
            <option value='-'>--Masukkan Fakultas--</option>
              <option value="FEB">Fakultas Ekonomi & Bisnis</option>
              <option value="FTI">Fakultas Teknologi Informasi</option>
              <option value="FH">Fakultas Hukum</option>
              <option value="FT">Fakultas Teknik</option>
              <option value="FPsi">Fakultas Psikologi</option>
              <option value="Pasca">Fakultas Pasca Sarjana</option>
            </select>
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="jurusan">Jurusan:</label>
          </div>
            <div class="col-75"> 
            <select id="jurusan" name="jurusan">
            <option value='-'>--Masukkan Jurusan--</option>
              <option value="Manajemen">Manajemen</option>
              <option value="Akuntansi">Akuntansi</option>
              <option value="Hukum">Hukum</option>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknik Mesin">Teknik Mesin</option>
              <option value="Teknik Sipil">Teknik Sipil</option>
              <option value="Teknik Elektro">Teknik Elektro</option>
              <option value="Psikologi">Psikologi</option>
              <option value="PascaFEB">Pasca Sarjana</option>
            </select>
            </div>
        </div>

    </div>
            <input type="reset"> 
            <input type="submit" name="submit">
    </form>
</div>
</div>

    <div class="col-sm-10 col-sm-offset-1">
        <?php
        if (isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $tempat = $_POST['tempat'];
            $lahir = $_POST['lahir'];
            $jk = $_POST['jk'];
            $telepon = $_POST['telepon'];
            $fakultas = $_POST['fakultas'];
            $jurusan = $_POST['jurusan'];
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $waktu = date("Y-m-d H:i:s");
            
            $queryinsert = mysqli_query($connect, "INSERT INTO anggota VALUES ('$id','$nama','$alamat','$tempat','$lahir','$jk','$telepon','$fakultas','$jurusan')");
                
            if ($queryinsert)
                {
        ?>
    
                <div class="alert success">
                    <span class="closebtn">&times;</span>  
                    <strong>Success!</strong> Data Anggota Berhasil Diinput
                </div>
        <?php
                }
                else
                {
        ?>
                <div class="alert">
                    <span class="closebtn">&times;</span>  
                    <strong>Danger!</strong> Data Anggota Gagal Diinput
                </div>
        <?php
                }
        }

        if (isset($_GET['hapus']))
        {
            $id = $_GET['id_anggota'];
            $querydelete = mysqli_query($connect, "DELETE FROM anggota WHERE id_anggota='$id'");
                if ($querydelete)
                {
        ?>
                <div class="alert success">
                    <span class="closebtn">&times;</span>  
                    <strong>Success!</strong> Data Anggota Berhasil Dihapus
                </div>
        <?php
                }
                else
                {
        ?>
                <div class="alert">
                    <span class="closebtn">&times;</span>  
                    <strong>Danger!</strong> Data Anggota Gagal Dihapus
                </div>
        <?php
                }
        }
        ?>
    </div>

    <div class="table-responsive col-sm-10 col-sm-offset-1">
    <div class="text-center">
    <h2><b>List Data Anggota</b></h2>
    </div>
    <div class="col">
    <div class="main">
        <table>
                <tr>
                    <th>ID Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Alamat</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>Action</th>
                </tr>
      
        
        <?php
            $queryanggota = mysqli_query($connect, "SELECT * FROM anggota ORDER BY id_anggota");
            $jumanggota = mysqli_num_rows($queryanggota);
            if ($jumanggota == 0)
            {
        ?>
        <tr>
        <td class="alert warning">Data Anggota Masih Kosong</td>
                </tr>
        <?php
                }
                else
                {
                    while ($anggota = mysqli_fetch_array($queryanggota))
                    {
        ?>
                    <tr>
                        <td><?=$anggota['id_anggota']?></td>
                        <td><?=$anggota['nama_anggota']?></td>
                        <td><?=$anggota['alamat']?></td>
                        <td><?=$anggota['tempat']?></td>
                        <td><?=$anggota['ttl']?></td>
                        <td><?=$anggota['jenis_kelamin']?></td>
                        <td><?=$anggota['telepon']?></td>
                        <td><?=$anggota['fakultas']?></td>
                        <td><?=$anggota['jurusan']?></td>
                        <td><a href="editanggota.php?id_anggota=<?=$anggota['id_anggota']?>">Edit </a></td>
                        <td><a href="anggota.php?hapus=ok&id_anggota=<?=$anggota['id_anggota']?>"> Hapus</a></td>
                    </tr>
        <?php
                    }
                }
        ?>
     
        </table>
            </div>
            </div>
    
  </div>
</div>

</div>
<div class="footer">
<h2><b>Copyright Kelompok 10</div></h2>
</body>
</html>
