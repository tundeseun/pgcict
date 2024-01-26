<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!--<form method="post"> -->
  <div align="center"><input type="submit" name="approve" id="approve" class="button" value="Approve Result" /> </div><br>
  <div class="result">
    </div>
<table id="customers" align="center">
  <tr>
  
    <th>S/N</th>
    
    <th>Matric</th>
    <th>FullName</th>
    <th>Result</th>
    <div class="radio">  
  </tr><?php
function showrecord($effectivedate,$dept)
{
include('config.php');
$sel=mysqli_query($con,"select distinct surname,othername,result,matric,id from biodata where effectivedate='$effectivedate' and department ='$dept' and result <>'' and result <>'NG' and result <>'-'  group by matric order by surname ASC") or die(mysqli_error($con));
$a=0;
while($row=mysqli_fetch_array($sel))
{
  $a=$a+1;
    echo"<tr>";
 echo "<td>$a</td><td><input type=checkbox   name=matricno id=matricno value=".$row['matric'].">".$row['matric']."</td><td>".$row['surname']." ".$row['othername']."</td><td>".$row['result']."</td>";

//checked=checked
}
//}
echo"</tr></table>";

}




?>
</div>
<script>
  $(document).ready(function () {
    //$('input[type="radio"]').click(function (e) {
     // e.preventDefault();
     $('input[type="submit"]').click(function(){  
      var matricno = $('#matricno').val();
      //var email = $('#email').val();
      //var message = $('#message').val();
      var approve = $(this).val(); //var gender = $('#gender').val();
      $.ajax
        ({
          type: "POST",
          url: "form_submit.php",
          data: { "matricno": matricno, approve: approve },   //, "email": email, "message": message , gender: gender
          success: function (data) {
            $('.result').html(data);
           // $('#contactform')[0].reset();
          }
        });
    });
  });
</script>

