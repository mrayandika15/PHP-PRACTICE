<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h3>Tugas Akhir 3</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  username : <input type="text" name="ID">
 <br> 
  <input type="submit" name="submit" value="Submit">  
</form>


<?php

session_start();
$id = $status = '' ;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = test_input($_POST["ID"]);
    $_SESSION["username"] = $id ;
    if (empty($_POST["ID"])){
        $status = '<br> Tolong Isi Username ';
    }else{
        $status = '<br><a href="lvl1.php">Next Page</a>';
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

echo '<br>';
echo 'Username = ' .$id;
echo $status;

  ?>




    
</body>
</html>
