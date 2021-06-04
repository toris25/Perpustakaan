<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Perpustakaan Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="regis.css">
	<script type="text/javascript">
		function validate(){
			var nama = document.getElementById("nama");
			var huruf =  /^[A-Za-z]+$/;
			var errors = false;
			if (nama.value.trim()=="") {
				alert("Isi ki dlu bos kudikolom nama ");
				return false;
			}
			if (nama.value.match(huruf)){
				alert("Betul mi dikolom nama");
			
			if(document.getElementById("nama").val().length() ! = 6){
				errors = true;
				alert("harus minimal 6 karakter");
			}	
			else {
				errors = false;
			}
			if(errors==false){
				document.getElementById("form").submit();
			}
			
				return true;
			}

			else {
				alert("hanya bisa huruf dikolom nama")
				return false;
			}
		}
		
			
		
	</script>
</head>

<body>
    <div class="header">
        <h1>Selamat Datang di Sistem Informasi Perpustakaan</h1>
        <h3>Universitas Atma Jaya Makassar</h3>
    </div>
            <div class="container">
                <h1>Register</h1>
                    <form method="POST" action="prosesInput.php" onsubmit="return validate()">
                            <label for ="nama">Nama :</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" required>

                            <label for ="email">Username :</label>
                                <input type="email" name="email" placeholder="Masukkan Username (Ex : user@mail.com)" required>
                            

                            <label for ="password">Password :</label>
                                <input type="password" name="password" placeholder="Masukkan Password" required>

                        <button type="submit" class="registerbtn">Submit</button>
                        <button type="reset" class="resetbtn">Reset</button>
                    </form>
            </div>
        </div>
    </div>
</body>

</html>