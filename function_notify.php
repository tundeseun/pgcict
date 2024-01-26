<?php
function biodata($user_id)
{

//$con=mysqli_connect('localhost','root','','pgcollege');
$con=mysqli_connect ("localhost", "root","") or die('Cannot connect to the database because: ' . mysqli_error($con));
mysqli_select_db($con,"pgcollege");
$sel=mysqli_query($con,"select new.Surname,new.Other_names,zmain_app.sex,zmain_app.marital_status from new inner join zmain_app on zmain_app.user_id=new.id where new.id='$user_id' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);
$surname=$row['Surname'];
$othername=$row['Other_names'];
$sex=$row['sex'];
$marrital_status=$row['marital_status'];

if(($sex==2) and ($marrital_status==1))
{
   $name= $othername." ".strtoupper($surname).","; //"Mr. ".
}

if(($sex==2) and ($marrital_status==2))
{
   $name= $othername." ".strtoupper($surname).",";//"Mr. ".
}

if(($sex==1) and ($marrital_status==1))
{
   $name= $othername." ".strtoupper($surname).","; //"Miss. ".
}

if(($sex==1) and ($marrital_status==2))
{
   $name=$othername." ".strtoupper($surname).",";  // "Mrs. ".
}

if(($sex==2) and ($marrital_status==3))
{
   $name=$othername." ".strtoupper($surname).",";  
}

if(($sex==1) and ($marrital_status==3))
{
   $name=$othername." ".strtoupper($surname).",";  
}

if(($sex==2) and ($marrital_status==4))
{
   $name=$othername." ".strtoupper($surname).",";  
}

if(($sex==1) and ($marrital_status==4))
{
   $name=$othername." ".strtoupper($surname).",";  
}


if( ($marrital_status==0))
{
   $name=$othername." ".strtoupper($surname).",";  
}


if(($sex==0))
{
   $name=$othername." ".strtoupper($surname).",";  
}


echo $name."<br>";

}

function matric($user_id)
{
//$con=mysqli_connect('localhost','root','','pgcollege');
$con=mysqli_connect ("localhost", "root","") or die('Cannot connect to the database because: ' . mysqli_error($con));
mysqli_select_db($con,"pgcollege");

$sel=mysqli_query($con,"select prev_app.matric from new inner join prev_app on prev_app.user_id=new.id where new.id='$user_id' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);
/*$surname=$row['Surname'];
$othername=$row['Other_names'];
$sex=$row['sex'];
$marrital_status=$row['marital_status'];*/
$matric=$row['matric'];

echo "(S I.   "."  ".$matric."),<br>";

}

function title($user_id)
{

   $con=mysqli_connect('localhost','root','','pgcollege');
   $sel=mysqli_query($con,"select new.Surname,new.Other_names,zmain_app.sex,zmain_app.marital_status from new inner join zmain_app on zmain_app.user_id=new.id where new.id=$user_id; ") or die(mysqli_error($con));
   $row=mysqli_fetch_array($sel);
   $surname=$row['Surname'];
   $othername=$row['Other_names'];
   $sex=$row['sex'];
   $marrital_status=$row['marital_status'];
   
   
   if(($sex==2) and ($marrital_status==1))
   {
      $name= "Mr. ".strtoupper($surname).",";
   }
   
   if(($sex==2) and ($marrital_status==2))
   {
      $name= "Mr. ".strtoupper($surname).",";
   }
   
   if(($sex==1) and ($marrital_status==1))
   {
      $name= "Miss. ".strtoupper($surname).",";
   }
   
   if(($sex==1) and ($marrital_status==2))
   {
      $name= "Mrs. ".strtoupper($surname).",";
   }
   if(($marrital_status==0))
{
   $name=strtoupper($surname).",";  
}

if(($sex==0))
{
   $name=strtoupper($surname).",";  
}

   echo $name."<br>";
   
   
 

}

function dept($user_id)
{
//$con=mysqli_connect('localhost','root','','pgcollege');
$con=mysqli_connect ("localhost", "root","") or die('Cannot connect to the database because: ' . mysql_error($con));
mysqli_select_db($con,"pgcollege");

$sel=mysqli_query($con,"select dept_new.department,zmain_app.sex,zmain_app.user_id from zmain_app  inner join dept_new on zmain_app.department=dept_new.id  where zmain_app.user_id='$user_id' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);
/*$surname=$row['Surname'];
$othername=$row['Other_names'];
$sex=$row['sex'];
$marrital_status=$row['marital_status'];*/
$dept=$row['department'];

if(substr($dept,0,6)=="Centre")
{
   $department=$dept;
}

elseif(substr($dept,0,6)=="School")
{
   $department= $dept;
}


elseif(substr($dept,0,9)=="Institute")
{
   $department= $dept;
}


elseif(substr($dept,0,6)<>"Centre")
{
   $department= "Department of  ".$dept;
}

elseif(substr($dept,0,6)<>"School")
{
   $department= "Department of  ".$dept;
}


elseif(substr($dept,0,9)<>"Institute")
{
   $department= "Department of  ".$dept;
}

echo $department.",<br>";

}




function fac($user_id)
{
//$con=mysqli_connect('localhost','root','','pgcollege');
$con=mysqli_connect ("localhost", "root","") or die('Cannot connect to the database because: ' . mysql_error($con));
mysqli_select_db($con,"pgcollege");

$sel=mysqli_query($con,"select fac_new.faculty,zmain_app.user_id from zmain_app  inner join fac_new on zmain_app.faculty=fac_new.id  where zmain_app.user_id='$user_id' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);
/*$surname=$row['Surname'];
$othername=$row['Other_names'];
$sex=$row['sex'];
$marrital_status=$row['marital_status'];*/
$fac=$row['faculty'];


if(substr($fac,0,6)=="Centre")
{
   $faculty=strtoupper($fac);
}

elseif(substr($fac,0,6)=="School")
{
   $faculty=strtoupper($fac);
}

elseif(substr($fac,0,9)=="Institute")
{
   $faculty=strtoupper($fac);
}




elseif(substr($fac,0,6)<>"Centre")
{
   $faculty= "FACULTY OF  ".strtoupper($fac);
}

elseif(substr($fac,0,6)<>"School")
{
   $faculty= "FACULTY OF  ".strtoupper($fac);
}

elseif(substr($fac,0,9)<>"Institute")
{
   $faculty= "FACULTY OF  ".strtoupper($fac);
}


echo $faculty.",<br>";
//echo substr($fac,0,6);

}



function effective($mat)
{
//$con=mysqli_connect('localhost','root','','pgcollege');
$con=mysqli_connect ("localhost", "root","") or die('Cannot connect to the database because: ' . mysql_error($con));
mysqli_select_db($con,"pgcollege");

$sel=mysqli_query($con,"select student_record from notify where matric='$mat' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);

$sr=$row['student_record'];
$sr2=explode(",",$sr);
$orgDate = $sr2[1];  
    $newDate = date("jS F\, Y ", strtotime($orgDate));  
echo  $newDate. "<br>"; //$sr2[1];

}


function code($mat)
{
//$con=mysqli_connect('localhost','root','','pgcollege');
$con=mysqli_connect ("localhost", "root","") or die('Cannot connect to the database because: ' . mysql_error($con));
mysqli_select_db($con,"pgcollege");

$sel=mysqli_query($con,"select * from notify where matric='$mat' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);

$sr=$row['student_record'];
$mat=$row['matric'];
$date=$row['date'];
$sec=$row['sec'];
$sr2=explode(",",$sr);
$orgDate = $sr2[1];  
    $code1 = str_replace('-','',$orgDate);
 $code2 = str_replace('/','',$sec);
 $code =$code1.$mat.$code2;
echo  $code. "<br>"; //$sr2[1];

}


function approval($mat)
{
//$con=mysqli_connect('localhost','root','','pgcollege');
$con=mysqli_connect ("localhost", "root","") or die('Cannot connect to the database because: ' . mysql_error($con));
mysqli_select_db($con,"pgcollege");

$sel=mysqli_query($con,"select student_record, date from notify where matric='$mat' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);

$sr=$row['student_record'];
$date=$row['date'];
$sr2=explode(",",$sr);
$orgDate = $sr2[2];  
    $newDate = date("jS F\, Y ", strtotime($date));  
echo  $newDate. "<br>"; //$sr2[1];

}


function result($mat)
{
//$con=mysqli_connect('localhost','root','','pgcollege');
$con=mysqli_connect ("localhost", "root","") or die('Cannot connect to the database because: ' . mysql_error($con));
mysqli_select_db($con,"pgcollege");

$sel=mysqli_query($con,"select student_record from notify where matric='$mat' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);

$sr=$row['student_record'];
$sr2=explode(",",$sr);



if(($sr2[0]=="PASS") or ($sr2[0]=="TM"))
{
$output='';
}
elseif(($sr2[0]<>"PASS") or ($sr2[0]<>"TM"))
{

$output="You are also eligible to proceed to"." ". $sr2[0];
}

echo $output;

}


function programe($dept,$degree,$field)
{
//$con=mysqli_connect('localhost','root','','pgcollege');
$con=mysqli_connect ("localhost", "root","") or die('Cannot connect to the database because: ' . mysql_error($con));
mysqli_select_db($con,"pgcollege");

$sel=mysqli_query($con,"select * from rendition where dept='$dept' and degree='$degree' and specialization='$field' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);

$sr=$row['naration'];
//$sr2=explode(",",$sr);

echo $sr;

}



?>