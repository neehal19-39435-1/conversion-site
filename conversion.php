<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php

$converter = $result = $val = "";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Conversion</title>
</head>
<body>
<?php 
$crateErr = $valErr = $resultErr = "";
$crate = $val = $result = "";
$flag = false;
$temp = 0;
define("filepath", "data2.txt");
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

if (empty($_POST["crate"])) 
    {  
       $crateErr = " Please input value ";
       $flag = True;  
    } 

if (empty($_POST["val"])) 
    {  
       $valErr = " Please input value ";
       $flag = True;  
    } 
if (empty($_POST["result"])) 
    {  
       $resultErr = "Please input value";
       $flag = True;  
    } 
 
if(!$flag) 
    {
   
    $crate = input_data($_POST["crate"]);
    if(is_numeric($_POST["val"]))
    {
        $val = input_data($_POST["val"]);
    }
    else
    {
          $valErr = "Value must be in numeric form";
    }
    if(is_numeric($_POST["result"]))
    {
        $result = input_data($_POST["result"]);
        
    }
    else
    {
          $resultErr = "Value must be in numeric form";
    }
    $data = array("rate" => $crate,"value" => $val, "result" => $result);
    $data_encode = json_encode($data);
    write($data_encode); 
    $res = write($data_encode);
    if($res) {
    echo "Sucessfully saved.";
    }
    else {
    echo "Error while saving.";
    }
    
    }
 }
  function input_data($data) 
  {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }
 function write($content) {
$file = fopen(filepath, "a");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<fieldset>
<span style="color: red"><p>Page 2 [Conversion Rate]</p></span>
<span style="color: red"><p>Conversion site</p></span>
<span style="color: blue">1.</span><a href="home.php">Home</a>
<span style="color: blue">2.</span><a href="conversion.php">Conversion Rate</a>
<span style="color: blue">3.</span><a href="history.php">History</a><br><br>
<span style="color: red"><p>Conversion Rate:</p></span><br>
<input type="text" id="crate" name="crate" >
<span style="color: red"><?php echo $crateErr; ?> </span>
<input type="text" id="val" name="val" >
<span style="color: red"><?php echo $valErr; ?> </span>
<input type="text" id="result" name="result" >
<span style="color: red"><?php echo $resultErr; ?> </span>
<input type="submit" name="Submit" value="submit">
</fieldset>
</form>
</body>
</html>