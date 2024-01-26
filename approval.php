


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
  color: #fff;
  text-decoration: none;
}

.active {
  background-color: #1569C7;
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




<?php
include('config.php');
include('style.css');


$dept2=$_GET['dept'];
$degree=$_GET['degree'];
$field=$_GET['field'];
$sec=$_GET['sec'];
$date=$_GET['effectivedate'];




echo "
<ul>
 
<li><a href='#'>Menu</a></li>
  <li><a href='setup.php'>Select Department</a></li>
  <li><a href='view.php?dept=$dept2&degree=$degree&field=$field&sec=$sec&effectivedate=$date'>View Approved Result</a></li>


 
  
</ul>
";

include('function.php');


showrecord($dept2,$degree,$field,$sec,$date);

/*while($row)
{
 echo $row['surname']."-".$row['othername']."---".$row['result'];

}*/


?>



