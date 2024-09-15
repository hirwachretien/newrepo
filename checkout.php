<?php
$conn=mysqli_connect("localhost","root","","shop");
 
if(isset($_POST['submit'])){
    $a=$_POST['name'];
    $b=$_POST['address'];
    $c=$_POST['city'];
    $d=$_POST['phone'];
  
   




$insert=mysqli_query($conn,"insert INTO checking VALUES ('$a','$b','$c','$d')");

if($insert){
    echo("checkout well received");
}
else{
    echo("checkout failed");
}
}
?>