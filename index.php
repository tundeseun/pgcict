<?php
$conn= new mysqli("localhost", "root", "", "pginhouse");


if ($conn->connect_error) {
	# code...
	die("could not connect." .$conn->connect_error);
}
$message = '';
if (isset($_POST['submit'])) {
$confirm ="SELECT * FROM transinvoice WHERE invoiceno ='".$_POST["invoiceno"]."' AND amount_paid ='700' AND purpose LIKE '%Reprint of Registration%'";
$res = $conn->query($confirm);
$r =$res->fetch_array(MYSQLI_ASSOC);
if($r){
$appno = $_POST['appno'];
  $status = $_POST['status'];
  $sql ="SELECT * FROM new WHERE numeration ='$appno'";
  $result = $conn->query($sql);
  $row = $result->fetch_array(MYSQLI_ASSOC);
if ($row) {
    $update ="UPDATE new SET activated = '$status' WHERE numeration ='$appno'";
    $conn->query($update);
    $message = " <div class='alert'>
              <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
               Command executed successfully!
            </div>";
  }else {
    $message = " <div class='alert2'>
              <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
               Unable to execute the command!
            </div>";
  }
}else{
	$message = " <div class='alert2'>
              <span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span> 
               Payment Record Not Found!
            </div>";
}
  
  
}
?>
<!DOCTYPE html>
<html>
<title>The Post Graduate College U.I</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-

EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 

crossorigin="anonymous"></script>
<style>
.alert {
  padding: 10px;
  background-color: green;
  color: white;
  width: 100%;
}
.alert2 {
  padding: 10px;
  background-color: red;
  color: white;
  width: 100%;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: red;
}
.record{
  border:1px solid black;
  padding: 5px;
  text-align: left;
}
.div{
  margin-bottom: 20px;
  width: 600px;
}
</style>
<body style="background-color:whitesmoke">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:skyblue">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:white"><img src="pg.png" alt="logo" height="50"> The Postgraduate College U.I</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-

label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        
      </div>
    </div>
  </div>
</nav>
<div class="container">
  <div class="" style="padding-top:100px">
    <div style="background-color:white; padding:100px; max-width:600px; margin:auto">
    <?php echo $message?>
      <form action="" method="POST">
        <div class="form-group">
          <label for="">Matric Number</label>
          <input type="text" name="matric" class="form-control" id="phone" placeholder="Enter Matric Number">
          
        </div>
	<div class="form-group">
          <label for="">Type</label>
          <input type="text" name="type" class="form-control" id="phone" placeholder="Enter Type">
          
        </div>
		<div class="form-group">
          <label for="">Location</label>
          <input type="text" name="location" class="form-control" id="phone" placeholder="Enter location">
          
        </div>
		<div class="form-group">
          <label for="">Amount</label>
          <input type="text" name="amount" class="form-control" id="phone" placeholder="Enter Amount">
          
        </div>
		<div class="form-group">
          <label for="">Destination Address</label>
          <input type="text" name="desti" class="form-control" id="phone" placeholder="Enter Destination">
          
        </div>
       
        <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>

  </div>
</div>




</body>
</html>
