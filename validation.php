<!DOCTYPE HTML>  
<html>
<head>
<title>Form Validasi</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $nrpErr = $noErr = $emailErr = "";
$name = $nrp = $no = $email = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
    $nameErr = "Wajib Menggunakan Nama";
    } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Hanya bisa memasukan huruf tidak bisa angka";
    }
    }

    if (empty($_POST["nrp"])) {
    $nrpErr = "NRP wajib diisi";
    } else {
    $nrp = test_input($_POST["nrp"]);
    // check if nrp only contains number and minus (-)
    if (!preg_match("/^[-0-9]*$/",$nrp)) {
        $nrpErr = "hanya (-) dan angka yang bisa di gunakan";
    }
    }
    
    if (empty($_POST["no"])) {
    $noErr = "NoHP Wajib Diisi";
    } else {
    $no = test_input($_POST["no"]);
    // check if name only contains number
    if (!preg_match("/^[0-9+]*$/",$no)) {
        $noErr = "Hanya Angka dan tanda (+) yang bisa di gunakan";
    }
    }

    if (empty($_POST["email"])) {
    $emailErr = "Email Wajib Disi";
    } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format Email Salah";
    }
    }

    if (empty($_POST["address"])) {
    $address = "";
    } else {
    $address = test_input($_POST["address"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Contoh Form Validasi PHP</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    NRP: <input type="text" name="nrp" value="<?php echo $nrp;?>">
    <span class="error"> <?php echo $nrpErr;?></span>
    <br><br>
    Nohp: <input type="text" name="no" value="<?php echo $no;?>">
    <span class="error"><?php echo $noErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error"> <?php echo $emailErr;?></span>
    <br><br>
    Alamat: <textarea name="address" rows="5" cols="40"><?php echo $address;?></textarea>
    <br><br>  
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $nrp;
echo "<br>";
echo $no;
echo "<br>";
echo $email;
echo "<br>";
echo $address;
?>

</body>
</html>
