<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="header">
<form action=""  method="POST" enctype="multipart/form-data">
    <div class="form-input">
        <label for="pdf_file">PDF File</label>
        <input type="file" name="pdf_file" placeholder="Select a PDF file" required="">
    </div>
    <input type="submit" name="submit" class="btn" value="Submit">
</form>
</div>

</body>
</html>


<?php

if(isset($_POST['submit'])){
    include 'vendor/autoload.php'; 
             
    
    $parser = new \Smalot\PdfParser\Parser(); 
     
    
    $file = $_FILES["pdf_file"]["tmp_name"]; 
     
    
    $pdf = $parser->parseFile($file); 
     
    
    $text = $pdf->getText(); 

    $array = explode(' ', $text);


// Table1stcolumn
$arr1 = array();
// Table1st column 2nd data
$arr2 = array();
// Table2nd column
$arr3 = array();

// supplier code/////////
$sup_code = "${array[751]} ${array[752]} ${array[787]}";

// supplier code/////////

// order no
$order = "${array[746]} ${array[747]} ${array[783]}";
//order no 

// Quantity
$qnt = $array[502];
// quantity data////

// quantity val////
$qnt_val = $array[504];
// quantity val////


for($x=505; $x<=645; $x=$x+4){
array_push($arr1,$array[$x]);
};

for($x=506; $x<=646; $x=$x+4){
array_push($arr2,$array[$x]);
};

for($x=508; $x<=648; $x=$x+4){
array_push($arr3,$array[$x]);
};

// print_r($array);

echo "<h3>{$order}</h3>";
echo "<h3>{$sup_code}</h3>";

echo "<table border=1 width=500px>";
for($dloop=0; $dloop<count($arr1); $dloop++){
echo "<tr> 
<td width=200px>$arr1[$dloop] $arr2[$dloop]</td>
<td width=50px>$arr3[$dloop]</td>
</tr>";
};
echo"<tr> 
<td width=200px>$qnt</td>
<td width=50px>$qnt_val</td>
</tr>";
echo"</table>";
}            
?>




