
<?php
// define variables and set to empty values
$nama = $nrp = $nohp = $email = $Alamat = "";


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nama"])) {    
     echo "<h2>Peringatan</h2>";
     echo "Nama Wajib Disi";
    }else{
        $nama = test_input($_POST["nama"]);
        $nrp = test_input($_POST["nrp"]);
        $nohp = test_input($_POST["nohp"]);
        $email = test_input($_POST["email"]);
        $Alamat = test_input($_POST["Alamat"]);
      }if(!preg_match("/^a-zA-Z-] *$/" , $nama)){
        echo "<h2>Peringatan</h2>";
        echo "Nama Tidak Boleh Mengandung Angka";
    }if else (!preg_match("/^[-0-9 ] *$/" , $nrp)){
        echo "<h2>Peringatan</h2>";
        echo "NRP Hanya Boleh Mengandung Tanda '-' dan angka ";
    }if else (!preg_match("/^[-+0-9' ] *$/" , $nomor)){
        echo "<h2>Peringatan</h2>";
       echo "nomor hanya boleh mengandung nomor dan tanda - atau +  ";
    }if else (!filter_var($email, FILTER_VALIDATE_EMAIL )){
        echo "<h2>Peringatan</h2>";
        echo "Format Email Salah";
    }else{
        
        echo "<h2>Output nya :</h2>";
        echo $nama;
        echo "<br>";
        echo $nrp;
        echo "<br>";
        echo $nohp;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $Alamat;
       
        

    } 
  }





?>
