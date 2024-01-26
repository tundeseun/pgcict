<?php
	// Include database connection

	include_once "dbConfig.php";

	// Insert multiple checkbox value in databse

      if ($_POST['name']) {

          $name = $_POST['name'];
          $course = $_POST['course'];

          $query = "INSERT INTO notify(matric,degree) VALUES('$name', '$course')";

          $result = $con->query($query);

          if ($result) {
              echo 1;
          }else{
              echo 0;
          }

  }

?>