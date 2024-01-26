<?php
include('config.php');
 
//insert into database
if(!empty($_POST)) {

 
echo "Yes I got it <br><br>";
 
 if(isset($_POST['matricno'])){
    $matric = $_POST['matricno'];
   foreach ($_POST['matricno'] as $value) 
   {
     echo $value."<br>";
   }
 }
 
 }
 


 /*$sel=mysqli_query($conn, "select * from users where name='$name'and email='$email' and message='$message' and gender='$gender'");
 $cont= mysqli_num_rows($sel);
if($cont < 1){
 mysqli_query($conn, "insert into users (name, email, message, gender) values ('$name', '$email', '$message','$gender')"); 
 
 echo "Name : ".$name."</br>";
 echo "Email : ".$email."</br>";
 echo "Message : ".$message."</br>";
 echo "Gender : ".$gender."</br>";
}}
if($cont > 0){

    mysqli_query($conn, "update users  set gender ='$gender' where name='$name' and email='$email' and message='$message'"); 
    echo "Record Successfuly Updated !!!";
}
*/
?>