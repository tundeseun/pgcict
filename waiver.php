<?php




?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" type="text/css" href="style8.css">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>WAIVER PROCESSING MODULE</title>
    <style type="text/css">
        .style1 {
            font-size: 12px;
            font-style: italic;
        }

        .style5 {
            color: #000099;
            font-weight: bold;
        }

        .center {
            margin: 0 auto;
            width: 60%;
        }

        table {
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #0099CC;
            color: white;
        }

        #updateButton {
            margin: 10px auto;
            text-align: center;
        }

        #updateButton button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #updateButton button:hover {
            background-color: #45a049;
        }

        #searchButton button {
            background-color: #0099CC;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #searchButton button:hover {
            background-color: #007799;
        }

        .flag-notice {
            background-color: #ffcccc;
            color: #cc0000;
            font-weight: bold;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <table width="100%" bgcolor="#0099CC">
        <tr>
            <td width="18%">
                <div align="center"><img src="images/logo.png" width="65" height="64" /></div>
            </td>
            <td width="65%">
                <div align="center"><img src="images/ban.png" width="409" height="80" /></div>
            </td>
            <td width="17%">
                <div align="center"><img src="images/logo2.png" width="76" height="64" /></div>
            </td>
        </tr>
    </table>
    <p align="center" class="style5">FINANCE OFFICE</p>
    <p align="center" class="style5">WAIVER PROCESSING MODULE</p>
    <div class="center">
        <form id="form1" name="form1" method="post" action="waiver.php">
            <table width="100%" border="1">
                <tr>
                    <td height="142">
                        <table width="80%" border="0">
                            <tr>
                                <td>
                                    <div align="center" class="style5">Enter Invoice Number:</div>
                                </td>
                                <td><input type="text" name="invoiceno" id="invoiceno" required /></td>
                                <td div id='searchButton'><button type="submit" name="search" id="search" value="Search">Search</button></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>

        <div id="results">
<?php

include("conn.php");

 if(isset($_GET['inv'])){
                    $invoice_new = $_GET['inv'];
                     $query_info = "SELECT `Surname`, `Other_names`, `numeration`, `dept_new`.`department`, `degree_new`.`degree` FROM `new` 
                INNER JOIN `fee_detail2` ON `new`.`id` = `fee_detail2`.`user_id` 
                INNER JOIN `zmain_app` ON `new`.`id` = `zmain_app`.`user_id`
                INNER JOIN `dept_new` ON `zmain_app`.`Department` = `dept_new`.`id`
                INNER JOIN `degree_new` ON `zmain_app`.`Degree` = `degree_new`.`id`
                WHERE `fee_detail2`.`invoice_number` = '$invoice_new'";

                $result_info = mysqli_query($conn, $query_info);
                if (!$result_info) {
                    die("Query execution failed: " . mysqli_error($conn));
                }

                if (mysqli_num_rows($result_info) > 0) {
                    $row_info = mysqli_fetch_assoc($result_info);
                    $surname = $row_info['Surname'];
                    $other_names = $row_info['Other_names'];
                    $numeration = $row_info['numeration'];
                    $department = $row_info['department'];
                    $degree = $row_info['degree'];

                    echo "<p class='style5'>Surname: $surname</p>";
                    echo "<p class='style5'>Other Names: $other_names</p>";
                    echo "<p class='style5'>Application No: $numeration</p>";
                    echo "<p class='style5'>Department: $department</p>";
                    echo "<p class='style5'>Degree: $degree</p>";
                } else {
                    echo "<br/>";
                    echo "No user information found.";
                    echo "<br/>";
                }

                $query = "SELECT new_fee.description, fee_transaction.item_amount, fee_transaction.id, fee_transaction.invoice_flag FROM fee_transaction INNER JOIN new_fee ON new_fee.fee_id = fee_transaction.item_id WHERE fee_transaction.invoiceno='$invoice_new';";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    die("Query execution failed: " . mysqli_error($conn));
                }

                $invoice_flag = false; 

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['invoice_flag'] == 1) {
                        $invoice_flag = true; 
                        break;
                    }
                }

                if ($invoice_flag) {

                    echo "<div class='flag-notice'>This invoice has a flag status and cannot be edited.</div>";
                }

                echo "<br/>";

                echo "<form method='post' action=''>";
                echo "<table border=''>
<tr>
    <th>Description</th>
    <th>Item Amount</th>
</tr>";

                mysqli_data_seek($result, 0); 

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['description'] . "</td>";
                    if ($row['invoice_flag'] == 0) {
                        echo "<td><input type='text' name='item_amount[{$row['id']}]' value='" . $row['item_amount'] . "' style='width: 50px;'></td>";
                    } else {
                        echo "<td><input type='text' name='item_amount[{$row['id']}]' value='" . $row['item_amount'] . "' style='width: 50px;' readonly></td>";
                    }
                    echo "</tr>";
                }

                echo "</table>";
                echo "<div id='updateButton'><button type='submit' name='update' id='update' value='update'>Update</button></div>";
                echo "</form>";

                
                }

?>

            <?php
            
            

            if (isset($_POST['search'])) {
                $invoiceno = $_POST['invoiceno'];
                header("Location:waiver.php?inv=$invoiceno");

               
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
               

               

                
            } elseif (isset($_POST['update'])) {
                if (isset($_GET['inv'])) {
                    $invoiceno = $_GET['inv'];
                    $updated_item_amounts = $_POST['item_amount'];

                  
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    foreach ($updated_item_amounts as $id => $updated_amount) {
                        $update_query = "UPDATE fee_transaction SET item_amount = '$updated_amount', last_modified = NOW() WHERE invoiceno = '$invoiceno' AND id = '$id';";

                        $result = mysqli_query($conn, $update_query);

                        if ($result) {
                            $_SESSION['record_updated'] = true;
                        } else {
                            echo "Error updating item amount: " . mysqli_error($conn);
                        }
                    }
                    if ($result) {
                        echo "<script>alert('Invoice Successfully Updated');</script>";
                        
                        echo"<script>window.location.replace('waiver.php?inv=$invoiceno');</script>";
                    }

                    

                    mysqli_close($conn);
                } else {
                    echo "Error: Invoiceno is not set.";
                }
               

            }
            ?>
        </div>
    </div>
</body>

<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('update').addEventListener('click', function() {
            var invoiceno = document.getElementById('invoiceno').value;
            var hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'invoiceno';
            hiddenInput.value = invoiceno;
            document.getElementById('form1').appendChild(hiddenInput);
        });
    });
</script> -->


</html>