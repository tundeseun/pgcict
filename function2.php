<style>
    .display{
        display: block !important;
        cursor: pointer;
        margin-top: 1rem;
    }
    
    .hide{
        display: none ;
        cursor: pointer;
    }
    

</style>
   <form method="post">
   
    <div align="center"><input type='submit' name='resolve' id='resolve' class='hide button' value='Resolve Specialization' /></div>
    <div align="center"><input type='submit' name='naration' id='submit' class='hide button' value='Proceed to Assign Naration' /></div>
    <br>
    <div class="result">
    </div>
    <table id="customers" align="center">
        <tr>

            <th>S/N</th>

            <th>Matric</th>
            <th>FullName</th>
            <th>Degree of Study</th>
            <th>Proceed To</th>
            <th>Area of Specialisation cgpa</th>
            <th>Area of Specialisation Online</th>
            
            <th>Effective Date</th>
            
            
            <div class="radio">
        </tr>


        <?php

function showrecord($dept,$degree,$field,$sec)
{
  include('config.php');
//   $sel_dept_a=mysqli_query($con,"select id from dept_new where department='$dept'") or die(mysqli_error($con));
// $row_a=mysqli_fetch_array($sel_dept_a);
// $dept2_a=$row_a['id'];

//  $sel_dept_b=mysqli_query($con,"select id from degree_new where degree='$degree'") or die(mysqli_error($con));
// $row_b=mysqli_fetch_array($sel_dept_b);
// $deg2_b=$row_b['id'];

    if(isset($_POST['naration'])){
        header('Location: speM.php?dept='.$dept.'&degree='.$degree.'&field='.$field.'&sec='.$sec.'');
    }
 
	
	//echo $field."<br>";

    $a=0;
$iddd=0;
    
$iddd_f=0;


$sel=mysqli_query($con,"select distinct specialization,surname,othername,result,matric,id,effectivedate,approval,degree,user_id,field_id from biodata where department ='$dept' and degree='$degree' and field_id='$field' and result <>'' and result <>'NG' and result <>'-'  group by matric order by effectivedate ASC") or die(mysqli_error($con));
  

   
while($row=mysqli_fetch_array($sel))
{
   
  $zmainsel=mysqli_query($con,"select user_id from zmain_app where department ='$dept' and degree='$degree' and field_of_interest='$field'");
  $row3=mysqli_fetch_array($zmainsel);
    
  $user_id_area = $row3['user_id'];
  echo $user_id_area."<br>";
   
  $sel3=mysqli_query($con,"select * from notify where user_id = '$user_id_area'") or die(mysqli_error($con));
  $row_notify=mysqli_fetch_array($sel3);
   $count_notify = mysqli_num_rows($sel3);
   // echo $count_notify."<br>";
    if($count_notify > 0){
    
  $user_notify = $row_notify['user_id'];
        
    } else {
        $user_notify = '';
    }
//echo $user_notify."<br>";
  if($user_id_area != $user_notify){

    $sel2=mysqli_query($con,"select distinct field_new.field_title,field_new.id from zmain_app inner join field_new on zmain_app.field_of_interest=field_new.id  where zmain_app.user_id ='$user_id_area' ") or die(mysqli_error($con));

  $sel23=mysqli_query($con,"select distinct field_new.field_title,field_new.id from zmain_app inner join field_new on zmain_app.field_of_interest=field_new.id  where zmain_app.user_id ='$user_id_area' ") or die(mysqli_error($con));

  $row_area=mysqli_fetch_array($sel2);
    
     // echo $row_area['field_title'];
      $sel_nn=mysqli_query($con,"select distinct field_id from biodata where user_id ='$user_id_area'") or die(mysqli_error($con));
    
    while($row_area_nn=mysqli_fetch_array($sel_nn)){
        $new_idd = $row_area_nn['field_id'];
        if($new_idd>0)
        {
  $iddd += $new_idd;
        }
    }

      
//     
      while($row_area2=mysqli_fetch_array($sel23)){
          $valueTable2 = $row_area2['id'];
          $iddd_f +=$valueTable2;

         
      }
       
    $a=$a+1;
      
    $orgDate = $row['effectivedate'];  
    $newDate = date("Y-m-d", strtotime($orgDate));  
     
          echo"<tr>";
 echo "<td>$a</td><td><input type=checkbox checked=checked   name=matricno[] id=matricno[] value=".$row['matric'].",".$row['result'].",".$newDate.",".$row['approval'].",".$row['user_id'].",".$row['specialization'].",".$row_area['field_title'].">".$row['matric']."</td><td>".strtoupper($row['surname'])." ".strtolower($row['othername'])."</td><td>".$row['degree']."</td><td>".$row['result']."</td><td>".$row['specialization']."</td><td>".$row_area['field_title']."</td><td>".$newDate."</td>";
      $biodata = $row['field_id'];
      $user_id = $row['user_id'];
      
        if(isset($_POST['resolve'])){
     
            
                    $selzmain = mysqli_query($con,"UPDATE zmain_app SET field_of_interest = '$biodata' WHERE user_id = '$user_id'") or die(mysqli_error($con));
            
            
               if(!$selzmain){
                        echo "Error".mysqli_error($con);
                    } else if($selzmain){
       
                        
                    }
                   
                }
      

     
  }

  
  


//checked=checked
}
    
   
    
    if ($iddd == $iddd_f) {
    echo " <script>
    
   
      var button2 = document.getElementById('submit');
      
      button2.classList.remove('hide');
      
      button2.classList.add('display');
      
    
  </script>";
             
} else {
    echo " <script>
    
      var button = document.getElementById('resolve');
      
      button.classList.remove('hide');
      button.classList.add('display');
      
     
      
  </script>";
}
    
  
//}
echo"</tr></table>";
}
           
                
            
