<?php

$conn=mysqli_connect('localhost','root','','captions_hub');
if(isset($_POST['submit'])){
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $message=mysqli_real_escape_string($conn,$_POST['message']);
  
  $query=" INSERT INTO responses VALUES ('$email','$name','$message') ";
  $result=mysqli_query($conn,$query); 
  echo '<script type="text/javascript">';
  echo 'alert("Your response has been recorded successfully.");';
  echo 'window.location.href="index.html";';
  echo '</script>';
 }
?>