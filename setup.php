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
 <form action="approval.php" method="get">
 <label >Department</label>
 	<select name="dept" class="combo1" id="dept" onchange="showUser(this.value)">
 	        <?php
      //              $r2=mysqli_query($con,$r);
    //while($row=mysqli_fetch_assoc($r2))
  //  {
          include('config.php');
    $query="select id,department FROM dept_new order by department 	 ";//order by name";
    echo "$query <br>";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
    echo "<option value= >";
    while ($line = mysqli_fetch_assoc($result)) 
    {
      $key=array_keys($line);
      echo "<option value=". $line[$key[0]];
      /*if ($_POST[$name]==$line[$key[0]])
      {
        echo " selected";
      }*/
      echo  " > " .strtoupper($line[$key[1]]) ."\n";
    }
    ?>
    
            </select>
            
            
            <div align="center" class="input5"><span id="txtHint">
  
    


    
  </form>
</div></td>
        
      </tr>
    </tbody>
  </table>

</body>
</html>