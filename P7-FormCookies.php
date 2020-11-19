<!DOCTYPE HTML>  
<html>
<head>
<title>Form Cookies</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $nrpErr = "";
$name = $nrp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
    }
    }

    if (empty($_POST["nrp"])) {
    $nrpErr = "NRP is required";
    } else {
    $nrp = test_input($_POST["nrp"]);
    // check if nrp only contains number and minus (-)
    if (!preg_match("/^[-0-9]*$/",$nrp)) {
        $nrpErr = "Only number and minus (-) allowed";
    }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Contoh Form Cookies PHP</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    NRP: <input type="text" name="nrp" value="<?php echo $nrp;?>">
    <span class="error">* <?php echo $nrpErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $nrp;
echo "<br>";
?>

<?php
$cookie_name = "Mahasiswa";
$cookie_value1 = $name ;
$cookie_value2 = $nrp ;
setcookie($cookie_name, $cookie_value1, time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie($cookie_name, $cookie_value2, time() + (86400 * 30), "/");
?>

<?php
echo "<h2>Ini adalah Cookies:</h2>";
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Nama Cookies '" . $cookie_name . "' is set!<br>";
  echo "Value Cookies is: " . $cookie_value1;
  echo "<br>";
  echo "Value Cookies is: " . $cookie_value2;
}
?>

</body>
</html>