<?php
include('config.php');
     
     $msg1 = '';
     $msg2 = '';
     $dept = $_GET['dept'];
     $degree = $_GET['degree'];
     $area  = $_GET['field'];
     $sec  = $_GET['sec'];
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
        echo "<script>alert('Approval Successfully Undone');window.location.href='speM.php?dept=$dept&degree=$degree&field=$area&sec=$sec&effectivedate=$date';</script>";
      }
      } elseif ($count <= 0) {
        echo "<script>alert('The student with matriculation number $matric NOR has not been granted approval previously.');window.location.href='speM.php?dept=$dept&degree=$degree&field=$area&sec=$sec&effectivedate=$date';</script>";
    
      }
    
      
    }

     $newDateForm = date("m/d/Y", strtotime($date));  
     $newDateForm2 = date("Y/m/d", strtotime($date)); 
     

?>

<!doctype html>
<html>
<head>
<script type="text/javascript" src="selectnaration.js"></script>

<meta charset="utf-8">
<title></title>
		
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
  text-decoration: none;
  color: #fff;
}

.active {
  background-color: #1569C7;
}
</style>
		
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd !important;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #1569C7;
  color: white;
}
</style>
<style>
.renF {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.bub {
  width: 100% !important;
  background-color: #1569C7 !important;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.bub:hover {
  background-color: #1589FF;
}

.ddd {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
body {
	background-image: url(images/banner.jpg);
}
label {
    float: left;
    margin: 1px;
}
    
    .ren{
        display: flex;

    }
    .renF{
        margin-right: 1rem;
    }
    .btn{
        background: #28a745;
        border-radius: 0.5rem;
        border: 1px solid #28a745;
        padding: 0.5rem;
        color: #fff;
        cursor: pointer;
    }
    
    .display{
        display: block !important;
    }
    
    .hide{
        display: none !important;
    }
    .d-none{
  margin-top: 0.75rem !important;
}

.modal-body label {
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
   
td{
  color: #111 !important;
}
</style>

<link href="all.min.css" rel="stylesheet">
</head>

<body>

 
<ul>




 
 
  <li><a href="setup.php">Choose Another Department</a></li>
  <li><a target="_blank" href='view.php?dept=<?php echo $dept ?>&degree=<?php echo $degree ?>&field=<?php echo $area ?>&sec=<?php echo $sec ?>&effectivedate=<?php echo $date ?>'>View Approved Result</a></li>
  <button type='button' class='d-none d-sm-inline-block btn btn-sm btn-success shadow-sm' data-toggle='modal' data-target='#addHod'>
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
  <table width="800"  align="center">
    <tbody>
     <tr><td colspan="2"><h3><div class="ddd" align="center">Setup</div></h3></td></tr>
      <tr valign="top">
        <td>

<div>
 <form  method="post">
 <?php
     

      
     $query_get_nara = "SELECT distinct naration FROM rendition where dept ='$dept' and degree = '$degree' and specialization = '$area'";
     $querycon_get_nara = mysqli_query($con,$query_get_nara) or die(mysqli_error($con));
     $count_nara = mysqli_num_rows($querycon_get_nara);
     
     if($count_nara > 0){
           while($row_get_nara = mysqli_fetch_assoc($querycon_get_nara)){
         
     $nara = $row_get_nara['naration'];
     
     

      echo "<div class='ddd'>";
     echo"<label for='rendition' >Rendition</label>";
     echo"<input type='text' name='rendition' id=rendition class='renF' placeholder='Enter / Select Rendition' list='origin' autocomplete='off' required>
     <datalist id='origin'>
     
     <option value='$nara'></option>";
         
         }
     } else {
         echo"<label for='rendition' >Rendition</label>";
         echo"<input type='text' name='rendition' id=rendition class='renF' placeholder='Enter / Select Rendition' required>";
     
     }
     
   
     
     echo "</datalist>";
     echo "</div>";
     echo"<input class='bub' type=submit value=Approve name='approve'>";
  
     
     

      echo "<table id='customers' align='center'>
        <tr>

            <th>S/N</th>

            <th>Matric</th>
            <th>FullName</th>
            <th>Degree of Study</th>
            <th>Proceed To</th>
            <th>Area of Specialisation cgpa</th>
            <th>Area of Specialisation Online</th>
            <th>Effective Date</th>
           
            
            
            <div class='radio'>
        </tr>";
     
 
         
      $sel=mysqli_query($con,"select distinct specialization,surname,othername,result,matric,id,effectivedate,approval,degree_id,user_id,field_id from biodata where dept_id ='$dept' and degree_id='$degree' and field_id='$area' and (effectivedate='$date' OR effectivedate='$newDateForm' OR effectivedate='$newDateForm2') and result <>'' and result <>'NG' and result <>'-'  group by matric order by surname ASC") or die(mysqli_error($con));
    
         
         
         
$a=0;
while($row=mysqli_fetch_array($sel))
{
    
    

  
  $user_id_area = $row['user_id'];
  $field_id_area = $row['field_id'];
  $degree_id_area = $row['degree_id'];
    
  $sel3=mysqli_query($con,"select * from notify where user_id = '$user_id_area'") or die(mysqli_error($con));
  $row_notify=mysqli_fetch_array($sel3);
    $count_notify = mysqli_num_rows($sel3);
    if($count_notify > 0){
    
  $user_notify = $row_notify['user_id'];
        
    } else {
        $user_notify = '';
    }
    
    
    
  if($user_id_area != $user_notify){

    
    $sel2=mysqli_query($con,"select field_new.field_title from zmain_app inner join field_new on zmain_app.field_of_interest = field_new.id where zmain_app.user_id ='$user_id_area'") or die(mysqli_error($con));
    $row_area=mysqli_fetch_array($sel2);
  
    $sel_degree=mysqli_query($con,"select degree from degree_new where id ='$degree_id_area'") or die(mysqli_error($con));
    $row_degree=mysqli_fetch_array($sel_degree);

    $sel_field=mysqli_query($con,"select field_title AS specialization from field_new where id ='$field_id_area'") or die(mysqli_error($con));
    $row_field=mysqli_fetch_array($sel_field);
 
    $a=$a+1;
       
    
    $orgDate = $row['effectivedate'];  
    $newDate = date("Y-m-d", strtotime($orgDate));  
    $mat = $row['matric'];
    $user_id =  $row['user_id'];
 
    echo"<tr>";
 echo "<td>$a</td><td><input type=checkbox checked=checked   name=matricno[] id=matricno[] value=".$row['matric'].",".$row['result'].",".$newDate.",".$row['approval'].",".$row['user_id'].",".$row_field['specialization'].",".$row_area['field_title'].">".$row['matric']."</td><td>".strtoupper($row['surname'])." ".strtolower($row['othername'])."</td><td>".$row_degree['degree']."</td><td>".$row['result']."</td><td>".$row_field['specialization']."</td><td>".$row_area['field_title']."</td><td>".$newDate."</td>";

     
  } 
  
  


//checked=checked
}
    
  
//}
echo"</tr></table>";
     

    
    
     if(isset($_POST['approve'])){
         $nara = $_POST['rendition'];
        
         $sql_check = "SELECT * FROM rendition WHERE dept = '$dept' AND degree = '$degree' AND naration = '$nara' AND specialization = '$area'";
$result = mysqli_query($con,$sql_check) or die(mysqli_error($con));
         $count = mysqli_num_rows($result);


if ($count > 0) {
    $sql_update = "UPDATE rendition SET naration = '$nara' WHERE dept = '$dept' AND degree = '$degree' AND specialization = '$area'";
    if (mysqli_query($con,$sql_update) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
} else if($count <= 0) {
    $sql_insert = "INSERT INTO rendition (dept,degree, naration,specialization) VALUES ('$dept', '$degree', '$nara', '$area')";
    if (mysqli_query($con,$sql_insert) === TRUE) {
        echo "New record inserted successfully.";
    } else {
        echo "Error inserting new record: " . mysqli_error($con);
    }
} 

         
if(!$result){
    echo "Error" . mysqli_error($con);
}
   
         
         
         
         
            
      $matric = $_POST['matricno'];
         global $sec;
     foreach ($_POST['matricno'] as $value) 
     {
      $val=explode(",",$value);
      $value2=$val[0];
      $studrec=$val[1].",".$val[2].",".$val[3];
	  $user_id=$val[4];
   
       $notify=mysqli_query($con,"select * from notify where matric='$value2' and student_record='$studrec'") or die(mysqli_error($con));
       $row_notify=mysqli_fetch_array($notify);
        
       $cont_notify=mysqli_num_rows($notify);
         $alertShown = false;
       if($cont_notify==0)
       {
           
            $result_notify = mysqli_query($con, "insert into notify (matric,student_record,description,sec,user_id) values ('$value2','$studrec','Result,Effective date, Approval date','$sec','$user_id')") or die(mysqli_error($con)); 
      
     if ($result_notify) {
     
         $msg1 = "<script> alert('Results Successfully Approved')</script>";
         $msg2 = "<script> location.reload() </script>";
             
             
            }
      
      }
         
         
         
       
      }
         
         echo $msg1;
         echo $msg2;
         
   
         
          
     }
    
     
     
     
     ?>
     
     


  </form>
</div></td>
        
      </tr>
    </tbody>
  </table>

  <script src="jquery.min.js"></script>
<script src="bootstrap.bundle.min.js"></script>
</body>
</html>