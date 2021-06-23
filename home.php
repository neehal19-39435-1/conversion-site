<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CONVERSION SITE</title>
</head>
<body>
     
<?php
define("filepath", "data.txt");       
$converter = $result = $value = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$converter = ($_POST["converter"]);
$value = ($_POST["value"]);
if ($converter=="feet to inch")
{           
$result=$value*12;                 
}
if ($converter=="meters to centimeters")
{           
$result=$value*100;                 
}
if ($converter=="meters to kiometers")
{           
$result=$value/1000;                 
}
$data = array("converter" => $converter,"Value" => $value, "Result" => $result);
$data_encode = json_encode($data);
$res = write($data_encode);
if($res) {
echo "Sucessfully saved.";
}
else {
echo "Error while saving.";
}
}
 function write($content) {
$file = fopen(filepath, "a");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}
?>

     <fieldset>
     	
     	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <span style="color: red"><p>Page 1 [Home]</p></span>
        <span style="color: red"><p>Conversion site</p></span>
        <span style="color: blue">1.</span><a href="home.php">Home</a>
        <span style="color: blue">2.</span><a href="conversion.php">Conversion Rate</a>
        <span style="color: blue">3.</span><a href="history.php">History</a>
        <br></br>
        
        
        <span style="color:red"><p>Converter:</p></span>
        <select id= "converter" name="converter">
        	<option value="feet to inch">feet to inch</option>
        	<option value="meters to centimeters">meters to centimeters</option>
        	<option value="meters to kilometers">meters to kilometers</option>
        </select><br><br><br>
        <label for="val">Value:</label>
        <input type="text" id="val" name="val" pattern="[0-9]+">
        <input type="submit" name="Submit">
        <br></br>
        <label for="result">Result:</label>
        <input type="text" id="result" name="result">


     </fieldset>

<?php
function read() {
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}
?>

</body>
</html>