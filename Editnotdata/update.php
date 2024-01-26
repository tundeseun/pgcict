<?php 
//error_reporting(0);
include "head.php";
$id = isset($_GET['id']) ? $_GET['id'] : '';
$id = $_GET['id'];
function getFaculty()
{
    include "conn.php";
    $sql = "SELECT * FROM fac_new";
    $Faculty = [];
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($Faculty, $row);
        }
    }
    
    return $Faculty;
} 

$Faculty = getFaculty();

function getDepartment()
{
    include "conn.php";
    $sql = "SELECT * FROM dept_new";
    $Department = [];
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($Department, $row);
        }
    }
    
    return $Department;
}
    $Department = getDepartment();

function getDegree()
{
    include "conn.php";
    $sql = "SELECT * FROM degree_new";
    $Degree = [];
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($Degree, $row);
        }
    }
    
    return $Degree;
}

    $Degree = getDegree();

function getfield_of_interest()
{
    include "conn.php";
    $sql = "SELECT * FROM field_new3";
    $field_of_interest = [];
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($field_of_interest, $row);
        }
    }
    
    return $field_of_interest;
}

    $field_of_interest= getfield_of_interest();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<body style="background-color: whitesmoke;">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand">Update Record</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </div>
        </div>
    </nav>




<!---?php include "navbar.php" ?-->



<div class="container-fluid">
    <div class="row">
        <!---?php include "sidebar.php" ?-->


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: whitesmoke;">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Welcome : <?php echo $name ?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="background-color: white; padding:50px;">
                    <form action="process_update.php" method="POST">
                    <input type="hidden" value="<?php echo $id?>" name="iD">
                            <div class="form-group" style="margin-top: 10px; width:auto; height:auto; overflow:auto">
                            <label for="Faculty">Faculty</label>
                            <select name="Faculty" class="form-control" id="">
                                <option value="" selected disabled></option>
                                <?php foreach ($Faculty as $key => $value) {
                                ?>
                                    <option value="<?php echo $value['faculty'] ?>" ><?php echo $value['faculty'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" style="margin-top: 10px; width:auto; height:auto; overflow:auto">
                            <label for="Department">Department</label>
                            <select name="Department" class="form-control" id="">
                                <option value="" selected disabled></option>
                                <?php foreach ($Department as $key => $value) {
                                ?>
                                    <option value="<?php echo $value['department'] ?>"><?php echo $value['department'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" style="margin-top: 10px; width:auto; height:auto; overflow:auto">
                            <label for="Degree">Degree</label>
                            <select name="Degree" class="form-control" id="">
                                <option value="" selected disabled></option>
                                <?php foreach ($Degree as $key => $value) {
                                ?>
                                    <option value="<?php echo $value['degree'] ?>"><?php echo $value['degree'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group" style="margin-top: 10px; width:auto; height:auto; overflow:auto"> 
                            <label for="field_of_interest">Field of Interest</label>
                            <select name="field_of_interest" class="form-control" id="">
                                <option value="" selected disabled></option>
                                <?php foreach ($field_of_interest as $key => $value) {
                                ?>
                                    <option value="<?php echo $value['field_title'] ?>"><?php echo $value['field_title'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" style="margin-top: 10px;">
                            <button name="UpdateRecord" class="btn btn-success" type="submit">Update Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

</body>

</html>