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
 $id = $_GET['id_anggota'];
 $queryinfo = mysqli_query($connect, "SELECT * FROM anggota WHERE id_anggota='$id'");
 $info = mysqli_fetch_array($queryinfo);
?>

<div class="container">
<div class="text-center">
    <h2><b>Edit Data Anggota</b></h2>
    </div>

    <div class="col">
    <div class="main">

    <form class="form-horizontal" method="post" action="editanggota.php">

    <input type="hidden" class="form-control" id="id" placeholder="Masukkan id" name="id" value="<?=$info['id_anggota']?>">
        
        <div class="row">
          <div class="col-25">
            <label for="nama">Nama Anggota:</label>
          </div>
            <div class="col-75">
            <input type="text" id="nama" placeholder="Masukkan Nama Anggota" name="nama" value="<?=$info['nama_anggota']?>">
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="alamat">Alamat:</label>
          </div>
            <div class="col-75">
            <input type="text" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="<?=$info['alamat']?>">
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="tempat">Tempat Lahir:</label>
          </div>
            <div class="col-75">
            <input type="text" id="tempat" placeholder="Masukkan Tempat Lahir" name="tempat" value="<?=$info['tempat']?>">
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label class="control-label col-sm-2" for="lahir">Tanggal Lahir:</label>
          </div>
            <div class="col-75">
            <input type="date" id="lahir" placeholder="Masukkan Tanggal Lahir" name="lahir" value="<?=$info['ttl']?>">
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="jk">Jenis Kelamin:</label>
          </div>
            <div class="col-75"> 
            <label class="radio-inline" ><input type="radio" id="jk" name="jk" value="Pria" <?php if 
                ($info['jenis_kelamin'] == "Pria") echo "checked"; ?>> Pria</label>
            <label class="radio-inline"><input type="radio" id="jk" name="jk" value="Wanita" <?php if 
                ($info['jenis_kelamin'] == "Wanita") echo "checked"; ?>> Wanita</label>
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label class="control-label col-sm-2" for="telepon">Nomor Telepon:</label>
          </div>
            <div class="col-75"> 
            <input type="tel" id="telepon" placeholder="Masukkan Nomor Telepon" name="telepon" value="<?=$info['telepon']?>">
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="fakultas">Fakultas:</label>
          </div>
            <div class="col-75">  
              <select class="form-control" id="fakultas" name="fakultas">
                <option value='-' <?php if 
                   ($info['fakultas'] == "-") echo "selected"; ?>>--Masukkan Fakultas--</option>
                <option value='FEB' <?php if 
                    ($info['fakultas'] == "FEB") echo "selected"; ?>>Fakultas Ekonomi & Bisnis</option>
                <option value='FTI' <?php if 
                    ($info['fakultas'] == "FTI") echo "selected"; ?>>Fakultas Teknologi Informasi</option>
                <option value='FH' <?php if 
                    ($info['fakultas'] == "FH") echo "selected"; ?>>Fakultas Hukum</option>
                <option value='FT' <?php if 
                    ($info['fakultas'] == "FT") echo "selected"; ?>>Fakultas Teknik</option>
                <option value='FPsi' <?php if 
                    ($info['fakultas'] == "FPSi") echo "selected"; ?>>Fakultas Psikologi</option>
                <option value='Pasca' <?php if 
                    ($info['fakultas'] == "Pasca") echo "selected"; ?>>Fakultas Pasca Sarjana</option>
                <option value='lainnya' <?php if 
                    ($info['fakultas'] == "lainnya") echo "selected"; 
                ?>>Lainnya</option>
                </select>
            </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="jurusan">jurusan:</label>
          </div>
            <div class="col-75">  
              <select class="form-control" id="jurusan" name="jurusan">
                <option value='-' <?php if 
                   ($info['jurusan'] == "-") echo "selected"; ?>>--Masukkan Fakultas--</option>
                <option value='Manajemen' <?php if 
                    ($info['jurusan'] == "Manajemen") echo "selected"; ?>>Manajemen</option>
                <option value='Akuntansi' <?php if 
                    ($info['jurusan'] == "Akuntansi") echo "selected"; ?>>Akuntansi</option>
                <option value='Hukum' <?php if 
                    ($info['jurusan'] == "Hukum") echo "selected"; ?>>Hukum</option>
                <option value='Teknik Informatika' <?php if 
                    ($info['jurusan'] == "Teknik Informatika") echo "selected"; ?>>Teknik Informatika</option>
                <option value='Sistem Informasi' <?php if 
                    ($info['jurusan'] == "Sistem Informasi") echo "selected"; ?>>Sistem Informasi</option>
                <option value='Teknik Mesin' <?php if 
                    ($info['jurusan'] == "Teknik Mesin") echo "selected"; ?>>Teknik Mesin</option>
                <option value='Teknik Sipil' <?php if 
                    ($info['jurusan'] == "Teknik Sipil") echo "selected"; ?>>Teknik Sipil</option>
                <option value='Teknik Elektro' <?php if 
                    ($info['jurusan'] == "Teknik Elektro") echo "selected"; ?>>Teknik Elektro</option>
                  <option value='Psikologi' <?php if 
                    ($info['jurusan'] == "Psikologi") echo "selected"; ?>>Psikologi</option>
                <option value='PascaFEB' <?php if 
                    ($info['jurusan'] == "PascaFEB") echo "selected"; ?>>Pasca Sarjana</option>
                <option value='lainnya' <?php if 
                    ($info['jurusan'] == "lainnya") echo "selected"; 
                ?>>Lainnya</option>
                </select>
            </div>
        </div>

            <input type="reset">
            <input type="submit" name="edit">
            
    </div>
    </form>
</div>
</div>
</div>

    <div class="col-sm-10 col-sm-offset-1">
    <?php
        if (isset($_POST['edit']))
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

            $queryedit = mysqli_query($connect, "UPDATE anggota SET nama_anggota='$nama', alamat='$alamat', tempat='$tempat', ttl='$lahir', jenis_kelamin='$jk', telepon='$telepon', fakultas='$fakultas', jurusan='$jurusan' WHERE id_anggota='$id'");

       
                if ($queryedit)
                {
    ?>
                <div class="alert success">
                    <span class="closebtn">&times;</span>  
                    <strong>Success!</strong> Data Anggota Berhasil Diedit. Klik <a href="anggota.php">disini</a> untuk Input Data Baru.
                </div>
                
    <?php
                }
                else
                {
    ?>
                <div class="alert">
                    <span class="closebtn">&times;</span>  
                    <strong>Danger!</strong> Data Anggota Gagal Diedit
                </div>
    <?php
                }
        }
    ?>
   </div>
</div>

</div>
<div class="footer">
<h2><b>Copyright Kelompok 10</div></h2>
</body>
</html>
