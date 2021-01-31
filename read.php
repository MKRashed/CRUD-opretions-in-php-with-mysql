<?php 
 if(isset($_GET['delete'])){
	 
	 $stdid = $_GET['delete'];
	 $conn = mysqli_connect("localhost","root","","crud");
	 
	 $query = "delete from student_info where id={$stdid}";
	 
	 $deletequery = mysqli_query($conn, $query);
	 if($deletequery){
		 echo "query delete hche";
	 }
 }
?>
<!DOCTYPE html>
<html>
<head>
<title>Crud oparetions</title>
<link href="static/css/bootstrap.css" rel="stylesheet"></link>
<link href="static/css/style.css" rel="stylesheet"></link>
</head>
<body>
<div class="container">
<h3 class="addbutton"><a href="index.php">Add Data</a></h3>
<h4>Student Details information</h4>
	<table class="table table-bordered">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Address</th>
				<th>Registration Id</th>
				<th>image</th>
				<th></th>
				<th></th>
			</tr>
			
			<?php
				$conn = mysqli_connect("localhost","root","","crud");
				$query = "select * from student_info";
				$result = mysqli_query($conn, $query);
				if($result->num_rows >0){
					while($rd=mysqli_fetch_assoc($result)){
						$stdid = $rd['id'];
						$name = $rd['name'];
						$email = $rd['email'];
						$address =$rd['address'];
						$regid = $rd['regid'];
						$image = $rd['img'];
						
					
			?>
			<tr>
				<td><?php echo $stdid; ?></td>
				<td><?php echo $name; ?></td>
				<td><?php echo $email; ?></td>
				<td><?php echo $address; ?></td>
				<td><?php echo $regid; ?></td>
				<td><img src="<?php echo $image; ?>" class="img-fluid pic"></td>
				<td><a href="update.php?update=<?php echo $stdid?>" class="btn btn-danger">Update</td>
				<td><a href="read.php?delete=<?php echo $stdid?>" class="btn btn-danger">Delete</td>
			</tr>
				<?php }}?>
		</table
		
</div>

<script src="static/js/bootstrap.js"></script>
<script src="static/js/popper.js"></script>
<script src="static/jQurey.js"></script>
</body>
</html>









			
	