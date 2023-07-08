<!-- insert data code -->
<?php
include('image_upload.php');
$res='';
if(isset($_POST['name'])){
  //echo 'test';
  $target_dir = 'image/';
  if(!is_dir($target_dir)){
    mkdir($target_dir);
  }
  //echo $target_dir;
  $res = upload_img($_FILES['profile'],$target_dir,$_POST['name']);
  // print_r($res);
}
//creating connection to db
$conn = mysqli_connect('localhost','root','','weknow');
if(!$conn){
	echo "connection failed";
	die();
}



if(isset($_POST['name'])){
	if(isset($_POST['edit']) && $_POST['edit'] != ''){
		$sql = 'update trainee_id set 
				name = "'.$_POST['name'].'" ,
				course_enrolled = "'.$_POST['course_enrolled'].'" ,
				contact_no = "'.$_POST['contact_no'].'" ,
				admission_date = "'.$_POST['admission_date'].'" ,
				dob = "'.$_POST['dob'].'" ,
				valid_date = "'.$_POST['valid_date'].'",
				profile = "'.$_POST['profile'].'"
				 where sno = '.$_POST['edit'];
		// echo $sql;
		mysqli_query($conn, $sql);
		if(mysqli_errno($conn)){
			echo "Updation failed".mysqli_errno($conn).mysqli_error($conn);
		}
		else{
			// echo "Successfully updated";
		}
	}
	else{
		//inserting value to database
		$sql = 'insert into trainee_id(name,course_enrolled, contact_no, admission_date,dob,valid_date, profile) value("'.$_POST['name'].'","'.$_POST['course_enrolled'].'","'.$_POST['contact_no'].'","'.$_POST['admission_date'].'","'.$_POST['dob'].'","'.$_POST['valid_date'].'","'.$res['file_name'].'")';
	// echo $sql;
	mysqli_query($conn,$sql);
	if(mysqli_errno($conn)){
		echo "Insertion failed".mysqli_errno($conn).mysqli_error($conn);
	}
	else{
		// echo "Data inserted";
	}

	}
	

}

if(isset($_GET['del'])){
	$sql = 'delete from trainee_id where sno = '.$_GET['del'];
	// echo $sql;
	$res = mysqli_query($conn,$sql);
	if(mysqli_errno($conn)){
		echo "Deletion failed:".mysqli_error($conn);
	}
	else{
		// echo "successfully deleted";
	}
}
if(isset($_GET['edit'])){
	$sql = 'select * from trainee_id where sno = '.$_GET['edit'];
	$qry = mysqli_query($conn, $sql);
	$res = mysqli_fetch_assoc($qry);
}
?> 



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trainee ID-Card form</title>
   <!-- css -->
   <link rel="stylesheet" href="css/index_style.css">
</head>
<body>

	<h1>Trainee Identity Card Form</h1>
   
   <div class="wrap">
      <div class="cont">
         <form action="index.php" method="POST" enctype="multipart/form-data">
         <!-- <form action="result.php" method="POST" enctype="multipart/form-data"> -->
			 <table >
				<tr>
					<td>
						<label for="">Full Name :</label>
					</td>
					<td>
						<input type="text" name="name" id="name" value="<?php echo isset($_GET['edit'])? $res['name']: '' ?>"  required>
					</td>
				</tr>
				<tr>
					<td>
						<label for="">Course Enrolled :</label>
					</td>
					<td>
						<select name="course_enrolled" id="course_enrolled" required >
		
							<option value="" disabled selected >Choose an options :</option>
		
							<option value="Web Development">Web Development</option>
		
							<option value="Accounts">Accounts</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label for="">Contact No. :</label>
						
					</td>
					<td>
						<input type="text" name="contact_no" id="contact_no"   value="<?php echo isset($_GET['edit'])? $res['contact_no']: '' ?> "  required>
					</td>
				</tr>
				<tr>
					<td>
						<label for="">Admission Date :</label>
					</td>
					<td>
						<input type="date" name="admission_date" id="admission_date" value="<?php echo isset($_GET['edit'])? $res['admission_date']: '' ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="">Date of Birth :</label>
					</td>
					<td>
						<input type="date" name="dob" id="dob" value="<?php echo isset($_GET['edit'])? $res['dob']: '' ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="">Validity Date :</label>
					</td>
					<td>
						<input type="date" name="valid_date" id="valid_date" value="<?php echo isset($_GET['edit'])? $res['valid_date']: '' ?>">
					</td>
				</tr>
				<tr>
					<td>
						<label for="">Upload your Picture :</label>               

					</td>
					<td>
						<input class="file" type="file" name="profile" id="profile">
					</td>
				</tr>
				<tr>
					<td>

					</td>
					<td class="submit">
						<input class="submit_btn" type="submit" value="submit">	
					</td>
					</tr>
			</form>
			
		</table>
         
      </div>
   </div>
    <div class="container">
		<table class='table'>
			<tr>
				<th>sno</th>
				<th>Trainee Name</th>
				<th>Profile Image</th>
				<th>Course Enrolled</th>
				<th>Admission Date</th>
				<th>Date of Birth</th>
				<th>Contact Number</th>
				<th>Valid Till</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>view</th>
			</tr>
			<?php 
				$id = 1;
				$sql = 'select * from trainee_id';
				$result = mysqli_query($conn, $sql);
				// print_r($result);
				if($result){
					while($row = mysqli_fetch_assoc($result)){
						echo '<tr>
							<td>'.$id++.'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['profile'].'</td>
							<td>'.$row['course_enrolled'].'</td>
							<td>'.$row['admission_date'].'</td>
							<td>'.$row['dob'].'</td>
							<td>'.$row['contact_no'].'</td>
							<td>'.$row['valid_date'].'</td>
							<td><a href="index.php?edit='.$row['sno'].'"> Edit</a></td>
							<td><a href="index.php?del='.$row['sno'].'"> Del</a></td>
							<td><a href="result.php?id='.$row['sno'].'"> View</a></td>
						</tr>';
					}
				}
			?>
		</table>
	</div>

  
	
</body>
</html>