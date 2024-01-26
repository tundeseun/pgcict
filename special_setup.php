
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
  border: 1px solid #ddd;
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
input[type=text], select {
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

input[type=submit] {
  width: 100%;
  background-color: #1569C7;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #1589FF;
}

div {
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
</style>
</head>

<body>

 
<ul>
 
 
  <li><a href="#">Menu</a></li>
  
</ul>
  <table width="800"  align="center">
    <tbody>
     <tr><td colspan="2"><h3><div align="center">Setup</div></h3></td></tr>
      <tr valign="top">
        <td>

<div>
 <form  method="post">
 <?php 
     
     include('config.php');
     $dept = $_GET['dept'];
     $degree = $_GET['degree'];
      $area  = $_GET['field'];
      $sec  = $_GET['sec'];
     
     


     $query_get_dept = "SELECT id FROM dept_new where department='$dept'";
     $querycon_get_dept = mysqli_query($con,$query_get_dept) or die(mysqli_error($con));
     $row_get_dept = mysqli_fetch_assoc($querycon_get_dept);

     $new_dept_id = $row_get_dept['id'];

     $query_get_deg = "SELECT id FROM degree_new where degree='$degree'";
     $querycon_get_deg = mysqli_query($con,$query_get_deg) or die(mysqli_error($con));
     $row_get_deg = mysqli_fetch_assoc($querycon_get_deg);
     $new_deg_id = $row_get_deg['id'];
   

      
     $query_get_nara = "SELECT distinct naration FROM rendition where dept ='$new_dept_id' and degree = '$new_deg_id' and specialization = '$area'";
     $querycon_get_nara = mysqli_query($con,$query_get_nara) or die(mysqli_error($con));
     $count_nara = mysqli_num_rows($querycon_get_nara);
     
     if($count_nara > 0){
           while($row_get_nara = mysqli_fetch_assoc($querycon_get_nara)){
         
     $nara = $row_get_nara['naration'];
     
     

      echo "<div >";
     echo"<label for='rendition' >Rendition</label>";
     echo"<input type='text' name='rendition' id=rendition class='renF' placeholder='Enter / Select Rendition' list='origin' autocomplete='off'>
     <datalist id='origin'>
     
     <option value='$nara'></option>";
         
         }
     } else {
         echo"<label for='rendition' >Rendition</label>";
         echo"<input type='text' name='rendition' id=rendition class='renF' placeholder='Enter / Select Rendition' >";
     
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
            <th>View NOR</th>
            
            
            <div class='radio'>
        </tr>";
     
 
         
        $sel=mysqli_query($con,"select distinct specialization,surname,othername,result,matric,id,effectivedate,approval,degree,user_id,field_id from biodata where department ='$dept' and degree='$degree' and field_id='$area' and result <>'' and result <>'NG' and result <>'-'  group by matric order by surname ASC") or die(mysqli_error($con));
         
         
         
$a=0;
while($row=mysqli_fetch_array($sel))
{

  
  $user_id_area = $row['user_id'];
  $sel3=mysqli_query($con,"select * from notify ") or die(mysqli_error($con));
  $row_notify=mysqli_fetch_array($sel3);
  $user_notify = $row_notify['user_id'];

  if($user_id_area != $user_notify){

    $sel2=mysqli_query($con,"select distinct field_of_interest from zmain_app where user_id ='$user_id_area' ") or die(mysqli_error($con));


  
  

  while($row_area=mysqli_fetch_array($sel2)){
    $a=$a+1;
       
    $orgDate = $row['effectivedate'];  
    $newDate = date("Y-m-d", strtotime($orgDate));  
    $mat = $row['matric'];
    $user_id =  $row['user_id'];
 
    echo"<tr>";
 echo "<td>$a</td><td><input type=checkbox checked=checked   name=matricno[] id=matricno[] value=".$row['matric'].",".$row['result'].",".$newDate.",".$row['approval'].",".$row['user_id'].",".$row['specialization'].",".$row_area['field_of_interest'].">".$row['matric']."</td><td>".strtoupper($row['surname'])." ".strtolower($row['othername'])."</td><td>".$row['degree']."</td><td>".$row['result']."</td><td>".$row['specialization']."</td><td>".$row_area['field_of_interest']."</td><td>".$newDate."</td><td><a class='btn' target='_blank' href='notification.php?mat=$mat&user_id=$user_id'>View</a></td>";
    
      
        
      

  }
     
  }

  
  


//checked=checked
}
    
  
//}
echo"</tr></table>";
     

    
    
     if(isset($_POST['approve'])){
         $nara = $_POST['rendition'];
        
         $sql_check = "SELECT * FROM rendition WHERE dept = '$new_dept_id' AND degree = '$new_deg_id' AND naration = '$nara' AND specialization = '$area'";
$result = mysqli_query($con,$sql_check) or die(mysqli_error($con));
         $count = mysqli_num_rows($result);

 $sql_check2 = "SELECT * FROM rendition WHERE dept = '$new_dept_id' AND degree = '$new_deg_id' AND naration != '$nara' AND specialization = '$area'";
$result2 = mysqli_query($con,$sql_check2) or die(mysqli_error($con));
         $count2 = mysqli_num_rows($result2);

if ($count2 > 0) {
    $sql_update = "UPDATE rendition SET naration = '$nara' WHERE dept = '$new_dept_id' AND degree = '$new_deg_id' AND specialization = '$area'";
    if (mysqli_query($con,$sql_update) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
} else if($count <= 0) {
    $sql_insert = "INSERT INTO rendition (dept,degree, naration,specialization) VALUES ('$new_dept_id', '$new_deg_id', '$nara', '$area')";
    if (mysqli_query($con,$sql_insert) === TRUE) {
        echo "New record inserted successfully.";
    } else {
        echo "Error inserting new record: " . mysqli_error($con);
    }
} else if($count > 0){
    
    echo "successful.";
} else{
    echo "Unknown.".mysqli_error($con);
}

         
if(!$result){
    echo "Error" . mysqli_error($con);
} else if(!$result2){
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
     //  echo $val[0]."<br>";
       //$con2=mysqli_connect('localhost','root','','pgsui_app_admin');
       
       $notify=mysqli_query($con,"select * from notify where matric='$value2' and student_record='$studrec'") or die(mysqli_error($con));
       $row_notify=mysqli_fetch_array($notify);
       //$date2=$row['date'];
       //$newDate = date("jS F\, Y ", strtotime($date2));  
       $cont_notify=mysqli_num_rows($notify);
       if($cont_notify==0)
       {
           
            mysqli_query($con, "insert into notify (matric,student_record,description,sec,user_id) values ('$value2','$studrec','Result,Effective date, Approval date','$sec','$user_id')") or die(mysqli_error($con)); 
      
     
      
      }
       
      }
         
     
          echo "<script> alert('Results Successfully Approved') </script>";
      
      
       
   
         
          
     }
    
     
     
     
     ?>
     
     
    



  </form>
</div></td>
        
      </tr>
    </tbody>
  </table>

</body>
</html>