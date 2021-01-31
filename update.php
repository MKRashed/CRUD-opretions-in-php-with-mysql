
<!DOCTYPE html>
<html>
<head>
<title>Crud oparetions</title>
<link href="static/css/bootstrap.css" rel="stylesheet"></link>
<link href="static/css/style.css" rel="stylesheet"></link>
</head>
<body>
<div class="container">
			<?php
				$conn = mysqli_connect("localhost","root","","crud");
				if(isset($_GET['update'])){
				 $stdid = $_GET['update'];				 
				 $query = "select * from student_info where id={$stdid}";
				 $updatequery = mysqli_query($conn, $query);
				 while($rd=mysqli_fetch_assoc($updatequery)){
					$name = $rd['name'];
					$email = $rd['email'];
					$address =$rd['address'];
					$regid = $rd['regid'];
					
					
			?>
			<form method="post" action="">
				<div class="form-control">
					<label>Name</label>
					<input type="text" name="name" value="<?php echo $name;?>" class="form-control">
				</div>
				<div class="form-control">
					<label>Email</label>
					<input type="text" name="email" value="<?php echo $email;?>" class="form-control" placeholder='email'>
				</div>
				<div class="form-control">
					<label>Address</label>
					<input type="text" name="address" value="<?php echo $address;?>" class="form-control" placeholder='address'>
				</div>
				<div class="form-control">
					<label>Registration Id</label>
					<input type="number" name="regid" value="<?php echo $regid;?>" class="form-control" placeholder='registration id'>
				</div>
				<div class="mb-3">
					<button class="btn btn-primary" type="submit" name="update" >Update</button>
				</div>
			</form>  
			
			<?php }}?>
			
			<?php
				$conn = mysqli_connect("localhost","root","","crud");
				if(isset($_POST['update'])){
					$name = $_POST['name'];
					$email = $_POST['email'];
					$address = $_POST['address'];
					$regid = $_POST['regid'];
					$query = "update student_info set name='$name',email='$email',address='$address',regid=$regid where id={$stdid}";
					$upquery = mysqli_query($conn,$query);
					if($upquery){
						echo "update sccessful!";
						header("location: read.php");
					}
				}
			?>
		</table
		
</div>

<script src="static/js/bootstrap.js"></script>
<script src="static/js/popper.js"></script>
<script src="static/jQurey.js"></script>
</body>
</html>









			
	