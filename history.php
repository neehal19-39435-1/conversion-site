<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<fieldset>
<span style="color: red"><p>Page 3 [History]</p></span>
<span style="color: red"><p>Conversion site</p></span>
<span style="color: blue">1.</span><a href="home.php">Home</a>
<span style="color: blue">2.</span><a href="conversion.php">Conversion Rate</a>
<span style="color: blue">3.</span><a href="history.php">History</a><br><br>
<span style="color: red"><p>Conversion History:</p></span><br><br>
<fieldset>
    
<?php
define("filepath", "data.txt");
$converter = $result = $val = "";
 $fileData = read();
echo "<br><br>";
$fileDataExplode = explode("\n", $fileData);

 echo "<ol>";
for($i = 0; $i < count($fileDataExplode) - 1; $i++) {
$temp = json_decode($fileDataExplode[$i]);
echo "<li>" .$temp->converter."&nbsp;&nbsp;&nbsp;&nbsp;" . $temp->val . "&nbsp;&nbsp;&nbsp;&nbsp;" . $temp->result . "</li>";
}
echo "</ol>";

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
</fieldset>
</fieldset>
</body>
</html>