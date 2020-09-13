<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

		<?php  

			if(isset($_POST['send'])){

				$name=$_POST['name'];
				$roll=$_POST['roll'];
				$email=$_POST['email'];
				$cell=$_POST['cell'];
				$age=$_POST['age'];
				$uname=$_POST['uname'];

				$file_name=$_FILES['photo']['name'];
				$file_type=$_FILES['photo']['type'];
				$tmp_name=$_FILES['photo']['tmp_name'];
				$file_size=$_FILES['photo']['size'];

				$unique_file_name=md5(time().rand()).$file_name;

				move_uploaded_file($tmp_name, 'photo/' . $unique_file_name);

				$len=strlen($cell);


				if(empty($name) || empty($roll) || empty($email) || empty($cell) || empty($age) || empty($uname) ){

					$msg='<p class="alert alert-danger">All fields are Required ! <button class="close" data-dismiss="alert">&times;</button></p>';

				}elseif(!filter_var($roll,FILTER_VALIDATE_INT)){

					$msg='<p class="alert alert-danger"> ** Invalid Roll ! <button class="close" data-dismiss="alert">&times;</button></p>';

				}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

					$msg='<p class="alert alert-danger"> ** Invalid Email ! <button class="close" data-dismiss="alert">&times;</button></p>';

				}elseif($len!=11){

					$msg='<p class="alert alert-danger"> ** Invalid Cell Number ! <button class="close" data-dismiss="alert">&times;</button></p>';

				}elseif($age < 18 || $age > 30){

					$msg='<p class="alert alert-danger"> ** You r Not Enter this site ! <button class="close" data-dismiss="alert">&times;</button></p>';

				}else{
					$msg='<p class="alert alert-success"> Data stable ! <button class="close" data-dismiss="alert">&times;</button></p>';
				}
			}



		?>

		<div class="wrap shadow rounded">
			<div class="card">
				<div class="card-body">
					<h2>Add Student Data</h2>
					<?php 
						if(isset($msg)){
							echo $msg;
						}

					 ?>
					<form action="" method="POST" enctype="multipart/form-data">
				
				<div class="form-group">
					<label for="name">Name</label>
					<input name="name" class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="roll">Roll</label>
					<input name="roll" class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input name="email" class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="cell">Cell</label>
					<input name="cell" class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="age">Age</label>
					<input name="age" class="form-control" type="text">
				</div>
				<div class="form-group">
					<label for="uname">Username</label>
					<input class="form-control" name="uname" type="text">
				</div>
				<div class="form-group">
					<label for="photo">Photo</label>
					<input class="form-control p-1" name="photo" type="file">
				</div>
				<div class="form-group">
					
					<input name="send" class="btn btn-primary" type="submit" value="Send">
				</div>
			</form>
				</div>
			</div>
		</div>

	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>