?>
        <?php
//if(isset($_POST['approve'])) {
//  $con2=mysqli_connect ("pgcdb.cscitsrduths.eu-central-1.rds.amazonaws.com", "registration","REGusers#003#") or die('Cannot connect to the database because: ' . mysql_error());
//  mysqli_select_db($con2,"pgsui_app_admin"); 
//  $dept = $_GET['dept'];
//  $degree = $_GET['degree'];
//  $sec = $_GET['sec'];
//  $field=$_GET['field'];
//  $rendition = $_GET['rendition'];
//  //echo "Yes I got it <br><br>";
//  mysqli_query($con2, "insert into rendition (dept,degree,naration,specialization) values ('$dept','$degree','$rendition','$field')") or die(mysqli_error($con2)); 
//    
//   if(isset($_POST['matricno'])){
//      $matric = $_POST['matricno'];
//     foreach ($_POST['matricno'] as $value) 
//     {
//      $val=explode(",",$value);
//      $value2=$val[0];
//      $studrec=$val[1].",".$val[2].",".$val[3];
//	  $user_id=$val[4];
//     //  echo $val[0]."<br>";
//       //$con2=mysqli_connect('localhost','root','','pgsui_app_admin');
//       
//
//       $sel=mysqli_query($con2,"select * from notify where matric='$value2' and student_record='$studrec'") or die(mysqli_error($con));
//       $row=mysqli_fetch_array($sel);
//       //$date2=$row['date'];
//       //$newDate = date("jS F\, Y ", strtotime($date2));  
//       $cont=mysqli_num_rows($sel);
//       if($cont==0)
//       {
//       mysqli_query($con2, "insert into notify (matric,student_record,description,sec,user_id) values ('$value2','$studrec','Result,Effective date, Approval date','$sec','$user_id')") or die(mysqli_error($con2)); 
//      
//      
//      
//      }
//       
//      }
//      if($cont>0)
//       {
//        //echo "<script> alert('You have approved this result on $newDate') </script>";
//       }
//       echo "<script> alert('Results Successfully Approved') </script>";
//   }
//
//   $dept = $_GET['dept'];
//   $degree = $_GET['degree'];
//   $rendition = $_GET['rendition'];
//
//    $con2=mysqli_connect('localhost','root','','pgcgpa');
//    $sel=mysqli_query($con2,"select * from rendition where dept='$dept' and degree='$degree' and naration='$rendition'") or die(mysqli_error($con2));
//    $cont2=mysqli_num_rows($sel);
//    if($cont2==0)
//    {
//    mysqli_query($con2, "insert into rendition (dept,degree,naration) values ('$dept','$degree','$rendition')") or die(mysqli_error($con2)); 
//    }
//
//   
//   }
//
//}
//



?>
        </div>

</form>