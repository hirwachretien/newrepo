<?php
$conn=mysqli_connect("localhost","root","","shop");
 
if(isset($_POST['submit'])){
    $a=$_POST['product'];
    $b=$_POST['description'];
    $c=$_POST['price'];
    $d=$_POST['quantity'];
    $e=$_POST['total'];
    
   




$insert=mysqli_query($conn,"insert INTO checking VALUES ('$a','$b','$c','$d','$e')");

if($insert){
    echo("application well received");
}
else{
    echo("application failed");
}
}
?>