
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$namaErr = $nrpErr = $emailErr = $nohpErr  =  "";
$nama = $nrp = $email = $nohp = $alamat =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nama"])) {
    $namaErr = "Nama Wajib Diisi";
  } if (!preg_match("/^a-zA-Z-] *$/" , $nama)) {
    $nama2Err = "Nama Tidak Boleh Mengandung Angka";
  } else {
    $nama = test_input($_POST["nama"]);
  }
  if (empty($_POST["nrp"])) {
    $nrpErr = "nrp is required";
  } else {
    $nrp = test_input($_POST["nrp"]);
  }
    
  if (empty($_POST["nohp"])) {
    $nohp = "";
  } else {
    $nohp = test_input($_POST["nohp"]);
  }

  if (empty($_POST["email"])) {
    $email = "";
  } else {
    $email = test_input($_POST["email"]);
  }
  if (empty($_POST["alamat"])) {
    $alamat = "";
  } else {
    $alamat = test_input($_POST["alamat"]);
  }

  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>TUGAS AKHIR 1</h2>
<p><span class="error">* Wajib Isi</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nama : <input type="text" name="nama">
  <span class="error">* <?php echo $namaErr;?></span>
  <br><br>
  NRP : <input type="text" name="nrp">
  <span class="error">* <?php echo $nrpErr;?></span>
  <br><br>
  NoHP : <input type="text" name="nohp">
  <span class="error"><?php echo $nohpErr;?></span>
  <br><br>
  Email : <input type="text" name="email">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>
  Alamat : <textarea name="alamat" rows="5" cols="40"></textarea>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $nama;
echo "<br>";
echo $nrp;
echo "<br>";
echo $nohp;
echo "<br>";
echo $email;
echo "<br>";
echo $alamat;
?>

</body>
</html>
