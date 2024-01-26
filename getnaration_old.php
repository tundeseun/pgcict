<?php session_start();
//include('connect.php');
//$username=$_SESSION['name']; 
//$dept=$_SESSION['dept']; 
include('config.php');
$q=$_GET["q"];



echo"<label >Degree</label>";
    echo"<select name=degree id=degree class=combo1>";
    $query="select DISTINCT degree FROM fieldofinterest5 where dept='$q' and pay_id<>3 and pay_id<>4 and pay_id<>5 and pay_id<>9  order by degree ";//order by name";
//echo "$query <br>";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
echo "<option value= >";
while ($line = mysqli_fetch_assoc($result)) 
{
    $key=array_keys($line);
    $se=mysqli_query($con,"select id,degree from degree_new where id=".$line['degree']."") or die(mysqli_error($con)); //where id=".$line[$key[0]]."
    while ($line2 = mysqli_fetch_assoc($se)) 
        {
            $key=array_keys($line);
    $degree3=$line2['degree'];
            $iddegree=$line2['id'];
    
}
    echo "<option value=".$iddegree.">".$degree3."</b></option>"; 
}

echo"</select>";
echo"<br>";
echo"<label >Rendition</label>";
 	echo"<input type=text name=rendition />";
     echo"<br>";
     echo" <label >Effective Date</label>";
 	echo"<input type=date name=effective />";
     echo"<br>";

     echo"<label >Result Session</label>";
    echo"<select name=sec id=sec class=combo1>";
    $query="select id,title from sec order by title ";//order by name";
//echo "$query <br>";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
echo "<option value= >";
while ($line = mysqli_fetch_assoc($result)) 
{
    $key=array_keys($line);
    
    echo "<option value=".$line['title'].">".$line['title']."</b></option>"; 
}

echo"</select>";
echo"<br>";

   




     echo"<input type=submit value=Submit name=Submit>";



//$i=5;
		
	//	echo "</tr></tr></table>";
		?>