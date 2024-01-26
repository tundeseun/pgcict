<?php
function biodata($user_id)
{
$con=mysqli_connect('localhost','root','','pgcollege');
$sel=mysqli_query($con,"select new.Surname,new.Other_names,zmain_app.sex,zmain_app.marital_status,prev_app.matric from new inner join zmain_app on zmain_app.user_id=new.id inner join prev_app on prev_app.user_id=new.id where new.id='$user_id' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);
$surname=$row['Surname'];
$othername=$row['Other_names'];
$sex=$row['sex'];
$marrital_status=$row['marital_status'];
$matric=$row['matric'];
if(($sex==1) and ($marrital_status==1))
{
   $name= "Mr. ".$othername." ".strtoupper($surname).",";
}

if(($sex==1) and ($marrital_status==2))
{
   $name= "Mr. ".$othername." ".strtoupper($surname).",";
}

if(($sex==2) and ($marrital_status==1))
{
   $name= "Miss. ".$othername." ".strtoupper($surname).",";
}

if(($sex==2) and ($marrital_status==2))
{
   $name= "Mrs. ".$othername." ".strtoupper($surname).",";
}
echo $name."<br>";

}

function matric($user_id)
{
$con=mysqli_connect('localhost','root','','pgcollege');
$sel=mysqli_query($con,"select new.Surname,new.Other_names,zmain_app.sex,zmain_app.marital_status,prev_app.matric from new inner join zmain_app on zmain_app.user_id=new.id inner join prev_app on prev_app.user_id=new.id where new.id='$user_id' ") or die(mysqli_error($con));
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
$sel=mysqli_query($con,"select new.Surname,new.Other_names,zmain_app.sex,zmain_app.marital_status,prev_app.matric from new inner join zmain_app on zmain_app.user_id=new.id inner join prev_app on prev_app.user_id=new.id where new.id='$user_id' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);
$surname=$row['Surname'];
$othername=$row['Other_names'];
$sex=$row['sex'];
$marrital_status=$row['marital_status'];
$matric=$row['matric'];

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
echo $name."<br>";



}

function dept($user_id)
{
$con=mysqli_connect('localhost','root','','pgcollege');
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

if(substr($dept,0,9)=="Institute")
{
   $department=$dept;
}

if(substr($dept,0,6)<>"Centre")
{
   $department= "Department of  ".$dept;
}

echo $department.",<br>";

}




function fac($user_id)
{
$con=mysqli_connect('localhost','root','','pgcollege');
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


if(substr($fac,0,6)<>"Centre")
{
   $faculty= "FACULTY OF  ".strtoupper($fac);
}

echo $faculty.",<br>";

}



function effective($mat)
{
$con=mysqli_connect('localhost','root','','pgcollege');
$sel=mysqli_query($con,"select student_record from notify where matric='$mat' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);

$sr=$row['student_record'];
$sr2=explode(",",$sr);
$orgDate = $sr2[1];  
    $newDate = date("jS F\, Y ", strtotime($orgDate));  
echo  $newDate. "<br>"; //$sr2[1];

}

function approval($mat)
{
$con=mysqli_connect('localhost','root','','pgcollege');
$sel=mysqli_query($con,"select student_record from notify where matric='$mat' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);

$sr=$row['student_record'];
$sr2=explode(",",$sr);
$orgDate = $sr2[2];  
    $newDate = date("jS F\, Y ", strtotime($orgDate));  
echo  $newDate. "<br>"; //$sr2[1];

}


function result($mat)
{
$con=mysqli_connect('localhost','root','','pgcollege');
$sel=mysqli_query($con,"select student_record from notify where matric='$mat' ") or die(mysqli_error($con));
$row=mysqli_fetch_array($sel);

$sr=$row['student_record'];
$sr2=explode(",",$sr);

echo $sr2[0];

}


?>