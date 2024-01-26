<?php
error_reporting(0);
include "head.php";
/*function getDepartmentID($user_id)
{
    include "conn.php";
    $sql = "SELECT * FROM zmain_app WHERE user_id ='$user_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['department'];
}
function getFacultyID($user_id)

{
    include "conn.php";
    $sql = "SELECT * FROM zmain_app WHERE user_id ='$user_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['faculty'];
}

function getDepartmentName($id)
{
    include "conn.php";
    $sql = "SELECT * FROM dept_new WHERE id ='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['department'];
}
function getFacultyName($id)
{
    include "conn.php";
    $sql = "SELECT * FROM fac_new WHERE id ='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['faculty'];
}

function getDegreeID($user_id)
{
    include "conn.php";
    $sql = "SELECT * FROM zmain_app WHERE user_id ='$user_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['degree'];
}
function getDegreeName($id)
{
    include "conn.php";
    $sql = "SELECT * FROM degree_new WHERE id ='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['degree'];
}
function getfield_of_interestID($user_id)
{
    include "conn.php";
    $sql = "SELECT * FROM zmain_app WHERE user_id ='$user_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['field_of_interest'];
}
function getfield_of_interestName($id)
{
    include "conn.php";
    $sql = "SELECT * FROM field_new WHERE id ='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['field_of_interest'];
}*/

?>
<?php include "navbar.php" ?>



<div class="container-fluid">
    <div class="row">
        <?php include "sidebar.php" ?>


        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Welcome : <?php echo $name ?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">

                    </div>

                </div>
            </div>


            <form method="POST">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                           <!-- <label for="Student_Record" class="form-label">Matric No.</label>
                            <input class="form-control" type="text" name="Matric" required autocomplete="" placeholder="Enter Matric to search..">
                            <button type="submit" name="search" class="btn btn-primary">Search</button>
            </form><br>-->
            <?php
            /* if (isset($_POST['search'])) {
                $Matric = $_POST['Matric'];
                $sql = "SELECT * FROM biodata WHERE Matric='$Matric'";
                $result = $conn->query($sql);
                $row = $result->fetch_array(MYSQLI_ASSOC);
            } */           
            ?>


    </div>
</div>
<br>




<form method="POST">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label for="Student_Record" class="form-label">Matric No.</label>
                <input class="form-control" type="text" name="Matric" required autocomplete="" placeholder="Enter Matric to search...">
                <button type="submit" name="search" class="btn btn-primary">Search</button>
            </div>
        </div>
    </div>
</form><br>

<?php
if (isset($_POST['search'])) {
    $Matric = $_POST['Matric'];
    $sql = "SELECT * FROM biodata WHERE matric='$Matric'";
    $result = $conn->query($sql);
?>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Matric</th>
                <th>Faculty</th>
                <th>Department</th>
                <th>Degree</th>
                <th>Field of Interest</th>
                <th>Result</th>
                <th>Effective Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['surname'] . ' ' . $row['othername'] ?? 'No record' ?></td>
                    <td><?php echo $row['matric'] ?? 'No record' ?></td>
                    <td><?php echo (($row['faculty'] ?? 'No record')) ?></td>
                    <td><?php echo (($row['department'] ?? 'No record')) ?></td>
                    <td><?php echo (($row['degree'] ?? 'No record')) ?></td>
                    <td><?php echo (($row['specialization'])) ?? 'No record' ?></td>
                    <td><?php echo (($row['result'])) ?? 'No record' ?></td>
                    <td><?php echo (($row['effectivedate'])) ?? 'No record' ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Update</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>
