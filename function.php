<style>
    .display {
        display: block !important;
        cursor: pointer;
        margin-top: 1rem;
    }

    .hide {
        display: none;
        cursor: pointer;
    }

    #empty {
        cursor: auto !important;
    }

.danger{
  background-color: red !important;
  color: black;
  font-weight: 600;
}
.success{
  background-color: green !important;
}
.warning{
  background-color: #f0ad4e;
  color: black;
  font-weight: 600;
}
</style>



<form method="post">

    <div align="center"><input type='submit' name='resolve' id='resolve' class='hide button danger' value='Resolve Specialisation' /></div>
    <div align="center"><input type='submit' name='naration' id='submit' class='hide button success' value='Proceed to Assign Naration' /></div>
    <div align="center"><input id='empty' class='hide button danger' value='No Record Found' /></div>
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
            <th>Specialisation on Result</th>
            <th>Specialisation on Student Portal</th>

            <th>Effective Date</th>


        </tr>


        <?php
        
        error_reporting(E_ALL);
        ini_set('display_errors', 0);


function showrecord($dept,$degree,$field,$sec,$date)
{
    include('config.php');
    
    $newDateForm = date("m/d/Y", strtotime($date));  
    $newDateForm2 = date("Y/m/d", strtotime($date));  
    if(isset($_POST['naration'])){
        header('Location: speM.php?dept='.$dept.'&degree='.$degree.'&field='.$field.'&sec='.$sec.'&effectivedate='.$date.'');
    }
//
//$msg1 = "";
//$msg2 = "";
$a=0;
$iddd=0;   
$iddd_f=0;

    
$sel=mysqli_query($con,"select distinct surname,othername,result,matric,id,effectivedate,approval,degree_id,user_id,field_id from biodata where dept_id ='$dept' and degree_id='$degree' and field_id='$field' and (effectivedate='$date' OR effectivedate='$newDateForm' OR effectivedate='$newDateForm2') and result <>'' and result <>'NG' and result <>'-'  group by matric order by surname ASC") or die(mysqli_error($con));
    

   
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

      //Use field_of_interest (which is an id of specialization) in zmain_app to get the specialization in Field_new
    $sel2=mysqli_query($con,"select field_new.field_title from zmain_app inner join field_new on zmain_app.field_of_interest = field_new.id where zmain_app.user_id ='$user_id_area'") or die(mysqli_error($con));
    $row_area=mysqli_fetch_array($sel2);
      
      //Use Degree_id in biodata to get the Degree in Degree_new
    $sel_degree=mysqli_query($con,"select degree from degree_new where id ='$degree_id_area'") or die(mysqli_error($con));
    $row_degree=mysqli_fetch_array($sel_degree);
      
    //Use field_id in biodata to get the Specialization in field_new
    $sel_field=mysqli_query($con,"select field_title from field_new where id ='$field_id_area'") or die(mysqli_error($con));
    $row_field=mysqli_fetch_array($sel_field);
      
    
      //GET FIELD ID OF BIODATA & ZMAIN_APP FOR COMPARISM START
          
    $sel_nn=mysqli_query($con,"select distinct field_id from biodata where user_id ='$user_id_area' and field_id='$field_id_area'") or die(mysqli_error($con));
    while($row_area_nn=mysqli_fetch_array($sel_nn)){
        $new_idd = $row_area_nn['field_id'];
        $iddd += $new_idd;
        
    }

  $sel23=mysqli_query($con,"select distinct field_of_interest from zmain_app where user_id ='$user_id_area' ") or die(mysqli_error($con));
  while($row_area2=mysqli_fetch_array($sel23)){
          $valueTable2 = $row_area2['field_of_interest'];
          $iddd_f +=$valueTable2;
      }
      
      //GET FIELD ID OF BIODATA & ZMAIN_APP FOR COMPARISM ENDS
       
    $a=$a+1;
      
    $orgDate = $row['effectivedate'];  
    $newDate = date("Y-m-d", strtotime($orgDate));  
     
          echo"<tr>";
 echo "<td>$a</td><td><input type=checkbox checked=checked   name=matricno[] id=matricno[] value=".$row['matric'].",".$row['result'].",".$newDate.",".$row['approval'].",".$row['user_id'].",".$row_field['field_title'].",".$row_area['field_title'].">".$row['matric']."</td><td>".strtoupper($row['surname'])." ".strtolower($row['othername'])."</td><td>".$row_degree['degree']."</td><td>".$row['result']."</td><td>".$row_field['field_title']."</td><td>".$row_area['field_title']."</td><td>".$newDate."</td>";
      
        if(isset($_POST['resolve'])){
     
            
                    $selzmain = mysqli_query($con,"UPDATE zmain_app SET field_of_interest = '$field_id_area' WHERE user_id = '$user_id_area'") or die(mysqli_error($con));
            
            
               if(!$selzmain){
                        echo "Error".mysqli_error($con);
                    } 
            ob_start();
            
            header('Refresh: 1');
            ob_end_flush();
            
                }
      

     
  }

  
  


//checked=checked
}
   if(($iddd != 0) || ($iddd_f != 0)){
       
       if ($iddd == $iddd_f) {
    echo " <script>
    
      window.location.replace('speM.php?dept=$dept&degree=$degree&field=$field&sec=$sec&effectivedate=$date');
  </script>";

             
} else {
    echo " <script>
    
      var button = document.getElementById('resolve');
      
      button.classList.remove('hide');
      button.classList.add('display');
      
     
      
  </script>";
}
       
   } elseif(($iddd && $iddd_f)==0) {
       
      echo " <script>
    
   
      var button2 = document.getElementById('submit');
      
      button2.classList.remove('display');
      
      button2.classList.add('hide');
      
      
      var button = document.getElementById('resolve');
      
      button.classList.remove('display');
      button.classList.add('hide');
      
      var button3 = document.getElementById('empty');
      
      button3.classList.remove('hide');
      button3.classList.add('display');
      
    
  </script>";
       
   }
    
    
 
  
//}
echo"</tr></table>";
  
    
       
}
              
            
?>

        </div>

</form>
