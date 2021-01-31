<!DOCTYPE html>
<html>
<head>
<title>Crud oparetions</title>
<link href="static/css/bootstrap.css" rel="stylesheet"></link>
<link href="static/css/style.css" rel="stylesheet"></link>
</head>
<body>
<div class="container">
	<div class="col-sm-6">
		<h4>Student information</h4>
		<form method="post" action="" enctype="multipart/form-data">
				<div class="form-control">
					<label>Name</label>
					<input type="text" name="name" value="" class="form-control" placeholder='name'>
				</div>
				<div class="form-control">
					<label>Email</label>
					<input type="text" name="email" value="" class="form-control" placeholder='email'>
				</div>
				<div class="form-control">
					<label>Address</label>
					<input type="text" name="address" value="" class="form-control" placeholder='address'>
				</div>
				<div class="form-control">
					<label>Registration Id</label>
					<input type="number" name="regid" value="" class="form-control" placeholder='registration id'>
				</div>
				<div class="form-control">
					<input type="file" name="filename" class="form-control">
				</div>
				
				<div class="mb-3">
					<button class="btn btn-success" type="submit" name="save" >Save</button>
				</div>
			</form>     
	</div>
	
	</div>
</div>

<script src="static/js/bootstrap.js"></script>
<script src="static/js/popper.js"></script>
<script src="static/jQurey.js"></script>
</body>
</html>

<?php
 $conn = mysqli_connect("localhost","root","","crud");

 if(isset($_POST['save'])){
	 $name = $_POST['name'];
	 $email = $_POST['email'];
	 $address = $_POST['address'];
	 $regid = $_POST['regid'];
	 $filename =$_FILES['filename'];
	 //print_r($filename);


	$imgfile = $filename['name'];
	$imgpath = $filename['tmp_name'];
	$fileerror = $filename['error'];

	if($fileerror == 0){
		$destfile = 'upload/'.$imgfile;
		move_uploaded_file($imgpath, $destfile);
	}
	if(!empty($name) && !empty($email) && !empty($address) && !empty($regid) && !empty($filename)){
		 $query = "INSERT INTO student_info( name,email,address,regid,img)VALUE('$name','$email','$address',$regid,'$destfile')";
		 $createquery = mysqli_query($conn, $query);
		 if($createquery){
			 header("location: read.php");
			exit;
		 }
	}
	else{
		echo "should is be empty";
	}
	 
	 
 }
?>
























