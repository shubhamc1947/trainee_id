<?php
$conn = mysqli_connect('localhost','root','','weknow');
if(!$conn){
	echo "connection failed";
	die();
}
//echo $_GET['id'];

if(isset($_GET['id'])){
  $sql = 'select * from trainee_id where sno = '.$_GET['id'];
  //echo $sql;
$res= '';
  $r = mysqli_query($conn, $sql);
  // echo $_GET['id'];
  if($r){
    $res=mysqli_fetch_assoc($r);
  }
}
//print_r($res);

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trainee ID Card</title>

    <!-- css -->
    <link rel="stylesheet" href="css/style.css" media="screen" />
    <link rel="stylesheet" href="css/print.css" media="print" />
  </head>
  <body>
    <div class="wrap">

      <span class="name" name="name"><?php echo $res['name']; ?></span>

      <span class="trainee">Trainee</span>
      <span class="profile_img">
        <img
          class="profile"
          src="<?php echo 'image/'.$res['profile'] ?>"
          alt="Trainee Picture"
          title="Trainee Picture"
          width="720"
          height="718"
        /> 
        
      </span>

      <div class="container box1">
        <span class="course_enrolled_label">Course Enrolled:</span>
        <span class="course_enrolled"><?php
         echo $res['course_enrolled']?></span>
      </div>

      <div class="container box2">
        <span class="admission_date_label">Admission Date:</span>
        <span class="admission_date"><?php echo $res['admission_date']?></span>
      </div>

      <div class="container box3">
        <span class="dob_label">Date Of Birth:</span>
        <span class="dob_label"><?php echo $res['dob']?></span>
      </div>

      <div class="container box4">
        <span class="contact_no_label">Contact Number:</span>
        <span class="contact_no"><?php echo $res['contact_no']?></span>
      </div>

      <div class="container box5">
        <span class="valid_till_label">Valid till:</span>
        <span class="valid_till"><?php echo $res['valid_date']?></span>
      </div>
    </div>
  </body>
</html>
