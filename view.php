<?php
include('config.php');
// $notify = mysqli_query($con,"select * from notify") or die(mysqli_error($con));
$d=$_GET['dept'];
$d2=$_GET['degree'];
$field=$_GET['field'];
$sec=$_GET['sec'];
$date=$_GET['effectivedate'];



if(isset($_POST['submit'])){
  $matric = $_POST['matric'];
  $query= "SELECT  * FROM notify Where matric= $matric";
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_array($result);
  $count=mysqli_num_rows($result);
  if($count > 0){
    $query= "Delete  from notify Where matric= $matric";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  if($result){
    echo "<script>alert('Approval Successfully Undone');window.location.href='view.php?dept=$d&degree=$d2&field=$field&sec=$sec&effectivedate=$date';</script>";
  }
  } elseif ($count <= 0) {
    echo "<script>alert('The student with matriculation number $matric NOR has not been granted approval previously.');window.location.href='view.php?dept=$d&degree=$d2&field=$field&sec=$sec&effectivedate=$date';</script>";

  }

  
}


?>
<!doctype html>
<html>
<head>
<script type="text/javascript" src="selectnaration.js"></script>
<meta charset="utf-8">
<title></title>
<link href="all.min.css" rel="stylesheet">
		<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #1569C7;
}
</style>
		
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 1000px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
    text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #1569C7;
  color: white;
}
    
    .btna{
        background: #28a745;
        border-radius: 0.5rem;
        border: 1px solid #28a745;
        padding: 0.2rem 0.5rem;
        color: #fff;
        cursor: pointer;
        width: 100%;
        text-align: center;
        text-decoration: none;
    }
    .d-none{
  margin-top: 0.75rem !important;
}

    label {
      color: #0a2b4f;
      display: block;
      font-weight: bold;
    }

    /* .modal-body{
      padding-bottom: 0!important;
    }
    .modal-footer{
      border: none !important;
      padding-top: 0;
    } */
    
   .modal-body input {
      padding-left: 2rem !important;
      padding-top: 0.5rem !important;
      padding-bottom: 0.5rem !important;
      border-radius: 0.4rem;
      margin-bottom: 0.5rem;
      width: 100%;
      outline: none;
      border: 1px solid #0a2b4f;



    }
    .form{
      padding-left: 6rem;
      padding-right: 6rem;
    }
</style>

</head>

<body>

 
<ul>
 
 
  
  <li><a href='approval.php?dept=<?php echo $d?>&degree=<?php echo $d2?>&field=<?php echo $field?>&sec=<?php echo $sec?>&effectivedate=<?php echo $date ?>'>Back</a></li>
  <button type='button' class='d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm' data-toggle='modal' data-target='#addHod'>
  <i class='fas fa-plus fa-sm text-white-50'></i> Undo Approval
</button>


<div class='modal fade' id='addHod' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalCenterTitle'>Undo Approval</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>

      <form method='post' action='' class='form'>
      
      <div class='modal-body'>
      
      <div class='form-group'>
      
      <label for='matric'>Enter Matric Number:</label>
      <input type='text' name='matric' id='matric'>
      </div>
      </div>
      <div class='modal-footer'>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                      <input type='submit' value='Submit' class='btn btn-success' name='submit'>
                      
      </div>
      </form>
    </div>
  </div>
</div>

  
  
</ul>
  <table id='customers' align='center'>
   <tr>

            <th>S/N</th>

            <th>Matric</th>
            <th>FullName</th>            
            <th>Degree</th>            
            <th>View NOR</th>
         
                </tr>
                <?php
      $a=0;
      
      
          
    $biodata = mysqli_query($con,"SELECT DISTINCT surname, othername, degree_new.degree, notify.matric, notify.user_id FROM biodata INNER JOIN notify ON notify.user_id=biodata.user_id INNER JOIN degree_new ON degree_new.id=biodata.degree_id WHERE notify.user_id=biodata.user_id AND dept_id ='$d' AND degree_id='$d2'") or die(mysqli_error($con));
          while($row_biodata = mysqli_fetch_array($biodata)){
           
            $matric = $row_biodata['matric'];
            $user_id = $row_biodata['user_id'];
              $fName = $row_biodata['othername'];
              $sName = $row_biodata['surname'];
              $degree = $row_biodata['degree'];
             
              $a=$a+1;


      ?>
                <tr>
                   <td><?php echo $a; ?></td>
                    <td><?php echo $matric; ?></td>
                    <td><?php echo $sName." ".$fName; ?></td>
                    <td><?php echo $degree; ?></td>
                    <td><a target="_blank" class="btna" href='notification.php?mat=<?php echo $matric; ?>&user_id=<?php echo $user_id; ?>'>View</a></td>
                </tr>
                
                <?php
                }

      ?>
    </table>
    
</body>
<script src="jquery.min.js"></script>
<script src="bootstrap.bundle.min.js"></script>
</html>