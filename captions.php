<?php

$conn=mysqli_connect("localhost","root","","captions_hub");

if(isset($_GET['submit'])){
	$search=mysqli_real_escape_string($conn,$_GET['search']);
	
	$query="SELECT Caption FROM caption_hub WHERE Category LIKE '%$search%' OR Caption LIKE '%$search%' ";
	$query1="SELECT Caption FROM caption_hub WHERE Category LIKE '%$search%' OR Caption LIKE '%$search%' ";
	$result=mysqli_query($conn,$query);
	$result1=mysqli_query($conn,$query1);
	$queryResults=mysqli_num_rows($result1);
}
?>
<html lang="en">
<head>
	<title>Search Results</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.html">CaptionsHub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categories.php">Categories</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="about.html" tabindex="-1" aria-disabled="true">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="contact.php" tabindex="-1" aria-disabled="true">
          Contact
        </a>
      </li>
    </ul>
  </div>
</nav>
	<div class="container">
	<?php
	if($queryResults>0){
		echo "<div class='container'><h3>There are ".$queryResults." results for ".$search."<h3></div>";
	}
	else{
		echo '<script type="text/javascript">';
  		echo 'alert("Failed to find results matching your search.");';
  		echo 'window.location.href="categories.php";';
  		echo '</script>';
	}
	?>
	<table class="table">
	<thead>
	<tr>
		<td><h3>No</h3></td>
		<td><h3>Captions</h3><td>
	<tr>
	
	</thead>
	<tbody>
	
	<?php 
	$i=1;
	while($row=mysqli_fetch_assoc($result)){
	echo "<tr><td>".$i."</td>";
	echo "<td>".$row['Caption']."</td></tr>";
	$i++;}
	?>	
	
	</tbody>
	</table>
</div>

<footer>
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-6">
				<a href="index.html"><img src="logo-footer.png" id="footer-logo"></a>
				<hr class="light">
				<p>captionshub@gmail.com</p>
				<p>Karnataka, India</p>
			</div>
			<div class="col-md-6">
				<b>Our Hours</b>
				<hr class="light">
				<p>Monday : 9am - 5pm</p>
				<p>Saturday : 9am - 5pm</p>
				<p>Sunday : closed</p>
			</div>
			<div class="col-12">
				<hr class="light-100">
				<h5>© captionshub.com</h5>
			</div>
		</div>
	</div>
</footer>
</body>
</html>