<?php
$conn=mysqli_connect("localhost","root","","shop");
 
if(isset($_POST['submit'])){
    $a=$_POST['name'];
    $b=$_POST['email'];
    $c=$_POST['subject'];
    $d=$_POST['message'];
   




$insert=mysqli_query($conn,"insert INTO contact VALUES ('$a','$b','$c','$d')");

if($insert){
    echo("message well received");
}
else{
    echo("apmessage  failed");
}
}
?>